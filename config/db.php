<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'sig', '1234', 'tienda_videojuegos');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}