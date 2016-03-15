<?php 
session_cache_expire();
session_start();
ob_start(); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_startup_errors',1);  
ini_set('display_errors',1);
function databaseConnect() {
	$conn = mysql_connect('localhost', 'globetr7_web1', ';c?6pf}=gr.*') or die('Could not connect to databse.');
	mysql_select_db('globetr7_web1') or die('Could not open the database');
}

date_default_timezone_set('Asia/Jakarta');
databaseConnect();

function limit_words($string, $word_limit) {
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
}

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


?>
<html>
<head>
<base href="http://globetrottermag.com/unpublished/"/>
<title>ADMIN GLOBETROTTER</title>
<link rel="SHORTCUT ICON" href="images/icon.png"/>
<link rel="stylesheet" href="files/styles.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="files/jquery.datetimepicker.css"/>
<script type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="files/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="files/jqueryscript.js"></script>

<!-- Add fancyBox -->
<script type="text/javascript" src="files/fancybox3/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="files/fancybox3/jquery.fancybox.css" media="screen" />

<!-- Add fancyBox Thumbnail helper -->
<link rel="stylesheet" type="text/css" href="files/fancybox3/jquery.fancybox-thumbs.css" />
<script type="text/javascript" src="files/fancybox3/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".works_popup").fancybox({
			fitToView: false,
			width: '95%', // or whatever
			height: '95%',
			theme : 'light',
			iframe : {
				scrolling : 'yes',
				preload: false
			}
		});
	});
</script>
<!-- END FANCYBOX POPUP -->
<script src="files/jquery.datetimepicker.js"></script>
</head>

<body style="overflow-y: auto;">

<?php if(!isset($_SESSION['login'])) { ?>
<div id='fullscreen_div_admin'>
	<div id='fullscreen_center_admin'>
    	<div id='fullscreen_width_admin'>
            <div id='fullscreen_content_admin'>
                <img alt=''  src='images/logo_globe_trotter.png' width='432' height='75' /><br /><span class='invalid'><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];}?></span><br />
                <form id='loginform' action='logincheck.php' method='post'>
                    <input class='input_text_admin1' name='username' id='username' type='text' placeholder='Username' /><br />
                    <input class='input_text_admin1' name='password' id='password' type='password' placeholder='Password' /><br />
                    <input class='submit_button_admin1' type='submit' value='login' />
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div id="admin_menu">
	<div style="text-align: center; background: #FFF; padding: 11px 0;"><a href="index.php"><img alt=""  src="images/logo_globe_trotter.png" width="180" /></a></div>
	<ul class="admin_menu_ul">
    	<li class="admin_menu_li">PAGE</li>
        <li class="admin_menu_li"><hr /></li>
        <?php if (strpos($_SESSION['adm'],'magazine') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'magazine') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=magazine">Magazine</a>
        	<ul>
            	<a <?php if($_GET['page'] == 'distribution') { ?>style="text-decoration: underline;"<?php } ?> class="admin_submenu_a" href="admin.php?page=distribution">Distribution</a>
            </ul>
        </li>
        <?php } ?>
        <?php if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'admin') !== false || strpos($_SESSION['adm'],'citiesevents') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'articles-events') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=articles-events">Articles/Events/Gallery</a></li>
        <?php } ?>
        <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'users') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=users">Users</a></li>
        <?php } ?>
        <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'gtv') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=gtv">GTV</a></li>
        <?php } ?>
        <?php //if (strpos($_SESSION['adm'],'gallery') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<!---<li class="admin_menu_li"><a <?php if($_GET['page'] == 'gallery') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=gallery">Gallery</a></li>--->
        <?php //} ?>
        <?php if (strpos($_SESSION['adm'],'members') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'members') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=members">Members List</a></li>
        <?php } ?>
        <li class="admin_menu_li"><hr /></li>
        <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
    	<li class="admin_menu_li"><a <?php if($_GET['page'] == 'advertisements') { ?>style="text-decoration: underline;"<?php } ?> class="admin_menu_a" href="admin.php?page=advertisements">Advertisements</a></li>
        <?php } ?>
    </ul>
