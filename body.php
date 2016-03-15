<?php require 'incdatabase.php'; ?>
<?php
	$_SESSION['lasturl'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="mindmap indonesia" />
<meta name="viewport" content="width=1000">
<title><?php if($_GET['t']) {  echo strtoupper(str_replace("-"," ",$_GET['t'])).' | '; } ?><?php if($_GET['page']) {  echo strtoupper(str_replace("-","/",$_GET['page'])).' | '; } ?>GLOBETROTTER - A TRANSATLANTIC INTELLIGENCE BUREAU</title>
<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
<LINK rel="stylesheet" href="files/styles.css" type="text/css" />

<script language="JavaScript" type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="files/jquery.hoverIntent.minified.js"></script>
<script language="JavaScript" type="text/javascript" src="files/jqueryscript.js"></script>
<script type="text/javascript" src="files/jquery-ias.min.js"></script>

<!-- Add fancyBox -->
<script type="text/javascript" src="files/fancybox3/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="files/fancybox3/jquery.fancybox.css" media="screen" />

<!-- Add fancyBox Thumbnail helper -->
<link rel="stylesheet" type="text/css" href="files/fancybox3/jquery.fancybox-thumbs.css" />
<script type="text/javascript" src="files/fancybox3/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(".popupclosed").fancybox({
			width: 350, // or whatever
			height: 100,
			theme : 'dark',
							theme : 'dark',
		afterLoad: function(){
				setTimeout( function() {$.fancybox.close(); },1500); // 1500 = 1.5 secs
			}
		});
		jQuery(".pdf_popup").fancybox({
            fitToView: false,
			width: '95%', // or whatever
			height: '95%',
			openEffect  : 'none',
			closeEffect : 'none',
			iframe : {
				scrolling : 'yes',
				preload: false
			}
		});
	});
	jQuery(document).ready(function() {
		jQuery(".fancybox").fancybox({
			openEffect	: 'elastic',
			closeEffect	: 'elastic',
			fitToView	: true,
			theme : 'light',
			helpers	: {
				title	: {
					type: 'over'
				},
				thumbs	: {
					width	: 50,
					height	: 50
				}
			}
		});
	});
</script>
<!---- END FANCYBOX POPUP ---->

<!---- START IDANGEROUS SWIPER ---->
<link rel="stylesheet" href="files/idangerous.swiper.css">
<link rel="stylesheet" href="files/idangerous.swiper.scrollbar.css">

<script src="files/idangerous.swiper.min.js"></script>
<script src="files/idangerous.swiper.scrollbar.min.js"></script>
<!---- END IDANGEROUS SWIPER ---->

<?php
	$date = new DateTime();
	$current_timestamp = $date->getTimestamp();
?>
<script>
	flag = true;
	timer = '';
	setInterval(function(){phpJavascriptClock();},1000);

	function phpJavascriptClock()
	{
		if ( flag ) {
			timer = <?php echo $current_timestamp;?>*1000;
		}
		var d = new Date(timer);
		day_array = new Array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
		months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
		month_array = new Array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'Augest', 'September', 'October', 'November', 'December');
		
		currentYear = d.getFullYear();
		month = d.getMonth();
		day = d.getDay();
		
		var currentMonth = months[month];
		var currentMonth1 = month_array[month];
		var currentDate = d.getDate();
		currentDate = currentDate < 10 ? '0'+currentDate : currentDate;
		var currentDay = day_array[day];
		
		
		var hours = d.getHours();
		var minutes = d.getMinutes();
		var seconds = d.getSeconds();

		var ampm = hours >= 12 ? 'PM' : 'AM';
		//hours = hours % 12;
		hours = hours ? hours : 12; // the hour ’0' should be ’12'
		minutes = minutes < 10 ? '0'+minutes : minutes;
		seconds = seconds < 10 ? '0'+seconds : seconds;
		var strTime = hours + ':' + minutes+ ':' + seconds + ' ';
		document.getElementById("clock").innerHTML= currentDay + ' ' + currentDate + ' ' + currentMonth1 + ' ' + currentYear + ', ' + strTime;

		flag = false;
		timer = timer + 1000;
	}
	jQuery(document).ready(function() {
		var top = jQuery('#navigation_float').offset().top - parseFloat(jQuery('#navigation').css('marginTop').replace(/auto/, 0));
		jQuery(window).scroll(function (event) {
			// what the y position of the scroll is
			var y = jQuery(this).scrollTop();
			
			// whether that's below the form
			if (y >= top) {
			  // if so, ad the fixed class
			  jQuery('#navigation_float').addClass('fixed');
			} else {
			  // otherwise remove it
			  jQuery('#navigation_float').removeClass('fixed');
			}
		});
		
		
		<?php if($_GET['id'] && $_GET['page'] != 'gallery') { ?>
		var length = jQuery('#leftarticlefixed').height() - jQuery('.left25').height() + jQuery('#leftarticlefixed').offset().top;
		var topdistance = 100;
    	jQuery(window).scroll(function () {
			var scroll = jQuery(this).scrollTop();
			var height = jQuery('.left25').height() + 'px';
			if (scroll < (jQuery('#leftarticlefixed').offset().top) - topdistance) {
				jQuery('.left25').css({
					'position': 'absolute',
					'top': '0'
				});
			} else if (scroll > (length-topdistance-42)) {
				jQuery('.left25').css({
					'position': 'absolute',
					'bottom': '0',
					'top': 'auto'
				});
			} else {
				jQuery('.left25').css({
					'position': 'fixed',
					'top': topdistance + 'px',
					'height': height
				});
			}
		});
		<?php } ?>
		<?php if($_GET['page'] == 'cities-events' || $_GET['page'] == 'magazine') { ?>
		var top222 = jQuery('#link_content_fixed').offset().top - parseFloat(jQuery('#link_content').css('marginTop').replace(/auto/, 0))-90;
		jQuery(window).scroll(function (event) {
			// what the y position of the scroll is
			var y222 = jQuery(this).scrollTop();
			
			// whether that's below the form
			if (y222 >= top222) {
			  // if so, ad the fixed class
			  jQuery('#link_content_fixed').addClass('fixed');
			  jQuery('#link_content').css('background', '#000');
			} else {
			  // otherwise remove it
			  jQuery('#link_content_fixed').removeClass('fixed');
			  jQuery('#link_content').css('background', '#F2F2F2');
			}
		});
		<?php } ?>
	});
</script>
<!---
<script src="http://w.soundcloud.com/player/api.js"></script>
<script>
	jQuery(document).ready(function() {
		var widget = SC.Widget(document.getElementById('soundcloud_widget'));
		widget.bind(SC.Widget.Events.READY, function() {
		});
		widget.bind(SC.Widget.Events.PLAY, function() {
			widget.getCurrentSound(function(music){
				//write the title in a div with the id "title"
				document.getElementById('footer_songtitle').innerHTML = music.title;
			});
		});
		jQuery('#gradio_play').click(function() {
			widget.play();
			jQuery('#gradio_play').attr("src","images/button_play_active.png");
			jQuery('#gradio_pause').attr("src","images/button_pause.png");
		});
		jQuery('#gradio_pause').click(function() {
			widget.pause();
			jQuery('#gradio_play').attr("src","images/button_play.png");
			jQuery('#gradio_pause').attr("src","images/button_pause_active.png");
		});
		jQuery('#gradio_next').click(function() {
			widget.next();
			widget.play();
			jQuery('#gradio_pause').attr("src","images/button_pause.png");
		});
		jQuery("#gradio_next").mousedown(function() {
			jQuery('#gradio_play').attr("src","images/button_play.png");
			jQuery('#gradio_next').attr("src","images/button_next_active.png");
		});
		jQuery("#gradio_next").mouseup(function() {
			jQuery('#gradio_play').attr("src","images/button_play_active.png");
			jQuery('#gradio_next').attr("src","images/button_next.png");
		});
		
		jQuery('#gradio_minimize').click(function() {
			jQuery('#footer').animate({"bottom": "-=50px"}, "fast");
			jQuery('#gradiobutton').animate({"bottom": "+=30px"}, "fast");
		});
		jQuery('#gradiobutton').click(function() {
			jQuery('#footer').animate({"bottom": "+=50px"}, "fast");
			jQuery('#gradiobutton').animate({"bottom": "-=30px"}, "fast");
		});
	});
</script>
--->

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "909bdf28-89a0-432e-a2e1-80d4d5c59535", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
</head>

