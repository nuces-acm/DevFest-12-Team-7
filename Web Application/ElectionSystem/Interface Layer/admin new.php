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
<title>Administrator</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
function redirect()
{
	a=document.admin;
	if(a.crt_elec=="1")
	{
		a.submit("elected_body.php");
	}
}
</script>

</head>

<body>
<?php
$user = $_SESSION['username'];
$query = "select * from user where username='$user';";
			$result = mysql_query($query);		
			
				$row = mysql_fetch_row($result);
				$name = $row[1];
			
?>

<div id="logo"><h1><a href="admin new.php">Administration</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="index.php">Home Page</a></li>
	   <li><a href="history.php">About Us</a></li>
	   <li><a href="foundation.php">Foundation</a></li>
	   <li><a href="login.php">Logout</a></li>
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
      <td style="font:'Times New Roman', Times, serif larger" width="114"><strong>WELCOME ---></strong></td>
      <td style="font:'Times New Roman', Times, serif larger" width="200"><strong><?php echo  $name;?></strong></td>
    </tr>
  </table>
  <table align="center" border="0">
    <tr></tr>
    <tr >

      <td> <form name="bt1" id="bt1" method="post" action="elected_body.php">
			<input align="bottom" type="submit" name="crt_elec" id="crt_elec" value=" Create Elections " /></form></td>
      <td> <form name="bt2" id="bt2" method="post" action="">
	  <input align="bottom" type="submit" name="get_res" id="get_res" value="  Get Results   "/></form></td>
      <td height="70" align="center"><form name="bt3" id="bt3" method="post" action="">
	  <input align="bottom" type="submit" name="view_res" id="view_res" value="   View Results   "/></form></td>
      </td> 
	  
	  </tr>
    
      
      </table>
  <p>Copyrights (c) 2012 made by Garbage Collector</p>
</form>
</body>
</html>
