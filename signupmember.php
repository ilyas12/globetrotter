<?php
	include 'incdatabase.php';
	
	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$location = $_POST['location'];
	$gender = $_POST['gender'];
	$agerange = $_POST['agerange'];
	
	if($email && $name && $password && $location && $gender && $agerange) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['memberareamessage'] = "Please Enter Valid Email";
		} else {
			$checkmember = mysql_num_rows(mysql_query("SELECT * FROM members WHERE Email = '$email' LIMIT 0,1"));
			if($checkmember > 0) {
				$_SESSION['memberareamessage'] = "Already one of our member";
			} else {
				$add = mysql_query("INSERT INTO members(Email, Password, Name, Country, Gender, Age) VALUES('$email', '$password', '$name', '$location', '$gender', '$agerange')");
				$_SESSION['memberareamessage'] = "Sign Up Success";
			}
		}
	} else {
		$_SESSION['memberareamessage'] = "All fields have to be filled";
	}
	header("Location: ".$_SESSION['lasturl']);
	exit;
?>