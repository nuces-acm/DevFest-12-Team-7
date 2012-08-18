<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Election Commision</title>
<!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  
<script type="text/javascript">

	function validate(){
		var a = document.welcome;
		if(a.lusername.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.lpassword.value == ""){
			alert("field can not be empty");
			return false;
		}
	}
	
	function validatee(){
		var a.document.register;
		if(a.username.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.password.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.cpassword==""))
		{
			alert("field can not be empty");
			return false;
		}
		if(a.age.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.nic.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.name.value == ""){
			alert("field can not be empty");
			return false;
		}
		if(a.area_c.value == ""){
			alert("field can not be empty");
			return false;
		}
		return true;
	}
</script>

</head>



</head>

<body>
<form name="welcome" id="welcome" method="post" action="../Business Layer/login.php" onsubmit="return validate();">
   <table fontsize="100" >
    <tr>
      <td height="88"><img src="./oo1.JPG" width="225" height="116" /></td>
      <td width="609" align="right"><img src="./oo2.JPG" width="700" height="86" />
      Username
      <input type="text" name="lusername" id="username">
      &nbsp;&nbsp;&nbsp;Password 
      <input type="password" name = "lpassword"id="lpassword"/><input type="submit" value="Login"/></td>
    </tr>
	</table>
	</form>
	
	<form name="register" id="register" method="post" action="../Business Layer/register.php" onsubmit="return validatee();">
	<table>
     <tr>
      <td height="54" colspan="2" align="center" style="font-size:24px"><b>WELCOME</b></td>
    </tr>
    <tr>
      <td align="right" height="29">NIC #</td>
      <td align="center"><input type="text" name="nic" id="nic"></td>
    </tr>
    
    <tr>
      <td align="right" height="29">Username</td>
      <td align="center"><input type="text" name="username" id="username"></td><td width="0"></td>
    </tr>
    <tr>
      <td align="right" height="29">Password</td>
      <td align="center"><input type="password" name="password" id="password"></td></td>
    </tr>
    <tr>
     <td align="right" height="29">Confirm Password</td>
      <td align="center"><input type="password" name="cpassword" id="cpassword"></td></td>
    </tr>
    <tr>

      <td align="right" height="29">Name</td>
      <td align="center"><input type="text" name="name" id="name"></td></td>
    </tr>
    <tr>
     <td align="right" height="29">Area Code</td>
      <td align="center"><input type="text" name="area_c" id="area_c"></td></td>
    </tr>
    <tr>
      <td align="right" height="29">Age</td>
      <td align="center"><input type="text" name="age" id="age"></td></td>
    </tr>
      <td colspan="2" height="69"> &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
          <input type="submit" id="register" value="Register"/> </td>
  </table>
</form>
</body>
</html>
