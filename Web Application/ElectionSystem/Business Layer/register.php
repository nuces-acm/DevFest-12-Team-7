<?php

require("../connection.php"); 
require_once("../Data Layer/user.php");

$username = $_POST["username"];

$password = $_POST["pass"];

$nic = $_POST["nic"];

$name = $_POST["name"];

$area_c = $_POST["area_c"];

$age = $_POST["age"];

$newuser = new User();
	
	if($newuser->register($username ,$password,$nic ,$name ,$area_c ,$age))
		header("location:../Interface Layer/login.php?error=3");
	else
		header("location:../Interface Layer/registration.php?error=1");
		

?>
