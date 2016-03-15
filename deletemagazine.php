<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$content = mysql_fetch_array(mysql_query("SELECT * FROM magazines WHERE MagazineID = '$id' LIMIT 0,1"));
		
		$delpicdb = mysql_query("SELECT * FROM magazinespictures WHERE MagazineID = '$id'");
		while($delpic = mysql_fetch_array($delpicdb)) {
			unlink("images/magazines/large/".$delpic['Image']);
			unlink("images/magazines/thumbnails/".$delpic['Image']);
			$delete = mysql_query("DELETE FROM magazinespictures WHERE ID = '$delpic[ID]'");
		}
		
		$deletecontent = mysql_query("DELETE FROM magazines WHERE MagazineID = '$id'");
		$_SESSION['message'] = 'Magazine deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: admin.php?page=magazine");
	exit;
?>