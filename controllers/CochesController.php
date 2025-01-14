<?php
    class CochesController {
        # Comprueba si hace falta hacer el login y realiza redirecciones
        public function login() {
            if (isset($_SESSION['username'])) {
                require_once "views/general/redirect.php";
            }
            else {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once "models/coche.php";
                    $coche = new Coche();
                    $matricula = $_POST['username'];
                    $password = $_POST['password'];
                    $userdata = $coche->login($matricula, $password);
                    if ($userdata) {
                        $_SESSION['username'] = $userdata['matricula'];
                        $_SESSION['role'] = "user";
                        require_once "views/general/redirect.php";
                    }
                    else {
                        $text = "Aquest vehicle no es troba al nostre sistema";
                        require_once "views/coches/login.php";
                    }
                }
                else {
                    require_once "views/coches/login.php";
                }
            }
        }

        # Registre
        public function registre() {
            if (isset($_SESSION['username'])) {
                require_once "views/general/redirect.php";
            }
            else {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once "models/coche.php";
                    $coche = new Coche();
                    $matricula = $_POST['username'];
                    $password = $_POST['password'];
                    $propietario = $_POST['propietario'];
                    $userdata = $coche->registre($matricula, $password, $propietario);
                    if ($userdata == "usuario existente") {
                        $flag = true;
                        require_once "views/coches/registre.php";
                    }
                    elseif ($userdata == "registrat") {
                        $_SESSION['username'] = $matricula;
                        $_SESSION['role'] = "user";
                        require_once "views/general/redirect.php";
                    }
                    else {
                        require_once "views/coches/registre.php";
                    }
                }
                else {
                    require_once "views/coches/registre.php";
                }
            }
        }
    }
?>