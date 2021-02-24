<?php
    include_once('../database/Database.php');
    class StudentsModel{
        private $RA;
        private $name;
        private $cpf;
        private $email;
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        
        public function insert($name, $cpf, $email){
            $this->db->connect();
            $result = $this->db->query("INSERT INTO Students (name, cpf, email) VALUES ('".$name."','".$cpf."','".$email."');");
            $this->db->disconnect();
            if($result == 1){
                return true;
            }else{
                return false;
            }
        }

        public function update($RA, $name, $email){
            $this->db->connect();
            $result = $this->db->query("UPDATE Students SET name = '".$name."', email = '".$email."' WHERE RA = '".$RA."';");
            $this->db->disconnect();
            if($result==1){
                return true;
            }else{
                return false;
            }
        }

        public function delete($RA){
            $this->db->connect();
            $result = $this->db->query("DELETE FROM Students WHERE RA = ".$RA.";");
            $this->db->disconnect();
            if($result == 1){
                return true;
            }else{
                return false;
            }
        }

        public function list(){
            $this->db->connect();
            $result = $this->db->query("SELECT * FROM Students");
            $this->db->disconnect();
            $display = [];
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($display, $row);
                }
            }            
            return $display;
        }
        
        public function getStudent($RA){
            $this->db->connect();
            $result = $this->db->query("SELECT * FROM Students WHERE Students.RA = '".$RA."'");
            $this->db->disconnect();
            
            return $result->fetch_assoc();
        }
    }

?>
