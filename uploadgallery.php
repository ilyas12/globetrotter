<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/gallery/large/";
$lresizepx = "1200";
$tdir = "images/gallery/thumbnails/";
$tresizepx = "600";

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

$galname = str_replace("'","\'",$_POST['galname']);
$galsubname = str_replace("'","\'",$_POST['galsubname']);
$ctext = str_replace("'","\'",$_POST['ctext']);

if($galname) {
$insertmagazinedb = mysql_query("INSERT INTO gallery(GalleryName, GallerySubName, GalleryDetails) VALUES('$galname', '$galsubname', '$ctext')") or die(mysql_error());

$selectlast = mysql_fetch_array(mysql_query("SELECT * FROM gallery ORDER BY GalleryID DESC LIMIT 0,1"));
$galleryid = $selectlast['GalleryID'];
$c = 1;

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
					if($c == 1) {
						$cover = 1;
					} else {
						$cover = 0;
					}
					$insertgallerydb = mysql_query("INSERT INTO pictures(PictureLink, GalleryCover, GalleryID) VALUES('$filename', '$cover', '$galleryid')") or die(mysql_error());
					$c++;
					$_SESSION['message'] = 'Gallery Upload Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Gallery Name has to be filled';
}
header("Location: admin.php?page=gallery");
exit;
?>