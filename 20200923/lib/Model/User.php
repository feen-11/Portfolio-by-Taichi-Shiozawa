<?php

require_once(__DIR__ . '/Model.php');
require_once(__DIR__ . '/../Exception/ExistsEmail.php');
require_once(__DIR__ . '/../Exception/UnmatchEmailOrPassword.php');

class User extends Model{

  public function userCreate(){
      $sql = "insert into users (email, name, password, created, updated) values (:email, :name, :password, now(), now())";
      $stmt = $this->dbh->prepare($sql);
      $res = $stmt->execute([
        ':email' => $_POST['email'],
        ':name' => $_POST['name'],
        ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
      ]);
  }

  public function login(){
    $sql = 'select * from users where email = :email';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':email' => $_POST['email']
    ]); 
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
      if(password_verify($_POST['password'],$user['password'])){
        return $user;
      }else{
        throw new UnmatchEmailOrPassword();
      }
  
    
  }
  

  public function userEdit(){
    $sql = "update users set name = :name, email = :email, updated = now() where userId = :userId";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':userId' => $_SESSION['me']['userId']
    ]);
    
    // セッションの更新
    $sql = "select * from users where userId = :userId";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':userId' => $_SESSION['me']['userId']
    ]);
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    $_SESSION['me'] = $user;
  }

  public function postUser($userId){
    $sql = "select name from users where userId = :userId";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':userId' => $userId
    ]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }


} 
?>