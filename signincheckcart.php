<?php
	include 'incdatabase.php';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$checkquery = mysql_query("SELECT * FROM members WHERE Email = '$email' AND Password = '$password' LIMIT 0,1");
	$checknum = mysql_num_rows($checkquery);
	$check = mysql_fetch_array($checkquery);
	
	if($checknum > 0) {
		$_SESSION['login'] = true;
		$_SESSION['ID'] = $check['MemberID'];
		$_SESSION['Email'] = $check['Email'];
		$_SESSION['Name'] = $check['Name'];
	} else {
		$_SESSION['membersigninmessage'] = 'Incorrect Email or Password';
	}
	
	header("Location: index.php?page=checkout");
	exit;
?>