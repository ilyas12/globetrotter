
    	<?php 
        if($_GET['id'] == '') {
		  if($_GET['tags']==''){  
          ?>
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
                            <a href="index.php?page=<?php echo $_GET['page'];?>&id=<?php echo $vb['ID'] ?>&t=<?php echo str_replace(" ","-",$vb['Title']); ?>">
                            <img src="images/features/<?php echo $covpic['GalleryLink'] ?>" />
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac" style="border-right: 1px solid #FFF;">
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
										jQuery(".img50 img").css('width', '100%');
									};
									var imgy = $(".img50 img").height();
									var imgx = $(".img50 img").width();
								
									if (imgy > imgx){
										jQuery(".img50 img").css('width', '100%');
									} else {
										jQuery(".img50 img").css('width', '100%');
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
                                                <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?></span>
                                                <?php if($vb['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $vb['SubType']; ?></a><?php } ?>
                                            </div>
                                        
                                            <div class="eventicon" style="width: inherit;">
                                                <div class="content_title1" style="height: 45px;"><?php echo $vb['Title']; ?></div>
                                                <div class="short_line_yellow"></div>
                                            </div>
                                       
                                            <div class="heightvenuecontent">
                                                
                                                <?php if($enablemember == false) { ?>
                                                <p style="font-style: italic;">This article is for <span style="font-weight: bold;">members only</span>.<br />
                                                Please <span id="signuppostbutton">sign up</span> or <span id="signinpostbutton">sign in</span> if you are a subscriber.</p>
                                                <?php } else{ 
                                                if($vb['SubTitle']!=""){    
                                                ?>
                                                
                                                <p><?php echo limit_words($vb['SubTitle'],25); ?></p>
                                                <?php } else{ ?>
                                                <p>&nbsp;</p>
                                               <?php  } 
                                               } ?>
                                            </div>
                                           
                                        </div>
                                    </div>
                        
                    </a>

                            </div>
                            <?php if($ad % 5==0) { ?>
                                	<?php $advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
									<?php if($advb['AdvPic']) { ?>
                                        <?php if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                                        
                                        
                                        <div class="left50" style="">
                                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>">
                                                <div style="height: 400px;"  class="homefeatures">
                                                    <!--<div class="eventstype"><span style="color: #9e7a2d;">NEWS</span> | <a target="_blank" href="<?php echo $advb['AdvLink']; ?>">ADVERTISEMENT</a></div>
                                                    -->
                                                    <div class="advbox">
                                                    <img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="450" height="400" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        
                                        
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php $ad++; ?>
                            <?php endwhile?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                            <div class="load_more"><a href="index.php?page=news-features&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
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
        <?php 
        }else{ 
            $tags=$_GET['tags'];
            ?>
             <div id="banner">
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $vbdb = mysql_query("SELECT * FROM `news-features` WHERE SubType='$tags' AND VisibleAtBanner = 1 AND Approval = 1 ORDER BY DateWritten DESC") or die(mysql_error());
                        ?>
                        <?php while($vb = mysql_fetch_array($vbdb)) { ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
                        <div class="swiper-slide">
                            <a href="index.php?page=<?php echo $_GET['page'];?>&id=<?php echo $vb['ID'] ?>&t=<?php echo str_replace(" ","-",$vb['Title']); ?>">
                            <img src="images/features/<?php echo $covpic['GalleryLink'] ?>" />
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac" style="border-right: 1px solid #FFF;">
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
            	<h1 class="content_title" style="border-top: 0;">
                NEWS/FEATURES
                </h1>
                    	<div class="loadmore_content">
                        	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
                            <?php 
                            $ad = 1;
				            while ($vb = mysql_fetch_array($query)):
                            $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$vb[ID]' AND GalleryCover = 1 ORDER BY ID DESC LIMIT 0,1")); ?>
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
                                            /*function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'none');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'block');
                                            },
                                            function() { 
                                                jQuery('.heightvenuecontent', this).css('display', 'block');
                                                jQuery('.heightvenuecontentmember', this).css('display', 'none');
                                            }*/
                                        );
                                    });
                                </script>
                                <?php } ?>
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
                                                <span style="color: #9e7a2d;"><?php echo str_replace(","," and ",$vb['TypeOfCategory']); ?></span>
                                                <?php if($vb['SubType']) { ?> | <a href="<?php echo $link2; ?>"><?php echo $vb['SubType']; ?></a><?php } ?>
                                            </div>
                                        
                                            <div class="eventicon" style="width: inherit;">
                                                <div class="content_title1" style="height: 40px;"><?php echo $vb['Title']; ?></div>
                                                <div class="short_line_yellow"></div>
                                            </div>
                                       
                                            <div class="heightvenuecontent">
                                                
                                                <?php if($enablemember == false) { ?>
                                                <p style="font-style: italic;">This article is for <span style="font-weight: bold;">members only</span>.<br />
                                                Please <span id="signuppostbutton">sign up</span> or <span id="signinpostbutton">sign in</span> if you are a subscriber.</p>
                                                <?php } else{ 
                                                if($vb['SubTitle']!=""){    
                                                ?>
                                                
                                                <p><?php echo limit_words($vb['SubTitle'],25); ?></p>
                                                <?php } else{ ?>
                                                <p>&nbsp;</p>
                                               <?php  } 
                                               } ?>
                                            </div>
                                           
                                        </div>
                                    </div>
                            </a>

                            </div>
                                <?php $ad++; ?>
                            <?php endwhile?>
	                        <div style="clear: both;"></div>
                            <!--page navigation-->
							<?php if (isset($next)): ?>
                            <div class="load_more"><a href="index.php?page=news-features&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
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
        <?php    }
        }else { ?>
			<?php
                $content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]' LIMIT 0,1"));
                $vbdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$_GET[id]' ORDER BY GalleryCover DESC, GalleryOrder ASC") or die(mysql_error());
                $count = mysql_num_rows($vbdb);
            ?>
            <div id="banner">
            <?php if($count>1){?>
                <!----- BANNER ----->
                <?php include 'idangerous.swiper.config.php'; ?>
                <a class="arrow-left" href="Javascript: void(0)"></a> 
                <a class="arrow-right" href="Javascript: void(0)"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                          
							if($count == 0) {
								header("Location: index.php?page=news-features");
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
	                            <?php if($enablemember == true) { ?><a class="fancybox" rel="group1" href="images/features/<?php echo $vb['GalleryLink'] ?>"><?php } ?><div class="gallerynameposition"><div class="gallery_black_cross">+</div></div><img src="images/features/<?php echo $vb['GalleryLink'] ?>" /><?php if($enablemember == true) { ?></a><?php } ?>
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
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="content_title4"><?php echo $content['Title']; ?></div>
                                    <?php	
                                    if($content['Quote']) {
			                             echo '<div class="quotecontent">'.$content['Quote'].'</div>';
						              }
                                     ?>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby"><i>By</i>: <a href="index.php?page=perspectives&u=<?php echo $written['UserID']; ?>"><?php echo $written['Name']; ?></a></div>
                                    <div class="wordsby"> <i>Topics</i> :
                                    <?php
                                    $tags=explode(",",$content['Tags']);
                                    foreach($tags as $t){
                                        echo " <a href='index.php?page=news-features&tags=".trim($t)."'>".trim($t)."</a> ";
                                    }
                                   
                                    ?>
                                    </div>
                                    <!--<div style="height: 70px;">
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
                                    
                                    <div style="clear: both;"></div>
                                </div>
                            </div>
                            <div class="right75">
                            	<div class="articletitlemobile">
                                    <div class="sub_link4"><?php echo ucwords(str_replace(","," and ",$content['TypeOfCategory'])); ?><?php if($content['SubType']) { ?> | <a href=""><?php echo $content['SubType']; ?></a><?php } ?></div>
                                    <div class="short_line_yellow" style="width: 20px; margin: 5px 0;"></div>
                                    <div class="content_title4" style="text-align: left;"><?php echo $content['Title']; ?></div>
                                     <?php	
                                    if($content['Quote']) {
			                             echo '<div class="quotecontent">'.$content['Quote'].'</div>';
						              }
                                     ?>
                                    <?php $written = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                    <div class="wordsby" style="text-align: left;">By: <a href="index.php?page=perspectives&u=<?php echo $written['UserID']; ?>"><?php echo $written['Name']; ?></a></div>

                                    <div class="wordsby"> Topics : 
                                    <?php
                                    $tags=explode(",",$content['Tags']);
                                    foreach($tags as $t){
                                        echo "<a href='index.php?page=news-features&tags=".trim($t)."'>".trim($t)."</a> ";
                                    }
                                    ?>
                                    </div>
                                    <div class="social-container">
                                		<div class="links">
                                		<a href="#" data-type="twitter" data-url="http://sonnyt.com/prettySocial" data-description="Custom share buttons for Pinterest, Twitter, Facebook and Google Plus." data-via="sonnyt" class="prettySocial fa fa-twitter"></a>
                                
                                		<a href="#" data-type="facebook" data-url="http://sonnyt.com/prettySocial" data-title="prettySocial - custom social share buttons." data-description="Custom share buttons for Pinterest, Twitter, Facebook and Google Plus." data-media="http://sonnyt.com/assets/imgs/prettySocial.png" class="prettySocial fa fa-facebook"></a>
                                
                               		   </div>
                                		<script type="text/javascript">
                                			$('.prettySocial').prettySocial();
                                		</script>
                                	</div>
                                    <!--<div style="text-align: left;">
                                        <span class='st_facebook_vcount' displayText='Facebook'></span>
                                        <span class='st_twitter_vcount' displayText='Tweet'></span>
                                    </div>-->
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
                        <table style="border:0.5px solid #ccc;" cellspacing="0" width="100%">
							<tr>
								<td width="40%" align="left">
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
									<a style="text-align: left;" class="buttons_nav_page_article" href="<?php echo $link; ?>">
										<!--<div style="position: absolute; left: 10px; top: 50%; margin-top: -14px;"><img src="images/prev_article.png" width="27" height="27" /></div>
										<div>-->  
										 <i class="fa fa-chevron-left" style="font-size: 14px;"></i> PREVIOUS 
										<br />
										<span class="button_nav_page_article_sub"><?php echo $prev['Title']; ?></span>
									</a>
								<?php } ?>
								</td>
								<td width="20%" align="center" style="border-right:0.5px solid #ccc;border-left:0.5px solid #ccc;">
									<a class="buttons_nav_page_article" href="index.php?page=news-features">
										<span style="font-family: 'brandon_grotesquemedium', Arial, Helvetica, sans-serif;font-size: 16px;" class="button_nav_page_article_sub">News & Features</span>
									</a>
								</td>
								<td width="40%" align="right">
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
									NEXT <i class="fa fa-chevron-right" style="font-size: 14px;"></i>
										<!--<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
										-->
										<br />
										<span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
									</a>
								</div>
								<?php } ?>
								</td>
							</tr>
						</table>
						<?php 
						/*
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
                                 <i class="fa fa-chevron-left" style="font-size: 14px;"></i> PREVIOUS 
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
                            NEXT <i class="fa fa-chevron-right" style="font-size: 14px;"></i>
                            	<!--<div style="position: absolute; right: 10px; top: 50%; margin-top: -14px;"><img src="images/next_article.png" width="27" height="27" /></div>
                            	-->
                                <br />
                                <span class="button_nav_page_article_sub"><?php echo $next['Title']; ?></span>
                            </a>
                        </div>
                        <?php }*/ ?>
                        <div style="clear: both;"></div>
                    </div>
                    <br />
                    
					<?php //$advb = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'B' LIMIT 0,1")); ?>
			        <?php //if($advb['AdvPic']) { ?>
						<?php //if(file_exists("images/adv/".$advb['AdvPic'])) { ?>
                        <!---<div style="clear: both;"></div>
                        <div id="adv_a" style="margin-bottom: 15px;">
                            <a target="_blank" href="<?php echo $advb['AdvLink']; ?>"><img src="images/adv/<?php echo $advb['AdvPic']; ?>" width="996" height="100" /></a>
                        </div>--->
                        <?php //} ?>
                    <?php //} ?>
                    
                	<!--<div class="line_brown"></div>-->
                    <div class="relatedarticlestitle">Related Articles</div>
                    <?php //$relateddb = mysql_query("SELECT * FROM `news-features` WHERE ID = '$_GET[id]'")or die(mysql_error()); ?>
					<?php
                        $relateddb = mysql_query("SELECT * FROM `news-features`")or die(mysql_error());
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
