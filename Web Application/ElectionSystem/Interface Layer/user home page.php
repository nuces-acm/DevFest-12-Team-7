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
<title>User Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
$user = $_SESSION['username'];
$query = "select * from user where username='$user';";
			$result = mysql_query($query);		
			
				$row = mysql_fetch_row($result);
				$name = $row[1];
			
?>
<body>
<div id="logo"><h1><a href="user home page.html">User Home Page</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="index.php">Home Page</a></li>
	   <li><a href="history.php">About Us</a></li>
	   <li><a href="foundation.php">Foundation</a></li>
<!--	   <li><a href="login.php">Login</a></li>-->
	   <li><a href="feed.php">Give Feedback</a></li>
	   <li><a href="contactus.php">Contact Us</a></li>
	   <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  
  
  <div id="site_content">
   <div id="first_column">
	<div class="disignBoxSecond">

	</div>
  </div>



  <table width="268" height="59" border="0">
    <tr>
      <td style="font:'Times New Roman', Times, serif larger" width="114"><strong>WELCOME --></strong></td>
		<td style="font:'Times New Roman', Times, serif larger" width="114"><strong><?php echo  $name;?></strong></td>
    </tr>
  </table>
  <br>
  <br>
  <br> 
  <p align="center" style="font:'MS Serif', 'New York', serif large"><strong>What Do You Want To Do...???</strong></p> 
  <table align="center" border="0">
    <tr>
      <td align="center"> <form action="cast_vote.php">
	  <?php 
		$res=mysql_fetch_row(mysql_query("select * from user where username='$user';"));
		$voted=$res[7];
		if($voted==0)
			echo '<input type="submit" name="cast_vote" id="cast_vote"   value="     Cast Vote    " /></form></td>';
		else 
			echo '<input type="button"   value="     VOTE Casted..!    " /></form></td>';
	  ?>
        </form></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<td><form action="edit_profile.php">
        <input type="submit" name="edt_prfile" id="edt_prfile" value="   Edit Profile   "/></form> 
      </td>
    </tr>
  </table>
</body>
</html>
