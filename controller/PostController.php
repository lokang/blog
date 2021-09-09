<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 24/5/20
 * Time: 7:43 PM
 */
class PostController extends Controller{
    public function get($id){
        $post = new Posts();
        $commentModel = new Comments();
        $comments = $commentModel->getAll($id);
        $postData = $post->get($id);
        if($_POST){
            $commentModel->create($this->auth['id'], $id, $_POST['comment']);
            $this->redirect('post/get/'.$id.'#comment');
        }
        $this->view('post', $postData['title'], [
            'postData' => $postData,
            'comments' => $comments
        ]);
    }

    public function update($id){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        $post = new Posts();
        $postData = $post->get($id);
        if($_POST){
            $post->update($_POST['title'], $_POST['description'], $id);
            $this->redirect('post/get/'.$id);
        }
        $this->view('update', 'update', [
            'postData' => $postData
        ]);
    }

    public function destroy($id){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        $post = new Posts();
        $post->destroy($id);
        $this->redirect('/');
    }

    public function create(){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        if($_POST){
            $post = new Posts();
            $post->create($this->auth['id'], $_POST['title'], $_POST['description']);
            $this->redirect('/');
        }
        $this->view('createPost', 'create post');
    }

    public function ajaxPosts($postItemCount){
        $postModel = new Posts();
        $posts = $postModel->postsLimited($postItemCount);
        echo json_encode($posts);
    }
}