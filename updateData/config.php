<?php
    class Database {
        private $host = "sql301.epizy.com";
        private $db_name = "epiz_22486803_car_inventory";
        private $username = "epiz_22486803";
        private $password = "RpRRaScoRWQG";
        public  $conn;

        public function dbConnection() {
            $this->conn = null;    
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                //$this->conn = new PDO("mysql:host=localhost;dbname=database", "root", "");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            catch(PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
            
            return $this->conn;
        }
    }
?>