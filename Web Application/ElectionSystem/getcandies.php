<?php

require("connection.php"); 
require_once("user.php");

$username = $_POST["username"];
$newuser = new User();
	$newuser->getcandidates($username);
?>