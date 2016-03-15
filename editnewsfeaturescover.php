<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$banner = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE ID = '$id'"));
		
		$editcoverhidden = mysql_query("UPDATE `news-features-pictures` SET GalleryCover = '0' WHERE NFID = '$banner[NFID]'");
		
		$delete = mysql_query("UPDATE `news-features-pictures` SET GalleryCover = '1' WHERE ID = '$id'");
		$_SESSION['message'] = 'News/Features set cover succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: editnewsfeatures.php?id=".$banner['NFID']);
	exit;
?>