<body>
<!-- SCM Music Player http://scmplayer.net -->
<!---<script type="text/javascript" src="http://localhost/globetrotter/files/scm/script.js" 
data-config="{'skin':'skins/globe/skin.css','volume':50,'autoplay':false,'shuffle':false,'repeat':1,'placement':'bottom','showplaylist':false,'playlist':'http://soundcloud.com/casadesoul'}" ></script>--->
<!-- SCM Music Player script end -->
<script type="text/javascript" src="files/scrolltop.js"></script>
<div id="body_div">
	<div id="main_body">
    	<!---<div id="subscribe_div">
        	<div id="subscribe_div_center">
            	<div class="subscribetitle1">How Would You Like<br />To Read GlobeTrotter</div>
                <br />
                <img src="images/subscribeex.jpg" width="650" style="margin-left: -80px;" />
            </div>
        </div>--->
       	<?php $adva = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'A' LIMIT 0,1")); ?>
        <?php if(file_exists("images/adv/".$adva['AdvPic'])) { ?>
        <div id="adv_a">
        	<div class="content_center_center">
            	<a target="_blank" href="<?php echo $adva['AdvLink']; ?>"><img src="images/adv/<?php echo $adva['AdvPic']; ?>" width="996" height="100" /></a>
            </div>
        </div>
        <?php } ?>
    	<div id="top">
        	<div id="top_center">
            	<div id="top_center_center">
                    <!---<div id="subscribe_button_top"><div id="subscribe_top_button"><img src="images/subscribe_button_top.png" width="124" height="39" /></div></div>--->
                    <div id="timedate">
                        <div id="clock"></div>
                    </div>
                    <div class="top_nav">
                        <a href="body.php?page=stockists">Stockists</a>
                        <a href="body.php?page=network">Network</a>
                        <a href="body.php?page=shop">Shop</a>
                        <a href="body.php?page=submission">Submissions</a>
                        <a href="body.php?page=subscribe">Subscribe</a>
                    </div>
                    <div id="searchtop">
                        <div style="padding: 0;" class="search_li">
                            <form action="body.php" method="get" id="search_div">
                                <input type="hidden" name="page" value="search" />
                                <input type="text" class="search_input" name="search" placeholder="<?php if($_GET['search']) { ?><?php echo $_GET['search']; ?><?php } else { ?>Search...<?php } ?>" id="search" />
                                <input class="search_submit" type="submit" value=" " />
                            </form>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
        
        <div id="navigation">
        	<div id="navigation_float">
                <div id="navigation_center">
                	<div id="navigation_center_center">
                    	<div id="nav_logo_mobile"><a href="body.php"><img src="images/g_home_button.jpg" width="44" height="44" /></a></div>
                        
                        
                        <div class="nav_li" id="nav_li11"><a class="nav_a"<?php if($_GET['page'] == 'news-features') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=news-features">News/Features</a></div>
                        <div class="nav_li" id="nav_li12"><a class="nav_a"<?php if($_GET['page'] == 'perspectives') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=perspectives">Perspectives</a></div>
                        <div class="nav_li" id="nav_li13"><a class="nav_a"<?php if($_GET['page'] == 'cities-events') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=cities-events">Cities/Events</a></div>
                        
                        <div style="padding: 2px 0; z-index: 60;" id="nav_list_down"><img src="images/nav_list_down.png" width="40" height="40" /></div>
                    	<div id="nav_logo_main" style="padding: 20px 0 2px 0; z-index: 60; float: left;"><a style="" class="nav_a_logo" href="body.php"><img src="images/logo_globe_trotter.jpg" width="250" /></a></div>
                        <ul class="nav_ul">
                            <li class="nav_li" id="nav_li1"><a class="nav_a"<?php if($_GET['page'] == 'news-features') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=news-features">News/Features</a></li>
                            <li class="nav_li" id="nav_li2"><a class="nav_a"<?php if($_GET['page'] == 'perspectives') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=perspectives">Perspectives</a></li>
                            <li class="nav_li" id="nav_li3"><a class="nav_a"<?php if($_GET['page'] == 'cities-events') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=cities-events">Cities/Events</a></li>
                            <li class="nav_li"><a class="nav_a_small"<?php if($_GET['page'] == 'gallery') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=gallery">Gallery</a></li>
                            <li class="nav_li"><a class="nav_a_small"<?php if($_GET['page'] == 'magazine') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=magazine">Magazine</a></li>
                            <li class="nav_li"><a class="nav_a_small"<?php if($_GET['page'] == 'gtv') { ?> style="background: #000; color: #FFF;"<?php } ?> href="body.php?page=gtv">G.TV</a></li>
                            <li class="nav_li" id="signup_button">
                                <a href="Javascript:void(0)" class="nav_a_small <?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Sign Up Success" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['membersigninmessage'] == 'Incorrect Email or Password' || $_SESSION['memberareamessage'] == "Already one of our member") { ?> nav_a_black_active<?php } ?>">Login</a>
                                <?php if($_SESSION['login'] == false) { ?>
                                <div id="signup_div"<?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['membersigninmessage'] == 'Incorrect Email or Password' || $_SESSION['memberareamessage'] == "Already one of our member" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: block;"<?php } ?>>
                                    <div id="signupform"<?php if($_SESSION['membersigninmessage'] == 'Incorrect Email or Password') { ?> style="display: none;"<?php } ?><?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: block;"<?php } ?>>
                                        <div class="signuptitle">SIGN UP</div>
                                        <div class="border"></div>
                                        <br />
                                        <?php if($_SESSION['memberareamessage'] == "Sign Up Success") { ?>
                                            <?php echo '<div class="notification_success">'.$_SESSION['memberareamessage'].'</div>'; ?>
                                        <?php } else { ?>
                                        <?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email") { echo '<div class="notification_error">'.$_SESSION['memberareamessage'].'</div>'; } ?>
                                        <form action="signupmember.php" method="post" id="signupmember">
                                            <input type="text" name="email" placeholder="Email Address"  /><br />
                                            <input type="text" name="name" placeholder="Display Name"  /><br />
                                            <input type="password" name="password" placeholder="Password"  /><br />
                                            <input type="text" name="location" placeholder="Location (Country, City)"  /><br />
                                            <input type="text" name="gender" placeholder="Gender (Male/Female)"  /><br />
                                            <select name="agerange">
                                            	<option value="">Age Range</option>
                                            	<option value="Below 18">Below 18</option>
                                            	<option value="19-25">19-25</option>
                                            	<option value="26-30">26-30</option>
                                            	<option value="31-35">31-35</option>
                                            	<option value="Above 36">Above 36</option>
                                            </select>
                                            <input type="submit" value="SIGN UP" /><br />
                                        </form>
                                        <?php } ?>
                                        <br />
                                        <div class="border"></div>
                                        <br />
                                        <?php if($_SESSION['memberareamessage'] == "Sign Up Success") { ?>
                                        Please <span class="signinbutton">Sign in</span>
                                        <?php } else { ?>
                                        already have an account? <span class="signinbutton">Sign in</span>
                                        <?php } ?>
                                    </div>
                                    <div id="signinform"<?php if($_SESSION['membersigninmessage'] == 'Incorrect Email or Password') { ?> style="display: block;"<?php } ?><?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: none;"<?php } ?>>
                                        <div class="signuptitle">SIGN IN</div>
                                        <div class="border"></div>
                                        <br />
                                        <?php if($_SESSION['membersigninmessage'] == "Incorrect Email or Password") { echo '<div class="notification_error">'.$_SESSION['membersigninmessage'].'</div>'; } ?>
                                        <form action="signincheck.php" method="post" id="signupmember">
                                            <input type="text" name="email" placeholder="Email Address"  /><br />
                                            <input type="password" name="password" placeholder="Password"  /><br />
                                            <input type="submit" value="SIGN IN" /><br />
                                        </form>
                                        <br />
                                        <a href="Javascript:void();" id="forgotbutton">Forgot your password?</a>
                                        <br /><br />
                                        <div class="border"></div>
                                        <br />
                                        Click here for <span id="signupbutton">Sign up</span>
                                    </div>
                                    <div id="forgotpassworddiv">
                                        <div class="signuptitle">Forgot Your Password</div>
                                        <div class="border"></div>
                                        <br />
                                        <form action="forgotpass.php" method="post" id="signupmember">
                                            <input type="text" name="email" placeholder="Email Address"  /><br />
                                            <input type="submit" value="FORGOT" /><br />
                                        </form>
                                        <br />
                                        <div class="border"></div>
                                        <br />
                                        already have an account? <span class="signinbutton">Sign in</span>
                                    </div>
                                </div>
                                <?php 
									unset($_SESSION['memberareamessage']); 
								 	unset($_SESSION['membersigninmessage']);
								?>
                                <?php } else { ?>
                                <div id="signup_div">
                                    <div class="signuptitle">Hi, <span style="font-style: italic;"><?php echo $_SESSION['Name']; ?></span></div>
                                    <div class="border"></div>
                                    <br />
                                    <a href="logout.php">Logout</a>
                                </div>
                                <?php } ?>
                            </li>
                            <li class="nav_li" id="socmed_button">
                                <a class="nav_a_small_socmed" style="" target="_blank" href="http://www.facebook.com/"><img onmouseover="$(this).attr('src','images/socmed/FB-RO.png')" onmouseout="$(this).attr('src','images/socmed/FB1.png')" src="images/socmed/FB1.png" width="24" height="24" /></a>
                                <a class="nav_a_small_socmed" style="" target="_blank" href="http://www.twitter.com/"><img onmouseover="$(this).attr('src','images/socmed/Twitter-RO.png')" onmouseout="$(this).attr('src','images/socmed/Twitter1.png')" src="images/socmed/Twitter1.png" width="24" height="24" /></a>
                                <a class="nav_a_small_socmed" style="" target="_blank" href="http://www.instagram.com/"><img onmouseover="$(this).attr('src','images/socmed/Insta-RO.png')" onmouseout="$(this).attr('src','images/socmed/Insta.png')" src="images/socmed/Insta.png" width="24" height="24" /></a>
                                <a class="nav_a_small_socmed" style="" target="_blank" href="http://www.youtube.com/"><img onmouseover="$(this).attr('src','images/socmed/Youtube-RO.png')" onmouseout="$(this).attr('src','images/socmed/Youtube.png')" src="images/socmed/Youtube.png" width="24" height="24" /></a>
                            </li>
                            <div style="clear: both;"></div>
                        </ul>
                        <div style="clear: both;"></div>
                    </div>
                    <div id="socmed_div">
                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                        <span class='st_instagram_hcount' displayText='Instagram Badge' st_username='globetrottermag'></span>
                        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                        <span class='st_twitterfollow_hcount' displayText='Twitter Follow' st_username='globetrottermag '></span>
                        <span class='st_youtube_hcount' displayText='Youtube Subscribe' st_username='casadesoul'></span>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        
    </div>
    <div style="clear: both;"></div>
    
    <?php if($_GET['page'] == '') { ?>
    <div id="banner">
        <!----- BANNER ----->
        	<?php include 'idangerous.swiper.config.php'; ?>
            <a class="arrow-left" href="Javascript: void(0)"></a> 
            <a class="arrow-right" href="Javascript: void(0)"></a>
        	<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php $bannerhomedb = mysql_query("SELECT * FROM `news-features` WHERE VisibleAtBanner = 1 AND Approval = 1 ORDER BY DateWritten DESC") or die(mysql_error()); ?>
                    <?php while($bannerhome = mysql_fetch_array($bannerhomedb)) { ?>
                    <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$bannerhome[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,1")); ?>
                    <?php 
						if(strpos($bannerhome['Type'],'Cities') !== false || strpos($bannerhome['Type'],'Events') !== false) {
							$pagelink = 'cities-events';
						} else {
							$pagelink = 'news-features';
						}
						$link = 'body.php?page='.$pagelink.'&id='.$bannerhome['ID'].'&t='.str_replace(" ","-",$bannerhome['Title']); 
					?>
                	<div class="swiper-slide">
                    	<img src="images/features/<?php echo $covpic['GalleryLink']; ?>" height="370" />
                        <div class="black_bar">
                        	<a href="<?php echo $link; ?>">
                            <div class="bgopac_black"></div>
                            <div class="text_bgopac">
                                <div class="banner_content">
	                            	<div class="short_line_yellow"></div>
                                    <div class="banner_subtitle2" style=""><span style="color:#999;"><?php echo ucwords(str_replace(","," and ",$bannerhome['TypeOfCategory'])); ?></span> | <?php if($pagelink == 'cities-events') { echo $bannerhome['EventType']; } else { echo $bannerhome['SubType']; } ?></div>
                                    <div class="banner_title2"><?php echo $bannerhome['Title']; ?></div>
                                    <div class="banner_content_inside"><?php echo $bannerhome['SubTitle']; ?></div>
                                </div>
                            </div>
	                        </a>
                        </div>
                    </div>
                    <?php } ?>
            	</div>
           	</div>
            <!-- Scrollbar: -->
            <div class="swiper-scrollbar"></div>  
            
    </div>
    <div id="content">
    	<div id="content_center">
        
        	<div class="content_content">
            	<h1 class="content_title" style="border-top: 0;">NEWS/FEATURES</h1>
                <?php $newsfeatureshomedb = mysql_query("SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'News, Features' ORDER BY DateWritten DESC LIMIT 0,4") or die(mysql_error()); ?>
                <?php if($countart = mysql_num_rows($newsfeatureshomedb) == 0) { echo '<div class="nodatabase">...No Data Yet...</div>';  }?>
                <?php $ad = 1; ?>
				<?php while($newsfeatureshome = mysql_fetch_array($newsfeatureshomedb)) { ?>
                <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$newsfeatureshome[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,1")); ?>
                <?php 
                    $pagelink = 'news-features';
					if($newsfeatureshome['MemberOnly'] == true) { 
						if($_SESSION['login'] == true) {
							$enablemember = true;
						} else {
							$enablemember = false;
						}
					} else {
						$enablemember = true;
					}
					$link = 'body.php?page='.$pagelink.'&id='.$newsfeatureshome['ID'].'&t='.str_replace(" ","-",$newsfeatureshome['Title']); 
					$link2 = 'body.php?page=search&sub='.$newsfeatureshome['SubType']."&cat=".$newsfeatureshome['TypeOfCategory'];
                ?>
                <div class="left50">
                	<?php if($enablemember == false) { ?>
                    <script>
						jQuery(document).ready(function() {
							jQuery('.enablemember').hover(
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'none');
									jQuery('.heightvenuecontentmember', this).css('display', 'block');
								},
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'block');
									jQuery('.heightvenuecontentmember', this).css('display', 'none');
								}
							);
						});
					</script>
                    <?php } ?>
                    <a href="<?php echo $link; ?>">
                        <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                            <div class="eventstype"><?php echo str_replace(","," and ",$newsfeatureshome['TypeOfCategory']); ?><?php if($newsfeatureshome['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $newsfeatureshome['SubType']; ?></a><?php } ?></div>
                            <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                <?php if($enablemember == true) { ?>
                                <div class="hoverimg"></div>
                                <?php } ?>
                            </div>
                            <div class="eventicon" style="width: 100%;">
                                <div class="content_title1" style="height: 60px;"><?php echo $newsfeatureshome['Title']; ?></div>
                                <div class="short_line_yellow"></div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="inside_hidden">
                                <div class="heightvenuecontent">
                                <p><?php echo $newsfeatureshome['SubTitle']; ?></p>
                                </div>
                                <?php if($enablemember == false) { ?>
                                <div class="heightvenuecontentmember">
                                    <?php include 'messagememberpost.php'; ?>
                                </div>
                                <?php } ?>
                            </div>
                            <br />
                            <div class="content_inside">
                                <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$newsfeatureshome[WrittenBy]' LIMIT 0,1")); ?>
                                <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($newsfeatureshome['DateWritten'])); ?></p></div>
                                <div style="clear: both;"></div>
                                <!---<div class="eventsocmed">
                                    <a class="button_grey" href="<?php echo $link; ?>">Read More</a>&nbsp;&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                </div>---->
                            </div>
                        </div>
                    </a>
                </div>
					<?php if($ad == 2) { ?>
                        <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                        <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                        <div style="clear: both;"></div>
                        <div id="adv_a" style="margin-bottom: 15px;">
                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <?php $ad++; ?>
                <?php } ?>
                <div style="clear: both;"></div>
                <div class="view_all_button"><a href="body.php?page=news-features">View All News/Features</a></div>
            </div>
            
            <div class="content_content">
            	<h1 class="content_title">PERSPECTIVES</h1>
                <?php $citieseventshomedb = mysql_query("SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'Perspectives' ORDER BY ID DESC LIMIT 0,3") or die(mysql_error()); ?>
                <?php if($countart = mysql_num_rows($citieseventshomedb) == 0) { echo '<div class="nodatabase">...No Data Yet...</div>';  }?>
				<?php while($citieseventshome = mysql_fetch_array($citieseventshomedb)) { ?>
                <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$citieseventshome[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,1")); ?>
                <?php 
					if($citieseventshome['Type'] != 'Cities, Events') {
                    	$pagelink = 'news-features';
					} else {
                    	$pagelink = 'cities-events';
					}
					if($citieseventshome['MemberOnly'] == true) { 
						if($_SESSION['login'] == true) {
							$enablemember = true;
						} else {
							$enablemember = false;
						}
					} else {
						$enablemember = true;
					}
                    $link = 'body.php?page='.$pagelink.'&id='.$citieseventshome['ID'].'&t='.str_replace(" ","-",$citieseventshome['Title']); 
					$link2 = 'body.php?page=search&sub='.$citieseventshome['SubType']."&cat=".$citieseventshome['TypeOfCategory'];
                ?>
                <div class="left31">
                	<?php if($enablemember == false) { ?>
                    <script>
						jQuery(document).ready(function() {
							jQuery('.enablemember').hover(
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'none');
									jQuery('.heightvenuecontentmember', this).css('display', 'block');
								},
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'block');
									jQuery('.heightvenuecontentmember', this).css('display', 'none');
								}
							);
						});
					</script>
                    <?php } ?>
                    <a href="<?php echo $link; ?>">
                        <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                            <div class="eventstype"><?php echo str_replace(","," and ",$citieseventshome['TypeOfCategory']); ?><?php if($citieseventshome['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $citieseventshome['SubType']; ?></a><?php } ?></div>
                            <div class="img50height"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                    <?php if($enablemember == true) { ?>
                                    <div class="hoverimg"></div>
                                    <?php } ?>
                            </div>
                            <div class="eventicon" style="width: 100%;">
                                <div class="content_title1" style="height: 60px;"><?php echo $citieseventshome['Title']; ?></div>
                                <div class="short_line_yellow"></div>
                            </div>
                            <div style="clear: both;"></div>
                            <br />
                            <div class="content_inside">
                                <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$citieseventshome[WrittenBy]' LIMIT 0,1")); ?>
                                <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($citieseventshome['DateWritten'])); ?></p></div>
                                <div style="clear: both;"></div>
                                <!---<div class="heightvenuecontent">
                                <p><?php echo $citieseventshome['SubTitle']; ?></p>
                                </div>
                                <?php if($enablemember == false) { ?>
                                <div class="heightvenuecontentmember">
                                    <?php include 'messagememberpost.php'; ?>
                                </div>
                                <?php } ?>
                                <div class="eventsocmed">
                                    <?php
                                        if($citieseventshome['Type'] != 'Cities, Events') {
                                            $buttonreadjoin = '<a class="button_grey" href="'.$link.'">Read More</a>&nbsp;&nbsp;&nbsp;';
                                        } else {
                                            $buttonreadjoin = '<a target="_blank" class="button_grey" href="'.$citieseventshome['EventJoin'].'">Join Event</a>&nbsp;&nbsp;&nbsp;';
                                        }
                                    ?>
                                    <?php echo $buttonreadjoin; ?>
                                    <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                </div>---->
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div style="clear: both;"></div>
                <br />
                <div class="view_all_button" style="margin-top: 25px;"><a href="body.php?page=perspectives">View All Perspectives</a></div>
            </div>
            
            <div class="content_content">
            	<h1 class="content_title">Cities/Events</h1>
                
                <?php $citieseventshomedb = mysql_query("SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'Cities, Events' ORDER BY EventDate DESC LIMIT 0,2") or die(mysql_error()); ?>
                <?php if($countart = mysql_num_rows($citieseventshomedb) == 0) { echo '<div class="nodatabase">...No Data Yet...</div>';  }?>
				<?php while($citieseventshome = mysql_fetch_array($citieseventshomedb)) { ?>
                <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$citieseventshome[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,2")); ?>
                <?php 
                    $pagelink = 'cities-events';
					if($citieseventshome['MemberOnly'] == true) { 
						if($_SESSION['login'] == true) {
							$enablemember = true;
						} else {
							$enablemember = false;
						}
					} else {
						$enablemember = true;
					}
                    $link = 'body.php?page='.$pagelink.'&id='.$citieseventshome['ID'].'&t='.str_replace(" ","-",$citieseventshome['Title']); 
					$link2 = 'body.php?page=search&sub='.$citieseventshome['SubType']."&cat=".$citieseventshome['TypeOfCategory'];
                ?>
                <div class="left50">
                	<?php if($enablemember == false) { ?>
                    <script>
						jQuery(document).ready(function() {
							jQuery('.enablemember').hover(
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'none');
									jQuery('.heightvenuecontentmember', this).css('display', 'block');
								},
								function() { 
									jQuery('.heightvenuecontent', this).css('display', 'block');
									jQuery('.heightvenuecontentmember', this).css('display', 'none');
								}
							);
						});
					</script>
                    <?php } ?>
                    <a href="<?php echo $link; ?>">
                        <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                            <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                <?php if($enablemember == true) { ?>
                                <div class="hoverimg"></div>
                                <?php } ?>
                            </div>
                            <div class="mapicon">
                                <img src="images/icon_map.jpg" width="100%" height="100%" />
                            </div>
                            <div class="eventicon">
                                <div class="eventstype" style="margin-top: 13px; margin-bottom: 0;"><?php echo str_replace(","," and ",$citieseventshome['TypeOfCategory']); ?><?php if($citieseventshome['EventType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $citieseventshome['EventType']; ?></a><?php } ?></div>
                                <div class="content_title1" style="height: 70px; margin-top: 0px;"><?php echo $citieseventshome['Title']; ?></div>
                                <div class="short_line_yellow"></div>
                            </div>
                            <div style="clear: both;"></div>
                            <br />
                            <div class="content_inside">
                                <div class="venuetime1"><p><span class="brandon">When</span>: <?php echo $citieseventshome['EventWhen']; ?></p></div>
                                <div class="venuetime2"><p><span class="brandon">Where</span>: <?php echo $citieseventshome['EventWhere'] ?></p></div>
                                <div style="clear: both;"></div>
                                <!---<div class="heightvenuecontent">
                                <p><?php echo $citieseventshome['SubTitle']; ?></p>
                                </div>
                                <?php if($enablemember == false) { ?>
                                <div class="heightvenuecontentmember">
                                    <?php include 'messagememberpost.php'; ?>
                                </div>
                                <?php } ?>
                                <div class="eventsocmed">
                                    <a target="_blank" class="button_grey" href="<?php echo $citieseventshome['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                    <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                </div>---->
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div style="clear: both;"></div>
                <div class="view_all_button"><a href="body.php?page=cities-events">View All Cities/Events</a></div>
            </div>
            
           <!--- <div class="content_content">
            	<div class="content_title2">GTV</div>
                <img src="images/gtv.jpg" width="996" height="275" />
            </div>
            
            <div class="content_content">
            	<div class="content_title2">Radio</div>
                <img src="images/radio.jpg" width="996" height="219" />
            </div>--->
            
            
            <div class="content_content">
            	<?php $mag = mysql_fetch_array(mysql_query("SELECT * FROM magazines WHERE Title != '' ORDER BY Edition DESC LIMIT 0,1")); ?>
            	<div class="content_title3">Magazine</div>
                <div class="bgwhite padding20" style="min-height: inherit;">
                    <div class="left48full">
                        <div class="image-height">
                            <?php include 'idangerous.swiper.config.homemagazine.php'; ?>
                            <div class="swiper-container-home">
                                <div class="swiper-wrapper">
                                    <?php
                                        $vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC") or die(mysql_error());;
                                    ?>
                                    <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                                    <div class="swiper-slide">
                                        <img src="images/magazines/thumbnails/<?php echo $vb['Image']; ?>" width="100%" />
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left52full">
                        <div class="currentissuediv">
                            <div class="currentissuepadding">
                                <!---<a class="arrow-left-homemag" href="Javascript: void(0)"></a> 
                                <a class="arrow-right-homemag" href="Javascript: void(0)"></a>--->
                                <div class="currentissuetitle"><?php echo $mag['Title']; ?></div>
                                <div class="currentissuetext"><?php echo limit_words($mag['Text'], 60); ?></div>
                                <!---<div class="currentissuelink"><a href="">BUY</a> | <a href="">WATCH TRAILER</a> | <a href="">SUBSCRIBE</a></div>--->
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <script>
					$(document).ready(function() {
						var wrapperH = $('.image-height', this).height();
						$('.currentissuediv', this).css('height', wrapperH+'px');
					});
				</script>
                <div style="clear: both;"></div>
            </div>
            <br />
            
                <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
				<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                <div style="clear: both;"></div>
                <div id="adv_a" style="margin-bottom: 15px;">
                    <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                </div>
                <?php } ?>
            <br />
        </div>
    </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'magazine') { ?>
		<?php 
            if($_GET['sub'] == '') { 
                $_GET['sub'] = 'all';
            }
        ?>
        <div id="content">
            <div id="content_center">
                <div id="link_content_fixed"><div id="link_content"><a<?php if($_GET['sub'] == 'current') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=current">Current Issue</a> | <a<?php if($_GET['sub'] == 'all') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=all">All Issue</a> | <a<?php if($_GET['sub'] == 'distribution') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=distribution">Distribution</a> | <a<?php if($_GET['sub'] == 'team') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=team">Team</a></div></div>
                <br />
                <?php if($_GET['sub'] == 'current') { ?>
                	<?php $mag = mysql_fetch_array(mysql_query("SELECT * FROM magazines WHERE Title != '' ORDER BY Edition DESC LIMIT 0,1")); ?>
                    
                    <div id="banner">
						<?php include 'idangerous.swiper.config.magazine.php'; ?>
                        <a class="arrow-left" href="Javascript: void(0)"></a> 
                        <a class="arrow-right" href="Javascript: void(0)"></a>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                    $vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC") or die(mysql_error());;
                                ?>
                                <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                                <div class="swiper-slide">
                                    <img src="images/magazines/large/<?php echo $vb['Image']; ?>" height="100%" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <br /><br />
                    
                    <?php 
                        $prevdb = mysql_query("SELECT * FROM `magazines` WHERE MagazineID > '$mag[MagazineID]' ORDER BY Edition ASC LIMIT 0,1");
                        $prev = mysql_fetch_array($prevdb);
                        $countprev = mysql_num_rows($prevdb);
                        $link = 'body.php?page='.$_GET['page'].'&sub=all&id='.$prev['MagazineID'].'&t='.str_replace(" ","-",$prev['Title']);
                    ?>
                    <?php if($countprev > 0) { ?>
                    <div class="left50nav">
                        <a style="text-align: left;" class="buttons_nav_page_magazine" href="<?php echo $link; ?>">
                            <img src="images/prev_article.png" width="27" height="27" />
                        </a>
                    </div>
                    <?php } ?>
                    <?php 
                        $nextdb = mysql_query("SELECT * FROM `magazines` WHERE MagazineID < '$mag[MagazineID]' ORDER BY Edition DESC LIMIT 0,1");
                        $next = mysql_fetch_array($nextdb);
                        $countnext = mysql_num_rows($nextdb);
                        $link = 'body.php?page='.$_GET['page'].'&sub=all&id='.$next['MagazineID'].'&t='.str_replace(" ","-",$next['Title']);
                    ?>
                    <?php if($countnext > 0) { ?>
                    <div class="right50nav">
                        <a style="text-align: right;" class="buttons_nav_page_magazine" href="<?php echo $link; ?>">
                            <img src="images/next_article.png" width="27" height="27" />
                        </a>
                    </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                    <div class="magazine_one_sub_name" style="float: left;">
                        <span class="magazine_price_list">$<?php echo $mag['Price']; ?></span><?php if($mag['Length']) { echo ' | '.$mag['Length']; } ?> | <span class="magazine_status"><?php echo $mag['Status']; ?></span>
                    </div>
                    <div class="right14" style="margin-top: 35px;"><a class="ordernow" href="">ORDER NOW</a></div>
                    <div style="clear: both;"></div>
                    <div class="magazinedistributiontitle"><?php echo $mag['Title']; ?></div>
                    <br />
                    <div class="magazinedistributiontext"><?php echo $mag['Text']; ?></div>
                    <br /><br /><br />
                <?php } ?>
                
                <?php if($_GET['sub'] == 'all') { ?>
                    <?php if($_GET['id'] == '') { ?>
                    <script type="text/javascript">
						jQuery(document).ready(function() {
							// Infinite Ajax Scroll configuration
							jQuery.ias({
								container : '.loadmore_content', // main container where data goes to append
								item: '.left50', // single items
								pagination: '.load_more', // page navigation
								next: '.load_more a', // next page selector
								loader: '<img src="images/ajax-loader.gif"/>', // loading gif
								trigger:'<img src="images/loadmore.png" />',
								triggerPageThreshold: 10 // show load more if scroll more than this
							});
						});
					</script>
                    <div class="loadmore_content">
                    	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
						<?php while($mag = mysql_fetch_array($query)): ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC LIMIT 0,1")); ?>
                        <?php $link = 'body.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$mag['MagazineID'].'&t='.str_replace(" ","-",$mag['Title']); ?>
                        <div class="left50">
                            <div class="img50">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/magazines/thumbnails/<?php echo $covpic['Image'] ?>" width="100%" />
                                </a>
                            </div>
                            <div class="sub_link_magazine">
                                <span class="magazine_price_list">$<?php echo $mag['Price']; ?></span><?php if($mag['Length']) { echo ' | '.$mag['Length']; } ?>
                            </div>
                            <div class="content_title1_magazine"><a href="<?php echo $link; ?>"><?php echo $mag['Title']; ?></a></div>
                            <div class="short_line_yellow" style="width: 30px;"></div>
                            <br />
                            <div class="content_magazine_status">
                                <?php echo $mag['Status']; ?>
                            </div>
                        </div>
                        <?php endwhile?>
                        <div style="clear: both;"></div>
                    </div>
                    <!--page navigation-->
					<?php if (isset($next)): ?>
                    <div class="load_more"><a href="body.php?page=magazine&sub=all&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                    <?php endif?>
                    <?php } else { ?>
                    	<?php $magdb = mysql_query("SELECT * FROM magazines WHERE MagazineID = '$_GET[id]' LIMIT 0,1"); ?>
                        <?php 
							$countmag = mysql_num_rows($magdb);
							if($countmag == 0) {
								header("Location: body.php?page=magazine&sub=".$_GET['sub']);
								exit;
							}
						?>
						<?php $mag = mysql_fetch_array($magdb); ?>
                        <div id="banner">
							<?php include 'idangerous.swiper.config.magazine.php'; ?>
                            <a class="arrow-left" href="Javascript: void(0)"></a> 
                            <a class="arrow-right" href="Javascript: void(0)"></a>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                        $vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC") or die(mysql_error());;
                                    ?>
                                    <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                                    <div class="swiper-slide">
                                        <img src="images/magazines/large/<?php echo $vb['Image']; ?>" height="100%" />
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <br /><br />
                        <?php 
                            $prevdb = mysql_query("SELECT * FROM `magazines` WHERE MagazineID > '$_GET[id]' ORDER BY Edition ASC LIMIT 0,1");
                            $prev = mysql_fetch_array($prevdb);
                            $countprev = mysql_num_rows($prevdb);
                            $link = 'body.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$prev['MagazineID'].'&t='.str_replace(" ","-",$prev['Title']);
                        ?>
                        <?php if($countprev > 0) { ?>
                        <div class="left50nav">
                        	<a style="text-align: left;" class="buttons_nav_page_magazine" href="<?php echo $link; ?>">
                            	<img src="images/prev_article.png" width="27" height="27" />
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `magazines` WHERE MagazineID < '$_GET[id]' ORDER BY Edition DESC LIMIT 0,1");
                            $next = mysql_fetch_array($nextdb);
                            $countnext = mysql_num_rows($nextdb);
                            $link = 'body.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$next['MagazineID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50nav">
                        	<a style="text-align: right;" class="buttons_nav_page_magazine" href="<?php echo $link; ?>">
                            	<img src="images/next_article.png" width="27" height="27" />
                            </a>
                        </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                        <div class="magazine_one_sub_name" style="float: left;">
                            <span class="magazine_price_list">$<?php echo $mag['Price']; ?></span><?php if($mag['Length']) { echo ' | '.$mag['Length']; } ?> | <span class="magazine_status"><?php echo $mag['Status']; ?></span>
                        </div>
                        <div class="right14" style="margin-top: 35px;"><a class="ordernow" href="">ORDER NOW</a></div>
                        <div style="clear: both;"></div>
                        <div class="magazinedistributiontitle"><?php echo $mag['Title']; ?></div>
                        <br />
		                <div class="magazinedistributiontext"><?php echo $mag['Text']; ?></div>
	                    <br /><br /><br />
                    <?php } ?>
                <?php } ?>
                
                <?php if($_GET['sub'] == 'distribution') { ?>
                <?php $contenttext = mysql_fetch_array(mysql_query("SELECT * FROM magazinedistribution WHERE ID = 1 LIMIT 0,1")); ?>
                <img src="images/<?php echo $contenttext['Image']; ?>" width="992" height="651" />
                <br /><br /><br /><br />
                <div class="magazinedistributionredtext">Distribution</div>
                <br />
                <div class="magazinedistributiontitle"><?php echo $contenttext['Title']; ?></div>
                <br />
                <div class="magazinedistributiontext"><?php echo $contenttext['Text']; ?></div>
                <br /><br />
                <?php } ?>
                
                <?php if($_GET['sub'] == 'team') { ?>
                
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    
    
    <?php if($_GET['page'] == 'news-features') { ?>
		<?php if($_GET['id'] == '') { ?>
            <div id="banner">
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $vbdb = mysql_query("SELECT * FROM `news-features` WHERE VisibleAtBanner = 1 AND Approval = 1 ORDER BY DateWritten DESC") or die(mysql_error());;
                        ?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <div class="swiper-slide">
                            <a href="body.php?page=<?php echo $_GET['page'];?>&id=<?php echo $vb['ID'] ?>&t=<?php echo str_replace(" ","-",$vb['Title']); ?>"><img src="images/features/<?php echo $covpic['GalleryLink'] ?>" height="370" />
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac">
                                    <div class="banner_content">
                                        <div class="short_line_yellow"></div>
                                        
                                        <div class="banner_subtitle2" style=""><span style="color: #999;"><?php echo ucwords(str_replace(","," and ",$vb['TypeOfCategory'])); ?></span> | <?php echo $vb['SubType']; ?></div>
                                        <div class="banner_title2"><?php echo $vb['Title']; ?></div>
                                        <div class="banner_content_inside"><?php echo $vb['SubTitle']; ?></div>
                                        
                                    </div>
                                </div>
                            </div></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Scrollbar: -->
                <div class="swiper-scrollbar"></div>  
                    
            </div>
            
            <br />
            
            <div id="content">
                <div id="content_center">
                	<script type="text/javascript">
						jQuery(document).ready(function() {
							// Infinite Ajax Scroll configuration
							jQuery.ias({
								container : '.loadmore_content', // main container where data goes to append
								item: '.left50', // single items
								pagination: '.load_more', // page navigation
								next: '.load_more a', // next page selector
								loader: '<img src="images/ajax-loader.gif"/>', // loading gif
								trigger:'<img src="images/loadmore.png" />',
								triggerPageThreshold: 10 // show load more if scroll more than this
							});
						});
					</script>
                    <div class="content_content">
                    	<div class="loadmore_content">
                        	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                            <?php $ad = 1; ?>
							<?php while ($vb = mysql_fetch_array($query)): ?>
                            <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                            <?php
								if($vb['MemberOnly'] == true) { 
									if($_SESSION['login'] == true) {
										$enablemember = true;
									} else {
										$enablemember = false;
									}
								} else {
									$enablemember = true;
								}
							?>
                            <?php $link = 'body.php?page='.$_GET['page'].'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); ?>
                            <div class="left50">
                            	<?php if($enablemember == false) { ?>
								<script>
                                    jQuery(document).ready(function() {
                                        jQuery('.enablemember').hover(
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'none');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'block');
                                            },
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'block');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'none');
                                            }
                                        );
                                    });
                                </script>
                                <?php } ?>
	                            <a href="<?php echo $link; ?>">
                                    <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                                        <div class="eventstype"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?><?php if($vb['SubType']) { ?> | <a href="body.php?page=search&sub=<?php echo $vb['SubType']; ?>&cat=<?php echo $vb['TypeOfCategory']; ?>"><?php echo $vb['SubType']; ?></a><?php } ?></div>
                                        <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                            <?php if($enablemember == true) { ?>
                                            <div class="hoverimg"></div>
                                            <?php } ?>
                                        </div>
                                        <div class="eventicon" style="width: 100%;">
                                            <div class="content_title1" style="height: 60px;"><?php echo $vb['Title']; ?></div>
                                            <div class="short_line_yellow"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <br />
                                        <div class="content_inside">
                                            <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$vb[WrittenBy]' LIMIT 0,1")); ?>
                                            <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                            <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($vb['DateWritten'])); ?></p></div>
                                            <div style="clear: both;"></div>
                                            <!---<div class="heightvenuecontent">
                                            <p><?php echo $vb['SubTitle']; ?></p>
                                            </div>
                                            <?php if($enablemember == false) { ?>
                                            <div class="heightvenuecontentmember">
                                                <?php include 'messagememberpost.php'; ?>
                                            </div>
                                            <?php } ?>
                                            <div class="eventsocmed">
                                                <a class="button_grey" href="<?php echo $link; ?>">Read More</a>&nbsp;&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                            </div>---->
                                        </div>
                                    </div>
                                </a>
                            </div>
								<?php if($ad == 2) { ?>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                            <?php endwhile?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                            <div class="load_more"><a href="body.php?page=news-features&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                            <?php endif?>
                        </div>
                    </div>
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
			<?php
                $content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]' LIMIT 0,1"));
            ?>
            <div id="banner">
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $vbdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$_GET[id]' ORDER BY GalleryCover DESC, GalleryOrder ASC") or die(mysql_error());
							$count = mysql_num_rows($vbdb);
							if($count == 0) {
								header("Location: body.php?page=news-features");
								exit;
							} 
                        ?>
                        <?php
							if($content['MemberOnly'] == true) { 
								if($_SESSION['login'] == true) {
									$enablemember = true;
								} else {
									$enablemember = false;
								}
							} else {
								$enablemember = true;
							}
						?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                            <div class="swiper-slide">
	                            <?php if($enablemember == true) { ?><a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>"><?php } ?><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/features/<?php echo $vb['GalleryLink'] ?>" height="370" /><?php if($enablemember == true) { ?></a><?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Scrollbar: -->
                <div class="swiper-scrollbar"></div>  
            </div>
            <br />
            
            <div id="content">
                <div id="content_center">
                	<div class="line_brown"></div>
                    <div class="content_content">
                        <div id="article_in">
                            <div id="leftarticlefixed">
                                <div class="left25" style="text-align: right;">
                                    <div class="short_line_yellow" style="float: right; width: 20px;"></div>
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby">By: <a href="body.php?page=perspectives&u=<?php echo $written['UserID']; ?>"><?php echo $written['Name']; ?></a></div>
                                    <div style="clear: both;"></div>
                                    <br /><br /><br />
                                    <?php if($content['Quote']) { ?>
                                    <div class="prologue">Prologue</div>
                                    <div class="quotecontent"><?php echo $content['Quote']; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="right75">
                                <div class="bgwhite padding20">
                                    <?php 	
                                        if($content['MemberOnly'] == true) { 
                                            if($_SESSION['login'] == true) {
                                                $enablemember = true;
                                            } else {
                                                $enablemember = false;
                                            }
                                        } else {
                                            $enablemember = true;
                                        }
                                    ?>
                                    <div class="text_inside">
                                        <?php 
                                            if($enablemember == true) {
                                                echo $content['Content']; 
                                            } else {
                                                include 'messagememberpost.php';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <br /><br /><br />
						<?php 
                            $prevdb = mysql_query("SELECT * FROM `news-features` WHERE ID < '$_GET[id]' ORDER BY ID DESC LIMIT 0,1");
                            $prev = mysql_fetch_array($prevdb);
                            $countprev = mysql_num_rows($prevdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$prev['ID'].'&t='.str_replace(" ","-",$prev['Title']);
                        ?>
                        <?php if($countprev > 0) { ?>
                        <div class="left50">
                        	<a style="text-align: right;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
                            	PREVIOUS<br />
                                <span class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `news-features` WHERE ID > '$_GET[id]' ORDER BY ID ASC LIMIT 0,1");
                            $next = mysql_fetch_array($nextdb);
                            $countnext = mysql_num_rows($nextdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$next['ID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50">
                        	<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	NEXT<br />
                                <span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>
                    <br />
                    
					<?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                    
                	<div class="line_brown"></div>
                    <div class="relatedarticlestitle">Related Articles</div>
                    <?php $relateddb = mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]'"); ?>
					<?php
                        while($related = mysql_fetch_array($relateddb)) {
                            $replacespace = str_replace(", ",",",$related['Tags']);
                            $kolist .= $replacespace.',';
                        }
                        $kovalue = explode(",",$kolist);
                        $result = array_map("unserialize", array_unique(array_map("serialize", $kovalue)));
                        sort($result);
						$countarray = count($result);
						$countarray = $countarray-1;
						$ca = 0;
						foreach($result as $res => $val) {
							if($val) {
								if($ca < $countarray) {
									$likedb .= " Tags LIKE '%$val%' OR ";
								} else {
									$likedb .= " Tags LIKE '%$val%' ";
								}
							}
							$ca++;
                    	}
                    ?>
                    <?php
						$relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND ".$likedb." ORDER BY ID DESC LIMIT 0,3");
					?>
                    <?php while($relatedart = mysql_fetch_array($relatedartdb)) { ?>
                    	<?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$relatedart[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php $link = 'body.php?page='.$_GET['page'].'&id='.$relatedart['ID'].'&t='.str_replace(" ","-",$relatedart['Title']); ?>
                        <div class="left30relatedarticle">
                            <div class="img30">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                    <div class="hoverimg"></div>
                                </a>
                            </div>
                            <div class="banner_subtitle2" style=""><?php echo ucwords(str_replace(","," and ",$relatedart['TypeOfCategory'])); ?></div>
                            <div class="content_title30"><?php echo $relatedart['Title']; ?></div>
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                    <br />
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                    <br /><br />
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    
    
    <?php if($_GET['page'] == 'search') { ?>
		<?php if($_GET['id'] == '') { ?>
        	<?php if($_GET['sub']) { ?>
            <?php } else { ?>
            <?php } ?>
            
            <div id="content">
                <div id="content_center">
                	<script type="text/javascript">
						jQuery(document).ready(function() {
							// Infinite Ajax Scroll configuration
							jQuery.ias({
								container : '.loadmore_content', // main container where data goes to append
								item: '.left50', // single items
								pagination: '.load_more', // page navigation
								next: '.load_more a', // next page selector
								loader: '<img src="images/ajax-loader.gif"/>', // loading gif
								trigger:'<img src="images/loadmore.png" />',
								triggerPageThreshold: 10 // show load more if scroll more than this
							});
						});
					</script>
                    <div class="content_content">
                    	<div class="loadmore_content">
                        	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                            <?php $ad = 1; ?>
							<?php while ($vb = mysql_fetch_array($query)): ?>
                            <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                            <?php
								if($vb['MemberOnly'] == true) { 
									if($_SESSION['login'] == true) {
										$enablemember = true;
									} else {
										$enablemember = false;
									}
								} else {
									$enablemember = true;
								}
							?>
                            <?php $link = 'body.php?page='.$_GET['page'].'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); ?>
                            <div class="left50">
                            	<?php if($enablemember == false) { ?>
								<script>
                                    jQuery(document).ready(function() {
                                        jQuery('.enablemember').hover(
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'none');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'block');
                                            },
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'block');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'none');
                                            }
                                        );
                                    });
                                </script>
                                <?php } ?>
                                <a href="<?php echo $link; ?>">
                                    <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                                        <div class="eventstype"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?><?php if($vb['SubType']) { ?> | <a href=""><?php echo $vb['SubType']; ?></a><?php } ?></div>
                                        <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                            <?php if($enablemember == true) { ?>
                                            <div class="hoverimg"></div>
                                            <?php } ?>
                                        </div>
                                        <div class="eventicon" style="width: 100%;">
                                            <div class="content_title1" style="height: 60px;"><a href="<?php echo $link; ?>"><?php echo $vb['Title']; ?></a></div>
                                            <div class="short_line_yellow"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <br />
                                        <div class="content_inside">
                                            <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$vb[WrittenBy]' LIMIT 0,1")); ?>
                                            <?php if($vb['Type'] == 'News, Features') { ?>
                                            <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                            <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($vb['DateWritten'])); ?></p></div>
                                            <div style="clear: both;"></div>
                                            <!---<div class="heightvenuecontent">
                                            <p><?php echo $vb['SubTitle']; ?></p>
                                            </div>
                                            <?php if($enablemember == false) { ?>
                                            <div class="heightvenuecontentmember">
                                                <?php include 'messagememberpost.php'; ?>
                                            </div>
                                            <?php } ?>
                                            <div class="eventsocmed">
                                                <a class="button_grey" href="<?php echo $link; ?>">Read More</a>&nbsp;&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                            </div>--->
                                            <?php } else { ?>
                                            
                                            <div class="venuetime1"><p><span class="brandon">When</span>: <?php echo $vb['EventWhen']; ?></p></div>
                                            <div class="venuetime2"><p><span class="brandon">Where</span>: <?php echo $vb['EventWhere'] ?></p></div>
                                            <div style="clear: both;"></div>
                                            <!---<div class="heightvenuecontent">
                                            <p><?php echo $vb['SubTitle']; ?></p>
                                            </div>
                                            <?php if($enablemember == false) { ?>
                                            <div class="heightvenuecontentmember">
                                                <?php include 'messagememberpost.php'; ?>
                                            </div>
                                            <?php } ?>
                                            <div class="eventsocmed">
                                                <a target="_blank" class="button_grey" href="<?php echo $vb['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/facebook.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/twitter.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/google.jpg" width="20" height="20" /></a>
                                            </div>---->
                                            <?php } ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            	<?php if($ad == 2) { ?>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                            <?php endwhile?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                            <div class="load_more"><a href="body.php?page=search&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                            <?php endif?>
                        </div>
                    </div>
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div id="banner">
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $vbdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$_GET[id]' ORDER BY GalleryCover DESC, GalleryOrder ASC") or die(mysql_error());
							$count = mysql_num_rows($vbdb);
							if($count == 0) {
								header("Location: body.php?page=news-features");
								exit;
							} 
                        ?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                        <div class="swiper-slide">
                            <a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>"><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/features/<?php echo $vb['GalleryLink'] ?>" height="370" /></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <br />
            
            <div id="content">
                <div id="content_center">
                	<div class="line_brown"></div>
                    <div class="content_content">
                        <?php
                            $content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]' LIMIT 0,1"));
                        ?>
                        <div id="article_in">
                            <div id="leftarticlefixed">
                                <div class="left25" style="text-align: right;">
                                    <div class="short_line_yellow" style="float: right; width: 20px;"></div>
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby">By: <a href="body.php?page=perspectives&u=<?php echo $written['UserID']; ?>"><?php echo $written['Name']; ?></a></div>
                                    <div style="clear: both;"></div>
                                    <br /><br /><br />
                                    <?php if($content['Quote']) { ?>
                                    <div class="prologue">Prologue</div>
                                    <div class="quotecontent"><?php echo $content['Quote']; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="right75">
                                <div class="bgwhite padding20">
                                    <?php 	
                                        if($content['MemberOnly'] == true) { 
                                            if($_SESSION['login'] == true) {
                                                $enablemember = true;
                                            } else {
                                                $enablemember = false;
                                            }
                                        } else {
                                            $enablemember = true;
                                        }
                                    ?>
                                    <div class="text_inside">
                                        <?php 
                                            if($enablemember == true) {
                                                echo $content['Content']; 
                                            } else {
                                                include 'messagememberpost.php';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <br /><br /><br />
						<?php 
                            $prevdb = mysql_query("SELECT * FROM `news-features` WHERE ID < '$_GET[id]' ORDER BY ID DESC LIMIT 0,1");
                            $prev = mysql_fetch_array($prevdb);
                            $countprev = mysql_num_rows($prevdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$prev['ID'].'&t='.str_replace(" ","-",$prev['Title']);
                        ?>
                        <?php if($countprev > 0) { ?>
                        <div class="left50">
                        	<a style="text-align: right;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
                            	PREVIOUS<br />
                                <span class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `news-features` WHERE ID > '$_GET[id]' ORDER BY ID ASC LIMIT 0,1");
                            $next = mysql_fetch_array($nextdb);
                            $countnext = mysql_num_rows($nextdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$next['ID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50">
                        	<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	NEXT<br />
                                <span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>
                    
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                    
                    <br />
                	<div class="line_brown"></div>
                    <div class="relatedarticlestitle">Related Articles</div>
                    <?php $relateddb = mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]'"); ?>
					<?php
                        while($related = mysql_fetch_array($relateddb)) {
                            $replacespace = str_replace(", ",",",$related['Tags']);
                            $kolist .= $replacespace.',';
                        }
                        $kovalue = explode(",",$kolist);
                        $result = array_map("unserialize", array_unique(array_map("serialize", $kovalue)));
                        sort($result);
						$countarray = count($result);
						$countarray = $countarray-1;
						$ca = 0;
						foreach($result as $res => $val) {
							if($val) {
								if($ca < $countarray) {
									$likedb .= " Tags LIKE '%$val%' OR ";
								} else {
									$likedb .= " Tags LIKE '%$val%' ";
								}
							}
							$ca++;
                    	}
                    ?>
                    <?php
						$relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND ".$likedb." ORDER BY ID DESC LIMIT 0,3");
					?>
                    <?php while($relatedart = mysql_fetch_array($relatedartdb)) { ?>
                    	<?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$relatedart[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php $link = 'body.php?page='.$_GET['page'].'&id='.$relatedart['ID'].'&t='.str_replace(" ","-",$relatedart['Title']); ?>
                        <div class="left30relatedarticle">
                            <div class="img30">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                    <div class="hoverimg"></div>
                                </a>
                            </div>
                            <div class="banner_subtitle2" style=""><?php echo ucwords(str_replace(","," and ",$relatedart['TypeOfCategory'])); ?></div>
                            <div class="content_title30"><?php echo $relatedart['Title']; ?></div>
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                    <br />
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                    <br /><br />
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    
    
    <?php if($_GET['page'] == 'perspectives') { ?>
    		<div class="columnist">
            	<div class="content_center_center">
					<?php if($_GET['u']) { ?>
                        <?php $columnist = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$_GET[u]' LIMIT 0,1")); ?>
                        <div class="left40" style="text-align: right;">
                            <img src="images/users/<?php echo $columnist['ProfPic']; ?>" width="80%" />
                        </div>
                        <div class="right60">
                            <br />
                            <div class="columnistname_one"><?php echo $columnist['Name']; ?></div>
                            <div class="short_line_yellow" style="width: 25px;"></div>
                            <div class="columnistdetails_one"><?php echo $columnist['Details']; ?></div>
                        </div>
                        <div style="clear: both;"></div>
                        <br />
                    <?php } else { ?>
                        <?php $columnistdb = mysql_query("SELECT * FROM users WHERE Name != '' ORDER BY UserID ASC"); ?>
                        <?php while($columnist = mysql_fetch_array($columnistdb)) { ?>
                            <?php $countart = mysql_num_rows(mysql_query("SELECT * FROM `news-features` WHERE WrittenBy = '$columnist[UserID]'")); ?>
                            <?php if($countart > 0) { ?>
                                <?php $link = 'body.php?page='.$_GET['page'].'&u='.$columnist['UserID']; ?>
                                <div class="left30columnist">
                                    <div class="left40">
                                        <a href="<?php echo $link ?>"><img src="images/users/<?php echo $columnist['ProfPic']; ?>" width="100%" /></a>
                                    </div>
                                    <div class="right60">
                                        <div class="columnistname"><a href="<?php echo $link ?>"><?php echo $columnist['Name']; ?></a></div>
                                        <div class="short_line_yellow" style="width: 25px;"></div>
                                        <div class="columnistdetails"><?php echo limit_words($columnist['Details'],12); ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    <?php } ?>
                </div>
            </div>
            <div id="content">
                <div id="content_center">
                	<br />
                    <div class="content_content">
                    	<script type="text/javascript">
							jQuery(document).ready(function() {
								// Infinite Ajax Scroll configuration
								jQuery.ias({
									container : '.loadmore_content', // main container where data goes to append
									item: '.left50', // single items
									next: '.load_more a', // next page selector
									loader: '<img src="images/ajax-loader.gif"/>', // loading gif
									trigger:'<img src="images/loadmore.png" />',
									triggerPageThreshold: 10 // show load more if scroll more than this
								});
							});
						</script>
						<div class="loadmore_content">
                        	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                            <?php $ad = 1; ?>
							<?php while($vb = mysql_fetch_array($query)): ?>
                            <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                            <?php 
								if(strpos($vb['Type'],'Cities') !== false || strpos($vb['Type'],'Events') !== false) {
									$pagelink = 'cities-events';
								} else {
									$pagelink = 'news-features';
								}
								if($vb['MemberOnly'] == true) { 
									if($_SESSION['login'] == true) {
										$enablemember = true;
									} else {
										$enablemember = false;
									}
								} else {
									$enablemember = true;
								}
								$link = 'body.php?page='.$pagelink.'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); 
							?>
                            <div class="left50">
                            	<?php if($enablemember == false) { ?>
								<script>
                                    jQuery(document).ready(function() {
                                        jQuery('.enablemember').hover(
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'none');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'block');
                                            },
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'block');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'none');
                                            }
                                        );
                                    });
                                </script>
                                <?php } ?>
                                <a href="<?php echo $link; ?>">
                                    <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="windows.location='<?php echo $link; ?>'">
                                    	<div class="eventstype"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?><?php if($vb['SubType']) { ?> | <a href=""><?php echo $vb['SubType']; ?></a><?php } ?></div>
                                        <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                            <?php if($enablemember == true) { ?>
                                            <div class="hoverimg"></div>
                                            <?php } ?>
                                        </div>
                                        <div class="eventicon" style="width: 100%;">
                                            <div class="content_title1" style="height: 60px;"><?php echo $vb['Title']; ?></div>
                                            <div class="short_line_yellow"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <br />
                                        <div class="content_inside">
                                            <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$vb[WrittenBy]' LIMIT 0,1")); ?>
                                            <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                            <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($vb['DateWritten'])); ?></p></div>
                                            <div style="clear: both;"></div>
                                            <!---<div class="heightvenuecontent">
                                            <p><?php echo $vb['SubTitle']; ?></p>
                                            </div>
                                            <?php if($enablemember == false) { ?>
                                            <div class="heightvenuecontentmember">
                                                <?php include 'messagememberpost.php'; ?>
                                            </div>
                                            <?php } ?>
                                            <div class="eventsocmed">
                                                <a class="button_grey" href="<?php echo $link; ?>">Read More</a>&nbsp;&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                            </div>--->
                                        </div>
                                    </div>
                                </a>
                            </div>
                           		<?php if($ad == 2) { ?>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                            <?php endwhile ?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                                <div class="load_more"><a href="body.php?page=perspectives&p=<?php echo $next?>"></a></div>
                            <?php endif?><!--.wrap-->
                        </div>
                    </div>
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
    <?php } ?>
    
    
    <?php if($_GET['page'] == 'cities-events') { ?>
		<?php if($_GET['id'] == '') { ?>
            <div id="content">
                <div id="content_center">
                	<br /><br />
                	<div id="link_content_fixed"><div id="link_content"><a<?php if($_GET['sub'] == '') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>">All</a> | <a<?php if($_GET['sub'] == 'nightlife') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=nightlife">Nightlife</a> | <a<?php if($_GET['sub'] == 'festival') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=festival">Festival</a> | <a<?php if($_GET['sub'] == 'openings') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=openings">Openings</a> | <a<?php if($_GET['sub'] == 'exhibits') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=exhibits">Exhibits</a> | <a<?php if($_GET['sub'] == 'misc') { ?> style="color: #c1272d;"<?php } ?> href="body.php?page=<?php echo $_GET['page']; ?>&sub=misc">Misc</a></div></div>
                    <div class="content_content">
                    	<script type="text/javascript">
							jQuery(document).ready(function() {
								// Infinite Ajax Scroll configuration
								jQuery.ias({
									container : '.loadmore_content', // main container where data goes to append
									item: '.left50', // single items
									pagination: '.load_more', // page navigation
									next: '.load_more a', // next page selector
									loader: '<img src="images/ajax-loader.gif"/>', // loading gif
									trigger:'<img src="images/loadmore.png" />',
									triggerPageThreshold: 10 // show load more if scroll more than this
								});
							});
						</script>
                        <div class="loadmore_content">
                        	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                            <?php $ad = 1; ?>
							<?php while($vb = mysql_fetch_array($query)): ?>
                            <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                            <?php
								if($vb['MemberOnly'] == true) { 
									if($_SESSION['login'] == true) {
										$enablemember = true;
									} else {
										$enablemember = false;
									}
								} else {
									$enablemember = true;
								}
							?>
                            <?php $link = 'body.php?page='.$_GET['page'].'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); ?>
                            <div class="left50">
                            	<?php if($enablemember == false) { ?>
								<script>
                                    jQuery(document).ready(function() {
                                        jQuery('.enablemember').hover(
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'none');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'block');
                                            },
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'block');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'none');
                                            }
                                        );
                                    });
                                </script>
                                <?php } ?>
                                <a href="<?php echo $link; ?>">
                                    <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location='<?php echo $link; ?>'">
                                        <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                            <?php if($enablemember == true) { ?>
                                            <div class="hoverimg"></div>
                                            <?php } ?>
                                        </div>
                                        <div class="mapicon"<?php if($vb['GoogleMap']) { ?> style="cursor: pointer;"<?php } ?>>
                                            <img src="images/icon_map.jpg" width="100%" height="100%" />
                                        </div>
                                        <div class="eventicon">
                                            <div class="eventstype" style="margin-top: 13px; margin-bottom: 0;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?><?php if($vb['EventType']) { ?> | <a href=""><?php echo $vb['EventType']; ?></a><?php } ?></div>
                                            <div class="content_title1" style="height: 70px; margin-top: 0;"><a href="<?php echo $link; ?>"><?php echo $vb['Title']; ?></a></div>
                                            <div class="short_line_yellow"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <br />
                                        <div class="content_inside" style="">
                                            <?php if($vb['GoogleMap']) { ?><div class="googlemapoutside"><?php echo $vb['GoogleMap']; ?></div><?php } ?>
                                            <div class="venuetime1"><p><span class="brandon">When</span>: <?php echo $vb['EventWhen']; ?></p></div>
                                            <div class="venuetime2"><p><span class="brandon">Where</span>: <?php echo $vb['EventWhere'] ?></p></div>
                                            <div style="clear: both;"></div>
                                            <!---<div class="heightvenuecontentcities">
                                                <?php echo limit_words($vb['Content'], 35); ?>
                                            </div>
                                            <br /><br />
                                            <div class="eventsocmed">
                                                <a target="_blank" class="button_grey" href="<?php echo $vb['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/facebook.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/twitter.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                <a href=""><img src="images/socmed/google.jpg" width="20" height="20" /></a>
                                            </div>---->
                                        </div>
                                    </div>
                                </a>
                            </div>
                            	<?php if($ad == 2) { ?>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                            <?php endwhile ?>
                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                        <!--page navigation-->
                        <?php if (isset($next)): ?>
                        <div class="load_more"><a href="body.php?page=cities-events&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                        <?php endif?><!--.wrap-->
                        
                    </div>
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
			<?php
                $content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]' LIMIT 0,1"));
            ?>
            <div id="banner">
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $vbdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$_GET[id]' ORDER BY GalleryCover DESC, GalleryOrder ASC") or die(mysql_error());;
                        ?>
                        <?php
							if($content['MemberOnly'] == true) { 
								if($_SESSION['login'] == true) {
									$enablemember = true;
								} else {
									$enablemember = false;
								}
							} else {
								$enablemember = true;
							}
						?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                        <div class="swiper-slide">
                            <?php if($enablemember == true) { ?><a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>"><?php } ?><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/features/<?php echo $vb['GalleryLink'] ?>" height="370" /><?php if($enablemember == true) { ?></a><?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Scrollbar: -->
                <div class="swiper-scrollbar"></div>  
            </div>
            <br />
            
            <div id="content">
                <div id="content_center">
                	<div class="line_brown"></div>
                    <div class="content_content">
                        <div id="article_in">
                            <div id="leftarticlefixed">
                                <div class="left25" style="text-align: right;">
                                    <div class="short_line_yellow" style="float: right; width: 20px;"></div>
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['EventType']) { ?> | <span style="color: #c1272d;"><?php echo $content['EventType']; ?></span><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby" style="margin-bottom: 5px;">When: <span style="color: #c1272d;"><?php echo $content['EventWhen']; ?></span><br />Where: <span style="color: #c1272d;"><?php echo $content['EventWhere']; ?></span></div>
                                    <br />
                                    <a target="_blank" class="button_grey" href="<?php echo $content['EventJoin']; ?>">Join Event</a>
                                    <div style="clear: both;"></div>
                                    <?php if($content['GoogleMap']) { ?><div class="googlemap"><?php echo $content['GoogleMap']; ?></div><?php } ?>
                                </div>
                            </div>
                            <div class="right75">
                                <div class="bgwhite padding20">
                                    <?php 	
                                        if($content['MemberOnly'] == true) { 
                                            if($_SESSION['login'] == true) {
                                                $enablemember = true;
                                            } else {
                                                $enablemember = false;
                                            }
                                        } else {
                                            $enablemember = true;
                                        }
                                    ?>
                                    <div class="text_inside">
                                        <?php 
                                            if($enablemember == true) {
                                                echo $content['Content']; 
                                            } else {
                                                include 'messagememberpost.php';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <br /><br /><br />
						<?php 
                            $prevdb = mysql_query("SELECT * FROM `news-features` WHERE ID < '$_GET[id]' AND (Type LIKE '%cities%' OR Type LIKE '%events%') ORDER BY ID DESC LIMIT 0,1");
                            $prev = mysql_fetch_array($prevdb);
                            $countprev = mysql_num_rows($prevdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$prev['ID'].'&t='.str_replace(" ","-",$prev['Title']);
                        ?>
                        <?php if($countprev > 0) { ?>
                        <div class="left50">
                        	<a style="text-align: right;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
                            	PREVIOUS<br />
                                <span class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `news-features` WHERE ID > '$_GET[id]' AND (Type LIKE '%cities%' OR Type LIKE '%events%') ORDER BY ID ASC LIMIT 0,1");
                            $next = mysql_fetch_array($nextdb);
                            $countnext = mysql_num_rows($nextdb);
                            $link = 'body.php?page='.$_GET['page'].'&id='.$next['ID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50">
                        	<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	NEXT<br />
                                <span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                    <br />
                	<div class="line_brown"></div>
                    <div class="relatedarticlestitle">Related Articles</div>
                    <?php $relateddb = mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]'"); ?>
					<?php
                        while($related = mysql_fetch_array($relateddb)) {
                            $replacespace = str_replace(", ",",",$related['Tags']);
                            $kolist .= $replacespace.',';
                        }
                        $kovalue = explode(",",$kolist);
                        $result = array_map("unserialize", array_unique(array_map("serialize", $kovalue)));
                        sort($result);
						$countarray = count($result);
						$countarray = $countarray-1;
						$ca = 0;
						foreach($result as $res => $val) {
							if($val) {
								if($ca < $countarray) {
									$likedb .= " Tags LIKE '%$val%' OR ";
								} else {
									$likedb .= " Tags LIKE '%$val%' ";
								}
							}
							$ca++;
                    	}
                    ?>
                    <?php
						$relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND ".$likedb." AND (Type LIKE '%cities%' OR Type LIKE '%events%') ORDER BY ID DESC LIMIT 0,3");
					?>
                    <?php while($relatedart = mysql_fetch_array($relatedartdb)) { ?>
                    	<?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$relatedart[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php $link = 'body.php?page='.$_GET['page'].'&id='.$relatedart['ID'].'&t='.str_replace(" ","-",$relatedart['Title']); ?>
                        <div class="left30relatedarticle">
                            <div class="img30">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                    <div class="hoverimg"></div>
                                </a>
                            </div>
                            <div class="banner_subtitle2" style=""><?php echo ucwords(str_replace(","," and ",$relatedart['TypeOfCategory'])); ?></div>
                            <div class="content_title30"><?php echo $relatedart['Title']; ?></div>
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                    <br />
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                    <br /><br />
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    
    <?php if($_GET['page'] == 'gallery') { ?>
		<?php if($_GET['id'] == '') { ?>
        <div id="content">
            <div id="content_center">
            	<br /><br />
                <div class="content_content">
                	<script type="text/javascript">
						jQuery(document).ready(function() {
							// Infinite Ajax Scroll configuration
							jQuery.ias({
								container : '.loadmore_content', // main container where data goes to append
								item: '.left50', // single items
								pagination: '.load_more', // page navigation
								next: '.load_more a', // next page selector
								loader: '<img src="images/ajax-loader.gif"/>', // loading gif
								trigger:'<img src="images/loadmore.png" />',
								triggerPageThreshold: 10 // show load more if scroll more than this
							});
						});
					</script>
                	<div class="loadmore_content">
                    	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                        <?php $ad = 1; ?>
						<?php while($gal = mysql_fetch_array($query)): ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `pictures` WHERE GalleryID = '$gal[GalleryID]' ORDER BY PictureID ASC LIMIT 0,1")); ?>
                        <?php $link = 'body.php?page='.$_GET['page'].'&id='.$gal['GalleryID'].'&t='.str_replace(" ","-",$gal['GalleryName']); ?>
                        <div class="left50">
                            <div class="img50">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/gallery/thumbnails/<?php echo $covpic['PictureLink']; ?>" width="100%" />
                                    <div class="hoverimg"></div>
                                </a>
                            </div>
                            <div class="sub_link">
                                <?php echo $gal['GallerySubName']; ?>
                            </div>
                            <div class="content_inside_short">
                                <?php echo $gal['GalleryDetails']; ?>
                            </div>
                        </div>
                       			<?php if($ad == 2) { ?>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                                    <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                    <div style="clear: both;"></div>
                                    <div id="adv_a" style="margin-bottom: 15px;">
                                        <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                        <?php endwhile ?>
                        <div style="clear: both;"></div>
                    </div>
                    <!--page navigation-->
					<?php if (isset($next)): ?>
                    <div class="load_more"><a href="body.php?page=gallery&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                    <?php endif?>
                </div>
                <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
				<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                <div style="clear: both;"></div>
                <div id="adv_a" style="margin-bottom: 15px;">
                    <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } else { ?>
        <div id="banner">
        
        	<!----- BANNER ----->
			<?php include 'idangerous.swiper.config.php'; ?>
            <a class="arrow-left" href="Javascript: void(0)"></a> 
            <a class="arrow-right" href="Javascript: void(0)"></a>
            <div class="swiper-container">
				<?php
                    $gal = mysql_query("SELECT * FROM `news-features` WHERE VisibleAtBanner = 1 AND Approval = 1 ORDER BY DateWritten DESC") or die(mysql_error());;
                ?>
                <div class="swiper-wrapper">
					<?php
                        $vbdb = mysql_query("SELECT * FROM `pictures` WHERE GalleryID = '$_GET[id]' ORDER BY PictureID ASC") or die(mysql_error());;
                    ?>
                    <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                    <div class="swiper-slide">
  	                    <a class="fancybox" rel="group1" href="images/gallery/large/<?php echo $vb['PictureLink'] ?>"><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/gallery/thumbnails/<?php echo $vb['PictureLink'] ?>" height="500" /></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Scrollbar: -->
            <div class="swiper-scrollbar"></div>
        	
            <div class="sub_link" style="">
                <?php echo $gal['GallerySubName']; ?>
            </div>
            <div class="content_inside_short">
                <?php echo $gal['GalleryDetails']; ?>
            </div>
        </div>
        <br /><br />
        <?php } ?>
    <?php } ?>
    
    <?php if($_GET['page'] == 'gtv') { ?>
		<?php if($_GET['id'] == '') { ?>
        <div id="content">
            <div id="content_center">
                <div class="content_content">
                	<div class="gtvlatest_left">
						<?php $gtvlatest = mysql_fetch_array(mysql_query("SELECT * FROM youtube ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php 
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
                            $youtubelink = strafter($gtvlatest['YouTubeLink'], "v=");
                            $youtubelink = strbefore($youtubelink, "&");
                        ?>
                        <iframe id="gtvplayer" type="text/html" width="690" height="420" src="//www.youtube.com/embed/<?php echo $youtubelink; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
                        <div id="loading_gtv"><img src="images/ajax-loader_dark.gif" width="32" height="32" /></div>
  					</div>
                	<div class="gtvlatest_right">
                    	<div class="bg_brownyel">
                        </div>
                        <div class="text_bgopac">
                        	<div class="text_font" style="margin: 10px;">
								<div class="title_text_font" id="gtvtitlemain"><?php echo $gtvlatest['YouTubeTitle']; ?></div><br />
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <br />
                    <div class="gtvlatest_details">
                    	<div class="gtvlatest_details_left">
                        	<div class="gtvlatest_details_type" id="gtvtype"><?php echo $gtvlatest['YouTubeType']; ?></div>
                            <div class="short_line_yellow" style="float: right;"></div>
                        </div>
                        <div class="gtvlatest_details_right">
                        	<div class="gtvlatest_details_title" id="gtvtitle"><?php echo $gtvlatest['YouTubeTitle']; ?></div>
                        </div>
	                    <div style="clear: both;"></div>
                    </div>
                    <br /><br />
                    <div class="gtvlink">
                    	<div class="gtvlink_inside">
                    	<?php $gtvlinkdb = mysql_query("SELECT *, COUNT(*) FROM youtube GROUP BY YouTubeType ORDER BY COUNT(*) DESC "); ?>
                        <?php $g = 1; ?>
                        <?php while($gtvlink = mysql_fetch_array($gtvlinkdb)) { ?>
                        	<a href="Javascript: void();" onclick="$('.gtv_type_list').css('display','none'); $('#gtvlist<?php echo $g; ?>').css('display','block');"><?php echo $gtvlink['YouTubeType']; ?></a>
                            <?php $g++; ?>
                        <?php } ?>
                        </div>
                        <div class="borderbot" style="position: absolute; top: 5px;">
                        </div>
                    </div>
                    <?php $g = 1; ?>
					<?php $gtvlinkdb = mysql_query("SELECT *, COUNT(*) FROM youtube GROUP BY YouTubeType ORDER BY COUNT(*) DESC "); ?>
                    <?php while($gtvlink = mysql_fetch_array($gtvlinkdb)) { ?>
                    	<div class="gtv_type_list" id="gtvlist<?php echo $g; ?>">
                        	<?php $g++; ?>
                        	<?php 
								$gtvall = mysql_query("SELECT * FROM youtube WHERE YouTubeType = '$gtvlink[YouTubeType]' ORDER BY ID DESC");
							?>
                            <?php while($gtv = mysql_fetch_array($gtvall)) { ?>
								<?php 
                                    $youtubelink = strafter($gtv['YouTubeLink'], "v=");
                                    $youtubelink = strbefore($youtubelink, "&");
                                ?>
                                <div class="gtvlist" onclick="
                                	$('#gtvplayer').attr('src', '//www.youtube.com/embed/<?php echo $youtubelink; ?>');
                                   	$('#loading_gtv').css('display','block');
                                    $('#gtvplayer').load('//www.youtube.com/embed/<?php echo $youtubelink; ?>', function() {
                                    	$('#loading_gtv').css('display','none');
                                    });
                                    $('#gtvtitlemain').text('<?php echo $gtv['YouTubeTitle']; ?>');
                                    $('#gtvtitle').text('<?php echo $gtv['YouTubeTitle']; ?>');
                                    $('#gtvtype').text('<?php echo $gtv['YouTubeType']; ?>');
                                ">
                                	<img src="http://img.youtube.com/vi/<?php echo $youtubelink; ?>/default.jpg" style="width: 100%;" />
                                   	<div class="gtvlisttitle"><?php echo limit_words($gtv['YouTubeTitle'], 20); ?></div>
                                </div>
                            <?php } ?>
                            <div style="clear: both;"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } else { ?>
        
        <?php } ?>
    <?php } ?>
    
    <div id="footer_top">
    	<div id="footer_top_center" style="text-align: center">
        	<div><a href="index.page?page=subscribe">SUBSCRIBE</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.page?page=advertise">ADVERTISE</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.page?page=about">ABOUT</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.page?page=contact">CONTACT</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.page?page=privacy-policy">PRIVACY POLICY</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.page?page=sitemap">SITE MAP</a></div>
            <div style="margin-top: 5px; font-size: 10px;">All content &copy;<?php echo date("Y"); ?> Globetrotter Media & Fuse Creative Agency. All Rights Reserved. • Designed & Developed by <a style="color: #b19557;" target="_blank" href="http://www.mindmap.co.id/">MINDMAP COMMUNICATIONS</a></div>
        </div>
    </div>
</div>
<!---
<div id="footer">        
    <div id="footer_center">
        <iframe style="display: none;" id="soundcloud_widget"
          src="http://w.soundcloud.com/player/?url=https://api.soundcloud.com/users/854832&show_artwork=false&liking=false&sharing=false&auto_play=false"
          width="100%"
          height="22"
          frameborder="no"></iframe>
        <div class="footer_left">
        <img src="images/gradio_footer.png" width="82" height="22" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_play" src="images/button_play.png" width="27" height="27" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_next" src="images/button_next.png" width="27" height="27" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_pause" src="images/button_pause.png" width="27" height="27" />
        </div>
        <div class="footer_left">
            <div class="footer_nowplaying">Now Playing</div>
            <div id="footer_songtitle"></div>
            <div style="clear: both;"></div>
        </div>
        <div class="footer_right">
            <img id="gradio_minimize" src="images/button_cross.png" width="27" height="27" />
        </div>
        <div style="clear: both;">
    </div>
</div>
<div id="gradiobutton">
    <img src="images/gradiobutton.jpg" width="100" height="29" />
</div>
---->
</body>
</html>