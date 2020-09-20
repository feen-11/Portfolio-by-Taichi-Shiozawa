<?php

class Controller{
  
  public function loginCheck(){
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  
}


?>