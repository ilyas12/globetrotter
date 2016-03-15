<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/magazines/large/";
$lresizepx = "1200";
$tdir = "images/magazines/thumbnails/";
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

$edition = str_replace("'","\'",$_POST['edition']);
$price = $_POST['price'];
$length = $_POST['length'];
$status = $_POST['status'];
$title = str_replace("'","\'",$_POST['title']);
$ctext = str_replace("'","\'",$_POST['ctext']);

if($title) {
$insertmagazinedb = mysql_query("INSERT INTO magazines(Edition, Price, Length, Status, Title, Text) VALUES('$edition', '$price', '$length', '$status', '$title', '$ctext')") or die(mysql_error());

$selectlast = mysql_fetch_array(mysql_query("SELECT * FROM magazines ORDER BY MagazineID DESC LIMIT 0,1"));
$magazineid = $selectlast['MagazineID'];

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
					$insertgallerydb = mysql_query("INSERT INTO magazinespictures(Image, MagazineID) VALUES('$filename', '$magazineid')") or die(mysql_error());
					$_SESSION['message'] = 'Magazine Upload Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Title has to be filled';
}
header("Location: admin.php?page=magazine");
exit;
?>