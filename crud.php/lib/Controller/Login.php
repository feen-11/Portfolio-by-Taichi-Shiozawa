<?php

require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../Model/User.php');
require_once(__DIR__ . '/../Exception/InvalidEmail.php');
require_once(__DIR__ . '/../Exception/InvalidPassword.php');



class Login extends Controller{

  // ログインチェック
  public function run(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->loginProcess();
    }
  }

  public function loginProcess(){
    
    try{
      $this->validate();
    }catch(InvalidEmail $e){
      echo $e->getMessage();
      exit;
    }catch(InvalidPassoword $e){
      echo $e->getMessage();
      exit;
    }
    // login
    $app = new User();
    try{
      $user = $app->login();
      $_SESSION['me'] = $user;
    }catch(UnmatchEmailOrPassowrd $e){
      echo $e->getMessage();
      exit;
    }

    // redirect
    header('Location: SITE_URL');
  }
  
  public function validate(){
    if($_POST['email'] === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      throw new InvalidEmail();
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
      throw new InvalidPassword();
    }
  }

  
  
}
?>