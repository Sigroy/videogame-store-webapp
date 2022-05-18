<?php

class Categoria
{
    private $id_categoria;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
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
        $this->id_categoria = $id_categoria;
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

    public function getAll()
    {
        $categorias = $this->db->query('SELECT * FROM categoria ORDER BY id_categoria DESC;');
        return $categorias;
    }

    public function guardar()
    {
        $sql = "INSERT INTO categoria VALUES(NULL, '{$this->getNombre()}')";
        $registro = $this->db->query($sql);

        $resultado = false;
        if ($registro) {
            $resultado = true;
        }
        return $resultado;
    }
}