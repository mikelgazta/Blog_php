<?php
require_once 'Conexion.php';
require_once 'Usuario.php';

class M_user extends Conexion
{
public function getUsers(){
    $query = parent::con()->query('SELECT * FROM usuarios');
    
    $usuario = [];
    
    while($fila = $query->fetch_assoc()){
        //todo
        $usuario[] = new Usuario($fila['id'],$fila['name'],$fila['password']);
    }
    
    return  $usuario;
}

public function insertUsuario(Usuario $usuario){
    $sentencia = parent::con()->prepare("INSERT INTO usuarios(username, password, nombre) VALUES (?,?,?)");
    
    $sentencia->bind_param("sss", $usuario->getUsername(), $usuario->getPassword(), $usuario->getNombre());
    
    $sentencia->execute();
    $sentencia->close();
}

public function deleteUsuario($username) {
    $sentencia = parent::con()->prepare("DELETE FROM alumnos WHERE username=?");
    
    $sentencia->bind_param("s", $username);
    
    $sentencia->execute();
    $sentencia->close();
}
?>