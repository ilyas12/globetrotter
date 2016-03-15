<?php
	require 'incdatabase.php';
	
	$id = $_GET['id'];
	
	if($id) {
		$content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$id' LIMIT 0,1"));
		
		$delpicdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$id'");
		while($delpic = mysql_fetch_array($delpicdb)) {
			unlink("images/features/".$delpic['GalleryLink']);
			$delete = mysql_query("DELETE FROM `news-features-pictures` WHERE ID = '$delpic[ID]'");
		}
		
		$deletecontent = mysql_query("DELETE FROM `news-features` WHERE ID = '$id'");
		$_SESSION['message'] = 'News/Features deleted succesfully';
	} else {
		 $_SESSION['message'] = 'Invalid';
	}
	header("Location: admin.php?page=articles-events");
	exit;
?>