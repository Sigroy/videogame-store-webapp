<?php

class Producto
{
    private $id_producto;
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto): void
    {
        $this->id_producto = $this->db->real_escape_string($id_producto);
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta): void
    {
        $this->oferta = $this->db->real_escape_string($oferta);
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
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen): void
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM producto ORDER BY id_producto DESC;");
        return $productos;
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM producto p "
            . "INNER JOIN categoria c ON c.id_categoria = p.id_categoria "
            . "WHERE p.id_categoria = {$this->getIdCategoria()} "
            . "ORDER BY id_categoria DESC";

        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM producto WHERE id_producto = {$this->getIdProducto()};");
        return $producto->fetch_object();
    }

    public function getRandom($limite)
    {
        $productos = $this->db->query("SELECT * FROM producto ORDER BY RAND() LIMIT $limite;");
        return $productos;
    }

    public function guardar()
    {
        $sql = "INSERT INTO producto VALUES(NULL, '{$this->getIdCategoria()}', '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}')";
        $registro = $this->db->query($sql);

        $resultado = false;
        if ($registro) {
            $resultado = true;
        }
        return $resultado;
    }

    public function editar()
    {
        $sql = "UPDATE producto SET id_categoria = '{$this->getIdCategoria()}', nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}";

        if ($this->getImagen() != null) {
            $sql .= ", imagen = '{$this->getImagen()}'";
        }
        $sql .= " WHERE id_producto = {$this->getIdProducto()};";
        $registro = $this->db->query($sql);

        $resultado = false;
        if ($registro) {
            $resultado = true;
        }
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "DELETE FROM producto WHERE id_producto = {$this->id_producto};";
        $eliminar = $this->db->query($sql);

        $resultado = false;
        if ($eliminar) {
            $resultado = true;
        }
        return $resultado;
    }

}