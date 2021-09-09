<?php
/**
 * Created by PhpStorm.
 * User: lokang
 * Date: 3/1/20
 * Time: 10:36 PM
 */
class Pages extends Database{
    public function page($slug){
        $prepare = $this->prepare("SELECT * FROM pages WHERE slug = ?");
        $prepare->execute([$slug]);
        return $prepare->fetch();
    }

    public function home(){
        $prepare = $this->prepare("SELECT * FROM pages WHERE id = 1");
        $prepare->execute([]);
        return $prepare->fetch();
    }

    public function create($slug, $description){
        $prepare = $this->prepare("INSERT INTO pages (slug, description) VALUES(?, ?)");
        $prepare->execute([$slug, $description]);
    }

    public function edit($slug, $description, $id){
        $prepare = $this->prepare("UPDATE pages SET slug = ?, description = ? WHERE id = ?");
        $prepare->execute([$slug, $description, $id]);
    }

    public function destroy($id){
        $prepare = $this->prepare("DELETE FROM pages WHERE id = ?");
        $prepare->execute([$id]);
    }
}