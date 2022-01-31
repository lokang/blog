<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 5/1/20
 * Time: 1:28 AM
 */
class PageController extends Controller
{
    public function create(){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        $page = new Pages();
        if($_POST){
            $page->create($_POST['slug'], $_POST['description']);
            $this->redirect('home/page/'.$_POST['slug']);
        }
        $this->view('createPage', 'Create Page');
    }

    public function edit($slug){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        $page = new Pages();
        $edit = $page->page($slug);
        if($_POST){
            $page->edit($_POST['slug'], $_POST['description'], $edit['id']);
            $this->redirect('home/page/'.$_POST['slug']);
        }
        $this->view('editPage', 'Edite Page', [
            'edit' => $edit
        ]);
    }

    public function destroy($id){
        if(!$this->auth['id'] == 1){
            $this->redirect('/home/login/');
        }
        $page = new Pages();
        $page->destroy($id);
        $this->redirect('/');
    }
}