<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/InvalidName.php');
require_once(__DIR__ . '/../Exception/InvalidEmail.php');
require_once(__DIR__ . '/../Exception/InvalidToken.php');


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
    }catch(InvalidToken $e){
      $this->setErrors('token', $e->getMessage());
    }catch(InvalidName $e){
      $this->setErrors('name', $e->getMessage());
    }catch(InvalidEmail $e){
      $this->setErrors('email', $e->getMessage());
    }

    if($this->hasError()){
      return;
    } else{
      $app = new User();
      $app->userEdit();
      header('Location: SITE_URL');
    }
  }

  public function validate(){
    if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
      throw new InvalidToken();
    }
    
    if($_POST['name'] === '' || mb_strlen($_POST['name']) > 10){
      throw new InvalidName();
    }

    if($_POST['email'] === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      throw new InvalidEmail();
    }
  }


  

  
  
}
?>