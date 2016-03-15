<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/users/";
$lresizepx = "400";

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

$username = str_replace("'","\'",$_POST['username']);
$password = str_replace("'","\'",$_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];

if($_POST['magazine_admin']) { $typeadmin .= $_POST['magazine_admin'].', '; }
if($_POST['newsfeatures_admin']) { $typeadmin .= $_POST['newsfeatures_admin'].', '; }
if($_POST['perspectives_admin']) { $typeadmin .= $_POST['perspectives_admin'].', '; }
if($_POST['citiesevents_admin']) { $typeadmin .= $_POST['citiesevents_admin'].', '; }
if($_POST['gallery_admin']) { $typeadmin .= $_POST['gallery_admin'].', '; }

$ctextshort = str_replace("'","\'",$_POST['ctextshort']);
$ctext = str_replace("'","\'",$_POST['ctext']);

if($username && $password && $name) {
$insertmagazinedb = mysql_query("INSERT INTO `users`(Username, Password, Name, Email, ShortDetails, Details, Admin) VALUES('$username', '$password', '$name', '$email', '$ctextshort', '$ctext', '$typeadmin')") or die(mysql_error());

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
				$errors = $photo->doResizeHeight($lresizepx,$ldir,$filename);
				
				if(count($errors) == 0) {
					$insertgallerydb = mysql_query("UPDATE `users` SET ProfPic = '$filename' WHERE Username = '$username' AND Password = '$password'") or die(mysql_error());
					$_SESSION['message'] = 'Added User Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Username, Password and Name have to be filled';
}
header("Location: admin.php?page=users");
exit;
?>