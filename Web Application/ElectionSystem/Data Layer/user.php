<?php
	include("../connection.php");
	class User{
		//$user, $pass, $conf, $dob, $fname, $lname, $email;
		//$con = mysql_connect($host,$user,$pass) or die ("unable to connect");
		function register($username, $password, $nic, $name, $area_c, $age)
		{
			$query = "INSERT INTO `user` VALUES ('$nic','$username','$password','user','$name','$age','$area_c', 0);";
				$result = mysql_query($query);
			return $result;			
		}
		
		function login($user,$pass)
		{
			$query = "select * from user where username='$user' and password='$pass';";
			$result = mysql_query($query);
			
			if($result)
			{
				$row = mysql_fetch_row($result);
				$type = $row[3];
				session_start();
				
				if($type == "admin")
				{
					session_start();
					$_SESSION['username']=$user;
					$_SESSION['password']=$pass;
					$_SESSION['type']="admin";
					header("location:../Interface Layer/admin new.php");			
					
				}
				else if($type == "user")
				{
					session_start();
					$_SESSION['username']=$user;
					$_SESSION['password']=$pass;
					$_SESSION['type']="user";
					header("location:../Interface Layer/user home page.php");
				}
				else if($type == "candidate")
				{
					session_start();
					$_SESSION['username']=$user;
					$_SESSION['password']=$pass;
					$_SESSION['type']="candidate";
					header("location:../Interface Layer/label3.php");
				}
				else
					header("location:../Interface Layer/login.php?error=1");
				
			}
		}
		function regcandidate($canname ,$canareac, $canparty)
		{
			$query = "INSERT INTO candidate(candidate_name, area_c, party_name) VALUES ('$canname',$canareac, '$canparty');";
			if(mysql_query($query))
			{
				header("location:../Interface Layer/add_seats.php?error=1");
			}
			else
				header("location:../Interface Layer/add_seats.php?error=0");
		}
		
		function vote($usr, $candidate_id){
			mysql_query("UPDATE `user` SET `voted` = 1 WHERE username = '$usr';")or die (mysql_error());
			$row = mysql_fetch_row(mysql_query("Select * from user WHERE username = '$usr';"));
			$usrarc = $row[6];
			mysql_query("INSERT INTO `voter` (voter_username, voter_area_c, voted) VALUES ('$usr','$usrarc', '1');")or die (mysql_error());
			$reslt=mysql_fetch_row(mysql_query("Select * from voter WHERE voter_username = '$usr';")) or die (mysql_error());
			//var_dump($row);
			$vtr_id= $reslt[0];
			$today = date("Y-m-d");
			mysql_query("INSERT INTO election(candidate_id, voter_id, election_date) VALUES ('$candidate_id',$vtr_id, CURDATE());")or die (mysql_error());
			header("location:../Interface Layer/user home page.php");
		}
		
		function getcandidates($username)
		{
			$qery = "SELECT * FROM candidate ";
			$rslt=mysql_query($qery);
			$query = "select * from user where username='$username';";
			$result = mysql_query($query);		
			$row = mysql_fetch_row($result);
			$name = $row[1];
			$areac = $row[6];
			$bool=false;
			while($row1 = mysql_fetch_array($rslt))
			{
				$id = $row1['candidate_id'];
				$name = $row1['candidate_name'];
				$party = $row1['party_name'];
				$area_c = $row1['area_c'];
				if($areac==$area_c)
				{
					$bool=true;
					echo $id; echo $name; echo $party;
				}
			}
		}
	}