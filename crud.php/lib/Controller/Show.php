<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/Post.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/OverPost.php');


class Show extends Controller{
  public function run(){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->postEdit();
    }
  }

  public function postEdit(){    
    if (empty($_POST['body'])){
      $id = (int)$_GET['id'];
      $app = new Post();
      $app->delete($id);
    }elseif(isset($_POST['body'])){
      try{
        $this->validate();
      }catch(OverPost $e){
        echo $e->getMessage();
        exit;
      }
      $id = (int)$_GET['id'];
      $app = new Post();
      $app->update($id);
    }
    // redirect
    header('Location: SITE_URL');
}

  public function showPost(){
    // 投稿詳細
    $show = new Post();
    $id = (int)$_GET['id'];
    return $show->show($id);
  }

  public function validate(){
    if(mb_strlen($_POST['body']) > 140){
      throw new OverPost();
    }
  }

  public function readUser($userId){
    $read = new User();
    return $postUserName = $read->postUser($userId);
  }
  
}
?>