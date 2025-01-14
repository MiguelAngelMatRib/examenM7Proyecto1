<?php
    class UsersController {
        # Comprueba si hace falta hacer el login y realiza redirecciones a las vistas pertinentes
        public function loginadmin() {
            if (isset($_SESSION['username'])) {
                require_once "views/general/redirect.php";
            }
            else {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once "models/user.php";
                    $user = new User();
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $userdata = $user->searchadmin($username, $password);
                    if ($userdata) {
                        $_SESSION['username'] = $userdata['user'];
                        $_SESSION['role'] = "admin";
                        require_once "views/general/redirect.php";
                    }
                    else {
                        require_once "views/users/login.php";
                    }
                }
                else {
                    require_once "views/users/login.php";
                }
            }
        }

        public function logout() {
            session_unset();
            require_once "views/general/redirect.php";
        }
    }
?>