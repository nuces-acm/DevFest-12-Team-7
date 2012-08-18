<?php
	include("../connection.php");
	session_start();
	if( ( (!isset($_SESSION['username']) || !isset($_SESSION['password'])) || ($_SESSION['type']!="admin") ) )
		header("Location:login.php?error=1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elected Body</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="logo"><h1><a href="elected_body.html">Elected Body</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="registration.php">Home Page</a></li>
	   <li><a href="history.php">About Us</a></li>
	   <li><a href="foundation.php">Foundation</a></li>
	   <li><a href="feed.php">Give Feedback</a></li>
	   <li><a href="contactus.php">Contact Us</a></li>
		<li><a href="login.php">Logout</a></li>
	</ul>
  </div>
  
  
  <div id="site_content">
<div id="first_column">
	<div class="disignBoxSecond">

	</div>
  </div>
  

<p style="font:'MS Serif', 'New York', serif large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Enter The Local Body</strong></p> 
  <table width="409" border="0" align="center">
    <tr>
      <td width="600" height="100"> Body Name      <input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td> <form id="lb" name="lb" method="post" action="add_seats.php">
        <input type="submit" name="lcl_bdy" id="lcl_bdy" value="   Add Seats   " /></form></td>
		<td><form id="pa" name="pa" method="post" action="elected_body.php">
        <input type="submit" name="done" id="done" value="Done"></form></td>
        
    </tr>
  </table>
  
  <p>Copyrights (c) 2012 Made by Garbage Collectors</p>
</form>
</body>
</html>
