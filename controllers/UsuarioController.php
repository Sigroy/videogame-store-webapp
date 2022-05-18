<?php
require_once 'models/Usuario.php';

class UsuarioController
{
    public function index()
    {
        echo "Controlador Usuario, acción index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function guardar()
    {
        if (isset($_POST)) {
            $nombre = $_POST['nombre'] ?? false;
            $apellidos = $_POST['apellidos'] ?? false;
            $email = $_POST['email'] ?? false;
            $password = $_POST['password'] ?? false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $guardar = $usuario->guardar();
                if ($guardar) {
                    $_SESSION['registro'] = "exitoso";
                } else {
                    $_SESSION['registro'] = "fallido";
                }
            } else {
                $_SESSION['registro'] = "fallido";
            }
        } else {
            $_SESSION['registro'] = "fallido";
        }
        header("Location:" . BASE_URL . '/usuario/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identidad = $usuario->login();

            if ($identidad && is_object($identidad)) {
                $_SESSION['identidad'] = $identidad;

                if ($identidad->rol === 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = "Identificación fallida.";
            }
        }

        header("Location:".BASE_URL);
    }

    public function logout() {
        if (isset($_SESSION['identidad'])) {
            unset($_SESSION['identidad']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location:". BASE_URL);
    }
}