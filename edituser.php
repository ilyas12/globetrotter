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
<script language="JavaScript" type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
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
?>
<?php 
	if (strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
	} else {
		header("Location: admin.php");
		exit;
	}
?>
<?php
	$content = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE UserID = '$id' LIMIT 0,1"));
?>
<?php if($_SESSION['message']) { ?><div class="notification"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><?php } ?>
<div>
	<form action="inputedituser.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
    	<input type="hidden" name="userid" value="<?php echo $_GET['id']; ?>" />
        <div class="boxy">
            <div class="body_header4">Edit User</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a>
            <img src="images/users/<?php echo $content['ProfPic'] ?>" style="height: 100px;" />
            <div class="body_header4">Username:</div>
            <input type="text" class="input_text_admin1" name="username" placeholder="Username" value="<?php echo $content['Username']; ?>" readonly="readonly" />
            <div class="body_header4">Password:</div>
            <input type="password" class="input_text_admin1" name="password" placeholder="Password" />
            <div class="body_header4">Name:</div>
            <input type="text" class="input_text_admin1" name="name" placeholder="Name" value="<?php echo $content['Name']; ?>" />
            <div class="body_header4">Email:</div>
            <input type="text" class="input_text_admin1" name="email" placeholder="Email" value="<?php echo $content['Email']; ?>" />
            <?php if(strpos($content['Admin'],'admin') !== false) { } else { ?>
            	<div class="body_header4">Type Admin:</div>
                <input type="checkbox" name="magazine_admin" id="magazine_admin" value="magazine" <?php if(strpos($content['Admin'],'magazine') !== false) { ?>checked="checked"<?php }?> /><label for="magazine_admin">Magazine</label><br />
                <input type="checkbox" name="newsfeatures_admin" id="newsfeatures_admin" value="newsfeatures" <?php if(strpos($content['Admin'],'newsfeatures') !== false) { ?>checked="checked"<?php }?> /><label for="newsfeatures_admin">News/Features</label><br />
                <input type="checkbox" name="citiesevents_admin" id="citiesevents_admin" value="citiesevents" <?php if(strpos($content['Admin'],'citiesevents') !== false) { ?>checked="checked"<?php }?> /><label for="citiesevents_admin">Cities/Events</label><br />
                <input type="checkbox" name="gallery_admin" id="gallery_admin" value="gallery" <?php if(strpos($content['Admin'],'gallery') !== false) { ?>checked="checked"<?php }?> /><label for="gallery_admin">Gallery</label>
                <input type="checkbox" name="members_admin" id="members_admin" value="members" <?php if(strpos($content['Admin'],'members') !== false) { ?>checked="checked"<?php }?> /><label for="members_admin">Member List</label>
            <?php } ?>
            <div class="body_header4">Upload Profile Picture:</div>
            <div style="float: left;">
                <input type="file" name="gallery[]" id="gallery" class="input_text_admin1" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />w: 400 x 400px</div><div style="clear: both;"></div><br /><br />
            <div class="body_header4">Short Details (Perspectives Front):</div>
            <textarea name="ctextshort" id="ctextshort"><?php echo $content['ShortDetails']; ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('ctextshort');
            </script>
            
            <div class="body_header4">Details (Perspectives Inside):</div>
            <textarea name="ctext" id="ctext"><?php echo $content['Details']; ?></textarea>
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