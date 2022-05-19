<?php

class Utils
{
    public static function eliminarSesion($nombre)
    {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }

        return $nombre;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . BASE_URL);
        } else {
            return true;
        }
    }

    public static function mostrarCategorias()
    {
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function estadisticasCarrito()
    {
        $estadisticas = array(
            'contador' => 0,
            'total' => 0
        );
        if (isset($_SESSION['carrito'])) {
            $estadisticas['contador'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $estadisticas['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $estadisticas;
    }
}