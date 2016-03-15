<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$banner = mysql_fetch_array(mysql_query("SELECT * FROM `pictures` WHERE PictureID = '$id'"));
		unlink("images/gallery/thumbnails/".$banner['PictureLink']);
		unlink("images/gallery/large/".$banner['PictureLink']);
		
		$delete = mysql_query("DELETE FROM `pictures` WHERE PictureID = '$id'");
		$_SESSION['message'] = 'Picture deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: editgallery.php?id=".$banner['GalleryID']);
	exit;
?>