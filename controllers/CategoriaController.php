<?php
require_once "models/Categoria.php";
require_once "models/Producto.php";

class CategoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function ver()
    {
        if (isset($_GET['id_categoria'])) {
            $id = $_GET['id_categoria'];

            $categoria = new Categoria();
            $categoria->setIdCategoria($id);
            $categoria = $categoria->getOne();

            $producto = new Producto();
            $producto->setIdCategoria($id);
            $productos = $producto->getAllCategory();
        }
        require_once './views/categoria/ver.php';
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