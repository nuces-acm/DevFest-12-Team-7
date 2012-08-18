<?php

$uname = $_POST['username'];
$name=$_POST['name'];
$pass = $_POST['password'];
$nic = $_POST['nic'];
$area_code = $_POST['area'];
$family_code = $_POST['family'];


$host='localhost';
$db='electionsystem';
$user='root';
$pswd='';
$conn=mysql_connect($host,$user,$pswd);
mysql_select_db($db);

$sqlUser="Select * from developer where username='".trim($uname)."'";
	$rsUser=mysql_query($sqlUser);
	if(mysql_num_rows($rsUser) == '0' || mysql_num_rows($rsUser)=='')
	{
		$query = "INSERT INTO `user` VALUES ('$nic','$uname','$pass','user','$name','$family_code','$area_code', 0);";
		mysql_query($query);
		
		//mysql_query("Insert into developer(username,password,name,user_type) values('".trim($uname)."','$pass','$fname','2')");
	}
	else
	{
		echo "-1";
	}
	
	
	


?>