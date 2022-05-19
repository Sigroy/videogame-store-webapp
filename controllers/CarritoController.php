<?php

class CarritoController
{
    public function index()
    {
        echo "Controlador Usuario, acción index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
}