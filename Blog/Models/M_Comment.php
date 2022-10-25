<?php
namespace Models;

require_once 'Conexion.php';
require_once 'Comment.php';

class M_Comment extends Conexion
{
    public function getComment()
    {
        $query = parent::con()->query('SELECT * FROM comment');
        
        $comment = [];
        
        while ($fila = $query->fetch_assoc()) {
            // todo
            $comment[] = new Comment($fila['id'], $fila['name'], $fila['email'], $fila['post_id'], $fila['created_at'], $fila['status']);
        }
        
        return $comment;
    }
    
    public function insertComment(Comment $comment)
    {
        $sentencia = parent::con()->prepare("INSERT INTO comment(id, name, email, post_id, created_at, status) VALUES (?,?,?,?,?,?)");
        
        $sentencia->bind_param("isssisi", $comment->getId(), $comment->getName(), $comment->getEmail(), $comment->getPost_id(), $comment->getCreated_at(), $comment->getStatus());
        
        $sentencia->execute();
        $sentencia->close();
    }
}