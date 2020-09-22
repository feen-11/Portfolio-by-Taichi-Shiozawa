<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/Post.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/EmptyPost.php');
require_once(__DIR__ . '/../Exception/OverPost.php');
require_once(__DIR__ . '/../Exception/InvalidToken.php');



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
    }catch(InvalidToken $e){
      $this->setErrors('token', $e->getMessage());
    }catch(EmptyPost $e){
      $this->setErrors('empty', $e->getMessage());
    }catch(OverPost $e){
      $this->setErrors('over', $e->getMessage());
    }

    if($this->hasError()){
      return;
    } else{
      $app = new Post();
      $app->create();
    }
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
    if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
      throw new InvalidToken();
    }
    
    if($_POST['body'] === ''){
      throw new EmptyPost();
    }

    if(mb_strlen($_POST['body']) > 140){
      throw new OverPost();
    }
  }

  
}


?>