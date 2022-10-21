<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', "natalia");
define('DB_CHARSET', 'utf-8');
define('DB_PORT', 3306);

class Conexion {

    protected $_db;
    public $host = DB_HOST;
    public $port = DB_PORT;
    public $database = DB_NAME;
    public $username = DB_USER;
    public $password = DB_PASSWORD;
    public $conn;

    public function __construct() {
        try {
            $dns = "mysql:host=$this->host;port=$this->port;
            dbname=$this->database";
            $this->_db = new PDO($dns, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (Exception $ex) {
            print "Hubo un error: " . $ex->getMessage();
            die();
        }
    }


}