		<?php 
            if($_GET['sub'] == '') { 
                $_GET['sub'] = 'all';
            }
        ?>
        <div id="content">
        <div id="link_content_fixed">
                    <div id="link_content">
                        <a<?php if($_GET['sub'] == 'current') { ?> style="color: #c1272d;"<?php } ?> href="index.php?page=<?php echo $_GET['page']; ?>&sub=current">Current Issue</a>
                        | 
                        <a<?php if($_GET['sub'] == 'all') { ?> style="color: #c1272d;"<?php } ?> href="index.php?page=<?php echo $_GET['page']; ?>&sub=all">All Issue</a>
                        | 
                        <a<?php if($_GET['sub'] == 'distribution') { ?> style="color: #c1272d;"<?php } ?> href="index.php?page=<?php echo $_GET['page']; ?>&sub=distribution">Distribution</a>
                        | 
                        <a<?php if($_GET['sub'] == 'team') { ?> style="color: #c1272d;"<?php } ?> href="index.php?page=<?php echo $_GET['page']; ?>&sub=team">Team</a>
                    </div>
                </div>
                <br />
            <div id="content_center">
                
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
                        $link = 'index.php?page='.$_GET['page'].'&sub=all&id='.$prev['MagazineID'].'&t='.str_replace(" ","-",$prev['Title']);
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
                        $link = 'index.php?page='.$_GET['page'].'&sub=all&id='.$next['MagazineID'].'&t='.str_replace(" ","-",$next['Title']);
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
								triggerPageThreshold: 20 // show load more if scroll more than this
							});
						});
					</script>
                    <div class="loadmore_content">
                    	<?php if($nodatabase) { echo '<div class="nodatabase">'.$nodatabase.'</div>'; } ?>
						<?php while($mag = mysql_fetch_array($query)): ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC LIMIT 0,1")); ?>
                        <?php $link = 'index.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$mag['MagazineID'].'&t='.str_replace(" ","-",$mag['Title']); ?>
                        <div class="left50">
                            <div class="img50">
                                <a href="<?php echo $link; ?>">
                                    <img src="images/magazines/thumbnails/<?php echo $covpic['Image'] ?>" />
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
                    <div class="load_more"><a href="index.php?page=magazine&sub=all&p=<?php echo $next?>"><img src="images/loadmore.png" width="24" height="24" /></a></div>
                    <?php endif?>
                    <?php } else { ?>
                    	<?php $magdb = mysql_query("SELECT * FROM magazines WHERE MagazineID = '$_GET[id]' LIMIT 0,1"); ?>
                        <?php 
							$countmag = mysql_num_rows($magdb);
							if($countmag == 0) {
								header("Location: index.php?page=magazine&sub=".$_GET['sub']);
								exit;
							}
						?>
						<?php 
                        $mag = mysql_fetch_array($magdb);
                        ?>
                        <div style="display: none;">
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
                            $link = 'index.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$prev['MagazineID'].'&t='.str_replace(" ","-",$prev['Title']);
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
                            $link = 'index.php?page='.$_GET['page'].'&sub='.$_GET['sub'].'&id='.$next['MagazineID'].'&t='.str_replace(" ","-",$next['Title']);
                        ?>
                        <?php if($countnext > 0) { ?>
                        <div class="right50nav">
                        	<a style="text-align: right;" class="buttons_nav_page_magazine" href="<?php echo $link; ?>">
                            	<img src="images/next_article.png" width="27" height="27" />
                            </a>
                        </div>
                        <?php } ?>
                        </div>
                        <div style="float: left;">
                        <div class="left50">
                        <?php
                        $vbdb = mysql_query("SELECT * FROM `magazinespictures` WHERE MagazineID = '$mag[MagazineID]' ORDER BY ID ASC limit 0,1") or die(mysql_error());;
                        ?>
                        <?php $vb = mysql_fetch_array($vbdb);?>
                        <img src="images/magazines/large/<?php echo $vb['Image']; ?>" height="100%" width="100%" style="padding-bottom: 10px;" />
                        <br />
                        <a class="buyme" href="addcart.php?id=<?php echo $mag['MagazineID'];?>&price=<?php echo $mag['Price'];?>&qty=1">Buy Me</a>
                        <!--<a class="buyyear" href="">Buy Us For a Year</a>-->
                        <br />
                        <!--<form style="padding-top: 20px;" action="inquiry.php" method="POST" name="form1" id="form1">
                         <table border="0" style="width: 100%;">
                            <tr>
                                <td colspan="5">Inquiry</td>
                               
                            </tr>
                            <tr>
                                <td colspan="2">Call Center</td>
                                <td>:021 777 22 33</td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="5">or</td>
                            </tr>
                            <tr>
                                <td style="width: 60px">Email Us</td>
                                <td>Name</td> 
                                <td><input type="text" name="nama" style="width: 100%;"/></td>
                                <td>Email </td>
                                <td><input type="email" name="email" style="width: 100%;"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                <textarea style="width:100%" rows="3" name="pesan"></textarea>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <input class="btn-send" type="submit" value="Send"/>
                        </form>-->
                        </div>
                        <div class="left50">
                        <div class="magazinedistributiontitle" style="padding-top: 0px;top: -10px;">GLOBETROTTER</div>
                        <div class="magazinedistributiontitle"><?php echo $mag['Title']; ?></div>
                        <div style="float: left;">
                        <table border="0">
                            <tr>
                                <td>Issue</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr valign="top">
                                <td>Price<br /><span style="color:#9e7a2d;">(<?php echo $mag['Edition']; ?> editions)</span></td>
                                <td>:</td>
                                <td>$<?php echo $mag['Price']; ?></td>
                            </tr>
                        </table>
                           <!-- <span class="magazine_price_list"></span>
                            <?php if($mag['Length']) { echo ' | '.$mag['Length']; } ?> | 
                            <span class="magazine_status"><?php echo $mag['Status']; ?></span>-->
                        </div>
                        <!--<div class="right14" style="margin-top: 35px;"><a class="ordernow" href="">ORDER NOW</a></div>-->
                        <br />
                         <div style="clear: both;"></div>
                        <p>ISSUE :</p>
		                <div class="magazinedistributiontext"><?php echo $mag['Text']; ?></div>
	                    <br /><br /><br />
                        </div>
                        </div>
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
            </div>
        </div>