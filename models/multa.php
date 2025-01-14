<?php
    require_once("database.php");
    class Multa extends Database {
        # Lista todas las multas para el admiin
        function list() {
            $conn = $this->connect();
            $sql = "SELECT * FROM multa INNER JOIN coche ON multa.matricula = coche.matricula ORDER BY multa.fecha ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        # Lista todas las multas de un coche
        function show($matricula) {
            $conn = $this->connect();
            $sql = "SELECT * FROM multa WHERE matricula = :matricula";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        # Paga una multa
        function pay($id) {
            $conn = $this->connect();
            $sql = "UPDATE multa SET pagada = 1 WHERE id_multa = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }
?>