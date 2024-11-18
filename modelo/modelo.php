<?php
class modelo {

    private $db;

    //construye la conexion
    function __construct()
    {
        $this->db = $this->create_connection();
    }
    //crea la conexion con la BD
    public function create_connection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'restaurante';

        try {
            $db = new PDO("mysql:host=$host; dbname=$database; charset=utf8", $userName, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }

        return $db;
    }
    //crea una nueva instancia de la base de datos
    public function getDb() {
        return $this->db;
    }
}

?>