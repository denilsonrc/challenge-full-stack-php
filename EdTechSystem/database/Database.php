<?php
    class Database
    {
        private $servername;
        private $database;
        private $username;
        private $password;
        private $conn;
        
        public function __construct(){
            $this->servername = "localhost";
            $this->database   = "EdTech";
            $this->username   = "AdmTech";
            $this->password   = "12345";
        }

        public function connect() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if ($this->conn->connect_errno) {
                die("Connection failed: ". $this->conn->connect_error."<br>");
            }
        }

        public function query($string){
            $result = $this->conn->query($string);
            return $result;
        }

        public function disconnect(){
            $this->conn->close();
        }

    }
?>