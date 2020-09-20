<?php

require_once(__DIR__ . '/../config/config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $_SESSION = [];
  session_destroy();
}

header('Location: SITE_URL');


?>