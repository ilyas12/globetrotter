<?php
require 'incdatabase.php';

$idir = "images/temp/";
$ldir = "images/features/";
$lresizepx = "370";

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

$postdate = $_POST['postdate'];
if($postdate) { $postdatedb = ", DateWritten = '$postdate'"; }
$eventdate = $_POST['eventdate'];
if($eventdate) { $eventdatedb = ", EventDate = '$eventdate'"; }
$eventtype = $_POST['eventtype'];
if($eventtype) { $eventtypedb = ", EventType = '$eventtype'"; }
$when = $_POST['eventwhen'];
if($when) { $whendb = ", EventWhen = '$when'"; }
$where = $_POST['eventwhere'];
if($where) { $wheredb = ", EventWhere = '$where'"; }
$googlemap = $_POST['googlemap'];
if($googlemap) { $googlemapdb = ", GoogleMap = '$googlemap'"; }
$section = $_POST['section'];
if($section) { $sectiondb = ", Type = '$section'"; }
$eventcities = $_POST['eventcities'];
if($eventcities) { $citiesdb = ", EventCities = '$eventcities'"; }

$checkedexclusive = $_POST['checkedexclusive'];
$checkedmemberonly = $_POST['checkedmemberonly'];
$checkedexclusivedb = ", Exclusive = '$checkedexclusive'";
$checkedmemberonlydb = ", MemberOnly = '$checkedmemberonly'";
$checkedperspective = $_POST['checkedperspective'];
$checkedperspectivedb = ", Perspective = '$checkedperspective'";

$subcategory = $_POST['subcategory'];
if($subcategory) { $subcategorydb = ", SubType = '$subcategory'"; }

$newfeaturesid = $_POST['newfeaturesid'];
$title = str_replace("'","\'",$_POST['title']);
$subtitle = str_replace("'","\'",$_POST['subtitle']);
$quote = str_replace("'","\'",$_POST['quote']);
$tags = $_POST['tags'];
$ctext = str_replace("'","\'",$_POST['ctext']);
$visibleatbanner = $_POST['visibleatbanner'];
$approval = $_POST['approval'];

$checkednews = $_POST['checkednews'];
$checkedfeatures = $_POST['checkedfeatures'];
$checkedcities = $_POST['checkedcities'];
$checkedevents = $_POST['checkedevents'];
$write = $_POST['userid'];
if($checkednews) $checkednews .= ",";
if($checkedfeatures) $checkedfeatures .= ",";
if($checkedcities) $checkedcities .= ",";
if($checkedevents) $checkedevents .= ",";
if($section == 'Perspectives') {
	$typeofcategory = 'persepectives';
} elseif($section == 'Gallery') {
	$typeofcategory = 'gallery';
} else {
	$typeofcategory = substr($checkednews.$checkedfeatures.$checkedcities.$checkedevents, 0, -1);
}
$typeofcategorydb = ", TypeOfCategory = '".$typeofcategory."'";

if($newfeaturesid && $title) {
$insertmagazinedb = mysql_query("UPDATE `news-features` SET WrittenBy = '$write', Title='$title', SubTitle='$subtitle', Quote='$quote', Tags='$tags', Content='$ctext', Approval = '$approval', VisibleAtBanner = '$visibleatbanner'".$eventdatedb.$sectiondb.$postdatedb.$typeofcategorydb.$checkedperspectivedb.$checkedexclusivedb.$subcategorydb.$whendb.$wheredb.$citiesdb.$googlemapdb.$eventtypedb.$checkedmemberonlydb." WHERE ID = '$newfeaturesid'") or die(mysql_error());

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
					$insertgallerydb = mysql_query("INSERT INTO `news-features-pictures`(GalleryLink, GalleryVisible, NFID) VALUES('$filename', 1,'$newfeaturesid')") or die(mysql_error());
					$_SESSION['message'] = 'News/Features Edited Successfully';
				} else {
					$_SESSION['message'] = 'Invalid';
				}
			}
		}
	}
} else {
	$_SESSION['message'] = 'Title has to be filled';
}
header("Location: editnewsfeatures.php?id=".$newfeaturesid);
exit;
?>