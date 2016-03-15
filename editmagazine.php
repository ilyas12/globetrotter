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
	if (strpos($_SESSION['adm'],'magazine') !== false || strpos($_SESSION['adm'],'admin') !== false || $_SESSION['adm'] == '') {
	} else {
		header("Location: admin.php");
		exit;
	}
?>
<?php
	$content = mysql_fetch_array(mysql_query("SELECT * FROM magazines WHERE MagazineID = '$id' LIMIT 0,1"));
?>
<?php if($_SESSION['message']) { ?><div class="notification"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><?php } ?>
<div>
    <form action="inputeditmagazine.php" method="post" enctype="multipart/form-data" id="editsmallbannersform">
    	<input type="hidden" name="magazineid" value="<?php echo $_GET['id']; ?>" />
        <div class="boxy">
            <div class="body_header4" style="font-weight: bold;">Edit Magazine:</div><a class="works_popup" data-fancybox-type="iframe" href="Javascript: void(0)"></a><br />
            <?php $picdb = mysql_query("SELECT * FROM magazinespictures WHERE MagazineID = '$id' ORDER BY ID ASC"); ?>
            <?php while($pic = mysql_fetch_array($picdb)) { ?>
                <div class="floatleft" style="width: 24%;">
                    <img src="images/magazines/thumbnails/<?php echo $pic['Image'] ?>" style="width: 100%;" />
                    <div class="righttopabsolute"><a class="deletecross" href="deletecovermagazine.php?id=<?php echo $pic['ID']; ?>" onclick="return confirmdelete()">X</a></div>
                </div>
                <?php $i++; ?>
            <?php } ?>
            <div style="clear: both;"></div>
          	<div class="body_header4">Price:</div>
            <div style="float: left;">
            	<input type="text" class="input_text_admin1" name="edition" placeholder="Edition" value="<?php echo $content['Edition']; ?>" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Put number at the first. eg: <span style="font-weight: bold">121 - Yearly Edition</span></div><div style="clear: both;"></div><br />
          	<div class="body_header4">Price:</div>
            <div style="float: left;">
                <input type="text" class="input_text_admin1" name="price" placeholder="Price" value="<?php echo $content['Price']; ?>" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Put number only. eg: <span style="font-weight: bold">8</span> = $8</div><div style="clear: both;"></div><br />
          	<div class="body_header4">Length:</div>
            <div style="float: left;">
                <input type="text" class="input_text_admin1" name="length" placeholder="Length" value="<?php echo $content['Length']; ?>" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">eg: <span style="font-weight: bold">For 1 Year</span> or Leave it blank</div><div style="clear: both;"></div><br />
          	<div class="body_header4">Status:</div>
            <div style="float: left;">
                <input type="text" class="input_text_admin1" name="status" placeholder="Status" value="<?php echo $content['Status']; ?>" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">eg: <span style="font-weight: bold">In Stock</span> or <span style="font-weight: bold">Sold Out</span></div><div style="clear: both;"></div><br />
            <div class="body_header4">Title:</div>
            <input type="text" class="input_text_admin1" name="title" placeholder="Title" value="<?php echo $content['Title']; ?>" /><br /><br />
            
            <div class="body_header4">Upload Pictures:</div>
            <div style="float: left;">
                <input type="file" name="gallery[]" multiple="multiple" id="gallery" class="input_text_admin1" />
            </div>
            <div style="font-style: italic; font-size: 12px;float: left; padding: 7px 0px 0px 10px;">Filetype: .jpg<br />Resolution: 990 x 650px</div><div style="clear: both;"></div>
            
            <br /><br />
            <textarea name="ctext" id="ctext"><?php echo $content['Text']; ?></textarea>
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