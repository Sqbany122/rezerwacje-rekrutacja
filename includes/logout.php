<?php 
session_start();
session_destroy();
header('Location: /rezerwacja/includes/login.php');
exit();