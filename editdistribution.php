<?php
	require 'incdatabase.php';
	
	$idir = "images/temp/";
	$ldir = "images/";
	$resizepx = "990";
	
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
	
	$i=0;
	
	$filephoto = 'gallery';
	$file_ary = reArrayFiles($_FILES[$filephoto]);
	
	$title = $_POST['title'];
	$ctext = $_POST['ctext'];
	if($ctext || $title) {
		$edit = mysql_query("UPDATE magazinedistribution SET Title = '$title', Text = '$ctext' WHERE ID = 1");
	}
	
	foreach ($file_ary as $fileimage) {
		if($fileimage != NULL) {
			
			$url = findexts($fileimage['name']);
			$ran = rand();
			$filename = $ran.".".$url;
			//pass the image array to the photo class constructor
			$photo = new Photo($fileimage);
			$i++;
			
			if(count($errors = $photo->validate()) == 0 ) {
				$errors = $photo->doResize($resizepx,$ldir,$filename);
				
				if(count($errors) == 0) {
					$del = mysql_fetch_array(mysql_query("SELECT * FROM magazinedistribution WHERE ID = 1 LIMIT 0,1"));
					unlink('images/'.$del['Image']);
					$edit = mysql_query("UPDATE magazinedistribution SET Image = '$filename' WHERE ID = 1");
					
				    $_SESSION['message'] .= '- Page Edited Succesfully<br />';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
	
	header("Location: admin.php?page=distribution");
	exit;
?>