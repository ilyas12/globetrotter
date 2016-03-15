		<?php if($_GET['id'] == '') { ?>
        <div id="content">
			<div style="background:#000;">
				<div id="content_gtv_set">
					<div class="content_content" style="padding:0px;">
            
						<?php $gtvlatest = mysql_fetch_array(mysql_query("SELECT * FROM youtube ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php 
                            
                            $youtubelink = strafter($gtvlatest['YouTubeLink'], "v=");
                            $youtubelink = strbefore($youtubelink, "&");
                        ?>
                        <iframe id="gtvplayer" type="text/html" src="//www.youtube.com/embed/<?php echo $youtubelink; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
                        <div id="loading_gtv"><img src="images/ajax-loader_dark.gif" width="32" height="32" /></div>
  					</div>
				</div>
			</div>
            <div id="content_center">
                <div class="content_content">
                    <!--<div>
                	<!--<div class="gtvlatest_left">
						<?php $gtvlatest = mysql_fetch_array(mysql_query("SELECT * FROM youtube ORDER BY ID DESC LIMIT 0,1")); ?>
                        <?php 
                            
                            $youtubelink = strafter($gtvlatest['YouTubeLink'], "v=");
                            $youtubelink = strbefore($youtubelink, "&");
                        ?>
                        <iframe id="gtvplayer" type="text/html" src="//www.youtube.com/embed/<?php echo $youtubelink; ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>
                        <div id="loading_gtv"><img src="images/ajax-loader_dark.gif" width="32" height="32" /></div>
  					</div>-->
                	<div class="gtvlatest_right" style="display: none;">
                    	<div class="bg_brownyel">
                        </div>
                        <div class="text_bgopac">
                        	<?php $advd = mysql_fetch_array(mysql_query("SELECT * FROM advertisements WHERE AdvPosition = 'D' LIMIT 0,1")); ?>
							<?php if($advd['AdvPic']) { ?>
                                <?php if(file_exists("images/adv/".$advd['AdvPic'])) { ?>
	                                <a target="_blank" href="<?php echo $advd['AdvLink']; ?>"><img src="images/adv/<?php echo $advd['AdvPic']; ?>" width="270" height="420" /></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <br />
                    <div class="gtvlatest_details">
                    	<div class="gtvlatest_details_left">
                        	<div class="gtvlatest_details_type" id="gtvtype"><?php echo $gtvlatest['YouTubeType']; ?></div>
                            <div class="short_line_yellow" style=""></div>
                        </div>
                        <div class="gtvlatest_details_right">
                        	<div class="gtvlatest_details_title" id="gtvtitle"><?php echo $gtvlatest['YouTubeTitle']; ?></div>
                        </div>
	                    <div style="clear: both;"></div>
                    </div>
                    <div class="gtvlink">
                    	<div class="gtvlink_inside">
                            <div class="borderbot" style="position: absolute; top: 5px;">
                        </div>
                        <br />
                        <div class="gtvlink_title" style="text-align: center;">
                        <?php $gtvlinkdb = mysql_query("SELECT *, COUNT(*) FROM youtube GROUP BY YouTubeType ORDER BY COUNT(*) DESC "); ?>
                        <?php 
                        $g = 1; 
                        
                        ?>
                        <?php while($gtvlink = mysql_fetch_array($gtvlinkdb)) { 
                        if($g>1){
                            $border="border-left:1px solid #9e7a2d;";
                        }else{
                            $border="";
                        }    
                        ?>
                        	<a style="<?php echo $border;?>" href="Javascript: void();" onclick="$('.gtv_type_list').css('display','none'); $('#gtvlist<?php echo $g; ?>').css('display','block');"><?php echo $gtvlink['YouTubeType']; ?></a>
                            <?php $g++; ?>
                        <?php } ?>
                        </div>
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
                                <a href="Javascript: void();" class="gtvlist" onclick="
                                    $('#gtvplayer').attr('src', '//www.youtube.com/embed/<?php echo $youtubelink; ?>');
                                    $('#loading_gtv').css('display','block');
                                    $('#gtvplayer').load('//www.youtube.com/embed/<?php echo $youtubelink; ?>', function() {
                                        $('#loading_gtv').css('display','none');
                                    });
                                    $('#gtvtitlemain').text('<?php echo $gtv['YouTubeTitle']; ?>');
                                    $('#gtvtitle').text('<?php echo $gtv['YouTubeTitle']; ?>');
                                    $('#gtvtype').text('<?php echo $gtv['YouTubeType']; ?>');
                                ">
                                    <img src="images/playicongtv.png" class="btn-play-gtv"/>
                                    <div class="label-minutes-gtv">
                                    <?php echo $gtv['YouTubePlay']; ?>
                                    </div>
                                    <img src="http://img.youtube.com/vi/<?php echo $youtubelink; ?>/default.jpg" style="width: 100%;" /> 
                                    <div class="gtvlisttitle"><?php echo limit_words($gtv['YouTubeTitle'], 20); ?></div>
                                </a>
                            <?php } ?>
                            <div style="clear: both;"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>