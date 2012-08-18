<?php

 require("../connection.php"); 
 require_once("../Data Layer/user.php");

$username = $_POST["usr"];
$password = $_POST["pass"];
$newuser = new User();
	$newuser->login($username ,$password);
?>
