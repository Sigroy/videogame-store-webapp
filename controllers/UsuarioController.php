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
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $guardar = $usuario->guardar();
            if ($guardar) {
                $_SESSION['registro'] = "exitoso";
            } else {
                $_SESSION['registro'] = "fallido";
            }
        } else {
            $_SESSION['registro'] = "fallido";
        }
        header("Location:" . BASE_URL . 'usuario/registro');
    }
}