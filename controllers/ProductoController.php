<?php
require_once 'models/producto.php';

class ProductoController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(8);
        require_once './views/producto/destacados.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once './views/producto/gestion.php';
    }

    public function ver()
    {
        if (isset($_GET['id_producto'])) {
            $id = $_GET['id_producto'];

            $producto = new Producto();

            $producto->setIdProducto($id);
            $pro = $producto->getOne();

        }

        require_once 'views/producto/ver.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once './views/producto/crear.php';
    }

    public function guardar()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = $_POST['nombre'] ?? false;
            $descripcion = $_POST['descripcion'] ?? false;
            $precio = $_POST['precio'] ?? false;
            $stock = $_POST['stock'] ?? false;
            $categoria = $_POST['categoria'] ?? false;
//            $imagen = $_POST['descripcion'] ?? false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setIdCategoria($categoria);
                $producto->setStock($stock);

                if (isset($_FILES['imagen'])) {
                    $archivo = $_FILES['imagen'];
                    $nombrearchivo = $_FILES['imagen']['name'];
                    $tipoarchivo = $_FILES['imagen']['type'];

                    if ($tipoarchivo == 'image/jpg' || $tipoarchivo == 'image/jpeg' || $tipoarchivo == 'image/png' || $tipoarchivo == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/' . $nombrearchivo);
                        $producto->setImagen($nombrearchivo);
                    }
                }

                if (isset($_GET['id_producto'])) {
                    $id = $_GET['id_producto'];
                    $producto->setIdProducto($id);
                    $guardar = $producto->editar();
                } else {
                    $guardar = $producto->guardar();
                }
                if ($guardar) {
                    $_SESSION['producto'] = 'exitoso';
                } else {
                    $_SESSION['producto'] = 'fallido';
                }
            } else {
                $_SESSION['producto'] = 'fallido';
            }
        } else {
            $_SESSION['producto'] = 'fallido';
        }

        header("Location:" . BASE_URL . '/producto/gestion');
    }

    public
    function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id_producto'])) {
            $id = $_GET['id_producto'];
            $editar = true;

            $producto = new Producto();

            $producto->setIdProducto($id);
            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        } else {
            header("Location:" . BASE_URL . '/producto/gestion');
        }
    }

    public
    function eliminar()
    {
        Utils::isAdmin();

        if (isset($_GET['id_producto'])) {
            $id = $_GET['id_producto'];
            $producto = new Producto();
            $producto->setIdProducto($id);
            $eliminar = $producto->eliminar();
            if ($eliminar) {
                $_SESSION['eliminar'] = 'exitoso';
            } else {
                $_SESSION['eliminar'] = 'fallido';

            }
        } else {
            $_SESSION['eliminar'] = 'fallido';

        }

        header("Location:" . BASE_URL . '/producto/gestion');
    }
}