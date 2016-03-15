<?php

	require 'incdatabase.php';
	
	$email = $_POST['email'];
	
	$findquery = mysql_query("SELECT * FROM members WHERE Email = '$email' LIMIT 0,1");
	$findnum = mysql_num_rows($findquery);
	if($findnum>0) {
		$find = mysql_fetch_array($findquery);
		$message1 .= 'Dear '.$find['Name'].',<br />';
		$message1 .= 'The password for this email: '.$email.' is<br />';
		$message1 .= ''.$find['Password'].'<br />';
		
			
			$to = $find['Name']." <".$email.">";
			
			$subject = 'Forgot Your Password?';
			
			$headers = "From: GLOBETROTTER <info@globetrotter.com>\r\n";
			$headers .= "Reply-To: ".$email." <".$email.">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			//send the email
			$mail_sent = @mail( $to, $subject, $message1, $headers );
			$_SESSION['message'] = 'The password had been sent to '.$email;
	} else {
		$_SESSION['message'] = 'There is no '.$email.' in our database';
	}
	
	header("Location: ".$_SESSION['lasturl']);

?>