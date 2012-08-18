<?php

session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Election System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
		function validate(){
			var a = document.form1;
			if(a.usr.value == ""){
				alert("Username can not be empty");
				return false;
			}else
			if(a.pass.value == ""){
				alert("Password can not be empty");
				return false;
			}
			return true;
		}
</script>
</head>

<body>
<?php
	if($_GET['error'])
		$error=$_GET['error'];
	if($error==1)
	echo "<center><font color='red'>Wrong username or password </font></center><br>";
?>

<div id="logo"><h1><a href="index.html">Login</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="index.php">Home Page</a></li>
	   <li><a href="history.php">About Us</a></li>
	   <li><a href="foundation.php">Foundation</a></li>
<!--	   <li><a href="login.php">Login</a></li>-->
	   <li><a href="feed.php">Give Feedback</a></li>
	   <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </div>
  
  
  <div id="site_content">
   <div id="first_column">
	<div class="disignBoxSecond">

	</div>
  </div>



<form id="form1" name="form1" method="post" action="../Business Layer/login.php" onsubmit="return validate();">
<br><br><br>
<?php
	if($error==3)
		echo "<center><font color='red'>Please Enter Username And Password to go to HOME PAGE</font></center><br>";
?><br><br><br><br>
<table width="317" height="167" border="0" align="center" colspan="3">
  <tr>
    <td height="38" colspan="2"><b>Username</b> </td>
    <td width="150"><input type="text" name="usr" id="usr"></td>
  </tr>
  <tr>
    <td height="33" colspan="2"><b>Password</b></td>
    <td><input type="password" name="pass" id="pass"/></td>
  </tr>
  <tr>
    <td height="88" colspan="2"align="right"><input type="submit" name="login" id="login" value="  SUBMIT  "/></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
