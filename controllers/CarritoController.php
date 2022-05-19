<?php
require_once "models/Producto.php";

class CarritoController
{
    public function index()
    {
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once "./views/carrito/index.php";
    }

    public function agregar()
    {
        if (isset($_GET['id_producto'])) {
            $id_producto = $_GET['id_producto'];
        } else {
            header("Location:" . BASE_URL);
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $id_producto) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $contador++;
                }
            }

        }

        if (!isset($contador) || $contador == 0) {
            $producto = new Producto();
            $producto->setIdProducto($id_producto);
            $producto = $producto->getOne();

            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id_producto,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }


        header("Location:" . BASE_URL . "/carrito/index");
    }

    public function aumentar()
    {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']++;
        }
        header("Location:" . BASE_URL . "/carrito/index");
    }

    public function disminuir()
    {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']--;
            if ($_SESSION['carrito'][$indice]['unidades'] == 0) {
                unset($_SESSION['carrito'][$indice]);
            }
        }
        header("Location:" . BASE_URL . "/carrito/index");
    }

    public function limpiar()
    {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            unset($_SESSION['carrito'][$indice]);
        }
        header("Location:" . BASE_URL . "/carrito/index");
    }

    public function eliminarTodo()
    {
        unset($_SESSION['carrito']);
        header("Location:" . BASE_URL . "/carrito/index");
    }
}