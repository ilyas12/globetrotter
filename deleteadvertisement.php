<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$delete = mysql_fetch_array(mysql_query("SELECT * FROM `advertisements` WHERE ID = '$id' LIMIT 0,1"));
		unlink("images/adv/".$delete['AdvPic']);
		$_SESSION['message'] = 'Advertisement('.$delete['AdvPosition'].') Deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: admin.php?page=advertisements");
	exit;
?>