<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 10/1/20
 * Time: 6:11 PM
 */
class Comments extends Database{
    public function create($userId, $postId, $comment){
        $prepare = $this->prepare("INSERT INTO comments (userId, postId, comment) VALUES (?, ?, ?)");
        $prepare->execute([$userId, $postId, $comment]);
    }

    public function get($id){
        $prepare = $this->prepare("SELECT * FROM comments WHERE id = ?");
        $prepare->execute([$id]);
        return $prepare->fetch();
    }

    public function getAll($postId){
        $prepare = $this->prepare("SELECT comments.*, user.firstName, user.middleName, user.lastName FROM comments JOIN user ON user.id = comments.userId WHERE comments.postId = ? ORDER BY dateCreated DESC");
        $prepare->execute([$postId]);
        return $prepare->fetchAll();
    }

    public function update($comment, $id){
        $prepare = $this->prepare("UPDATE comments SET comment = ? WHERE id = ?");
        $prepare->execute([$comment, $id]);
    }

    public function destroy($id){
        $prepare = $this->prepare("DELETE FROM comments WHERE id = ?");
        $prepare->execute([$id]);
    }

    public function countComments($postId){
        $prepare = $this->prepare("SELECT count(*) FROM comments WHERE postId = ?");
        $prepare->execute([$postId]);
        return $prepare->fetchColumn();
    }
}