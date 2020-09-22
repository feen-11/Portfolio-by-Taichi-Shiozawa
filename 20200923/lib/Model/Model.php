<?php

require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../functions.php');


class Model{
  public $dbh;

  public function __construct(){
    try {
      $this->dbh = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}

?>