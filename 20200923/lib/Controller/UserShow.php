<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/Post.php');


class UserShow extends Controller{

  public function run(){
    if(!$this->loginCheck()){
      header('Location:' . SITE_URL . '/login.php');
    }

    
  }

  public function readUserPosts(){
    $app = new Post();
    return $posts = $app->readMyPosts();
  }
  
}
?>