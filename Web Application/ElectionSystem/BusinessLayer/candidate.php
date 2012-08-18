<?php

 require("../connection.php"); 
 require_once("../Data Layer/user.php");

$canname = $_POST["can_name"];
$canareac = $_POST["can_area_c"];
$canparty = $_POST['bodyname'];
$newuser = new User();
	$newuser->regcandidate($canname ,$canareac, $canparty);
?>