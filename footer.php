<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Footer</title>
<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
<LINK rel="stylesheet" href="files/styles.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
<script src="http://w.soundcloud.com/player/api.js"></script>
<script>
	jQuery(document).ready(function() {
		var widget = SC.Widget(document.getElementById('soundcloud_widget'));
		widget.bind(SC.Widget.Events.READY, function() {
		});
		widget.bind(SC.Widget.Events.PLAY, function() {
			widget.getCurrentSound(function(music){
				//write the title in a div with the id "title"
				document.getElementById('footer_songtitle').innerHTML = music.title;
			});
		});
		jQuery('#gradio_play').click(function() {
			widget.play();
			jQuery('#gradio_play').attr("src","images/button_play_active.png");
			jQuery('#gradio_pause').attr("src","images/button_pause.png");
		});
		jQuery('#gradio_pause').click(function() {
			widget.pause();
			jQuery('#gradio_play').attr("src","images/button_play.png");
			jQuery('#gradio_pause').attr("src","images/button_pause_active.png");
		});
		jQuery('#gradio_next').click(function() {
			widget.next();
			widget.play();
			jQuery('#gradio_pause').attr("src","images/button_pause.png");
		});
		jQuery("#gradio_next").mousedown(function() {
			jQuery('#gradio_play').attr("src","images/button_play.png");
			jQuery('#gradio_next').attr("src","images/button_next_active.png");
		});
		jQuery("#gradio_next").mouseup(function() {
			jQuery('#gradio_play').attr("src","images/button_play_active.png");
			jQuery('#gradio_next').attr("src","images/button_next.png");
		});
	});
</script>
</head>

<body>
<div id="footer">
	
    <div id="footer_center">
    	<iframe style="display: none;" id="soundcloud_widget"
          src="http://w.soundcloud.com/player/?url=https://api.soundcloud.com/users/854832&show_artwork=false&liking=false&sharing=false&auto_play=false"
          width="100%"
          height="22"
          frameborder="no"></iframe>
        <div class="footer_left">
        <img src="images/gradio_footer.png" width="82" height="22" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_play" src="images/button_play_active.png" width="27" height="27" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_next" src="images/button_next.png" width="27" height="27" />&nbsp;&nbsp;
        <img style="cursor: pointer;" id="gradio_pause" src="images/button_pause.png" width="27" height="27" />
        </div>
        <div class="footer_left">
            <div class="footer_nowplaying">Now Playing</div>
            <div id="footer_songtitle"></div>
            <div style="clear: both;"></div>
        </div>
        <div class="footer_right">
            <img src="images/button_cross.png" width="27" height="27" />
        </div>
        <div style="clear: both;">
    </div>
</div>

</body>
</html>