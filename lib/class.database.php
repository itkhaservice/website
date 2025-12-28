<?php if(!defined('_lib')) die("Error");
	
class database{
	
	var $db;
	var $result;
	var $insert_id;
	var $sql = "";
	var $refix = "";
	var $servername;
	var $username;
	var $password;
	var $database;
	
	var $table = "";
	var $where = "";
	var $order = "";
	var $limit = "";
	
	var $error = array();
	
	function __construct($config = array()){
		if(!empty($config)){
			$this->init($config);
			$this->connect();
		}
	}
	
	function init($config = array()){
		foreach($config as $k=>$v)
			$this->$k = $v;
	}
	
	function connect(){
		$this->db = new mysqli($this->servername, $this->username, $this->password, $this->database);
		
		if ($this->db->connect_error) {
			die('Could not connect: ' . $this->db->connect_error);
		}
		
		$this->db->set_charset("utf8");
	}
	
	function query($sql=""){
		if($sql)
			$this->sql = str_replace('#_', $this->refix, $sql);
		
		$this->result = $this->db->query($this->sql);
		
		if(!$this->result){
			die("Query error: " . $this->db->error . " <br> SQL: " . $this->sql);
		}
		return $this->result;		
	}
	
	function insert($data = array()){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
            $v = $this->escape_str($v);
			$key .= "," . $k;
			$value .= ",'" . $v  ."'";
		}
		if($key[0] == ",") $key[0] = "(";
		$key .= ")";
		if($value[0] == ",") $value[0] = "(";
		$value .= ")";
		$this->sql = "insert into ".$this->refix.$this->table.$key." values ".$value;
		$this->query();
		$this->insert_id = $this->db->insert_id;
		return $this->result;
	}
	
	function update($data = array()){
		$values = "";
		foreach($data as $k => $v){
			$v = $this->escape_str($v);
			$values .= ", " . $k . " = '" . $v  ."' ";
		}
		if($values[0] == ",") $values[0] = " ";
		$this->sql = "update " . $this->refix . $this->table . " set " . $values;
		$this->sql .= $this->where;
		return $this->query();
	}
	
	function delete(){
		$this->sql = "delete from " . $this->refix . $this->table . $this->where;
		return $this->query();
	}
	
	function select($str = "*"){
		$this->sql = "select " . $str;
		$this->sql .= " from " . $this->refix .$this->table;
		$this->sql .=  $this->where;
		$this->sql .=  $this->order;
		$this->sql .=  $this->limit;
		return $this->query();
	}
	
	function num_rows(){
        if($this->result)
		    return $this->result->num_rows;
        return 0;
	}
	
	function fetch_array(){
        if($this->result)
		    return $this->result->fetch_assoc();
        return null;
	}
	
	function result_array(){
		$arr = array();
        if($this->result){
            while ($row = $this->result->fetch_assoc()) 
                $arr[] = $row;
        }
		return $arr;
	}
	
	function setTable($str){
		$this->table = $str;
	}
	
	function setWhere($key, $value=""){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value . "'";
			else
				$this->where .= " and " . $key . " = '" . $value ."'";
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " and " . $key ;
		}
	}
	
	function setWhereOr($key, $value=""){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value . "'";
			else
				$this->where .= " or " . $key . " = '" . $value ."'";
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " or " . $key ;
		}
	}
	
	function setOrder($str){
		$this->order = " order by " . $str;
	}
	
	function setLimit($str){
		$this->limit = " limit " . $str;
	}
	
	function setError($msg){
		$this->error[] = $msg;
	}
	
	function showError(){
		foreach($this->error as $value)
			echo '<br>'.$value;
	}
	
	function reset(){
		$this->sql = "";
		$this->result = "";
		$this->where = "";
		$this->order = "";
		$this->limit = "";
		$this->table = "";
	}
	
	function debug(){
		echo "<br> servername: ".$this->servername;
		echo "<br> username: ".$this->username;
		echo "<br> password: ".$this->password;
		echo "<br> database: ".$this->database;
		echo "<br> ".$this->sql;
	}
	
	function escape_str($str)	
	{	
		if (is_array($str))
    	{
    		foreach($str as $key => $val)
    		{
    			$str[$key] = $this->escape_str($val);
    		}
    		return $str;
    	}
        
        if($this->db) {
            return $this->db->real_escape_string($str);
        }
        return addslashes($str);
	}
	
	function xssClean($str){
		$str = str_replace("'", '&#039;', $str);
		$str = str_replace('"', '&quot;', $str);
		$str = str_replace('<', '&lt;', $str);
		$str = str_replace('>', '&gt;', $str);
		return $str;
	}
}