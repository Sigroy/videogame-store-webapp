<?php
require_once "./models/Pedido.php";

class PedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function agregar()
    {
        if (isset($_SESSION['identidad'])) {
            $id_usuario = $_SESSION['identidad']->id_usuario;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $estado_entidad = isset($_POST['estado_entidad']) ? $_POST['estado_entidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $estadisticas = Utils::estadisticasCarrito();
            $coste = $estadisticas['total'];
            if ($ciudad && $estado_entidad && $direccion) {
                $pedido = new Pedido();
                $pedido->setIdUsuario($id_usuario);
                $pedido->setCiudad($ciudad);
                $pedido->setEstadoEntidad($estado_entidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                $guardar = $pedido->guardar();

                $guardar_linea = $pedido->guardar_linea();

                if ($guardar && $guardar_linea) {
                    $_SESSION['pedido'] = 'exitoso';
                } else {
                    $_SESSION['pedido'] = 'fallido';
                }

            } else {
                $_SESSION['pedido'] = 'fallido';
            }
            header("Location:" . BASE_URL . "/pedido/confirmado");
        } else {
            header("Location:" . BASE_URL);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identidad'])) {
            $identidad = $_SESSION['identidad'];
            $pedido = new Pedido();
            $pedido->setIdUsuario($identidad->id_usuario);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductsByPedido($pedido->id_pedido);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $pedido = new Pedido();
        $id_usuario = $_SESSION['identidad']->id_usuario;
        $pedido->setIdUsuario($id_usuario);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id_pedido'])) {
            $id_pedido = $_GET['id_pedido'];

            $pedido = new Pedido();
            $pedido->setIdPedido($id_pedido);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductsByPedido($id_pedido);

            require_once 'views/pedido/detalle.php';
        } else {
            header("Location:" . BASE_URL . "/pedido/mis_pedidos");
        }

    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();

        if (isset($_POST['id_pedido']) && isset($_POST['estado'])) {
            $id_pedido = $_POST['id_pedido'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            $pedido->setIdPedido($id_pedido);
            $pedido->setEstado($estado);
            $pedido->actualizarUno();
            header("Location:" . BASE_URL . '/pedido/detalle&id_pedido=' . $id_pedido);
        } else {
            header("Location:" . BASE_URL);
        }
    }
}