<?php
namespace Models;

require_once 'Conexion.php';
require_once 'Post.php';

class M_Post extends Conexion
{
    public function getPosts(){
        $query = parent::con()->query('SELECT * FROM post');
        
        $post = [];
        
        while($fila = $query->fetch_assoc()){
            $post[] = new Post($fila['id'], $fila['title'], $fila['brief'], $fila['content'], $fila['image'], $fila['created_at'], $fila['status'], $fila['user_id']);
        }
        
        return  $post;
    }
    
    public function deletePost($id){
        $sentencia = parent::con()->prepare("DELETE FROM post WHERE id=?");
        $sentencia->bind_param("i", $id->getId());
        
        $sentencia->execute();
        $sentencia->close();
    }
    
    public function insertPost(Post $post){
        $sentencia = parent::con()->prepare("INSERT INTO post(id, title, brief, content, image, created_at, status, user_id) VALUES (?,?,?,?,?,?,?,?)");
        
        $sentencia->bind_param("isssssii", $post->getId(), $post->getTitle(), $post->getBrief(), $post->getContent(), $post->getImage(), $post->getCreated_at(), $post->getStatus(), $post->getUser_id());
        
        $sentencia->execute();
        $sentencia->close();
    }
}
