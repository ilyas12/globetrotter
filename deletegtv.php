<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$delete = mysql_query("DELETE FROM `youtube` WHERE ID = '$id'");
		$_SESSION['message'] = 'GTV deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: admin.php?page=gtv");
	exit;
?>