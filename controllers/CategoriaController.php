<?php
require_once "models/Categoria.php";

class CategoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function guardar()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $guardar = $categoria->guardar();
        }
        header("Location:" . BASE_URL . "/categoria/index");
    }
}