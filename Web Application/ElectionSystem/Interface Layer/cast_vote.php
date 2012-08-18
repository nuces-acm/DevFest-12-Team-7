<?php
	include("../connection.php");
	session_start();
	if((!isset($_SESSION['username']) || !isset($_SESSION['password'])) || (!isset($_SESSION['type'])))
		header("Location:login.php?error=1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cast A Vote - Election System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
$user = $_SESSION['username'];
$qery = "SELECT * FROM candidate ";
$rslt=mysql_query($qery);
$query = "select * from user where username='$user';";
$result = mysql_query($query);		
$row = mysql_fetch_row($result);
$name = $row[1];
$areac = $row[6];
?>



<div id="logo"><h1><a href="cast_vote.html">Cast A Vote</a></h1></div>
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
<form id="form1" name="form1" method="post" action="../Business Layer/vote.php">
<p><B> Welcome</B>--> <strong><?php echo  $name;?></strong></p>
<table width="200" border="0"  align="center">
  <tr>
    <td>Candidates</td>
    <td></td>
  </tr>
  <tr>
    <td>
    <?php 
		while($row1 = mysql_fetch_array($rslt))
		{
			$bool=false;
			$id = $row1['candidate_id'];
			$name = $row1['candidate_name'];
			$party = $row1['party_name'];
			$area_c = $row1['area_c'];
			if($areac==$area_c)
			{
				$bool=true;
				echo '<input type="radio" id="CandidateList" name="CandidateList" value='.$id.'>'.$name.' from '.$party.'</input></br>';
			}
		}
	?>
    </td>
    <td></td>
  </tr>
</table>
<table align="center" border="0">
  <tr>
    <td>
	<?php if($bool)
			echo '<input type="submit" name="vote" id="vote" value="VOTE!!" />';
		else
			echo '<p>No candidate from your area</p>';
		?>
      
    </td>
  </tr>
</table>
</form>
<p><BR><BR>Copyrights (c) 2012 </p>
  <p>Made by Garbage Collectors</p>
</body>
</html>
