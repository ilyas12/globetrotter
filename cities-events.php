<script src="files/jquery.isotope.min.js"></script>
<style>
.all{
-webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}
.active{
    color:#c1272d !important;
}
#content_center{
	min-height:578px;
}
</style>
<script>
$(window).load(function () {
var $container = $('#load_content_cities');
    
$container.isotope({itemSelector : '.left30relatedarticle'});
$("#filter-all").click(function() {
    //alert("A"); 
    $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({
            filter: '.all' 
        }); 
    
});
$("#filter-nightlife").click(function() { 
     $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({ filter: '.nightlife' });
});
$("#filter-festival").click(function() {  
     $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({ filter: '.festival' });
});
$("#filter-openings").click(function() { 
     $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({ filter: '.openings' });
});
$("#filter-exhibits").click(function() {
     $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({ filter: '.exhibits' });
});
$("#filter-misc").click(function() { 
     $('#link_content a.active').removeClass('active'); // remove the class from the currently selected
    $(this).addClass('active'); // add the class to the newly clicked link
    $container.isotope({ filter: '.misc' });
});

});
</script>

<!--
<link rel="stylesheet" href="files/pace.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="files/pace.js"></script>
-->
        <?php if($_GET['id'] == '') { ?> 
            <div id="content">
                <div id="link_content_fixed">
                    <div id="link_content" style="text-align: left;">
                    <div class="filter-events">
						<a href="javascript:void(0)" id="filter-all">All</a> |
						<a href="javascript:void(0)" id="filter-nightlife">Nightlife</a> |
						<a href="javascript:void(0)" id="filter-festival">Festival</a> |
						<a href="javascript:void(0)" id="filter-openings">Openings</a> |
						<a href="javascript:void(0)" id="filter-exhibits">Exhibits</a> |
						<a href="javascript:void(0)" id="filter-misc">Misc</a>
						<ul class="cities-select" id="cities-select">
                        <li>
                            <a href="javascript:void(0)">Cities &nbsp; &nbsp; &nbsp; <img class="arrow-show-me" src="icon/select-arrow.png"/></a>
                            <ul id="box-cities">
							<li><a href="index.php?page=cities-events&cities=all">All Cities</a></li>
                             <?php
                             $x=count($unique);
                             for($xi=0;$xi<$x;$xi++){
                             if($unique[$xi]!=""){
                                $showme = mysql_query("SELECT * FROM `news-features` WHERE EventCities='$unique[$xi]'") or die(mysql_error());
                                $xs=mysql_num_rows($showme);
                             ?>                    
                                <li><a href="index.php?page=cities-events&cities=<?php echo $unique[$xi];?>"><?php echo $unique[$xi]." (".$xs.")";?></a></li>
                            <?php } } ?>
                            </ul>
                        </li>
                    </ul>
                    <div class="show-cities">
                        <select class="cities-select-dropdown"  onchange="javascript:location.href = this.value;">
							<option value="index.php?page=cities-events&cities=all">All Cities</option>
                             <?php
                                 $x=count($unique);
                                 for($xi=0;$xi<$x;$xi++){
                                 if($unique[$xi]!=""){
                                    $showme = mysql_query("SELECT * FROM `news-features` WHERE EventCities like '%$unique[$xi]%'") or die(mysql_error());
                                    $xs=mysql_num_rows($showme);
                                 ?>                    
                                    <option value="index.php?page=cities-events&cities=<?php echo $unique[$xi];?>"><?php echo $unique[$xi]." (".$xs.")";?></option>
                                <?php } } ?>
                        </select>
                    </div>
                    </div>
                    </div>
                </div>
                <div id="content_center">
                	
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
									triggerPageThreshold: 20, // show load more if scroll more than this
									onRenderComplete: function() {
										jQuery('.homefeatures').hover(
											function() { 
												jQuery('.hoverimg', this).css('display', 'block');
												jQuery('.inside_hidden', this).css('display', 'block');
											},
											function() { 
												jQuery('.hoverimg', this).css('display', 'none');
												jQuery('.inside_hidden', this).css('display','none');
											}
										);
                                        /*
										var imgyh = $(".img50height img").height();
										var imgxh = $(".img50height img").width();
									
										if (imgyh > imgxh){
											jQuery(".img50height img").css('width', '100%');
										} else {
											jQuery(".img50height img").css('height', '100%');
										};
										var imgy = $(".img50 img").height();
										var imgx = $(".img50 img").width();
									
										if (imgy > imgx){
											jQuery(".img50 img").css('width', '100%');
										} else {
											jQuery(".img50 img").css('height', '100%');
										};*/
									}
								});
							});
						</script>
                        <div class="loadmore_content" id="load_content_cities">
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
                            <?php $link = 'index.php?page='.$_GET['page'].'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); ?>
                            <div class="all <?php echo $vb['EventType'];?> left30relatedarticle">
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
                                    <div style="height: 330px;" class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location.href='<?php echo $link; ?>'">
                                    	<div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" />
                                            <?php if($enablemember == true) { ?>
                                            <!--<div class="hoverimg"></div>-->
                                            <?php } ?>
                                        </div>
                                        <div class="card_content">
                							<div class="eventstype">
                                                <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?></span>
                                                <?php if($vb['EventType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $vb['EventType']; ?></a><?php } ?>
                                            </div>
                                            
                                            <div class="eventicon">
                                                <div class="content_title1" style="height: 45px;"><?php echo $vb['Title']; ?></div>
                                                <div class="short_line_yellow"></div>
                                            </div>
                                       
                                     
                                        
                                            <div class="heightvenuecontent">
                                                
                                                <?php if($enablemember == false) { ?>
                                                <p style="font-style: italic;">This article is for <span style="font-weight: bold;">members only</span>.<br />
                                                Please <span id="signuppostbutton">sign up</span> or <span id="signinpostbutton">sign in</span> if you are a subscriber.</p>
                                                <?php } else{ ?>
                                                <p><?php echo limit_words($vb['SubTitle'],25); ?></p>
                                                <?php } ?>
                                            </div>
                                           
                                        </div>
                                        <div style="display: none;" class="absolutedetails">
                                        	<div class="margin15">
                                                <div class="mapicon"<?php if($vb['GoogleMap']) { ?> style="cursor: pointer;"<?php } ?>>
                                                    <img src="images/icon_map.jpg" width="100%" height="100%" />
                                                </div>
                                                <div class="eventicon">
                                                    <div class="content_title1" style="height: 45px;"><a href="<?php echo $link; ?>"><?php echo $vb['Title']; ?></a></div>
                                                    <div class="short_line_yellow"></div>
                                                </div>
                                                <div style="clear: both;"></div>
                                                <div class="inside_hidden">
                                                    <div class="heightvenuecontent">
                                                    <p><?php echo $vb['SubTitle']; ?></p>
                                                    </div>
                                                    <?php if($enablemember == false) { ?>
                                                    <div class="heightvenuecontentmember">
                                                        <?php include 'messagememberpost.php'; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <br />
                                                <div class="content_inside" style="" id="repsonsive_inside_content">
                                                    <?php if($vb['GoogleMap']) { ?><div class="googlemapoutside"><?php echo $vb['GoogleMap']; ?></div><?php } ?>
                                                    <div class="venuetime1" id="repsonsive_when"><p><span class="brandon">When</span>: <?php echo $vb['EventWhen']; ?></p></div>
                                                    <div class="venuetime2" id="repsonsive_where"><p><span class="brandon">Where</span>: <?php echo $vb['EventWhere'] ?></p></div>
                                                    <div style="clear: both;"></div>
                                                    <!---<div class="eventsocmed">
                                                        <a target="_blank" class="button_grey" href="<?php echo $vb['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/facebook.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/twitter.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/google.jpg" width="20" height="20" /></a>
                                                    </div>---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            	
                                <?php $ad++; ?>
                            <?php endwhile ?>
                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                        <!--page navigation-->
                        <?php if (isset($next)): ?>
                        <div class="load_more"><a href="index.php?page=cities-events&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                        <?php endif?><!--.wrap-->
                        
                    </div>
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
			        <?php if($advc['AdvPic']) { ?>
						<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                        <div style="clear: both;"></div>
                        <div id="adv_a" style="margin-bottom: 15px;">
                            <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
			<?php
                $content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]' LIMIT 0,1"));
            ?>
            <div id="banner">
            <?php
            $vbdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$_GET[id]' ORDER BY GalleryCover DESC, GalleryOrder ASC") or die(mysql_error());;
            $timage = mysql_num_rows($vbdb);           
            if($timage>1){
            ?>
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        
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
                            <?php if($enablemember == true) { ?>
                                <a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>">
                            <?php } ?>
                            <div class="gallerynameposition">
                                <div class="gallery_black_cross">+</div>
                            </div>
                            <img src="images/features/<?php echo $vb['GalleryLink'] ?>" />
                            <?php if($enablemember == true) { ?>
                                </a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Scrollbar: -->
                <div class="swiper-scrollbar"></div> 
                <?php } else{ 
                    $vb = mysql_fetch_array($vbdb);
                    ?>
                     <div id="content_center">
                        <img src="images/features/<?php echo $vb['GalleryLink'] ?>" width="100%"/>
                    </div>
                     
                <?php } ?> 
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
                                    <div style="clear:both;"></div>
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['EventType']) { ?> | <span style="color: #c1272d;"><?php echo $content['EventType']; ?></span><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby" style="margin-bottom: 5px;">When: <span style="color: #c1272d;"><?php echo $content['EventWhen']; ?></span><br />Where: <span style="color: #c1272d;"><?php echo $content['EventWhere']; ?></span></div>
                                    <br />
                                    <a target="_blank" style="margin-bottom: 10px;float: right;" class="button_grey" href="<?php echo $content['EventJoin']; ?>">Join Event</a>
                                    <div style="clear: both;"></div>
                                    <?php if($content['GoogleMap']) { ?><div class="googlemap"><?php echo $content['GoogleMap']; ?></div><?php } ?>
                                    
                                    <!--<div style="height: 70px; margin-top: 5px;">
                                        <span class='st_facebook_vcount' displayText='Facebook'></span>
                                        <span class='st_twitter_vcount' displayText='Tweet'></span>
                                    </div>-->
                                    <div class="social-container">
                                		<div class="links">
                                		 
                                        
                                		<i  class="wordsby">Share</i> :<a href="#" data-type="twitter" data-url="<?php echo $actual_link;?>" data-description="<?php echo $content['Quote'];?>" data-via="globetrottermag" class="prettySocial fa fa-twitter"></a>
                                
                                		<a href="#" data-type="facebook" data-url="<?php echo $actual_link;?>" data-description="<?php echo $content['Quote'];?>" class="prettySocial fa fa-facebook"></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                               		   </div>
                                	
                                	</div>                                    
                                </div>
                            </div>
                            <div class="right75">
                            	<div class="articletitlemobile">
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="short_line_yellow" style="width: 20px; margin: 5px 0;"></div>
                                    <div class="content_title4" style="text-align: left;"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby" style="text-align: left;">When: <span style="color: #c1272d;"><?php echo $content['EventWhen']; ?></span><br />Where: <span style="color: #c1272d;"><?php echo $content['EventWhere']; ?></span></div>
                                   
                                    <div style="clear: both;"></div>
                                   
                                </div>
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
                        
						<?php 
                        $countnext=0;
                        $countprev=0;
                            $prevdb = mysql_query("SELECT * FROM `news-features` WHERE ID < '$_GET[id]' AND Type = '".$content['Type']."' ORDER BY ID DESC LIMIT 0,1");
                            if( $prevdb){
                            $countprev = mysql_num_rows($prevdb);
                            }
                        ?>
                        <?php if($countprev > 0) { 
                        $prev = mysql_fetch_array($prevdb);   
                        $link = 'index.php?page='.$_GET['page'].'&id='.$prev['ID'].'&t='.str_replace(" ","-",$prev['Title']); 
                        ?>
                        <div class="left50nav">
                        	<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<!--<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
                            	<div>-->  
                                 <i class="fa fa-chevron-left"></i> PREVIOUS 
                                <br />
                                <span class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `news-features` WHERE ID > '$_GET[id]' AND Type = '".$content['Type']."' ORDER BY ID ASC LIMIT 0,1");
                            if($nextdb){
                            $countnext = mysql_num_rows($nextdb);
                            }
                        ?>
                        <?php if($countnext > 0) { 
                        $next = mysql_fetch_array($nextdb);
                        $link = 'index.php?page='.$_GET['page'].'&id='.$next['ID'].'&t='.str_replace(" ","-",$next['Title']);    
                        ?>
                        <div class="right50nav">
                        	<a style="text-align: right;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            NEXT <i class="fa fa-chevron-right"></i>
                            	<!--<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	-->
                                <br />
                                <span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>
                                    <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
							        <?php if($advb['AdvPic']) { ?>
										<?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                        <div style="clear: both;"></div>
                                        <div id="adv_a" style="margin-bottom: 15px;">
                                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>">
                                                <img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="100%" />
                                            </a>
                                        </div>
                                        <?php } ?>
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
                    if($likedb){
					   $relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND ".$likedb." AND (Type LIKE '%cities%' OR Type LIKE '%events%') ORDER BY ID DESC LIMIT 0,3")or die(mysql_error());
					}else{
                        $relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND (Type LIKE '%cities%' OR Type LIKE '%events%') ORDER BY ID DESC LIMIT 0,3")or die(mysql_error());
                    }   
                    $cek=mysql_num_rows($relatedartdb);
                       if($cek>1){
                    ?>
                    <?php while($relatedart = mysql_fetch_array($relatedartdb)) { ?>
                    	<?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$relatedart[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php $link = 'index.php?page='.$_GET['page'].'&id='.$relatedart['ID'].'&t='.str_replace(" ","-",$relatedart['Title']); ?>
                        <div class="left30relatedarticle">
							<div style="height:330px" class="homefeatures">
								<div class="img30">
									<a href="<?php echo $link; ?>">
										<img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
										<!--<div class="hoverimg"></div>-->
									</a>
								</div>
								<div class="banner_subtitle2" style=""><?php echo ucwords(str_replace(","," and ",$relatedart['TypeOfCategory'])); ?></div>
								<div class="content_title30"><?php echo $relatedart['Title']; ?></div>
							</div>
                        </div>
                    <?php } } ?>
                    <div style="clear: both;"></div>
                    <br />
                    <?php $advc = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'C' LIMIT 0,1")); ?>
			        <?php if($advc['AdvPic']) { ?>
						<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                        <div style="clear: both;"></div>
                        <div id="adv_a" style="margin-bottom: 15px;">
                            <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <br /><br />
                </div>
            </div>
        <?php } ?>
<script>
/*
function load_this(param)
{
    if(param=='all'){
        $("#load_content_cities").load("load/cities-events.php?page=cities-events");
    }else{
        $("#load_content_cities").load("load/cities-events.php?page=cities-events&sub="+param);
    }
}
$(function () {
    $('.filter').on('click', function () {
        var ajax_data = $(this).attr('data-id');
        jQuery.ajax({
            type: "POST",
            url: "load/cities-events.php",
            data: ajax_data,
            dataType: 'json',
            cache: false,
            success: function(response) {
              if (response.length > 0) {
                var $container = $('#load_content_cities');
                var msnry = $container.data('masonry');
                var elems = [];
                var fragment = document.createDocumentFragment();
                for (var x in response) {
                  var elem = $(response[x]).get(0);
                  fragment.appendChild(elem);
                  elems.push(elem);
                }
                $container.appendChild(fragment);
                msnry.appended(elems);
              }
            }
          });
    });
});*/
</script>