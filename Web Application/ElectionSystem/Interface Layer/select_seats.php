<?php
	include("../connection.php");
	session_start();
	if( ( (!isset($_SESSION['username']) || !isset($_SESSION['password'])) || ($_SESSION['type']!="user") ) )
		header("Location:login.php?error=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Seats - Election System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="logo"><h1><a href="select_seats.html">Select Seats</a></h1></div>
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


<form id="form1" name="form1" method="post" action="">
  <strong>Welcome,</strong> Candidate
  <br><br><br>
  <table width="292" border="0" align="center">
    <tr>
      <td width="166">Designation</td>
      <td width="116">ID</td>
    </tr>
    <tr>
      <td><label>
        <textarea name="designation" id="designation" cols="20" rows="5"></textarea>
      </label></td>
      <td><textarea name="designation2" id="designation2" cols="15" rows="5"></textarea></td>
    </tr>
  </table>
  <table width="345" border="0" align="center">
    <tr>
      <td width="96" align="center">Enter Seat ID</td>
      <td width="151" align="center"><input type="text" name="seat_ID" id="seat_ID" /></td>
      <td width="84" align="center"><input type="submit" name="apply" id="apply" value="  Apply  " /></td>
    </tr>
  </table>
</form>

<p><BR><BR>Copyrights (c) 2012 </p>
  <p>Made by Garbage Collectors</p>
</body>
</html>
