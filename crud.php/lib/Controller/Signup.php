<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/InvalidName.php');
require_once(__DIR__ . '/../Exception/InvalidEmail.php');
require_once(__DIR__ . '/../Exception/InvalidPassword.php');


class Signup extends Controller{
  public function run(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->signupProcess();
    }
  }
  
  public function signupProcess(){
    try{
      $this->validate();
    }catch(InvalidEmail $e){
      echo $e->getMessage();
      exit;
    }catch(InvalidName $e){
      echo $e->getMessage();
      exit;
    }catch(InvalidPassword $e){
      echo $e->getMessage();
      exit;
    }
    $user = new User();
    $user->userCreate();
    // redirect
    header('Location: SITE_URL');
  }

  public function validate(){
    if($_POST['name'] === '' || mb_strlen($_POST['name']) > 10){
      throw new InvalidName();
    }

    if($_POST['email'] === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      throw new InvalidEmail();
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
      throw new InvalidPassword();
    }
  }
  
}
?>