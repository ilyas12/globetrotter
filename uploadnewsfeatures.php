<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/features/";
$lresizepx = "600";

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

$eventdate = $_POST['eventdate'];
if($eventdate) { $eventdatedb = ", EventDate"; $eventdatevalue = ", '$eventdate'"; }
$eventtype = $_POST['eventtype'];
if($eventtype) { $eventtypedb = ", EventType"; $eventtypevalue = ", '$eventtype'"; }
$eventwhen = $_POST['eventwhen'];
if($eventwhen) { $whendb = ", EventWhen"; $whenvalue = ", '$eventwhen'"; }
$eventwhere = $_POST['eventwhere'];
if($eventwhere) { $wheredb = ", EventWhere"; $wherevalue = ", '$eventwhere'"; }
$eventcities = $_POST['eventcities'];
if($eventcities) { $citiesdb = ", EventCities"; $citiesvalue = ", '$eventcities'"; }
$eventjoin = $_POST['eventjoin'];
if($eventjoin) { $eventjoindb = ", EventJoin"; $eventjoinvalue = ", '$eventjoin'"; }
$googlemap = $_POST['googlemap'];
if($googlemap) { $googlemapdb = ", GoogleMap"; $googlemapvalue = ", '$googlemap'"; }

$section = $_POST['section'];

$checkednews = $_POST['checkednews'];
$checkedfeatures = $_POST['checkedfeatures'];
$checkedcities = $_POST['checkedcities'];
$checkedevents = $_POST['checkedevents'];
if($checkednews) $checkednews .= ",";
if($checkedfeatures) $checkedfeatures .= ",";
if($checkedcities) $checkedcities .= ",";
if($checkedevents) $checkedevents .= ",";
if($section == 'Perspectives') {
	$typeofcategory = 'perspectives';
} elseif($section == 'Gallery') {
	$typeofcategory = 'gallery';
} else {
	$typeofcategory = substr($checkednews.$checkedfeatures.$checkedcities.$checkedevents, 0, -1);
}
$subcategory = $_POST['subcategory'];
$checkedperspective = $_POST['checkedperspective'];
$checkedexclusive = $_POST['checkedexclusive'];
$checkedmemberonly = $_POST['checkedmemberonly'];
$title = str_replace("'","\'",$_POST['title']);
$subtitle = str_replace("'","\'",$_POST['subtitle']);
$quote = str_replace("'","\'",$_POST['quote']);
$tags = $_POST['tags'];
$ctext = str_replace("'","\'",$_POST['ctext']);
$todaydate = date("Y-m-d H:i:s");

if($title && $section) {
$insertmagazinedb = mysql_query("INSERT INTO `news-features`(Title, SubTitle, Exclusive, MemberOnly, Type, TypeOfCategory, SubType, Perspective, Quote, Content, Tags, DateWritten, WrittenBy, Approval".$eventdatedb.$eventtypedb.$whendb.$wheredb.$citiesdb.$eventjoindb.$googlemapdb.") VALUES('$title', '$subtitle', '$checkedexclusive', '$checkedmemberonly', '$section', '$typeofcategory', '$subcategory', '$checkedperspective', '$quote', '$ctext', '$tags', '$todaydate', '$userid', 0".$eventdatevalue.$eventtypevalue.$whenvalue.$wherevalue.$citiesvalue.$eventjoinvalue.$googlemapvalue.")") or die(mysql_error());

$selectlast = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` ORDER BY ID DESC LIMIT 0,1"));
$id = $selectlast['ID'];

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
					if($c == 1) {
						$cover = 1;
					} else {
						$cover = 0;
					}
					$insertgallerydb = mysql_query("INSERT INTO `news-features-pictures`(GalleryLink, GalleryVisible, GalleryCover, NFID) VALUES('$filename', 1, '$cover','$id')") or die(mysql_error());
					$_SESSION['message'] = 'News/Features/Gallery Upload Successfully';
					$c++;
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Section & Title has to be filled';
}
header("Location: admin.php?page=articles-events");
exit;
?>