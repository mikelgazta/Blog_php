<?php

namespace Models;

require_once 'Conexion.php';
require_once 'User.php';

class M_User extends Conexion
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

    public function insertUser(User $usuario)
    {
        $sentencia = parent::con()->prepare("INSERT INTO user(name, lastname, username, email, password, image, status, kind) VALUES (?,?,?,?,?,?,?,?)");

        $sentencia->bind_param("ssssssii",  $usuario->getName(), $usuario->getLastname(), $usuario->getUsername(), $usuario->getEmail(), $usuario->getPassword(), $usuario->getImage(), $usuario->getStatus(), $usuario->getKind());

        $sentencia->execute();
        $sentencia->close();
    }
    public function updateUser(User $usuario)
    {
        $sentencia = parent::con()->prepare("UPDATE user SET name=?, lastname=?, username=?, email=?, password=?, image=?, status=?, kind=? WHERE id=?");
        
        $sentencia->bind_param("ssssssiii",  $usuario->getName(), $usuario->getLastname(), $usuario->getUsername(), $usuario->getEmail(), $usuario->getPassword(), $usuario->getImage(), $usuario->getStatus(), $usuario->getKind());
        
        $sentencia->execute();
        $sentencia->close();
    }

    public function deleteUser($id)
    {
        $sentencia = parent::con()->prepare("DELETE FROM user WHERE id=?");

        $sentencia->bind_param("i", $id);

        $sentencia->execute();
        $sentencia->close();
    }
}
?>