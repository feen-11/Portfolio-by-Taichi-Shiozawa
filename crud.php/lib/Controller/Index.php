<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/Post.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/EmptyPost.php');
require_once(__DIR__ . '/../Exception/OverPost.php');



class Index extends Controller{

  public function run(){
    if(!$this->loginCheck()){
      header('Location:' . SITE_URL . '/login.php');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->postProcess();
    }
  }

  public function postProcess(){
    try{
      $this->validate();
    }catch(EmptyPost $e){
      echo $e->getMessage();
      exit;
    }catch(OverPost $e){
      echo $e->getMessage();
      exit;
    }
    $app = new Post();
    $app->create();
  }


  public function readPosts(){
    $read = new Post();
    return $posts = $read->read();
  }

  public function readUser($userId){
    $read = new User();
    return $postUserName = $read->postUser($userId);
  }

  public function validate(){
    if($_POST['body'] === ''){
      throw new EmptyPost();
    }

    if(mb_strlen($_POST['body']) > 144){
      throw new OverPost();
    }
  }

  
}


?>