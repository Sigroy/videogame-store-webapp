<?php

class Database
{
    public static function connect()
    {


        /*//Get Heroku ClearDB connection information
                $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                $cleardb_server = $cleardb_url["host"];
                $cleardb_username = $cleardb_url["user"];
                $cleardb_password = $cleardb_url["pass"];
                $cleardb_db = substr($cleardb_url["path"], 1);
                $active_group = 'default';
                $query_builder = TRUE;
        // Connect to DB*/
        $user = getenv('CLOUDSQL_USER');
        $pass = getenv('CLOUDSQL_PASSWORD');
        $inst = getenv('CLOUDSQL_DSN');
        $db = getenv('CLOUDSQL_DB');
//        $db = new mysqli(null, $user, $pass, $db, null, $inst);
        $db = new mysqli('localhost', 'sig', '1234', 'tienda_videojuegos');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}