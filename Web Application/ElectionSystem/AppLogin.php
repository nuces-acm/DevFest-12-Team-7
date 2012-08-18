<?php

$uname = $_POST['username'];
$pass = $_POST['password'];

$host='localhost';
$db='electionsystem';
$user='root';
$pswd='';
$conn=mysql_connect($host,$user,$pswd);
mysql_select_db($db);

/*$sqlUser="Select * from developer where username='".trim($uname)."'";
	$rsUser=mysql_query($sqlUser);
	if(mysql_num_rows($rsUser) == '0' || mysql_num_rows($rsUser)=='')
	{
		mysql_query("Insert into developer(username,password,user_type) values('".trim($uname)."','$pass','2')");
	}
*/
	
	$sql="Select * from user where username='".trim($uname)."' and password='$pass'";
	$rs=mysql_query($sql);
	$voted=$rs[7];
	if(mysql_num_rows($rs) == '0')
	{
		echo "-2";
	}
	else {
		if($voted==0)
			echo "1";
		else 
			echo "-1";
	}
	
	


?>