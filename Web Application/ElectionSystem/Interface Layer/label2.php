<?php
	include("../connection.php");
	session_start();
	if(((!isset($_SESSION['username']) || !isset($_SESSION['password'])) || ($_SESSION['type']!="candidate")))
		header("Location:login.php?error=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="f4" name="loger" method="post" action="">
  <table style="background-color:#CACACA" border="0">
    <tr>
      <td><img src="../Downloads/1219486606547_Election Commission of Pakistan_t.JPG" width="131" height="89" /></td>
      <td align="right"><img src="../Pictures/header.png" width="893" height="86" /></td>
 </tr>

  <tr>
    <td height="44"><h2>WELCOME</h2></td>
    <td align="center"><h3>Name</h3></td>
  </tr>
  <tr>
    <td height="88">&nbsp; </td>
    <td align="center"><input type="button" name="cast_vote" value="  Cast Vote  "/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="apl_4_seat" value="  Apply for Sest  "/></td>
  </tr>
  <tr>
    <td height="64">&nbsp; </td>
    <td align="center"><input type="button" name="edit" value="  Edit Profile "/></td>
  </tr>
  <tr>
    <td height="68">&nbsp; </td>
    <td align="right"><input type="button" name="logout" value="  Log Out "/></td>
  </tr>
 </table>
</form>
</body>
</html>
