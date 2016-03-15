<?php

	require 'incdatabase.php';
	
	$idir = "images/temp/";
	$ldir = "images/adv/";
	$lresizepx = "996";
	
	function findexts ($filename) 
	{ 
		$filename = strtolower($filename);
		$exts = explode(".", $filename);
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}
	
	function reArrayFiles(&$file_post) {
	
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);
	
		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
	
		return $file_ary;
	}
	
	@include 'photo.php';
	require_once('php_image_magician.php');
	
	
	$Ahbid = $_POST['id'];
	$Chbid = count($Ahbid);
	$advlink = $_POST['advlink'];
	$advdate = $_POST['advdate'];
	
	for($i=1; $i<=$Chbid; $i++) {
		$id = $Ahbid[$i];
		$select = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE ID = '$id' LIMIT 0,1"));
		
		$filephoto = 'gallery'.$i;
		$file_ary = reArrayFiles($_FILES[$filephoto]);
		foreach ($file_ary as $fileimage) {
			if($fileimage != NULL) {
				
				$url = findexts($fileimage['name']);
				$ran = rand();
				$filename = $ran.".".$url;
				//pass the image array to the photo class constructor
				//$photo = new Photo($fileimage);
				
				//$errors = $magicianObj -> resizeImage($lresizepx, 100);
				
				$uploadfile = $ldir.$filename;
				$uploadsucces = move_uploaded_file($fileimage['tmp_name'], $uploadfile);
				
				if($uploadsucces) { 
					unlink($ldir.$select['AdvPic']);
					$insertgallerydb = mysql_query("UPDATE advertisements SET AdvPic = '$filename' WHERE ID = '$id'") or die(mysql_error()); 
					$_SESSION['message'] .= 'Advertisement Picture ('.$select['AdvPosition'].') Edited Successfully<br />';
				}
				
			}
		}
		
		if($select['AdvLink'] == $advlink[$i]) {
		} else {
			
			
			$update = mysql_query("UPDATE advertisements SET AdvLink = '$advlink[$i]', AdvDate = '$advdate[$i]' WHERE ID = '$id'");
			$_SESSION['message'] .= 'Edit Advertisements ('.$select['AdvPosition'].') Succesfully<br />';
		}
	}
	
	header("Location: admin.php?page=advertisements");
	exit;

?>