<?php
class SimpleSMTP {
    private $host;
    private $port;
    private $username;
    private $password;
    private $timeout = 30;
    private $debug = false;

    public function __construct($host, $port, $username, $password) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function send($to, $subject, $body, $from_email, $from_name) {
        $socket = fsockopen($this->host, $this->port, $errno, $errstr, $this->timeout);
        if (!$socket) {
            return false;
        }

        $this->read_server($socket);
        $this->send_command($socket, "EHLO " . $_SERVER['SERVER_NAME']);
        $this->send_command($socket, "AUTH LOGIN");
        $this->send_command($socket, base64_encode($this->username));
        $this->send_command($socket, base64_encode($this->password));
        $this->send_command($socket, "MAIL FROM: <$from_email>");
        $this->send_command($socket, "RCPT TO: <$to>");
        $this->send_command($socket, "DATA");

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $from_name <$from_email>\r\n";
        $headers .= "To: $to\r\n";
        $headers .= "Subject: $subject\r\n";

        $this->send_command($socket, $headers . "\r\n" . $body . "\r\n.");
        $this->send_command($socket, "QUIT");
        fclose($socket);

        return true;
    }

    private function send_command($socket, $cmd) {
        fputs($socket, $cmd . "\r\n");
        return $this->read_server($socket);
    }

    private function read_server($socket) {
        $response = "";
        while ($str = fgets($socket, 515)) {
            $response .= $str;
            if (substr($str, 3, 1) == " ") {
                break;
            }
        }
        return $response;
    }
}
?>
