<?php

class Controller{

  private $errors;

  public function __construct(){
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
    $this->errors = new \stdClass();
} 
  
  public function loginCheck(){
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  protected function setErrors($key, $error) {
    $this->errors->$key = $error;
  }

  public function getErrors($key) {
    return isset($this->errors->$key) ?  $this->errors->$key : '';
  }
  
  protected function hasError() {
    return !empty(get_object_vars($this->errors));
  }
  
}


?>