<?php
namespace Models;

require_once 'Conexion.php';
require_once 'Comment.php';

class M_Comment extends Conexion
{
    public function getComment()
    {
        $query = parent::con()->query('SELECT * FROM comment');
        
        $comentario = [];
        
        while ($fila = $query->fetch_assoc()) {
            // todo
            $comentario[] = new Comment($fila['id'], $fila['name'], $fila['comment'], $fila['email'], $fila['post_id'], $fila['created_at'], $fila['status']);
        }
        
        return $comentario;
    }
    
    public function insertComment(Comment $comentario)
    {
        $sentencia = parent::con()->prepare("INSERT INTO comment(name, comment, email, post_id, status) VALUES (?,?,?,?,?)");
        
        $sentencia->bind_param("sssii", $comentario->getName(), $comentario->getComment(), $comentario->getEmail(), $comentario->getPost_id(), $comentario->getStatus());
        
        $sentencia->execute();
        $sentencia->close();
    }
}