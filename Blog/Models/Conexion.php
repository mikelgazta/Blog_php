<?php
namespace Models;
require_once 'User.php';

class Conexion
{
    private $con;
    
    public function __construct(){
        $this->con = new \mysqli('localhost', 'root', '', 'proyecto_blog');
    }
    
    public function close() {
        $this->con->close();
    }
    
    public function con(){
        return $this->con;
    }
}

