<?php
@session_cache_expire();
@session_start();
ob_start(); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors',1);

$conn = mysql_connect('localhost', 'globetr7_web1', ';c?6pf}=gr.*') or die('Could not connect to databse.');
mysql_select_db('globetr7_web1') or die('Could not open the database');

date_default_timezone_set('Asia/Jakarta');

if(!isset($_SESSION['transaksi'])){ 
    $idt = date("YmdHis"); 
    $id=$_GET['id'];
    $price=$_GET['price'];
    $qty=$_GET['qty'];
    $query = mysql_query("SELECT * FROM magazines WHERE MagazineID='$id' limit 1")or die(mysql_error());
    $megazine=mysql_fetch_array($query);
	$vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$id' ORDER BY ID ASC limit 0,1") or die(mysql_error());;
    $vb = mysql_fetch_array($vbdb);
    $image="images/magazines/large/".$vb['Image'];
    $_SESSION['transaksi'][] = array('id'=>$id,"description"=>$megazine['Title'],'price'=>$price,'qty'=>$qty,'image'=>$image,'subtotal'=>$qty*$price); 
}else{
    $id=$_GET['id']; 
    $price=$_GET['price'];
    $qty=$_GET['qty'];
    $query = mysql_query("SELECT * FROM magazines WHERE MagazineID='$id' limit 1")or die(mysql_error());
    $megazine=mysql_fetch_array($query);
	$vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$id' ORDER BY ID ASC limit 0,1") or die(mysql_error());;
    $vb = mysql_fetch_array($vbdb);
    $image="images/magazines/large/".$vb['Image'];
	$found=false;
	//$product=array();
	$new_product=array('id'=>$id,"description"=>$megazine['Title'],'price'=>$price,'qty'=>$qty,'image'=>$image,'subtotal'=>$qty*$price);
	foreach ($_SESSION["transaksi"] as $cart_itm) //loop through session array
            {
				if($cart_itm["id"] == $id){ //the item exist in array
					$qtys=$qty+$cart_itm['qty'];
					$product[] = array('id'=>$id,"description"=>$megazine['Title'],'price'=>$price,'qty'=>$qtys,'image'=>$image,'subtotal'=>$qty*$price); 
					$found=true;
				}else{
					$product[] = array('id'=>$cart_itm["id"],"description"=>$cart_itm["description"],'price'=>$cart_itm["price"],'qty'=>$cart_itm["qty"],'image'=>$cart_itm["image"],'subtotal'=>$cart_itm["subtotal"]); 
				}
			}
		
	if($found == false) //we didn't find item in array
		{
			$product[]=$new_product;
            $_SESSION['transaksi'] = $product;
        }else{
                //found user item in array list, and increased the quantity
            $_SESSION['transaksi'] = $product;
        }
	
}
header("Location: index.php?page=cart");
exit;
?> 