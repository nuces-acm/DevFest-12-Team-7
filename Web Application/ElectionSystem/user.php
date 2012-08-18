<?php
	include("connection.php");
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
					return 1;
					
				}
				else if($type == "user")
				{
					session_start();
					$_SESSION['username']=$user;
					$_SESSION['password']=$pass;
					$_SESSION['type']="user";
					return 1;
				}
				else if($type == "candidate")
				{
					session_start();
					$_SESSION['username']=$user;
					$_SESSION['password']=$pass;
					$_SESSION['type']="candidate";
					return 1;
				}
				else
					return -1;
				
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
			if(mysql_query("UPDATE `user` SET `voted` = 1 WHERE username = '$usr';")){
				$row = mysql_fetch_row(mysql_query("Select * from user WHERE username = '$usr';"));
				$usrarc = $row[6];
				if(mysql_query("INSERT INTO `voter` (voter_username, voter_area_c, voted) VALUES ('$usr','$usrarc', '1');")){
					$reslt=mysql_fetch_row(mysql_query("Select * from voter WHERE voter_username = '$usr';")) or die (mysql_error());
					//var_dump($row);
					$vtr_id= $reslt[0];
			if(mysql_query("INSERT INTO election(candidate_id, voter_id, election_date) VALUES ('$candidate_id',$vtr_id, CURDATE());")){
			return 3;
			}
			return -3;
			}
			return -3;
			}
			return -3;
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
					echo $id.'*'.$name.'*'.$party.'*';
				}
			}
		}
	}