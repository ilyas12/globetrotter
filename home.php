
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
						$link = 'index.php?page='.$pagelink.'&id='.$bannerhome['ID'].'&t='.str_replace(" ","-",$bannerhome['Title']); 
					?>
                	<div class="swiper-slide">
	                    <a href="<?php echo $link; ?>">
                    	<img src="images/features/<?php echo $covpic['GalleryLink']; ?>" />
                        <div class="black_bar">
                            <div class="bgopac_black"></div>
                            <div class="text_bgopac" style="border-right: 1px solid #FFF;">
                                <div class="banner_content">
	                            	<div class="short_line_yellow"></div>
									<!--<div class="eventstype">
                                        <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$bannerhome['TypeOfCategory']); ?></span>
                                        <?php if($bannerhome['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $bannerhome['SubType']; ?></a><?php } ?>
                                    </div>-->
                                    <div class="banner_subtitle2" style=""><span style="color:#999;"><?php echo ucwords(str_replace(","," and ",$bannerhome['TypeOfCategory'])); ?></span> | <?php if($pagelink == 'cities-events') { echo $bannerhome['EventType']; } else { echo $bannerhome['SubType']; } ?></div>
                                    <div class="banner_title2"><?php echo $bannerhome['Title']; ?></div>
                                    <div class="banner_content_inside"><?php echo $bannerhome['SubTitle']; ?></div>
                                </div>
                            </div>
                        </div>
                        </a> 
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
            	<h1 class="content_title" style="border-top: 0;">
                NEWS/FEATURES
                </h1>
                <?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
                <?php if($advb['AdvPic']) { ?>
					<?php 
						if(file_exists("images/adv/".$advb['AdvPic'])) {
							$advlimit = 3;
						} else {
							$advlimit = 4;
						}
					?>
                <?php } ?>
                <?php $newsfeatureshomedb = mysql_query("SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'News, Features' ORDER BY DateWritten DESC LIMIT 0,".$advlimit."") or die(mysql_error()); ?>
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
					$link = 'index.php?page='.$pagelink.'&id='.$newsfeatureshome['ID'].'&t='.str_replace(" ","-",$newsfeatureshome['Title']); 
					$link2 = 'index.php?page=search&sub='.$newsfeatureshome['SubType']."&cat=".$newsfeatureshome['TypeOfCategory'];
                ?>
                <div class="left50">
                	<?php /*if($enablemember == false) { ?>
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
                    <?php }*/ ?>
                    <a href="<?php echo $link; ?>">
                            <div style="height: 400px;" class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location.href='<?php echo $link; ?>'">
                                <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" />
                                    <?php if($enablemember == true) { ?>
                                    <!--<div class="hoverimg"></div>-->
                                    <?php } ?>
                                </div>
                                <div class="card_content">
                                    <div class="eventstype">
                                        <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$newsfeatureshome['TypeOfCategory']); ?></span>
                                        <?php if($newsfeatureshome['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $newsfeatureshome['SubType']; ?></a><?php } ?>
                                    </div>
                                
                                    <div class="eventicon" style="width: inherit;">
                                        <div class="content_title1" style="height: 45px;"><?php echo $newsfeatureshome['Title']; ?></div>
                                        <div class="short_line_yellow"></div>
                                    </div>
                                
                                    <div class="heightvenuecontent">
                                        <p><?php echo limit_words($newsfeatureshome['SubTitle'],25); ?></p>
                                       
                                    </div>
                                    <?php if($enablemember == false) { ?>
                                    <div class="heightvenuecontentmember">
                                        <?php include 'messagememberpost.php'; ?>
                                    </div>
                                    <?php } ?>
                                </div>
                        </div>
                    </a>
                </div>
					<?php if($ad == 3) { ?>
				        <?php if($advb['AdvPic']) { ?>
							<?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                            
                            
                            <div class="left50" style="">
                                <a target="_blank" href="<?php echo $advb['AdvLink']; ?>">
                                    <div class="homefeatures" style="height: 400px !important;">
                                        <!--<div class="eventstype"><span style="color: #9e7a2d;">NEWS</span> | <a target="_blank" href="<?php echo $advb['AdvLink']; ?>">ADVERTISEMENT</a></div>-->
                                        <div class="advbox">
	                                        <img id="advertisementboxB" src="images/adv/<?php echo $advb['AdvPic']; ?>" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php $ad++; ?>
                <?php } ?>
                <div style="clear: both;"></div>
                <div class="view_all_button"><a href="index.php?page=news-features">View All News/Features</a></div>
            </div>
            
            <div class="content_content" style="display: none;">
            	<h1 class="content_title">VIDEO</h1>
                  <?php $g = 1; ?>
					<?php $gtvlinkdb = mysql_query("SELECT *, COUNT(*) FROM youtube GROUP BY YouTubeType ORDER BY COUNT(*) DESC limit 1 "); ?>
                    <?php while($gtvlink = mysql_fetch_array($gtvlinkdb)) { ?>
                   
							<?php $g++; ?>
                    <?php 
                                $gtvall = mysql_query("SELECT * FROM youtube WHERE YouTubeType = '$gtvlink[YouTubeType]' ORDER BY ID DESC limit 3");
                            ?>
                            <?php while($gtv = mysql_fetch_array($gtvall)) { ?>
                                <?php 
                                    $youtubelink = strafter($gtv['YouTubeLink'], "v=");
                                    $youtubelink = strbefore($youtubelink, "&");
                                ?>
                                 <div class="left31">
                                <a href="Javascript: void();" style="color:black;text-decoration:none" onclick="
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
                                </a>
                                </div>
                            <?php } ?>
                        <a style="display: none;" href="index.php?page=news-features&amp;id=9&amp;t=Music-Curation---Meet-Joe-Bryl-"></a>
                        <div style="display: none;height: 350px;" class="homefeatures" onclick="window.location.href='index.php?page=news-features&amp;id=9&amp;t=Music-Curation---Meet-Joe-Bryl-'"><a href="index.php?page=news-features&amp;id=9&amp;t=Music-Curation---Meet-Joe-Bryl-">
                            </a><div class="eventstype"><a href="index.php?page=news-features&amp;id=9&amp;t=Music-Curation---Meet-Joe-Bryl-"><span style="color: #9e7a2d;">persepectives</span> | </a><a href="index.php?page=search&amp;sub=music history &amp;cat=persepectives">music history </a></div>
                            <div class="img50height">
                                    <img src="images/features/1067505104.jpg" style="height: 100%;">
                                                                        <!--<div class="hoverimg"></div>-->
                                                                </div>
                            <div class="absolutedetails">
                            	<div class="margin15">
                                    <div class="eventicon" style="width: 100%;">
                                        <div class="content_title1" style="height: 60px; color: rgb(17, 17, 17);">Music Curation - Meet Joe Bryl </div>
                                        <div class="short_line_yellow"></div>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="inside_hidden" style="display: none;">
                                        <div class="heightvenuecontent">
                                        <p>I had the pleasure &amp; honor moderate a panel for Chicago Artists Resource which focused on the latest direction and future of music curation in the digital age. The list included Joe Bryl whose diverse sonic backgrounds reached exponentially deep in Chicago.</p>
                                        </div>
                                                                            </div>
                                    <br>
                                    <div class="content_inside">
                                                                                <div class="venuetime1"><p><span class="brandon">By</span>: Claire Molek</p></div>
                                        <div class="venuetime2"><p><span class="brandon">Date</span>: 11 Dec 2014</p></div>
                                        <div style="clear: both;"></div>
                                        <!--<div class="eventsocmed">
                                                                                        <a class="button_grey" href="index.php?page=news-features&id=9&t=Music-Curation---Meet-Joe-Bryl-">Read More</a>&nbsp;&nbsp;&nbsp;                                            <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                            <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                            <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                        </div>---->
                                    </div>
                                </div>
                            </div>
                        
                        <?php } ?>
                    
                </div>

                <div style="clear: both;"></div>
                <br>
                <div class="view_all_button" style="margin-top: 25px;">
                    <a href="index.php?page=gtv">View All Video</a>
                </div>
            </div>
            
            <div class="row">
                	<h1 class="content_title">Cities/Events</h1>
                
                <?php $citieseventshomedb = mysql_query("SELECT * FROM `news-features` WHERE Approval = 1 AND Type = 'Cities, Events' ORDER BY EventDate DESC LIMIT 0,3") or die(mysql_error()); ?>
                <?php if($countart = mysql_num_rows($citieseventshomedb) == 0) { echo '<div class="nodatabase">...No Data Yet...</div>';  }?>
				<?php while($citieseventshome = mysql_fetch_array($citieseventshomedb)) { ?>
                <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$citieseventshome[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,3")); ?>
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
                    
                    $link = 'index.php?page='.$pagelink.'&id='.$citieseventshome['ID'].'&t='.str_replace(" ","-",$citieseventshome['Title']); 
					$link2 = 'index.php?page=search&sub='.$citieseventshome['SubType']."&cat=".$citieseventshome['TypeOfCategory'];
                ?>
                <div class="left30relatedarticle">
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

                                    <div style="height: 330px;" class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location.href='<?php echo $link; ?>'">
                                    	<div <?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img width="100%" src="images/features/<?php echo $covpic['GalleryLink']; ?>" />
                                            <?php if($enablemember == true) { ?>
                                            <!--<div class="hoverimg"></div>-->
                                            <?php } ?>
                                        </div>
                                        <div class="card_content">
                							<div class="eventstype">
                                                <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$citieseventshome['TypeOfCategory']); ?></span>
                                                <?php if($citieseventshome['EventType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $citieseventshome['EventType']; ?></a><?php } ?>
                                            </div>
                                            
                                            <div class="eventicon">
                                                <div class="content_title1" style="height: 45px;"><?php echo $citieseventshome['Title']; ?></div>
                                                <div class="short_line_yellow"></div>
                                            </div>
                                       
                                     
                                        
                                            <div class="heightvenuecontent">
                                                
                                                <?php if($enablemember == false) { ?>
                                                <p style="font-style: italic;">This article is for <span style="font-weight: bold;">members only</span>.<br />
                                                Please <span id="signuppostbutton">sign up</span> or <span id="signinpostbutton">sign in</span> if you are a subscriber.</p>
                                                <?php } else{ ?>
                                                <p><?php echo limit_words($citieseventshome['SubTitle'],25); ?></p>
                                                <?php } ?>
                                            </div>
                                           
                                        </div>
                                        <div style="display: none;" class="absolutedetails">
                                        	<div class="margin15">
                                                <div class="mapicon"<?php if($citieseventshome['GoogleMap']) { ?> style="cursor: pointer;"<?php } ?>>
                                                    <img src="images/icon_map.jpg" width="100%" height="100%" />
                                                </div>
                                                <div class="eventicon">
                                                    <div class="content_title1" style="height: 45px;"><a href="<?php echo $link; ?>"><?php echo $citieseventshome['Title']; ?></a></div>
                                                    <div class="short_line_yellow"></div>
                                                </div>
                                                <div style="clear: both;"></div>
                                                <div class="inside_hidden">
                                                    <div class="heightvenuecontent">
                                                    <p><?php echo $citieseventshome['SubTitle']; ?></p>
                                                    </div>
                                                    <?php if($enablemember == false) { ?>
                                                    <div class="heightvenuecontentmember">
                                                        <?php include 'messagememberpost.php'; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <br />
                                                <div class="content_inside" style="" id="repsonsive_inside_content">
                                                    <?php if($citieseventshome['GoogleMap']) { ?><div class="googlemapoutside"><?php echo $citieseventshome['GoogleMap']; ?></div><?php } ?>
                                                    <div class="venuetime1" id="repsonsive_when"><p><span class="brandon">When</span>: <?php echo $citieseventshome['EventWhen']; ?></p></div>
                                                    <div class="venuetime2" id="repsonsive_where"><p><span class="brandon">Where</span>: <?php echo $citieseventshome['EventWhere'] ?></p></div>
                                                    <div style="clear: both;"></div>
                                                    <!---<div class="eventsocmed">
                                                        <a target="_blank" class="button_grey" href="<?php echo $citieseventshome['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
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
                <?php } ?>
                <div style="clear: both;"></div>
                <div class="view_all_button"><a href="index.php?page=cities-events">View All Cities/Events</a></div>
            </div>
            
           <!--- <div class="content_content">
            	<div class="content_title2">GTV</div>
                <img src="images/gtv.jpg" width="996" height="275" />
            </div>
            
            <div class="content_content">
            	<div class="content_title2">Radio</div>
                <img src="images/radio.jpg" width="996" height="219" />
            </div>--->
            
            
            <div style="display: none;" class="content_content">
            	<?php $mag = mysql_fetch_array(mysql_query("SELECT * FROM magazines WHERE Title != '' ORDER BY Edition DESC LIMIT 0,1")); ?>
            	<div class="content_title3">Magazine</div>
                <div class="bgwhite padding20" style="min-height: inherit;">
                    <div class="left48full">
                        <div class="image-height">
                            <?php include 'idangerous.swiper.config.homemagazine.php'; ?>
                            <div class="swiper-container-home" style="float: left;">
                                <a class="arrow-left-homemag" href="Javascript: void(0)"></a> 
                                <a class="arrow-right-homemag" href="Javascript: void(0)"></a>
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
                                <div class="currentissuetext"><?php echo $mag['Text']; ?></div>
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
		        <?php if($advc['AdvPic']) { ?>
					<?php if(file_exists("images/adv/".$advc['AdvPic'])) { ?>
                    <div style="clear: both;"></div>
                    <div id="adv_a" style="margin-bottom: 15px;">
                        <a target="_blank" href="<?php echo $advc['AdvLink']; ?>"><img src="images/adv/<?php echo $advc['AdvPic']; ?>" width="996" height="100" /></a>
                    </div>
                    <?php } ?>
                <?php } ?>
            <br />
        </div>
    </div>