<?php
    require_once("database.php");
    class Coche extends Database {

        # Comprueba si el coche existe
        function login($matricula, $password) {
            $conn = $this->connect();
            $sql = "SELECT * FROM coche WHERE matricula = :matricula AND pass = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        # Registre
        function registre($matricula, $password, $propietario) {
            $coche = new Coche();
            $data = $coche->login($matricula, $password);
            if (!$data) {
                $conn = $this->connect();
                $sql = "INSERT INTO coche (matricula, pass, propietario) VALUES (:matricula, :password, :propietario)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':matricula', $matricula);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':propietario', $propietario);
                if ($stmt->execute()) {
                    $return = "registrat";
                }
                else {
                    $return = "no";
                }
            }
            else {
                $return = "usuario existente";
            }
            return $return;
        }
    }
?>