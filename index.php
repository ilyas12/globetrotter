<?php
include("header.php")
?>
<?php
	$pages = Array(
		'home'  => 'home.php',
		'magazine'  => 'magazine.php',
		'news-features'  => 'news-features.php',
		'search'  => 'search.php',
		'cities-events'  => 'cities-events.php',
		'gtv'  => 'gtv.php',
        'checkout'  => 'checkout.php',
        'cart'  => 'cart.php',
        'thank-you'  => 'thank-you.php',
        'addcart'  => 'addcart.php',
		'remove-cart'=>'removecart.php'
		);
	
	if (isset($_GET['page']) && isset($pages[$_GET['page']])) {
		include($pages[$_GET['page']]);
	} else {
		include("home.php");
	}
?>							
<?php include("footers.php") ?>