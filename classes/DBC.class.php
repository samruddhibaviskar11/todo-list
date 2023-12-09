<?php 
    class DBC{
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $charset;

        public function ConnectDB()
        {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "todolist_db";
            $this->charset = "utf8mb4";

            try
            {
                $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname .";charset=".$this->charset.";";
                $pdo = new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }
            catch(PDOException $ex)
            {
                echo "Database Connection Failed: ".$ex->getMessage();
            }
        }

        public function getIPAddress() 
        {
            if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
            }
            
            $ip = filter_var($ip, FILTER_VALIDATE_IP);
            $ip = ($ip === false) ? '0.0.0.0' : $ip;
            return $ip;
        }
    }
?>