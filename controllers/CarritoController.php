<?php
require_once "models/Producto.php";

class CarritoController
{
    public function index()
    {
        $carrito = $_SESSION['carrito'];
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

    public function limpiar()
    {

    }

    public function eliminarTodo()
    {
        unset($_SESSION['carrito']);
        header("Location:" . BASE_URL . "/carrito/index");
    }
}