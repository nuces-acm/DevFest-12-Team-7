<?php

require("../connection.php"); 
require_once("../Data Layer/user.php");
session_start();

$canid= $_POST['can_id'];
$user = $_POST['username'];

$newuser = new User();
	$newuser->vote($user ,$canid);
?>