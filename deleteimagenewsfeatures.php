<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$banner = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE ID = '$id'"));
		unlink("images/features/".$banner['GalleryLink']);
		
		$delete = mysql_query("DELETE FROM `news-features-pictures` WHERE ID = '$id'");
		$_SESSION['message'] = 'News/Features picture deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: editnewsfeatures.php?id=".$banner['NFID']);
	exit;
?>