<?php require 'incdatabase.php'; ?>
<?php
 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$_SESSION['lasturl'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Globetrottermag" />
<meta id="viewport" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<title><?php if($_GET['t']) {  echo strtoupper(str_replace("-"," ",$_GET['t'])).' | '; } ?><?php if($_GET['page']) {  echo strtoupper(str_replace("-","/",$_GET['page'])).' | '; } ?>GLOBETROTTER - A TRANSATLANTIC INTELLIGENCE BUREAU</title>
<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
<LINK rel="stylesheet" href="files/styles.css" type="text/css" />
<link rel="stylesheet" href="files/menu.css" type="text/css"/>
<!--<link rel="stylesheet" href="files/bootstrap.css" type="text/css"/>-->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="files/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="files/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="files/respond.min.js"></script>
<script type="text/javascript" src="files/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="files/jqueryscript.js"></script>

<script type="text/javascript" src="files/jquery-ias.min.js"></script>
<style>
    .card {
      height: 400px;
      overflow: hidden;
      position: relative;
    }
    .heightvenuecontent{
      opacity: 0;
      font-family:'AnoRegular-Regular';
    }
    select.show-me-select{
      -webkit-appearance: none; 
      background: url(icon/select-arrow.png) no-repeat right;
    }
    .card_content {
      width:94%;
      position: absolute;
      background:white;
      transition: all 0.7s ease;
      bottom:0px;
    }
    
    .homefeatures:hover .card_content {
      bottom: 35px; 
    }
    .homefeatures:hover .card_content .content_title1{
        color:#9e7a2d;
    }
    .stBubble{
        display:none !important;
    }

    .homefeatures:hover .card_content .heightvenuecontent{
      -moz-transition: opacity 0.4s ease-out0.4s;
      -o-transition: opacity 0.4s ease-out 0.4s;
      -webkit-transition: opacity 0.4s ease-out;
      -webkit-transition-delay: 0.4s;
      transition: opacity 0.4s ease-out 0.4s;
      filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
      opacity: 1;
    }
    
    #nav_list_down {
        width: 25px;
        border-right: 1px solid #ccc;
        padding: 10px;
        height: 20px;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .5s ease-in-out;
        -moz-transition: .5s ease-in-out;
        -o-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        cursor: pointer;
        border-left: 1px solid #ccc;
        position: absolute;
        display: none;
    }
    
    #music-button-play {
        width: 25px;
        height: 40px;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .5s ease-in-out;
        -moz-transition: .5s ease-in-out;
        -o-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        cursor: pointer;
        float:right;
        position: absolute;
        top: 20px;
        right: 60px;
        display: none;
    }
    @media (max-width:768px){
        #nav_list_down {
            display: block;
        }
        #login-icon {
            display: block;
        }
        #music-button-play {
            display: block;
        }
    }
    #nav_list_down span {
        display: block;
        position: absolute;
        height: 2px;
        width:inherit;
        background: #bebebe;
        border-radius: 9px;
        opacity: 1;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
    }
    
    #nav_list_down span:nth-child(1) {
        top: 10px;
    }
    
    #nav_list_down span:nth-child(2), #nav_list_down span:nth-child(3) {
        top: 17px;
    }
    
    #nav_list_down span:nth-child(4) {
        top: 24px;
    }
    
    #nav_list_down.open span:nth-child(1) {
        top: 18px;
        width: 0%;
        left: 50%;
    }
    
    #nav_list_down.open span:nth-child(2) {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    
    #nav_list_down.open span:nth-child(3) {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    
    #nav_list_down.open span:nth-child(4) {
        top: 18px;
        width: 0%;
        left: 50%;
    }

    </style>
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
<!-- END FANCYBOX POPUP -->

<!-- START IDANGEROUS SWIPER -->
<link rel="stylesheet" href="files/idangerous.swiper.css">
<link rel="stylesheet" href="files/idangerous.swiper.scrollbar.css">

<script src="files/idangerous.swiper.min.js"></script>
<script src="files/idangerous.swiper.scrollbar.min.js"></script>
<!-- END IDANGEROUS SWIPER -->
<script type="text/javascript" src="files/jquery.prettySocial.js"></script>
<script type="text/javascript">
    $('.prettySocial').prettySocial();
