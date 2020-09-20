<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/InvalidName.php');
require_once(__DIR__ . '/../Exception/InvalidEmail.php');


class UserEdit extends Controller{

  public function run(){
    if(!$this->loginCheck()){
      header('Location:' . SITE_URL . '/login.php');
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->userEditProcess();
    }
  }

  public function userEditProcess(){
    try{
      $this->validate();
    }catch(InvalidName $e){
      echo $e->getMessage();
      exit;
    }catch(InvalidEmail $e){
      echo $e->getMessage();
      exit;
    }
    $app = new User();
    $app->userEdit();
    header('Location: SITE_URL');
  }

  public function validate(){
    if($_POST['name'] === '' || mb_strlen($_POST['name']) > 10){
      throw new InvalidName();
    }

    if($_POST['email'] === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      throw new InvalidEmail();
    }
  }


  

  
  
}
?>