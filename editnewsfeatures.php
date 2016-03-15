<?php require 'incdatabase.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="MANAN" />
<title>ADMIN GLOBETROTTER</title>
<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
<LINK rel="stylesheet" href="files/styles.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="files/jquery.datetimepicker.css"/>
<script language="JavaScript" type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
<script>
	jQuery(document).ready(function () {
		jQuery('#section').change(function () {
			if(jQuery('select[name="section"]').find('option[value="News, Features"]').prop("selected")==true) {
				jQuery('#newsfeaturesdiv').css("display", "block");
				jQuery('#subcategoryvisibility').css("display", "block");
				jQuery('#typeofcategoryvisibility').css("display", "block");
				jQuery('#checkedcities').prop("checked", false);
				jQuery('#checkedevents').prop("checked", false);
			} else {
				jQuery('#newsfeaturesdiv').css("display", "none");
			}
			if(jQuery('select[name="section"]').find('option[value="Perspectives"]').prop("selected")==true) {
				jQuery('#typeofcategoryvisibility').css("display", "none");
				jQuery('#subcategoryvisibility').css("display", "block");
				jQuery('#checkedcities').prop("checked", false);
				jQuery('#checkedevents').prop("checked", false);
				jQuery('#checkednews').prop("checked", false);
				jQuery('#checkedfeatures').prop("checked", false);
			}
			
			if(jQuery('select[name="section"]').find('option[value="Gallery"]').prop("selected")==true) {
				jQuery('#typeofcategoryvisibility').css("display", "none");
				jQuery('#subcategoryvisibility').css("display", "block");
				jQuery('#checkedcities').prop("checked", false);
				jQuery('#checkedevents').prop("checked", false);
				jQuery('#checkednews').prop("checked", false);
				jQuery('#checkedfeatures').prop("checked", false);
			}
		});
	});
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script language="JavaScript" type="text/javascript" src="files/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript" src="files/jqueryscript.js"></script>
<script language="JavaScript" type="text/javascript" src="files/validationform.js"></script>
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
<!---- END FANCYBOX POPUP ---->
<script src="files/jquery.datetimepicker.js"></script>
</head>

<body>

<?php
	$id = $_GET['id'];
	if($_SESSION['login'] == false) {
		header("Location: admin.php");
		exit;
	} else {
		if(empty($id)) {
			header("Location: index.php");
			exit;
		} 
	}
	if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'admin') !== false || strpos($_SESSION['adm'],'citiesevents') !== false || $_SESSION['adm'] == '') {
	} else {
		header("Location: admin.php");
		exit;
	}
?>
<?php
	$content = mysql_fetch_array(mysql_query("SELECT * FROM `news-features` WHERE ID = '$id' LIMIT 0,1"));