</script>
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
		var currentMonth1 = months[month];
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
		$("#clock").text(currentDay + ' ' + currentDate + ' ' + currentMonth1 + ' , ' + strTime);

		flag = false;
		timer = timer + 1000;
	}
	jQuery(document).ready(function() {
	   var viewportWidth = $(window).width();
	   	   var viewportHeight = $(window).height();
	   
		//var top = jQuery('#navigation_float').offset().top - parseFloat(jQuery('#navigation').css('marginTop').replace(/auto/, 0));
		if(viewportWidth>1024){
		  var top=100;
          var top2=160;
		  var mleft = $(".right-socmed").width()+35;
		  var mright = $(".logo").width();
		  jQuery('.filter-events').css({'margin':'0px '+mleft + 'px 0px '+mright+'px'});
		}else{
		  var top=60;
		  var width=viewportWidth-40;
		  jQuery('.signup_div').css({'width': width + 'px'});
		  jQuery('.nav_ul').css({'height': viewportHeight});
		}
        jQuery(window).scroll(function (event) {
			// what the y position of the scroll is
			var y = jQuery(this).scrollTop();
			// whether that's below the form
			if (y >= top) {
			  // if so, ad the fixed class
			  jQuery('#navigation_float').addClass("fixed");
              jQuery('.signup_div').css({'top':'82px'});
              jQuery('#show_me_float').addClass("fixed");
			} else {
			  // otherwise remove it
			  jQuery('#navigation_float').removeClass("fixed");
              jQuery('.signup_div').css({'top':'122px'});
              jQuery('#show_me_float').removeClass("fixed");
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
			} else if (scroll > (length-topdistance)-100) {
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
		//var top222 = jQuery('#link_content_fixed').offset().top - parseFloat(jQuery('#link_content').css('marginTop').replace(/auto/, 0))-90;
		jQuery(window).scroll(function (event) {
			// what the y position of the scroll is
			var y = jQuery(this).scrollTop();
			// whether that's below the form
			if (y >= top) {
			  // if so, ad the fixed class
			  jQuery('#link_content_fixed').addClass('fixed');
			  jQuery('#link_content').css('background', '#000');
			} else {
			  // otherwise remove it
			  jQuery('#link_content_fixed').removeClass('fixed');
			  jQuery('#link_content').css('background', '#000');
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

</head>

<body>
<!-- SCM Music Player http://scmplayer.net
<script type="text/javascript" src="http://www.globetrottermag.com/unpublished/files/scm/script.js" 
data-config="{'skin':'skins/globe/skin.css','volume':50,'autoplay':false,'shuffle':false,'repeat':1,'placement':'bottom','showplaylist':false,'playlist':'http://soundcloud.com/globetrottermag'}" ></script>
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
        <?php if($adva['AdvPic']) { ?>
			<?php if(file_exists("images/adv/".$adva['AdvPic'])) { ?>
            <div id="adv_a">
                <div class="content_center_center">
                    <a target="_blank" href="<?php echo $adva['AdvLink']; ?>"><img src="images/adv/<?php echo $adva['AdvPic']; ?>" width="996" height="100" /></a>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
        <?php if($_SESSION['message']) { ?>
        <div class="invalidmessage">
        	<?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); ?>
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
                        <!--<a href="index.php?page=stockists">Stockists</a>
                        <a href="index.php?page=network">Network</a>-->
                        <a href="index.php?page=shop">Shop</a>
                        <a href="index.php?page=submission">Submissions</a>
                        <a href="index.php?page=subscribe">Subscribe</a>
                        <a href="index.php?page=cart">C</a>
                    </div>
                    <div id="searchtop">
                        <div id="wrap">
                          <form action="index.php" method="get">
                          <input type="hidden" name="page" value="search" />
                          <input id="search_submit_1" value="Search" type="submit">
                          <input id="search_text_1" type="text" name="search" placeholder="<?php if($_GET['search']) { ?><?php echo $_GET['search']; ?><?php } else { ?>Search...<?php } ?>" id="search" />
                          </form>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
        
        <?php
		include('navigation.php');
		include('navigation-mobile.php');
        if($_GET['page'] == 'news-features') {
            if($_GET['id'] == '') {
         $aTags=array();
        $cTags=array();
        $unique = array();
        while($tags = mysql_fetch_array($listtags)) {
          $unique[] = $tags['SubType'];
          }
        ?>
        <div id="show_me_float" style="background:#fff;padding:0px;"> 
        	<div id="top_center" style="border-bottom: 0.5px solid #ccc;">
            	<div id="content_center">
                <ul class="show-me-select" id="show-me-select">
                        <li>
                            <a href="javascript:void(0)">Browse Topics &nbsp; &nbsp; &nbsp; <img class="arrow-show-me" src="icon/select-arrow.png"/></a>
                            <ul id="box-select">
                             <?php
                             $x=count($unique);
                             for($xi=0;$xi<$x;$xi++){
                             if($unique[$xi]!=""){
                                $showme = mysql_query("SELECT * FROM `news-features` WHERE SubType='$unique[$xi]'") or die(mysql_error());
                                $xs=mysql_num_rows($showme);
                             ?>                    
                                <li><a href="index.php?page=news-features&tags=<?php echo $unique[$xi];?>"><?php echo $unique[$xi]." (".$xs.")";?></a></li>
                            <?php } } ?>
                            </ul>
                        </li>
                    </ul>
                    <div class="show-browse">
                        <select class="show-me-select-dropdown"  onchange="javascript:location.href = this.value;">
                             <option>Browse Topics</option>
                             <?php
                                 $x=count($unique);
                                 for($xi=0;$xi<$x;$xi++){
                                 if($unique[$xi]!=""){
                                    $showme = mysql_query("SELECT * FROM `news-features` WHERE SubType like '%$unique[$xi]%'") or die(mysql_error());
                                    $xs=mysql_num_rows($showme);
                                 ?>                    
                                    <option value="index.php?page=news-features&tags=<?php echo $unique[$xi];?>"><?php echo $unique[$xi]." (".$xs.")";?></option>
                                <?php } } ?>
                        </select>
                    </div>
                </div>
             </div>
         </div>
         <?php  } }
		 if($_GET['page'] == 'cities-events') {
            if($_GET['id'] == '') {
			$aTags=array();
			$cTags=array();
			$unique = array();
			while($tags = mysql_fetch_array($listcities)) {
				$unique[] = $tags['EventCities'];
				}
			} 
			} ?>
     <div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>