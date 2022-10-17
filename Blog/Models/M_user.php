<?php

namespace Models;

require_once 'Conexion.php';
require_once 'Usuario.php';

class M_user extends Conexion
{

    public function getUsers()
    {
        $query = parent::con()->query('SELECT * FROM user');

        $usuario = [];

        while ($fila = $query->fetch_assoc()) {
            // todo
            $usuario[] = new User($fila['id'], $fila['name'], $fila['lastname'], $fila['username'], $fila['email'], $fila['password'], $fila['image'], $fila['status'], $fila['kind'], $fila['created_at']);
        }

        return $usuario;
    }

    public function insertUsuario(User $usuario)
    {
        $sentencia = parent::con()->prepare("INSERT INTO usuarios(id, name, lastname, username, email, password, image, status, kind, created_at) VALUES (?,?,?,?,?,?,?,?,?,?)");

        $sentencia->bind_param("issssssiis", $usuario->getUsername(), $usuario->getPassword(), $usuario->getNombre());

        $sentencia->execute();
        $sentencia->close();
    }

    public function deleteUsuario($username)
    {
        $sentencia = parent::con()->prepare("DELETE FROM alumnos WHERE username=?");

        $sentencia->bind_param("s", $username);

        $sentencia->execute();
        $sentencia->close();
    }
}
?>