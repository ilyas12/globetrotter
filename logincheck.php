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

	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$checkdb = mysql_query("SELECT * FROM users WHERE (Username = '$user' AND Password = '$pass') OR (Email = '$user' AND Password = '$pass')");
	
	$countlogin = mysql_num_rows($checkdb);
	
	if($countlogin > 0) {
		$checkdetail = mysqli_fetch_array(mysql_query("SELECT * FROM users WHERE (Username = '$user' AND Password = '$pass') OR (Email = '$user' AND Password = '$pass') LIMIT 0,1"));
		$_SESSION['login'] = true;
		$_SESSION['adm'] = $checkdetail['Admin'];
		$_SESSION['userid'] = $checkdetail['UserID'];
	} else {
		$_SESSION['message'] = 'Invalid Username or Password, please try again';
		$_SESSION['user'] = $user;
	}

	header("Location: admin.php");
	exit();
?>