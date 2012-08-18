<?php

require("../connection.php"); 
require_once("../Data Layer/user.php");
session_start();

$canid= $_POST['CandidateList'];
$user = $_SESSION['username'];

$newuser = new User();
	$newuser->vote($user ,$canid);
?>