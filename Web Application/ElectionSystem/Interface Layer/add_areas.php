<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Areas</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
<div id="logo"><h1><a href="add_areas.html">add areas</a></h1></div>
  <div id="menu">
    <ul>
	   <li><a href="index.php">Home Page</a></li>
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

<form name="add_areas" id="add_areas" method="post" action="../Business Layer/add_areas.php">
  <p><b>Add Areas</b></p>
  <table width="399" height="184" border="0" align="center">
    <tr>
      <td width="74">Area Code</td>
      <td width="194" height="45"><input width="25" type="textarea" name="Area_c" id="Area_c"/></td>
      <td width="117"><input type="button" name="Add" id="Add" value="    Add   "/></td>
    </tr></form>
    <tr>
      <td height="122">&nbsp;</td>
      <td><form name="add_areas" id="add_areas" method="post" action="elected_body.php">
		<textarea name="Area_info" cols="20" rows="6" id="Area_info"></textarea></td>
      <td><input type="submit" name="Done" id="Done" value="    Done   "/></form></td>
    </tr>
  </table>
 
</body>
</html>
