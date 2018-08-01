<?php
    class model {
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


         public function deleteModel($id){
            
            $sql = "UPDATE `models` SET flag=0 where id=:id";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                echo 1;
            }
            catch( Exception $e ) {
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        }

        public function saveModel($postData,$filename1,$filename2){
            extract($postData);
            $createddate = date('Y-m-d H:i:s');
            $flag = 1;
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "INSERT INTO models (name, manufacturer_id, model_color,model_year,reg_num,note,image_upload1,image_upload2, createddate, ip, flag) VALUES (:name,:manufacturer_id,:model_color,:model_year,:reg_num,:note,:image_upload1,:image_upload2, :createddate, :ip, :flag)";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':name', $model_name);
                $stmt->bindParam(':manufacturer_id', $manufacturer_id);
                $stmt->bindParam(':model_color', $model_color);
                $stmt->bindParam(':model_year', $model_year);
                $stmt->bindParam(':reg_num', $reg_num);
                $stmt->bindParam(':note', $note);
                $stmt->bindParam(':image_upload1', $filename1);
                $stmt->bindParam(':image_upload2', $filename2);
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
        



        public function getData($id){
            $stmt = $this->conn->prepare("SELECT model_color, model_year, reg_num, note FROM models WHERE id= $id");
            $stmt->execute();
            $count = $stmt->rowCount();
            $str = '';
            if($count){
                
                $data = array();
                while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $model_color = $row['model_color'];
                    $model_year = $row['model_year'];
                    $reg_num = $row['reg_num'];
                    $note = $row['note'];
                    

                     $return_arr[] = array("model_color" => $model_color,
                    "model_year" => $model_year,
                    "reg_num" => $reg_num,
                    "note" => $note);
                }
                echo json_encode($return_arr);
            }else{
                echo $count;
            }
            
        }
    }
?>