?>
<?php if($_SESSION['message']) { ?><div class="notification"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><?php } ?>
<div>
	<form action="inputeditnewsfeatures.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
    	<input type="hidden" name="newfeaturesid" value="<?php echo $_GET['id']; ?>" />
        <div class="boxy">
            <div class="body_header4">Articles/Events/Gallery</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
            <?php $picdb = mysql_query("SELECT * FROM `news-features-pictures` WHERE NFID = '$id' ORDER BY GalleryCover DESC, ID ASC"); ?>
            <?php while($pic = mysql_fetch_array($picdb)) { ?>
                <div class="floatleft">
                    <img src="images/features/<?php echo $pic['GalleryLink'] ?>" style="height: 100px;" />
                    <br /><?php if($pic['GalleryCover'] == 0) { ?><a style="text-align: center; display: block;" href="editnewsfeaturescover.php?id=<?php echo $pic['ID']; ?>" onclick="return confirmdelete()">Set as Cover</a><?php } ?>
                    <div class="righttopabsolute"><a class="deletecross" href="deleteimagenewsfeatures.php?id=<?php echo $pic['ID']; ?>" onclick="return confirmdelete()">X</a></div>
                </div>
                <?php $i++; ?>
            <?php } ?>
            <div style="clear: both;"></div>
            <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
            <div class="body_header4">Written By:</div>
            <select class="input_text_admin1" name="userid">
                <option>-</option>
                <?php $userlistdb = mysql_query("SELECT * FROM users WHERE Name != '' ORDER BY Name ASC"); ?>
                <?php while($userlist = mysql_fetch_array($userlistdb)) { ?>
                <option value="<?php echo $userlist['UserID']; ?>" <?php if($content['WrittenBy'] == $userlist['UserID']) { ?>selected="selected"<?php } ?>><?php echo $userlist['Name']; ?></option>
                <?php } ?>
            </select>
            <div class="body_header4">Approval:</div>
            <input type="hidden" name="approval" value="0" />
            <input type="checkbox" name="approval" id="approval" value="1" <?php if($content['Approval']) { ?>checked="checked"<?php }?> /><label for="approval">Approve Published</label><br />
            <input type="hidden" name="visibleatbanner" value="0" />
            <input type="checkbox" name="visibleatbanner" id="visibleatbanner" value="1" <?php if($content['VisibleAtBanner']) { ?>checked="checked"<?php }?> /><label for="visibleatbanner">Visible At Banner</label>
            <?php } ?>
            
            <?php if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
            <div class="body_header4">Date:</div>
            <div style="float: left;">
                <input type="text" class="input_text_admin1" name="postdate" id="postdate" placeholder="Post's Date" style="width: 470px;" value="<?php echo $content['DateWritten']; ?>" />
            </div>
            <div id="opencalendar1"><img src="images/calendaricon.png" width="26" /></div>
            <div style="clear: both;"></div>
            <script>
                $('#postdate').datetimepicker({				
                    timepicker:false,
                    format:'Y-m-d',
                    formatDate:'Y-m-d',
					closeOnDateSelect: true
                });
                $('#opencalendar1').click(function(){
                    $('#postdate').datetimepicker('show');
                });
            </script>
            <?php } ?>
            <!---<div class="body_header4">
	            <input type="hidden" name="checkedexclusive" value="0" />
            	<label for="checkedexclusive">Exclusive:</label> <input type="checkbox" name="checkedexclusive" id="checkedexclusive" value="1" <?php if($content['Exclusive'] == 1) { ?>checked="checked"<?php } ?> />
            </div>--->
            <div class="body_header4">
	            <input type="hidden" name="checkedmemberonly" value="0" />
            	<label for="checkedmemberonly">Member Only:</label> <input type="checkbox" name="checkedmemberonly" id="checkedmemberonly" value="1" <?php if($content['MemberOnly'] == 1) { ?>checked="checked"<?php } ?> />
            </div>
            <!---<div class="body_header4">
	            <input type="hidden" name="checkedperspective" value="0" />
            	<label for="checkedperspective">View in Perspective Homepage:</label> <input type="checkbox" name="checkedperspective" id="checkedperspective" value="1" <?php if($content['Perspective'] == 1) { ?>checked="checked"<?php } ?> />
            </div>---->
            <?php if ($content['Type'] == 'News, Features' || $content['Type'] == 'Perspectives' || $content['Type'] == 'Gallery' || $content['Type'] == '-') { ?>
            <div class="body_header4">Category:</div>
            <select class="input_text_admin1" name="section" id="section">
                <option>-</option>
                	<?php if (strpos($_SESSION['adm'],'newsfeatures') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
                        <option value="News, Features"<?php if ($content['Type'] == 'News, Features') { ?> selected="selected"<?php } ?>>News | Features</option>
                    <?php } ?>
                    <?php if (strpos($_SESSION['adm'],'perspectives') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
                        <option value="Perspectives"<?php if ($content['Type'] == 'Perspectives') { ?> selected="selected"<?php } ?>>Perspectives</option>
                    <?php } ?>
                    <?php if (strpos($_SESSION['adm'],'gallery') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') { ?>
                        <option value="Gallery"<?php if ($content['Type'] == 'Gallery') { ?> selected="selected"<?php } ?>>Gallery</option>
                    <?php } ?>
            </select>
            
            <?php } ?>
            <div id="typeofcategoryvisibility"<?php if ($content['Type'] == 'News, Features' || $content['Type'] == 'Cities, Events') { ?> style="display: block;"<?php } ?>>
                <div class="body_header4">
                    Type Of Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if ($content['Type'] == 'News, Features' || $content['Type'] == 'Perspectives') { ?>
                        <input type="checkbox" name="checkednews" id="checkednews" value="news" <?php if (strpos($content['TypeOfCategory'],'news') !== false) { ?>checked="checked"<?php } ?> /><label for="checkednews">News</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="checkedfeatures" id="checkedfeatures" value="feature" <?php if (strpos($content['TypeOfCategory'],'feature') !== false) { ?>checked="checked"<?php } ?> /><label for="checkedfeatures">Features</label>
                    <?php } ?>
                    <?php if ($content['Type'] == 'Cities, Events') { ?>
                        <input type="checkbox" name="checkedcities" id="checkedcities" value="cities" <?php if (strpos($content['TypeOfCategory'],'cities') !== false) { ?>checked="checked"<?php } ?> /><label for="checkedcities">Cities</label>
                        <input type="checkbox" name="checkedevents" id="checkedevents" value="events" <?php if (strpos($content['TypeOfCategory'],'events') !== false) { ?>checked="checked"<?php } ?> /><label for="checkedevents">Events</label>
                    <?php } ?>
                </div>
            </div>
            <?php if($content['Type'] != 'Cities, Events') { ?>
            <div class="body_header4">Sub Category:</div>
            <input type="text" class="input_text_admin1" name="subcategory" placeholder="Sub Category" value="<?php echo $content['SubType']; ?>" />
            <?php } ?>
            
            <div id="eventdatediv"<?php if($content['Type'] == 'Cities, Events') { ?> style="display: block;"<?php } ?>>
                <div class="body_header4">Event Date:</div>
                <div style="float: left;">
                    <input type="text" class="input_text_admin1" name="eventdate" id="eventdate" placeholder="Event's Date" style="width: 470px;" value="<?php echo $content['EventDate']; ?>" />
                </div>
                <div id="opencalendar"><img src="images/calendaricon.png" width="26" /></div>
                <div style="clear: both;"></div>
                <script>
                    $('#eventdate').datetimepicker({				
                        timepicker:false,
                        format:'Y-m-d',
                        formatDate:'Y-m-d'
                    });
                    $('#opencalendar').click(function(){
                        $('#eventdate').datetimepicker('show');
                    });
                </script>
                <div class="body_header4">Event Type:</div>
                <select class="input_text_admin1" name="eventtype" id="eventtype">
                    <option>-</option>
                    <option value="nightlife"<?php if($content['EventType'] == 'nightlife') { ?> selected="selected"<?php } ?>>Nightlife</option>
                    <option value="festival"<?php if($content['EventType'] == 'festival') { ?> selected="selected"<?php } ?>>Festival</option>
                    <option value="openings"<?php if($content['EventType'] == 'openings') { ?> selected="selected"<?php } ?>>Openings</option>
                    <option value="exhibits"<?php if($content['EventType'] == 'exhibits') { ?> selected="selected"<?php } ?>>Exhibits</option>
                    <option value="misc"<?php if($content['EventType'] == 'misc') { ?> selected="selected"<?php } ?>>Misc</option>
                </select>
				<div class="body_header4">Cities:</div>
                <div style="">
                <input type="text" value="<?php echo $content['EventCities']; ?>"  class="input_text_admin1" name="eventcities" id="eventcities" placeholder="Cities" style="width: 470px;" />
                </div>
                <div class="body_header4">When:</div>
                <input type="text" class="input_text_admin1" name="eventwhen" id="eventwhen" placeholder="When" value="<?php echo $content['EventWhen']; ?>" />
                <div class="body_header4">Where:</div>
                <input type="text" class="input_text_admin1" name="eventwhere" id="eventwhere" placeholder="Where" value="<?php echo $content['EventWhere']; ?>" />
                <div class="body_header4">GoogleMap:</div>
                <input type="text" class="input_text_admin1" name="googlemap" id="googlemap" placeholder='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.2517596349994!2d106.81010361913965!3d-6.230503939206816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xf0653e28e31113e5!2sBeergarden!5e0!3m2!1sen!2sid!4v1418968528691" width="600" height="450" frameborder="0" style="border:0"></iframe>' value='<?php echo $content['GoogleMap']; ?>' />
                <div class="body_header4">Facebook Join Event:</div>
                <div style="">
                    <input type="text" class="input_text_admin1" name="eventjoin" id="eventjoin" placeholder="eg. http://www.facebook.com/events/781502488558406/" style="" value="<?php echo $content['EventJoin']; ?>" />
                </div>
            </div>
            
            <div class="body_header4">Title:</div>
            <input type="text" class="input_text_admin1" name="title" placeholder="Title" value="<?php echo $content['Title']; ?>" />
            <div class="body_header4">Prologue:</div>
            <input type="text" class="input_text_admin1" name="quote" placeholder="Prologue" value="<?php echo $content['Quote']; ?>" />
            <div class="body_header4">Tags:</div>
            <div style="float: left;">
                <input type="text" class="input_text_admin1" name="tags" placeholder="Tags" value="<?php echo $content['Tags']; ?>" /><br />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Use comma (,) for seperate tag</div><div style="clear: both;"></div><br />
            
            <div class="body_header4">Upload Pictures:</div>
            <div style="float: left;">
                <input type="file" name="gallery[]" multiple="multiple" id="gallery" class="input_text_admin1" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />Resolution: w: 563px, h: 370px</div><div style="clear: both;"></div>
            <div class="body_header4">Preview Text:</div>
            <div style="float: left;">
            <input type="text" class="input_text_admin1" name="subtitle" placeholder="Preview Text" value="<?php echo $content['SubTitle']; ?>" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Limit words: 35</div><div style="clear: both;"></div>
            <textarea name="ctext" id="ctext"><?php echo $content['Content']; ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('ctext');
            </script>
            <input type="submit" value="Edit" class="submit_button_admin1" />
        </div>
    </form>
    <br />
</div>


</body>
</html>