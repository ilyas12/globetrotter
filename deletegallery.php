<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$content = mysql_fetch_array(mysql_query("SELECT * FROM gallery WHERE GalleryID = '$id' LIMIT 0,1"));
		
		$delpicdb = mysql_query("SELECT * FROM pictures WHERE GalleryID = '$id'");
		while($delpic = mysql_fetch_array($delpicdb)) {
			unlink("images/gallery/large/".$delpic['PictureLink']);
			unlink("images/gallery/thumbnails/".$delpic['PictureLink']);
			$delete = mysql_query("DELETE FROM pictures WHERE GalleryID = '$delpic[ID]'");
		}
		
		$deletecontent = mysql_query("DELETE FROM gallery WHERE GalleryID = '$id'");
		$_SESSION['message'] = 'Gallery deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: admin.php?page=gallery");
	exit;
?>