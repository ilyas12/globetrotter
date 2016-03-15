<?php
session_cache_expire();
session_start();
ob_start(); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_startup_errors',1);  
ini_set('display_errors',1);
function databaseConnect() {
	$conn = mysql_connect('localhost', 'globetr7_web1', ';c?6pf}=gr.*') or die('Could not connect to databse.');
	mysql_select_db('globetr7_web1') or die('Could not open the database');
}

date_default_timezone_set('Asia/Jakarta');
databaseConnect();

function limit_words($string, $word_limit) {
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
}

function strafter($string, $substring) {
                                $pos = strpos($string, $substring);
                                if ($pos === false)
                                    return $string;
                                else 
                                    return(substr($string, $pos+strlen($substring)));
                            }
                            function strbefore($string, $substring) {
                                $pos = strpos($string, $substring);
                                if ($pos === false)
                                    return $string;
                                else 
                                    return(substr($string, 0, $pos));
                            } 

$limitnews = 8; #item per page
$limitsearch = 8;
$limitmagazine = 8;
$limitgallery = 8;
$limitopinions = 8;
$limitcitiesevents = 8;



if($_GET['page'] == 'news-features' && $_GET['id'] == '') {
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
    if($_GET['tags']!=""){
       $sql = "SELECT * FROM `news-features` WHERE SubType='$_GET[tags]' AND Approval = 1 AND Type = 'News, Features' ORDER BY DateWritten DESC";  
    }else{
	   $sql = "SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'News, Features' ORDER BY DateWritten DESC";
	}
    # find out query stat point
	$start = ($page * $limitnews) - $limitnews;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitnews) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitnews}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';
	}
	$listtags = mysql_query("SELECT SubType FROM `news-features` group by SubType order by SubType ASC")or die(mysql_error());
   
}
if($_GET['page'] == 'search' && $_GET['id'] == '') {
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	$search = $_GET['search'];
	if($search) {
		$searchdb = " AND Title LIKE '%$search%' OR SubTitle LIKE '%$search%' OR Tags LIKE '%$search%' OR Type LIKE '%$search%' OR SubType LIKE '%$search%' ";
	}
	$sub = $_GET['sub'];
	if($sub) {
		$subdb = " AND SubType = '$_GET[sub]' OR EventType = '$_GET[sub]' ";
	}
	$cat = $_GET['cat'];
	if($cat) {
		$catdb = " AND TypeOfCategory = '$_GET[cat]' ";
	}
	# sql query
	$sql = "SELECT * FROM `news-features` WHERE Approval = 1 ".$searchdb.$subdb." ORDER BY DateWritten DESC";
	# find out query stat point
	$start = ($page * $limitsearch) - $limitsearch;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitsearch) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitsearch}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';
	}
}
if($_GET['page'] == 'magazine' && ($_GET['sub'] == '' || $_GET['sub'] == 'all')) {
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
	$sql = "SELECT * FROM magazines WHERE Title != '' ORDER BY Edition DESC";
	# find out query stat point
	$start = ($page * $limitmagazine) - $limitmagazine;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitmagazine) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitmagazine}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';
	}
}
if($_GET['page'] == 'gallery' && $_GET['id'] == '') {
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
	$sql = "SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'Gallery' ORDER BY ID DESC";
	# find out query stat point
	$start = ($page * $limitnews) - $limitnews;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitnews) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitnews}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';
	}
}
#if($_GET['page'] == 'gallery' && ($_GET['id'] == '')) {
#	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
#	$sql = "SELECT * FROM `gallery` WHERE GalleryName != '' ORDER BY GalleryID DESC";
	# find out query stat point
#	$start = ($page * $limitgallery) - $limitgallery;
	# query for page navigation
#	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitgallery) ){
#		$next = ++$page;
#	}
#	$query = mysql_query( $sql . " LIMIT {$start}, {$limitgallery}");
#	if (mysql_num_rows($query) < 1) {
#		$nodatabase = '...No Data Yet...';
#	}
#}

if($_GET['page'] == 'perspectives') {
	if($_GET['u']) {
		$writtenby = " AND WrittenBy = '$_GET[u]' ";
	}
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
	$sql = "SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'Perspectives' ".$writtenby." ORDER BY ID DESC";
	# find out query stat point
	$start = ($page * $limitopinions) - $limitopinions;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitopinions) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitopinions}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';

	}
}

if($_GET['page'] == 'cities-events') {
	$listcities = mysql_query("SELECT EventCities FROM `news-features` group by EventCities order by EventCities ASC")or die(mysql_error());
	if($_GET['sub'] == '') { 
		$_GET['sub'] = '';
	}
    /*
	if($_GET['sub'] == 'nightlife') {
		$subevent = " EventType = '$_GET[sub]' AND ";
	}
	if($_GET['sub'] == 'festival') {
		$subevent = " EventType = '$_GET[sub]' AND ";
	}
	if($_GET['sub'] == 'openings') {
		$subevent = " EventType = '$_GET[sub]' AND ";
	}
	if($_GET['sub'] == 'exhibits') {
		$subevent = " EventType = '$_GET[sub]' AND ";
	}
	if($_GET['sub'] == 'misc') {
		$subevent = " EventType = '$_GET[sub]' AND ";
	}*/
	
	//if($_GET['when'] == '') { 
	//	$_GET['when'] = 'current';
	//}
	if($_GET['when'] == 'current') {
		$today = date("Y-m-d");
		$curpastevent = " EventDate >= '$today' AND ";
	}
	if($_GET['when'] == 'past') {
		$today = date("Y-m-d");
		$curpastevent = " EventDate <= '$today' AND ";
	}
	
	$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	# sql query
	if($_GET['cities']!="all"){
		$sql = "SELECT * FROM `news-features` WHERE ".$curpastevent." Approval = 1 AND Type = 'Cities, Events' And EventCities='$_GET[cities]' ORDER BY EventDate DESC";
	}else{
		$sql = "SELECT * FROM `news-features` WHERE ".$curpastevent." Approval = 1 AND Type = 'Cities, Events' ORDER BY EventDate DESC";
	}
	# find out query stat point
	$start = ($page * $limitcitiesevents) - $limitcitiesevents;
	# query for page navigation
	if( mysql_num_rows(mysql_query($sql)) > ($page * $limitcitiesevents) ){
		$next = ++$page;
	}
	$query = mysql_query( $sql . " LIMIT {$start}, {$limitcitiesevents}");
	if (mysql_num_rows($query) < 1) {
		$nodatabase = '...No Data Yet...';
	}
}

?>