</div>
<div id="admin_page">
	<div class="logout"><a href="logout.php">Log Out</a></div>
    
    <?php if($_GET['page'] == 'magazine') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'magazine') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Magazine</div>
        <div class="admin_content">
        	<?php if($_SESSION['message']) { ?><div class="notification"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><?php } ?>
            <div>
            	<form action="uploadmagazine.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                    <div class="boxy">
                    	<div class="body_header4">Add Magazine:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                        <div style="float: left;">
                        <input type="text" class="input_text_admin1" name="edition" placeholder="Edition" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Put number at the first. eg: <span style="font-weight: bold">121 - Yearly Edition</span></div><div style="clear: both;"></div><br />
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="price" placeholder="Price" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Put number only. eg: <span style="font-weight: bold">8</span> = $8</div><div style="clear: both;"></div><br />
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="length" placeholder="Length" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">eg: <span style="font-weight: bold">For 1 Year</span> or Leave it blank</div><div style="clear: both;"></div><br />
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="status" placeholder="Status" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">eg: <span style="font-weight: bold">In Stock</span> or <span style="font-weight: bold">Sold Out</span></div><div style="clear: both;"></div><br />
                        <div class="body_header4">Title:</div>
                        <input type="text" class="input_text_admin1" name="title" placeholder="Title" /><br />
                        
                        <div class="body_header4">Upload Pictures:</div>
                        <div style="float: left;">
                            <input type="file" name="gallery[]" multiple="multiple" id="gallery" class="input_text_admin1" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />Resolution: 990 x 650px</div><div style="clear: both;"></div>
                        
                        <br /><br />
                        <textarea name="ctext" id="ctext"></textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('ctext');
                        </script>
                        <input type="submit" value="Upload" class="submit_button_admin1" />
                    </div>
                </form>
                <br />
                <div class="boxy">
                    <div class="body_header4">Edit Magazine:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                    <?php $contentdb = mysql_query("SELECT * FROM magazines WHERE Title IS NOT NULL ORDER BY Edition DESC"); ?>
                    <?php while($content = mysql_fetch_array($contentdb)) { ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM magazinespictures WHERE MagazineID = '$content[MagazineID]' ORDER BY ID ASC")); ?>
                        <div class="floatleft" style="width: 30%;">
                        	<div class="img30">
                                <a class="works_popup" data-fancybox-type="iframe" href="editmagazine.php?id=<?php echo $content['MagazineID']; ?>"><img alt=""  src="images/magazines/thumbnails/<?php echo $covpic['Image'] ?>" style="width: 100%;" /></a>
                                <div class="righttopabsolute"><a class="deletecross" href="deletemagazine.php?id=<?php echo $content['MagazineID']; ?>" onclick="return confirmdelete()">X</a></div>
                            </div>
                            
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac">
                                    <div class="banner_content" style="margin-left: 3%;">
                                        <div class="banner_title" style="font-size: 14px;"><?php echo $content['Title']; ?></div>
                                        <div class="banner_subtitle" style="font-size: 12px;">
                                        	<span class="magazine_price_list">$<?php echo $content['Price']; ?></span><?php if($content['Length']) { echo ' | '.$content['Length']; } ?> | <span class="magazine_price_list"><?php echo $content['Status']; ?></span><br />
                                            Edition: <?php echo $content['Edition']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'distribution') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'magazine') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Distribution (Magazine)</div>
        <div class="admin_content">
        	<?php if($_SESSION['message']) { ?><div class="notification"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><?php } ?>
            <div>
            	<form action="editdistribution.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                	<div class="body_header4">Edit Page:</div>
                    <div class="boxy">
						<?php $ctext = mysql_fetch_array(mysql_query("SELECT * FROM magazinedistribution WHERE ID = 1 LIMIT 0,1")); ?>
                        <div class="admin_header1"><?php echo $ctext['Title']; ?></div>
                        <img alt=""  src="images/<?php echo $ctext['Image'] ?>" width="100%" /><br />
                        <div style="float: left;">
                            <input type="file" name="gallery[]" id="gallery" class="input_text_admin1" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />Width: 990px x 650px</div><div style="clear: both;"></div>
                        <div class="body_header4">Title:</div>
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="title" placeholder="title" value="<?php echo $ctext['Title']; ?>" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"></div><div style="clear: both;"></div><br />
                        <textarea name="ctext" id="ctext">
                            <?php echo str_replace("\'","'",str_replace('\"','"',$ctext['Text'])); ?>
                        </textarea>
                    </div>
                    <script type="text/javascript">
                        CKEDITOR.replace('ctext');
                    </script>
                    <input type="submit" value="Edit" class="submit_button_admin1" />
                </form>
            </div>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'articles-events') { ?>
	    <?php 
			if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'citiesevents') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<?php 
			if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'citiesevents') !== false || $_SESSION['adm'] == '') {
				$userarticle = " AND WrittenBy = '$_SESSION[userid]' ";
                $userarticle="";
			}
		?>
    	<div class="admin_title">Articles/Events/Gallery</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?>
            <div class="notification">
                <?php echo $_SESSION['message']; $_SESSION['message']="";?>
            </div>
            <?php } ?>
            <div>
            	<form action="uploadnewsfeatures.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                    <div class="boxy">
                    	<div class="body_header4">Add Articles/Events/Gallery</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                        
						<?php if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'citiesevents') !== false || $_SESSION['adm'] == '') { ?>
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>" />
                        <?php } ?>
                        <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
                        <div class="body_header4">Written By:</div>
                        <select class="input_text_admin1" name="userid">
                            <option>-</option>
                            <?php $userlistdb = mysql_query("SELECT * FROM users WHERE Name != '' ORDER BY Name ASC"); ?>
                            <?php while($userlist = mysql_fetch_array($userlistdb)) { ?>
                            <option value="<?php echo $userlist['UserID']; ?>"><?php echo $userlist['Name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                        <!---<div class="body_header4">
                        <input type="hidden" name="checkedexclusive" value="0" />
                       	<label for="checkedexclusive">Exclusive:</label>
                        <input type="checkbox" name="checkedexclusive" id="checkedexclusive" value="1" />
                        </div>--->


                       	<label for="checkedmemberonly">Member Only:</label>
                        <input type="checkbox" name="checkedmemberonly" id="checkedmemberonly" value="1" />
                        </div>
                        <!---<div class="body_header4">
                            <input type="hidden" name="checkedperspective" value="0" />
                            <label for="checkedperspective">View in Perspective Homepage:<input type="checkbox" name="checkedperspective" id="checkedperspective" value="1" />
                        </div>---->
                        <script>
							$(document).ready(function () {
								$('#section').change(function () {
									if($('select[name="section"]').find('option[value="Cities, Events"]').prop("selected")==true) {
										$('#eventdatediv').css("display", "block");
										$('#citieseventdiv').css("display", "block");
										$('#typeofcategoryvisibility').css("display", "block");
										$('#subcategoryvisibility').css("display", "none");
										$('#checkednews').prop("checked", false);
										$('#checkedfeatures').prop("checked", false);
									} else {
										$('#eventdatediv').css("display", "none");
										$('#citieseventdiv').css("display", "none");
										$('#eventdate').val("");
									}
									if($('select[name="section"]').find('option[value="News, Features"]').prop("selected")==true) {
										$('#newsfeaturesdiv').css("display", "block");
										$('#subcategoryvisibility').css("display", "block");
										$('#typeofcategoryvisibility').css("display", "block");
										$('#checkedcities').prop("checked", false);
										$('#checkedevents').prop("checked", false);
									} else {
										$('#newsfeaturesdiv').css("display", "none");
									}
									if($('select[name="section"]').find('option[value="Perspectives"]').prop("selected")==true) {
										$('#typeofcategoryvisibility').css("display", "none");
										$('#subcategoryvisibility').css("display", "block");
										$('#checkedcities').prop("checked", false);
										$('#checkedevents').prop("checked", false);
										$('#checkednews').prop("checked", false);
										$('#checkedfeatures').prop("checked", false);
									}
									if($('select[name="section"]').find('option[value="Gallery"]').prop("selected")==true) {
										$('#typeofcategoryvisibility').css("display", "none");
										$('#subcategoryvisibility').css("display", "block");
										$('#checkedcities').prop("checked", false);
										$('#checkedevents').prop("checked", false);
										$('#checkednews').prop("checked", false);
										$('#checkedfeatures').prop("checked", false);
									}
								});
							});
						</script>
                        <div class="body_header4">Category:<?php echo $_SESSION['adm'];?></div>
                        <select class="input_text_admin1" name="section" id="section">
                            <option>-</option>
                        <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
                            <option value="News, Features">News | Features</option>
                           <!-- <option value="Perspectives">Perspectives</option>-->
                            <option value="Cities, Events">Cities | Events</option>
                            <option value="Gallery">Gallery</option>
                        <?php }else if (strpos($_SESSION['adm'],'newsfeatures') !== false || $_SESSION['adm'] == '') { ?>
                            <option value="News, Features">News | Features</option>
                        <?php }else if (strpos($_SESSION['adm'],'perspectives') !== false || $_SESSION['adm'] == '') { ?>
                            <option value="Perspectives">Perspectives</option>
                        <?php } else if (strpos($_SESSION['adm'],'citiesevents') !== false || $_SESSION['adm'] == '') { ?>
                            <option value="Cities, Events">Cities | Events</option>
                        <?php } else if (strpos($_SESSION['adm'],'gallery') !== false || $_SESSION['adm'] == '') { ?>
                            <option value="Gallery">Gallery</option>
                        <?php }else{} ?>
                        </select>
                        <div id="typeofcategoryvisibility">
                            <div class="body_header4">Type Of Category:</div>
                            <div id="newsfeaturesdiv">
                                <input type="checkbox" name="checkednews" id="checkednews" value="news" /><label for="checkednews">News</label>
                                <input type="checkbox" name="checkedfeatures" id="checkedfeatures" value="feature" /><label for="checkedfeatures">Feature</label>
                            </div>
                            <div id="citieseventdiv">
                                <input type="checkbox" name="checkedcities" id="checkedcities" value="cities" /><label for="checkedcities">Cities</label>
                                <input type="checkbox" name="checkedevents" id="checkedevents" value="events" /><label for="checkedevents">Events</label>
                            </div>
                        </div>
                        <div id="subcategoryvisibility">
                            <div class="body_header4">Sub Category:</div>
                            <input type="text" class="input_text_admin1" name="subcategory" placeholder="Sub Category" />
                        </div>
                        <div id="eventdatediv">
                            <div class="body_header4">Event Date:</div>
                            <div style="float: left;">
                                <input type="text" class="input_text_admin1" name="eventdate" id="eventdate" placeholder="Event's Date" style="width: 470px;" />
                            </div>
                            <div id="opencalendar"><img alt=""  src="images/calendaricon.png" width="26" /></div>
                            <div style="clear: both;"></div>
                            <script>
                                $('#eventdate').datetimepicker({				
									timepicker:false,
                                    format:'Y-m-d',
                                    formatDate:'Y-m-d',
									closeOnDateSelect: true
                                });
								$('#opencalendar').click(function(){
									$('#eventdate').datetimepicker('show');
								});
                            </script>
                            <div class="body_header4">Event Type:</div>
                            <div style="">
                            	<select class="input_text_admin1" name="eventtype" id="eventtype">
		                            <option>-</option>
                                    <option value="nightlife">Nightlife</option>
                                    <option value="festival">Festival</option>
                                    <option value="openings">Openings</option>
                                    <option value="exhibits">Exhibits</option>
                                    <option value="misc">Misc</option>
                                </select>
                            </div>
                            <div class="body_header4">When:</div>
                            <div style="">
                                <input type="text" class="input_text_admin1" name="eventwhen" id="eventwhen" placeholder="When" style="width: 470px;" />
                            </div>
							<div class="body_header4">Cities:</div>
                            <div style="">
                                <input type="text" class="input_text_admin1" name="eventcities" id="eventcities" placeholder="Cities" style="width: 470px;" />
                            </div>
                            <div class="body_header4">Where:</div>
                            <div style="">
                                <input type="text" class="input_text_admin1" name="eventwhere" id="eventwhere" placeholder="Where" style="width: 470px;" />
                            </div>
                            <div class="body_header4">GoogleMap:</div>
                            <div style="">
                                <input type="text" class="input_text_admin1" name="googlemap" id="googlemap" placeholder='eg: <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.2517596349994!2d106.81010361913965!3d-6.230503939206816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xf0653e28e31113e5!2sBeergarden!5e0!3m2!1sen!2sid!4v1418968528691" width="600" height="450" frameborder="0" style="border:0"></iframe>' style="width: 470px;" />
                            </div>
                            <div class="body_header4">Facebook Join Event:</div>
                            <div style="">
                                <input type="text" class="input_text_admin1" name="eventjoin" id="eventjoin" placeholder="eg. http://www.facebook.com/events/781502488558406/" style="width: 470px;" />
                            </div>
                        </div>
                        <div class="body_header4">Title:</div>
                       	<input type="text" class="input_text_admin1" name="title" placeholder="Title" />
                        <div class="body_header4">Prologue:</div>
                        <input type="text" class="input_text_admin1" name="quote" placeholder="Prologue" />
                        <div class="body_header4">Tags:</div>
                        
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="tags" placeholder="Tags" /><br />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Use comma (,) for seperate tag</div><div style="clear: both;"></div><br />
                        
                        <div class="body_header4">Upload Pictures:</div>
                        <div style="float: left;">
                            <input type="file" name="gallery[]" multiple="multiple" id="gallery" class="input_text_admin1" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />Resolution: w: 913px, h: 600px</div><div style="clear: both;"></div>
                        
                        <div class="body_header4">Preview Text:</div>
                        <div style="float: left;">
                        <input type="text" class="input_text_admin1" name="subtitle" placeholder="Preview Text" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Limit words: 35</div><div style="clear: both;"></div>
                        <textarea name="ctext" id="ctext"></textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('ctext');
                        </script>
                        <input type="submit" value="Upload" class="submit_button_admin1" />
                    </div>
                </form>
                <br />
                <div class="boxy">
                    <div class="body_header4">Edit Articles/Events:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                    <?php $contentdb = mysql_query("SELECT * FROM `news-features` WHERE Title IS NOT NULL  ".$userarticle." ORDER BY ID DESC"); ?>
                    <?php while($content = mysql_fetch_array($contentdb)) { ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$content[ID]' AND GalleryCover = 1 ORDER BY ID ASC LIMIT 0,1")); ?>
                        <div class="floatleft" style="width: 30%;">
                        	<div class="img30">
                                <a class="works_popup" data-fancybox-type="iframe" href="editnewsfeatures.php?id=<?php echo $content['ID']; ?>"><img alt=""  src="images/features/<?php echo $covpic['GalleryLink'] ?>" style="width: 100%;" /></a>
                                <div class="righttopabsolute"><a class="deletecross" href="deletenewsfeatures.php?id=<?php echo $content['ID']; ?>" onclick="return confirmdelete()">X</a></div>
                            </div>
                            
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac">
                                	<a class="works_popup" data-fancybox-type="iframe" href="editnewsfeatures.php?id=<?php echo $content['ID']; ?>">
                                    <div class="banner_content" style="margin: 4px; padding: 5px 0;">
                                    	<div style="position: absolute; right: 0; top: 0; font-style: italic; font-size: 10px; color: #FFF;"><?php if($content['Approval'] == 1) { ?>Published<?php } else { ?>Not Published Yet<?php } ?></div>
                                        <?php $writer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UserID = '$content[WrittenBy]' LIMIT 0,1")); ?>
                                        <div style="position: absolute; right: 0; bottom: 0; font-style: italic; font-size: 10px; color: #FFF;">By: <?php echo $writer['Name']; ?></div>
                                        <div class="banner_title" style="font-size: 12px;"> <?php echo strtoupper($content['Title']); ?></div>
                                        <div class="banner_subtitle" style="font-size: 11px;">
                                        	Date Written: <?php echo date("M d Y", strtotime($content['DateWritten'])); ?><br /><br />
                                            <div class="typeadminnews"><?php echo strtoupper(str_replace(","," and ",$content['TypeOfCategory'])); ?></div><br />
                                            Sub Category: <?php if($content['Type'] == 'Cities, Events') { echo $content['EventType']; } else { echo $content['SubType']; } ?>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'users') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Users</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?>
            <div class="notification">
                <?php echo $_SESSION['message']; $_SESSION['message']="";?>
            </div>
            <?php } ?>
            <div>
            	<form action="uploaduser.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                    <div class="boxy">
                    	<div class="body_header4">Add User</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                        <div class="body_header4">Username:</div>
                        <input type="text" class="input_text_admin1" name="username" placeholder="Username" />
                        <div class="body_header4">Password:</div>
                        <input type="password" class="input_text_admin1" name="password" placeholder="Password" />
                        <div class="body_header4">Name:</div>
                        <input type="text" class="input_text_admin1" name="name" placeholder="Name" />
                        <div class="body_header4">Email:</div>
                        <input type="text" class="input_text_admin1" name="email" placeholder="Email" />
                        <div class="body_header4">Type Admin:</div>
                        <input type="checkbox" name="magazine_admin" id="magazine_admin" value="magazine" /><label for="magazine_admin">Magazine</label><br />
                        <input type="checkbox" name="newsfeatures_admin" id="newsfeatures_admin" value="newsfeatures" /><label for="newsfeatures_admin">News/Features</label><br />
                        <input type="checkbox" name="perspectives_admin" id="perspectives_admin" value="perspectives" /><label for="perspectives_admin">Perspectives</label><br />
                        <input type="checkbox" name="citiesevents_admin" id="citiesevents_admin" value="citiesevents" /><label for="citiesevents_admin">Cities/Events</label><br />
                        <input type="checkbox" name="gallery_admin" id="gallery_admin" value="gallery" /><label for="gallery_admin">Gallery</label>
                        
                        <div class="body_header4">Upload Profile Picture:</div>
                        <div style="float: left;">
                            <input type="file" name="gallery[]" id="gallery" class="input_text_admin1" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />w: 400 x 400px</div><div style="clear: both;"></div><br /><br />
                        <div class="body_header4">Short Details (Perspectives Front):</div>
                        <textarea name="ctextshort" id="ctextshort"></textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('ctextshort');
                        </script>
                        
                        <div class="body_header4">Details (Perspectives Inside):</div>
                        <textarea name="ctext" id="ctext"></textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('ctext');
                        </script>
                        <input type="submit" value="Add" class="submit_button_admin1" />
                    </div>
                </form>
                <br />
                <div class="boxy">
                    <div class="body_header4">Edit User</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                    <?php $contentdb = mysql_query("SELECT * FROM `users` WHERE Name IS NOT NULL ORDER BY Name ASC"); ?>
                    <?php while($content = mysql_fetch_array($contentdb)) { ?>
                        <div class="floatleft" style="width: 19%;">
                            <a class="works_popup" data-fancybox-type="iframe" href="edituser.php?id=<?php echo $content['UserID']; ?>"><img alt=""  src="images/users/<?php echo $content['ProfPic'] ?>" style="width: 100%;" /></a>
                            
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac">
                                    <a class="works_popup" data-fancybox-type="iframe" href="edituser.php?id=<?php echo $content['UserID']; ?>">
                                        <div class="banner_content" style="margin: 4px;">
                                            <div class="banner_title" style="font-size: 12px;"><?php echo strtoupper($content['Name']); ?></div>
                                        	<div class="banner_subtitle" style="font-size: 11px;"><?php echo $content['Admin']; ?></div>
                                    	</div>
                               		</a>
                                </div>
                            </div>
                            
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    
    <?php if($_GET['page'] == 'gallery-old') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'gallery') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Gallery</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?><div class="notification"><?php echo $_SESSION['message']; $_SESSION['message']=""; ?></div><?php } ?>
            <div>
            	<form action="uploadgallery.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                    <div class="boxy">
                    	<div class="body_header4">Add Gallery:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                        <div style="float: left;">
                        <input type="text" class="input_text_admin1" name="galname" placeholder="Gallery Name" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"></div><div style="clear: both;"></div><br />
                        <div style="float: left;">
                            <input type="text" class="input_text_admin1" name="galsubname" placeholder="Gallery SubName" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"></div><div style="clear: both;"></div><br />
                        
                        <div class="body_header4">Upload Pictures:</div>
                        <div style="float: left;">
                            <input type="file" name="gallery[]" multiple="multiple" id="gallery" class="input_text_admin1" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br /></div><div style="clear: both;"></div>
                        
                        <br /><br />
                        <textarea name="ctext" id="ctext"></textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('ctext');
                        </script>
                        <input type="submit" value="Upload" class="submit_button_admin1" />
                    </div>
                </form>
                <br />
                <div class="boxy">
                    <div class="body_header4">Edit Gallery:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                    <?php $contentdb = mysql_query("SELECT * FROM gallery WHERE GalleryName IS NOT NULL ORDER BY GalleryID DESC"); ?>
                    <?php while($content = mysql_fetch_array($contentdb)) { ?>
                        <?php $covpic = mysql_fetch_array(mysql_query("SELECT * FROM pictures WHERE GalleryID = '$content[GalleryID]' ORDER BY PictureID ASC")); ?>
                        <div class="floatleft" style="width: 30%;">
                        	<div class="img30">
                                <a class="works_popup" data-fancybox-type="iframe" href="editgallery.php?id=<?php echo $content['GalleryID']; ?>"><img alt=""  src="images/gallery/thumbnails/<?php echo $covpic['PictureLink'] ?>" style="width: 100%;" /></a>
                                <div class="righttopabsolute"><a class="deletecross" href="deletegallery.php?id=<?php echo $content['GalleryID']; ?>" onclick="return confirmdelete()">X</a></div>
                            </div>
                            
                            <div class="black_bar">
                                <div class="bgopac_black"></div>
                                <div class="text_bgopac">
                                    <div class="banner_content" style="margin-left: 3%;">
                                        <div class="banner_title" style="font-size: 14px;"><?php echo $content['GalleryName']; ?></div>
                                        <div class="banner_subtitle" style="font-size: 12px;">
                                        	<span class="magazine_price_list"><?php echo $content['GallerySubName']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    <?php } ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'members') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'members') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Members</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?><div class="notification"><?php echo $_SESSION['message']; $_SESSION['message']=""; ?></div><?php } ?>
            <?php $membersdb = mysql_query("SELECT * FROM members ORDER BY Name ASC"); ?>
            <table class="members_table" style="width: 80%; margin: 0 auto;">
            	<tr>
                	<th>Name</th>
                	<th>Email</th>
                	<th>Location</th>
                	<th>Gender</th>
                	<th>Age Range</th>
                </tr>
            <?php while($members = mysql_fetch_array($membersdb)) { ?>
            	<tr>
                	<td style="text-align: center;"><?php echo $members['Name']; ?></td>
                	<td style="text-align: center;"><?php echo $members['Email']; ?></td>
                	<td style="text-align: center;"><?php echo $members['Country']; ?></td>
                	<td style="text-align: center;"><?php echo $members['Gender']; ?></td>
                	<td style="text-align: center;"><?php echo $members['Age']; ?></td>
                </tr>
            <?php } ?>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'gtv') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">GTV</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?><div class="notification"><?php echo $_SESSION['message']; $_SESSION['message']=""; ?></div><?php } ?>
            <div>
            	<form action="addgtv.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                    <div class="boxy">
                    	<div class="body_header4">Add GTV:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                        <div style="float: left;">
                        <input type="text" class="input_text_admin1" name="youtubelink" placeholder="Youtube Video ID" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">VideoID. eg: https://www.youtube.com/watch?v=<span style="font-weight: bold; text-decoration: underline;">6FGYpiX_qmk</span></div><div style="clear: both;"></div><br />
                        <div style="float: left;width:100%">
                            <input type="text" class="input_text_admin1" name="youtubetitle" placeholder="Title" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"><span style="font-weight: bold"></span></div><div style="clear: both;"></div><br />
                        <div style="float: left;width:100%">
                            <input type="time" class="input_text_admin1" name="youtubeplay"/>
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"><span style="font-weight: bold"></span></div><div style="clear: both;"></div><br />
                        <div style="float: left;">
                        	<select name="youtubetype" class="input_text_admin1">
                            	<option value="">Category</option>
                                <option value="Music">Music</option>
                                <option value="Event">Event</option>
                                <option value="Night Life">Night Life</option>
                                <option value="Movie">Movie</option>
                            </select>
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;"><span style="font-weight: bold"></span></div><div style="clear: both;"></div><br />
                        <input type="submit" value="Upload" class="submit_button_admin1" />
                    </div>
                </form>
                <br />
                <div class="boxy">
                    <div class="body_header4">Edit GTV:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
                    <?php $categorydb = mysql_query("SELECT * FROM youtube WHERE YouTubeLink IS NOT NULL GROUP BY YouTubeType ORDER BY YouTubeType ASC"); ?>
                    <?php while($category = mysql_fetch_array($categorydb)) { ?>
                    	<div class="signuptitle"><?php echo $category['YouTubeType']; ?></div>
						<?php $contentdb = mysql_query("SELECT * FROM youtube WHERE YouTubeLink IS NOT NULL AND YouTubeType = '$category[YouTubeType]' ORDER BY ID DESC"); ?>
                        <?php while($content = mysql_fetch_array($contentdb)) { ?>
                            <div class="floatleft" style="width: 23%;">
                            	<?php
									$youtubelink = strafter($content['YouTubeLink'], "v=");
									$youtubelink = strbefore($youtubelink, "&");
								?>
                                <div class="img30" style="height: 185px;">
                                    <img alt=""  src="http://img.youtube.com/vi/<?php echo $youtubelink; ?>/default.jpg" style="width: 100%;" />
                                    <div class="righttopabsolute"><a class="deletecross" href="deletegtv.php?id=<?php echo $content['ID']; ?>" onclick="return confirmdelete()">X</a></div>
                                    <br />
                                </div>
                                <?php echo $content['YouTubeTitle']; ?>
                            </div>
                        <?php } ?>
	                    <div style="clear: both;"></div>
                        <hr />
                    <?php } ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div style="clear: both;"></div>
        </div>
    <?php } ?>
    
    <?php if($_GET['page'] == 'advertisements') { ?>
    	<?php 
			if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
			} else {
				header("Location: admin.php");
				exit;
			}
		?>
    	<div class="admin_title">Advertisements</div>
        <div class="admin_content">
        	<?php if(isset($_SESSION['message'])) { ?><div class="notification"><?php echo $_SESSION['message']; $_SESSION['message']=""; ?></div><?php } ?>
            <?php $advdb = mysql_query("SELECT * FROM advertisements"); ?>
            <form action="editadvertisements.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
                	<?php $r = 1; ?>
                	<?php while($adv = mysql_fetch_array($advdb)) { ?>
                    <div class="boxy">
                        <input type="hidden" value="<?php echo $adv['ID']; ?>" name="id[<?php echo $r; ?>]" />
                        <div class="body_header4" style="border: 0;">Advertisement <?php echo $adv['AdvPosition']; ?> <?php if($adv['AdvPosition'] == 'D') { ?>(GTV)<?php } ?>:</div>
                        <?php if(file_exists("images/adv/".$adv['AdvPic'])) { ?><div style="padding: 10px; background: #FFF; width: 500px; border: 1px solid #CCC; position: relative;"><div class="righttopabsolute"><a class="deletecross" href="deleteadvertisement.php?id=<?php echo $adv['ID']; ?>" onclick="return confirmdelete()">X</a></div><img alt=""  src="images/adv/<?php echo $adv['AdvPic']; ?>" <?php if($adv['AdvPosition'] == 'D') { ?>width="100" height="156"<?php } ?> /></div><div style="clear: both;"></div><?php } ?>
                        <div style="float: left;">
                        <input type="file" class="input_text_admin1" name="gallery<?php echo $r; ?>[]" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">resolution: <?php if($adv['AdvPosition'] == 'D') { ?>270 x 420px<?php } elseif($adv['AdvPosition'] == 'B') { ?>450 x 400px<?php } else { ?>996 x 100px<?php } ?></div><div style="clear: both;"></div>
                        
                        <div style="float: left;">
                        <input type="text" class="input_text_admin1" name="advlink[<?php echo $r; ?>]" value="<?php echo $adv['AdvLink']; ?>" placeholder="Advertisement's Link" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">eg: http://www.<span style="font-style: italic;">domains</span>.com/</div><div style="clear: both;"></div>
                        
                        <!----<div style="float: left;">
                        <input type="text" class="input_text_admin1" name="advdate[<?php echo $r; ?>]" value="<?php echo $adv['AdvDate']; ?>" placeholder="Advertisement's Date (YYYY-MM-DD)" />
                        </div>
                        <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">EXPIRED ADV: YYYY-MM-DD</div><div style="clear: both;"></div><br />--->
                        <?php $r++; ?>
	                </div>
                    <?php } ?>
                    
                    <input type="submit" value="Edit" class="submit_button_admin1" />
            </form>
        </div>
    <?php } ?>
    
</div>
<?php } ?>
</body>
</html>