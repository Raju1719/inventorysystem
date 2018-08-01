<?php
    class manufacturer {
        private $conn = NULL;
        public function __construct() {
            $dbhost = "sql301.epizy.com";
            $dbuser = "epiz_22486803";
            $dbpass = "RpRRaScoRWQG";
            $dbname = "epiz_22486803_car_inventory";
            try {
                $this->conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                if(!$this->conn) {
                    die("No Active Database connection object found");
                }
            }catch( Exception $e ) {
                die("Database Error: " . $e->getMessage( ) . " " . $e->getCode( ));
            }
        }


        

        public function saveManufacturer($postData){
            extract($postData);
            $createddate = date('Y-m-d H:i:s');
            $flag = 1;
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "INSERT INTO manufacturer (name, createddate, ip, flag) VALUES (:name, :createddate, :ip, :flag)";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':name', $manufacturer_name);
                $stmt->bindParam(':createddate', $createddate);
                $stmt->bindParam(':ip', $ip);
                $stmt->bindParam(':flag', $flag);
                if ($stmt->execute()) {
                   echo 1;
                }
                
            }
            catch( Exception $e ) {
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        }


       
    }
?>