<?php
	include("../connection.php");
	session_start();
	
	if(((!isset($_SESSION['username']) || !isset($_SESSION['password'])) || ($_SESSION['type']!="admin") ) )
		header("Location:login.php?error=1");
	else if(!isset($_SESSION['date']))
		$_SESSION['date']=$_POST['date'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Seats</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
<div id="logo"><h1><a href="add_seats.html">Add Seats</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="index.php">Home Page</a></li>
	   <li><a href="history.php">About Us</a></li>
	   <li><a href="foundation.php">Foundation</a></li>
	   <li><a href="login.php">Logout</a></li>
	   <li><a href="feed.php">Give Feedback</a></li>
	   <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </div>
  
  
  <div id="site_content">
<div id="first_column">
	<div class="disignBoxSecond">

	</div>
  </div>




<?php
	$error=$_GET['error'];
	if($error==0)
		echo "<center><font color='red'>Error Entering in DB</font></center><br>";
	else if($error==1)
		echo "<center><font color='red'>Add other candidates, if any, else press DONE</font></center><br>";
?>
<form id="add_seats" name="add_seats" method="post" action="../Business Layer/candidate.php">
<br>
  <table width="319" height="102" border="0">
    <tr>
      <td height="35">Candidate Name:</td>
      <td><input type="text" name="can_name" id="desg"/></td>
    </tr>
    <tr>
      <td>Candidate Area Code:</td>
      <td><input type="text" name="can_area_c" id="inc_nmbr"/></td>
    </tr>
	<tr>
			<td align="right"> Party Name: </td>
			<td><input type="text" name="bodyname" id="bodyname" /></td>
	</tr>
    <tr>
      <td height="35"><input type="submit" name="add_candidate" id="add_candidate" value="Add Candidate"/></td></form>
      
    </tr>
  </table>

<p>Copyrights (c) 2012 </p>
  <p>Made by Garbage Collectors</p>
</body>
</html>
