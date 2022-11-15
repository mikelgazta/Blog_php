<?php

namespace Models;

require_once 'Conexion.php';
require_once 'Post.php';

class M_Post extends Conexion{
    
    public function myPosts($username)
    {
        $query = parent::con()->query('SELECT * FROM post, user WHERE post.user_id=user.id and username = username');
        
        $entrada = [];
        
        while ($row = $query->fetch_assoc()) {
            // todo
            $entrada[] = new Post($row['id'], $row['title'], $row['brief'], $row['content'], $row['image'], $row['created_at'], $row['status'], $row['user_id']);
        }
        
        return $entrada;
    }
    
    public function getPosts()
    {
        $query = parent::con()->query('SELECT * FROM post');
        
        $entrada = [];
        
        while ($row = $query->fetch_assoc()) {
            // todo
            $entrada[] = new Post($row['id'], $row['title'], $row['brief'], $row['content'], $row['image'], $row['created_at'], $row['status'], $row['user_id']);
        }
        
        return $entrada;
    }
    
    public function insertPost(Post $entrada)
    {
        $sentencia = parent::con()->prepare("INSERT INTO post(title, brief, content, image, status, user_id) VALUES (?,?,?,?,?,?)");
        
        $sentencia->bind_param("ssssii",  $entrada->getTitle(), $entrada->getBrief(), $entrada->getContent(), $entrada->getImage(), $entrada->getStatus(), $entrada->getUser_id());
        
        $sentencia->execute();
        $sentencia->close();
    }
    
    public function updatePost(Post $entrada)
    {
        $sentencia = parent::con()->prepare("UPDATE post SET title=?, brief=?, content=?, image=?, status=?, user_id=? WHERE id=?");
        
        $sentencia->bind_param("ssssiii", $entrada->getTitle(), $entrada->getBrief(), $entrada->getContent(), $entrada->getImage(), $entrada->getStatus(), $entrada->getUser_id(), $entrada->getId());
        
        $sentencia->execute();
        $sentencia->close();
    }
    
    public function deletePost($id)
    {
        $sentencia = parent::con()->prepare("DELETE FROM post WHERE id=?");
        
        $sentencia->bind_param("i", $id);
        
        $sentencia->execute();
        $sentencia->close();
    }
}
?>
