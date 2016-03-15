<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$banner = mysql_fetch_array(mysql_query("SELECT * FROM magazinespictures WHERE ID = '$id'"));
		unlink("images/magazines/large/".$banner['Image']);
		unlink("images/magazines/thumbnails/".$banner['Image']);
		
		$delete = mysql_query("DELETE FROM magazinespictures WHERE ID = '$id'");
		$_SESSION['message'] = 'Magazine\'s picture deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: editmagazine.php?id=".$banner['MagazineID']);
	exit;
?>