<?php
@session_cache_expire();
@session_start();
ob_start(); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors',1);

$conn = mysql_connect('localhost', 'globetr7_web1', ';c?6pf}=gr.*') or die('Could not connect to databse.');
mysql_select_db('globetr7_web1') or die('Could not open the database');

date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
foreach ($_SESSION["transaksi"] as $cart_itm) //loop through session array var
    {
        if($cart_itm["id"]!=$id){ //item does,t exist in the list
			$product[] = array('id'=>$cart_itm["id"],"description"=>$cart_itm["description"],'price'=>$cart_itm["price"],'qty'=>$cart_itm["qty"],'image'=>$cart_itm["image"],'subtotal'=>$cart_itm["subtotal"]); 
        }
        //create a new product list for cart
        $_SESSION["transaksi"] = $product;
    }
header("Location: index.php?page=cart");
exit;
?>