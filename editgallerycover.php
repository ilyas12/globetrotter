<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$banner = mysql_fetch_array(mysql_query("SELECT * FROM `pictures` WHERE PictureID = '$id'"));
		
		$editcoverhidden = mysql_query("UPDATE `pictures` SET GalleryCover = '0' WHERE GalleryID = '$banner[GalleryID]'");
		
		$delete = mysql_query("UPDATE `pictures` SET GalleryCover = '1' WHERE PictureID = '$id'");
		$_SESSION['message'] = 'Work set cover succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: editgallery.php?id=".$banner['GalleryID']);
	exit;
?>