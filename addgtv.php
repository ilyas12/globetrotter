<?php

	require 'incdatabase.php';
	
	$youtubelink = $_POST['youtubelink'];
	$youtubetitle = $_POST['youtubetitle'];
	$youtubetype = $_POST['youtubetype'];
	
	if($youtubelink && $youtubetitle && $youtubetype) {
		$add = mysql_query("INSERT INTO youtube(YouTubeLink, YouTubeTitle, YouTubeType) VALUES('$youtubelink', '$youtubetitle', '$youtubetype')");
		$_SESSION['message'] = 'GTV added successfully';
	} else {
		$_SESSION['message'] = 'Please fill all the fields';
	}
	
	header("Location: admin.php?page=gtv");
	exit;

?>