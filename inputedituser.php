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

$userid = $_POST['userid'];
$username = str_replace("'","\'",$_POST['username']);
$password = str_replace("'","\'",$_POST['password']);
if($password) { $fillpassword = ", Password = '$password'"; }
$name = $_POST['name'];
$email = $_POST['email'];

if($_POST['magazine_admin']) { $typeadmin .= $_POST['magazine_admin'].', '; }
if($_POST['newsfeatures_admin']) { $typeadmin .= $_POST['newsfeatures_admin'].', '; }
if($_POST['perspectives_admin']) { $typeadmin .= $_POST['perspectives_admin'].', '; }
if($_POST['citiesevents_admin']) { $typeadmin .= $_POST['citiesevents_admin'].', '; }
if($_POST['gallery_admin']) { $typeadmin .= $_POST['gallery_admin'].', '; }
if($_POST['members_admin']) { $typeadmin .= $_POST['members_admin'].', '; }

$ctextshort = str_replace("'","\'",$_POST['ctextshort']);
$ctext = str_replace("'","\'",$_POST['ctext']);

if($name) {
$insertmagazinedb = mysql_query("UPDATE `users` SET Username='$username', Name='$name', Email='$email', ShortDetails='$ctextshort', Details='$ctext', Admin='$typeadmin'".$fillpassword." WHERE UserID = '$userid'") or die(mysql_error());

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
					$con = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE UserID = '$userid' LIMIT 0,1"));
					unlink("images/users/".$con['ProfPic']);
					
					$insertgallerydb = mysql_query("UPDATE `users` SET ProfPic = '$filename' WHERE UserID = '$userid'") or die(mysql_error());
					$_SESSION['message'] = 'User Edited Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Name has to be filled';
}
header("Location: edituser.php?id=".$userid);
exit;
?>