<?php

class Pedido
{
    private $id_pedido;
    private $id_usuario;
    private $ciudad;
    private $estado_entidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * @param mixed $id_pedido
     */
    public function setIdPedido($id_pedido): void
    {
        $this->id_pedido = $id_pedido;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad): void
    {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    /**
     * @return mixed
     */
    public function getEstadoEntidad()
    {
        return $this->estado_entidad;
    }

    /**
     * @param mixed $estado_entidad
     */
    public function setEstadoEntidad($estado_entidad): void
    {
        $this->estado_entidad = $this->db->real_escape_string($estado_entidad);
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    /**
     * @return mixed
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * @param mixed $coste
     */
    public function setCoste($coste): void
    {
        $this->coste = $coste;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora): void
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedido ORDER BY id_pedido DESC;");
        return $productos;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedido WHERE id_pedido = {$this->getIdPedido()};");
        return $producto->fetch_object();
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.id_pedido, p.coste FROM pedido p "
//            . "INNER JOIN linea_pedido lp ON lp.id_pedido = p.id_pedido "
            . "WHERE p.id_usuario = {$this->getIdUsuario()} ORDER BY id_pedido DESC LIMIT 1;";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedido p "
            . "WHERE p.id_usuario = {$this->getIdUsuario()} ORDER BY id_pedido DESC;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function getProductsByPedido($id_pedido)
    {
//        $sql = "SELECT * FROM producto WHERE id_producto IN (SELECT id_producto FROM linea_pedido WHERE id_pedido = {$id_pedido})";

        $sql = "SELECT pr.*, lp.unidades FROM producto pr "
            . "INNER JOIN linea_pedido lp ON pr.id_producto = lp.id_producto "
            . "WHERE lp.id_pedido = {$id_pedido};";

        $productos = $this->db->query($sql);
        return $productos;
    }

    public function guardar()
    {
        $sql = "INSERT INTO pedido VALUES(NULL, '{$this->getIdUsuario()}', '{$this->getCiudad()}', '{$this->getEstadoEntidad()}', '{$this->getDireccion()}', '{$this->getCoste()}', 'Confirmado', CURDATE(), CURTIME());";
        $registro = $this->db->query($sql);

        $resultado = false;
        if ($registro) {
            $resultado = true;
        }
        return $resultado;
    }

    public function guardar_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $id_pedido = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT into linea_pedido VALUES(NULL, {$id_pedido}, {$producto->id_producto}, {$elemento['unidades']});";
            $guardar = $this->db->query($insert);
        }

        $resultado = false;
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;

    }

    public function actualizarUno()
    {
        $sql = "UPDATE pedido SET estado = '{$this->getEstado()}' WHERE id_pedido = {$this->getIdPedido()};";
        $guardar = $this->db->query($sql);

        $resultado = false;
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
}