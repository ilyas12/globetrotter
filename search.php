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
									};
								}
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
                            <?php $link = 'index.php?page='.$_GET['page'].'&id='.$vb['ID'].'&t='.str_replace(" ","-",$vb['Title']); ?>
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
                                    <div class="homefeatures<?php if($enablemember == false) { ?> enablemember<?php } ?>" onclick="window.location.href='<?php echo $link; ?>'">
                                    	<?php if(strpos($vb['TypeOfCategory'],'events') !== false || strpos($vb['TypeOfCategory'],'cities') !== false) { ?>
	                                    <div class="eventstype"><span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?></span><?php if($vb['EventType']) { ?> | <a href="index.php?page=search&sub=<?php echo $vb['EventType']; ?>&cat=<?php echo $vb['TypeOfCategory']; ?>"><?php echo $vb['EventType']; ?></a><?php } ?></div>
                                        <?php } else { ?>
                                        <div class="eventstype"><span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?></span><?php if($vb['SubType']) { ?> | <a href=""><?php echo $vb['SubType']; ?></a><?php } ?></div>
                                        <?php } ?>
                                        <div class="img50"<?php if($enablemember == false) { ?> style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"<?php } ?>>
                                            <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" />
                                            <?php if($enablemember == true) { ?>
                                            <!--<div class="hoverimg"></div>-->
                                            <?php } ?>
                                        </div>
                                        <div class="absolutedetails">
                                        	<div class="margin15">
                                                <div class="eventicon" style="width: 100%;">
                                                    <div class="content_title1" style="height: 60px;"><a href="<?php echo $link; ?>"><?php echo $vb['Title']; ?></a></div>
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
                                                <div class="content_inside">
                                                    <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$vb[WrittenBy]' LIMIT 0,1")); ?>
                                                    <?php if($vb['Type'] == 'News, Features') { ?>
                                                    <div class="venuetime1"><p><span class="brandon">By</span>: <?php echo $writer['Name']; ?></p></div>
                                                    <div class="venuetime2"><p><span class="brandon">Date</span>: <?php echo date("d M Y", strtotime($vb['DateWritten'])); ?></p></div>
                                                    <div style="clear: both;"></div>
                                                    <!---<div class="eventsocmed">
                                                        <a class="button_grey" href="<?php echo $link; ?>">Read More</a>&nbsp;&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/facebook.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/twitter.jpg" width="24" height="24" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/google.jpg" width="24" height="24" /></a>
                                                    </div>--->
                                                    <?php } else { ?>
                                                    
                                                    <div class="venuetime1"><p><span class="brandon">When</span>: <?php echo $vb['EventWhen']; ?></p></div>
                                                    <div class="venuetime2"><p><span class="brandon">Where</span>: <?php echo $vb['EventWhere'] ?></p></div>
                                                    <div style="clear: both;"></div>
                                                    <!---<div class="eventsocmed">
                                                        <a target="_blank" class="button_grey" href="<?php echo $vb['EventJoin']; ?>">Join Event</a>&nbsp;&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/facebook.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/twitter.jpg" width="20" height="20" /></a>&nbsp;&nbsp;
                                                        <a href=""><img src="images/socmed/google.jpg" width="20" height="20" /></a>
                                                    </div>---->
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            	<?php //if($ad == 2) { ?>
                                    <?php //$advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
							        <?php //if($advb['AdvPic']) { ?>
										<?php //if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                        <!---<div style="clear: both;"></div>
                                        <div id="adv_a" style="margin-bottom: 15px;">
                                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                                        </div>--->
                                        <?php //} ?>
                                    <?php //} ?>
                                <?php //} ?>
                                <?php $ad++; ?>
                            <?php endwhile?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                            <div class="load_more"><a href="index.php?page=search&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                            <?php endif?>
                        </div>
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
								header("Location: index.php?page=news-features");
								exit;
							} 
                        ?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                        <div class="swiper-slide">
                            <a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>"><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/features/<?php echo $vb['GalleryLink'] ?>" /></a>
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
                                    <div style="clear:both;"></div>
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby">By: <a href="index.php?page=perspectives&u=<?php echo $written['UserID']; ?>"><?php echo $written['Name']; ?></a></div>
                                    <div style="height: 70px;">
                                        <span class='st_facebook_vcount' displayText='Facebook'></span>
                                        <span class='st_twitter_vcount' displayText='Tweet'></span>
                                    </div>
                                    <div style="clear: both;"></div>
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
												if($content['Quote']) {
													echo '<div class="quotecontent">'.$content['Quote'].'</div>';
												}
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
                            $prevdb = mysql_query("SELECT * FROM `news-features` WHERE ID < '$_GET[id]' AND Type = '".$content['Type']."' ORDER BY ID DESC LIMIT 0,1");
                            $prev = mysql_fetch_array($prevdb);
                            $countprev = mysql_num_rows($prevdb);
                            $link = 'index.php?page='.$_GET['page'].'&id='.$prev['ID'].'&t='.str_replace(" ","-",$prev['Title']);
                        ?>
                        <?php if($countprev > 0) { ?>
                        <div class="left50nav">
                        	<a style="text-align: right;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
                            	<div>PREVIOUS</div>
                                <div class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></div>
                            </a>
                        </div>
                        <?php } ?>
						<?php 
                            $nextdb = mysql_query("SELECT * FROM `news-features` WHERE ID > '$_GET[id]' AND Type = '".$content['Type']."' ORDER BY ID ASC LIMIT 0,1");
                            $next = mysql_fetch_array($nextdb);
                            $countnext = mysql_num_rows($nextdb);
                            $link = 'index.php?page='.$_GET['page'].'&id='.$next['ID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50nav">
                        	<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
                            	<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	<div>NEXT</div>
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
                                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
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
						$relatedartdb = mysql_query("SELECT * FROM `news-features` WHERE ID != '$_GET[id]' AND ".$likedb." ORDER BY ID DESC LIMIT 0,3");
					?>
                    <?php while($relatedart = mysql_fetch_array($relatedartdb)) { ?>
                    	<?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$relatedart[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php $link = 'index.php?page='.$_GET['page'].'&id='.$relatedart['ID'].'&t='.str_replace(" ","-",$relatedart['Title']); ?>
                        <div class="left30relatedarticle">
                            <div class="img30">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/features/<?php echo $covpic['GalleryLink']; ?>" width="100%" />
                                    <!--<div class="hoverimg"></div>-->
                                </a>
                            </div>
                            <div class="banner_subtitle2" style=""><?php echo ucwords(str_replace(","," and ",$relatedart['TypeOfCategory'])); ?></div>
                            <div class="content_title30"><?php echo $relatedart['Title']; ?></div>
                        </div>
                    <?php } ?>
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