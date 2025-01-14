<?php
    class MultasController {
        # Lista todas las multas para el admiin
        public function list() {
            if (isset ($_SESSION['role']) && $_SESSION['role'] == "admin") {
                require_once "models/multa.php";
                $multa = new Multa();
                $multas = $multa->list();
                require_once "views/multas/list.php";
            }
            else {
                require_once "views/general/redirect.php";
            }
        }

        # Mostrar multas de un solo usuario
        public function show() {
            if (isset ($_SESSION['role']) && $_SESSION['role'] == "user") {
                require_once "models/multa.php";
                $multa = new Multa();
                $multas = $multa->show($_SESSION['username']);
                require_once "views/multas/show.php";
            }
            else {
                require_once "views/general/redirect.php";
            }
        }

        # Pagar Multa
        public function pay() {
            if (isset ($_SESSION['role']) && $_SESSION['role'] == "user") {
                require_once "models/multa.php";
                $multa = new Multa();
                $multa->pay((int)$_GET['id']);
                $multas = $multa->show($_SESSION['username']);
                require_once "views/multas/show.php";
            }
            else {
                require_once "views/general/redirect.php";
            }
        }
    }
?>