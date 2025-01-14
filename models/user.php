<?php
    require_once("database.php");
    class User extends Database {
        private $username;
        private $password;

        # Comprueba si el usuario existe
        function searchadmin($username, $password) {
            $conn = $this->connect();
            $sql = "SELECT * FROM administrador WHERE user = :username AND pass = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>