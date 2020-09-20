<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=localhost;dbname=crud_php');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '1114');
define('DEFAULT_IMAGE', 'image/default.png');


define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

session_start();