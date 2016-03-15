<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/gallery/large/";
$lresizepx = "990";
$tdir = "images/gallery/thumbnails/";
$tresizepx = "445";

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

$galleryid = $_POST['galleryid'];
$galname = str_replace("'","\'",$_POST['galname']);
$galsubname = str_replace("'","\'",$_POST['galsubname']);
$ctext = str_replace("'","\'",$_POST['ctext']);

if($galleryid && $galname) {
$insertmagazinedb = mysql_query("UPDATE `gallery` SET GalleryName='$galname', GallerySubName='$galsubname', GalleryDetails='$ctext' WHERE GalleryID = '$galleryid'") or die(mysql_error());

	foreach ($file_ary as $fileimage) {
		if($fileimage != NULL) {
			
			$url = findexts($fileimage['name']);
			$ran = rand();
			$filename = $ran.".".$url;
			//pass the image array to the photo class constructor
			$photo = new Photo($fileimage);
			$i++;
			
			if(count($errors = $photo->validate()) == 0 ) {
				$errors = $photo->doResize($lresizepx,$ldir,$filename);
				$errors = $photo->doResize($tresizepx,$tdir,$filename);
				
				if(count($errors) == 0) {
					$insertgallerydb = mysql_query("INSERT INTO `pictures`(PictureLink, GalleryID) VALUES('$filename', '$galleryid')") or die(mysql_error());
					$_SESSION['message'] = 'Gallery Edited Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Gallery Name has to be filled';
}
header("Location: editgallery.php?id=".$galleryid);
exit;
?>