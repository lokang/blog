<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 24/5/20
 * Time: 7:43 PM
 */
class Posts extends Database{
    public function get($id){
        $prepare = $this->prepare("SELECT posts.*, user.firstName, user.middleName, user.lastName FROM posts JOIN user ON posts.userId = user.id WHERE posts.id = ?");
        $prepare->execute([$id]);
        return $prepare->fetch();
    }

    public function post(){
        $prepare = $this->prepare("SELECT posts.*, user.firstName, user.middleName, user.lastName FROM posts LEFT JOIN user ON posts.userId = user.id ORDER BY dateCreated DESC");
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function postsLimited($from = 0){
        $prepare = $this->prepare("SELECT posts.*, user.firstName, user.middleName, user.lastName FROM posts LEFT JOIN user ON posts.userId = user.id ORDER BY dateCreated DESC LIMIT $from, 5");
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function create($userId, $title, $description){
        $prepare = $this->prepare("INSERT INTO posts (userId, title, description) VALUES (?, ?, ?)");
        $prepare->execute([$userId, $title, $description]);
    }

    public function update($title, $description, $id){
        $prepare = $this->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $prepare->execute([$title, $description, $id]);
    }

    public function destroy($id){
        $prepare = $this->prepare("DELETE FROM posts WHERE id = ?");
        $prepare->execute([$id]);
    }
}