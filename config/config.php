<?php
session_start();
define('DB_NAME', 'rezerwacje');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

require_once("C:/xampp/htdocs/rezerwacja/classes/MySQL.php");
$db = new MySQL();
