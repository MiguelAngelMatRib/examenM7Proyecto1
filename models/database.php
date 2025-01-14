<?php
    class Database {
        public function connect() {
            $servername = "localhost";
            $dbname= "multas";
            $username = "root";
            $password = "";

            $this->db = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        }
    }
?>