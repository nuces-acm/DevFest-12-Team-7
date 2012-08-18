<?php
	include("../connection.php");
	session_start();
	if( ( (!isset($_SESSION['username']) || !isset($_SESSION['password'])) || ($_SESSION['type']!="candidate") ) )
		header("Location:login.php?error=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>DevFest ACM 2012 | Election System</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /><!--What is this-->

  <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  
<script type="text/javascript">

	function validate(){
			var a = document.form1;
			if(a.username.value == ""){
				alert("Username can not be empty");
				return false;
			}else
			if(a.pass.value == ""){
				alert("Password can not be empty");
				return false;
			}
			if(a.nic.value == ""){
				alert("NIC Number can not be empty");
				return false;
			}
			if(a.name.value == ""){
				alert("Name can not be empty");
				return false;
			}
			if(a.area_c.value == ""){
				alert("Area Code can not be empty");
				return false;
			}
			if(a.age.value == ""){
				alert("Age can not be empty");
				return false;
			}
			return true;
		}
	
	
</script>

</head>

<body>
	<div id="main">
  <div id="logo"><h1><a href="index.html">Elections System</a></h1></div>
  <div id="menu">
       <ul>
	   <li><a href="index.php">Home Page</a></li>
	      <li><a href="history.php">About Us</a></li>
	<li><a href="foundation.php">Foundation</a></li>

		 
	     <li><a href="login.php">Login</a></li>


	      <li><a href="feed.php">Give Feedback</a></li>
	      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </div>
  <div id="site_content">
    <div id="first_column">
			<div class="disignBoxSecond">
			

		</div>


    </div>
	<br />
    <div id="content">
		
		<div class="disignBoxFirst">
			<div class="boxFirstHeader"> Oh Fuck..!!!</div>
			
			<br>
			
  </div>
</div>
 </div>
</body>
</html>


