<?php if (!defined('_lib')) {
    die("Error");
}

class database
{

    public $db;
    public $pdo;
    public $result;
    public $insert_id;
    public $sql   = "";
    public $refix = "";
    public $servername;
    public $username;
    public $password;
    public $database;

    public $table = "";
    public $join  = [];
    public $where = "";
    public $order = "";
    public $limit = "";

    public $error = array();
    public function __construct($config = array())
    {
        if (!empty($config)) {
            $this->init($config);
            $this->connect();
        }
    }
    public function init($config = array())
    {
        foreach ($config as $k => $v) {
            $this->$k = $v;
        }

    }

    public function connect()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->servername;dbname=$this->database;charset=utf8",
                $this->username,
                $this->password,
                array(
                    PDO::ATTR_PERSISTENT         => false,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_STRINGIFY_FETCHES  => true,
                )
            );
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage() . ' Code: ' . $e->getCode());
        }
        $this->pdo->exec('set names utf8;');
    }

    public function query($sql = "", $multiQuery = false)
    {
        //$this->sql = str_replace("''", "'0'",$this->sql);
        if ($sql) {
            $this->sql = str_replace('#_', $this->refix, $sql);
        }

        try {
            return $this->result = $this->pdo->query($this->sql);
        } catch (PDOException $e) {
            die(
                'Error: ' . $e->getMessage() . '<br>' .
                'Code: ' . $e->getCode() . '<br>' .
                'SQL: ' . $this->sql
            );
        }
    }

    public function insert($data = array())
    {
        $key   = [];
        $value = [];
        foreach ($data as $k => $v) {
            $v       = str_replace("'", "\'", $v);
            $key[]   = "`$k`";
            $value[] = "'" . $v . "'";
        }

        $key       = "(" . implode(',', $key) . ")";
        $value     = "(" . implode(',', $value) . ")";
        $this->sql = "insert into " . $this->refix . $this->table . $key . " values " . $value;
        $this->query();
        $this->insert_id = $this->pdo->lastInsertId();
        return $this->result;
    }

    public function insertMany($items)
    {
        if (!count($items)) {
            return;
        }
        $keys     = [];
        $value    = [];
        $countKey = count($items[0]);
        foreach ($items[0] as $k => $v) {
            $keys[] = "`$k`";
        }
        foreach ($items as $item) {
            if (!$countKey) {
                $countKey = count($item);
            }
            if ($countKey != count($item)) {
                continue;
            }
            $data = [];
            foreach ($item as $k => $v) {
                $data[] = $v === null ? 'null' : "'" . $v . "'";
            }
            $value[] = "(" . implode(',', $data) . ")";
        }

        $keys      = "(" . implode(',', $keys) . ")";
        $values    = implode(',', $value);
        $this->sql = "insert into " . $this->refix . $this->table . $keys . " values " . $values;
        $this->query();
    }

    public function insertUpdateMany($items, $keys)
    {
        $queries = [];
        foreach ($items as $item) {
            $queries = array_merge($queries, $this->getSqlInsertUpdate($item, $keys));
        }

        $arr = array_chunk($queries, 1);
        foreach ($arr as $query) {
            $this->reset();
            $this->sql = implode(';', $query);
            $this->query($this->sql, true);
        }
    }

    public function getSqlInsertUpdate($item, $keys)
    {
        $where  = [];
        $data   = [];
        $fields = [];
        $values = [];
        $sql    = [];
        foreach ($item as $key => $value) {
            $value = $value === null ? 'null' : "'$value'";
            if (in_array($key, $keys)) {
                $where[] = "$key=$value";
            }
            $fields[] = "`$key`";
            $values[] = "$value as $key";
            $data[]   = "$key=$value";
        }

        $data   = implode(',', $data);
        $values = implode(',', $values);
        $where  = implode(' AND ', $where);
        $fields = implode(',', $fields);
        $prefix = $this->refix;
        $table  = $this->table;
        $sql[]  = "INSERT INTO $prefix$table($fields) " .
            "SELECT * FROM (SELECT $values) AS tmp " .
            "WHERE NOT EXISTS ( " .
            "    SELECT * FROM $prefix$table WHERE $where " .
            ") LIMIT 1; ";
        $sql[] = "UPDATE $prefix$table SET $data WHERE $where;";

        return $sql;
    }

    public function update($data = array())
    {
        $values = [];
        foreach ($data as $k => $v) {
            $v        = str_replace("'", "\'", $v);
            $values[] = $k . " = '" . $v . "'";
        }
        $values = implode(',', $values);

        $this->sql = "update " . $this->refix . $this->table . " set " . $values;
        $this->sql .= $this->where;
        return $this->query();
    }

    public function delete()
    {
        $this->sql = "delete from " . $this->refix . $this->table . $this->where;
        return $this->query();
    }

    public function select($str = "*", $execute = true)
    {
        $this->sql = "select " . $str;
        $this->sql .= " from " . $this->refix . $this->table;
        $this->sql .= implode(' ', $this->join);
        $this->sql .= $this->where;
        $this->sql .= $this->order;
        $this->sql .= $this->limit;

        return $execute ? $this->query() : $this;
    }

    public function num_rows()
    {
        $sql    = $this->sql;
        $arr    = preg_split('/from|FROM/', $sql);
        $arr[0] = 'SELECT COUNT(*) ';
        $sql    = implode('from', $arr);

        return $this->pdo->query($sql)->fetchColumn();
    }

    public function fetch_array()
    {
        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function result_array()
    {
        return $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setTable($str)
    {
        $this->table = $str;
    }

    public function setWhere($key, $value = "")
    {
        if ($value !== "") {
            if ($this->where == "") {
                $this->where = " where " . $key . " = '" . $value . "'";
            } else {
                $this->where .= " and " . $key . " = '" . $value . "'";
            }

        } else {
            if ($this->where == "") {
                $this->where = " where " . $key;
            } else {
                $this->where .= " and " . $key;
            }

        }
    }

    public function setWhereLike($keys, $value)
    {
        $value = preg_replace("/[^a-zA-Z0-9]+/", "", $value);

        if (is_string($keys)) {
            $keys = [$keys];
        }
        $str = [];
        foreach ($keys as $key) {
            $str[] = "$key like '%$value%'";
        }
        if (empty($str)) {
            return;
        }
        $this->setWhere('(' . implode(' or ', $str) . ')');
    }

    public function setJoin($table, $condition, $type = '')
    {
        if (!in_array(strtolower($type), [
            'left', 'right',
        ])) {
            $type = '';
        }
        $this->join[] = "$type join $this->refix$table on $condition";

        return $this;
    }

    public function setWhereIn($key, $values)
    {
        $values = array_map(function ($a) {
            return "'$a'";
        }, $values);

        if (empty($values)) {
            return;
        }

        if ($this->where == "") {
            $this->where = " where " . $key . " in (" . implode(",", $values) . ")";
        } else {
            $this->where .= " and " . $key . " in (" . implode(",", $values) . ")";
        }
    }

    public function setWhereNotIn($key, $values)
    {
        $values = array_map(function ($a) {
            return "'$a'";
        }, $values);

        if (empty($values)) {
            return;
        }

        if ($this->where == "") {
            $this->where = " where " . $key . " not in (" . implode(",", $values) . ")";
        } else {
            $this->where .= " and " . $key . " not in (" . implode(",", $values) . ")";
        }
    }

    public function setWhereOr($key, $value = "")
    {
        if ($value != "") {
            if ($this->where == "") {
                $this->where = " where " . $key . " = " . $value;
            } else {
                $this->where .= " or " . $key . " = " . $value;
            }

        } else {
            if ($this->where == "") {
                $this->where = " where " . $key;
            } else {
                $this->where .= " or " . $key;
            }

        }
    }

    public function setOrder($str)
    {
        $this->order = " order by " . $str;
    }

    public function setLimit($str)
    {
        $this->limit = " limit " . $str;
    }

    public function setError($msg)
    {
        $this->error[] = $msg;
    }

    public function showError()
    {
        foreach ($this->error as $value) {
            echo '<br>' . $value;
        }

    }

    public function reset()
    {
        $this->sql    = "";
        $this->result = "";
        $this->where  = "";
        $this->order  = "";
        $this->limit  = "";
        $this->table  = "";
        $this->join   = [];
    }

    public function debug()
    {
        echo "<br> servername: " . $this->servername;
        echo "<br> username: " . $this->username;
        echo "<br> password: " . $this->password;
        echo "<br> database: " . $this->database;
        echo "<br> " . $this->sql;
    }

    /**
     * Escape String
     *
     * @access    public
     * @param    string
     * @return    string
     */
    public function escape_str($str)
    {
        if (is_array($str)) {
            foreach ($str as $key => $val) {
                $str[$key] = $this->escape_str($val);
            }

            return $str;
        }

        if (function_exists('mysql_real_escape_string') and is_resource($this->db)) {
            return mysql_real_escape_string($str, $this->db);
        } elseif (function_exists('mysql_escape_string')) {
            return mysql_escape_string($str);
        } else {
            return addslashes($str);
        }
    }

    public function xssClean($str)
    {
        #$str = htmlentities($str, ENT_QUOTES, "UTF-8");
        $str = str_replace("'", '&#039;', $str);
        $str = str_replace('"', '&quot;', $str);
        $str = str_replace('<', '&lt;', $str);
        $str = str_replace('>', '&gt;', $str);
        #$str = addslashes($str);
        return $str;
    }
}

$d = new database($config['database']);
