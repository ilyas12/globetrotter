
<style>
	.swiper-container {
		width: 100%;
		height: 370px;
		background:#FFF;
	}
	.swiper-slide {
		position: relative;
	}
	#banner .arrow-left {
		background: url(images/arrows.png) no-repeat left top;
		position: absolute;
		left: 10px;
		top: 45%;
		margin-top: -23px;
		width: 50px;
		height: 45px;
		z-index: 50;
		filter:alpha(opacity=75); 
		-moz-opacity:0.75; 
		-khtml-opacity: 0.75; 
		opacity: 0.75;
		display: none;
	}
	#banner .arrow-right {
		background: url(images/arrows.png) no-repeat left bottom;
		position: absolute;
		right: 10px;
		top: 45%;
		margin-top: -23px;
		width: 50px;
		height: 45px;
		z-index: 50;
		filter:alpha(opacity=75); 
		-moz-opacity:0.75; 
		-khtml-opacity: 0.75; 
		opacity: 0.75;
		display: none;
	}
	#banner .arrow-left:hover, #banner .arrow-right:hover{
		filter:alpha(opacity=100); 
		-moz-opacity:1.0;
		-khtml-opacity: 1.0; 
		opacity: 1.0;
	}
	.swiper-scrollbar {
		width: 100%;
		height:10px;
		margin: 15px auto 0 auto;
	}
	.swiper-scrollbar-drag {
		
	}
</style>
<script>
	$(function(){
		var mySwiper = new Swiper('.swiper-container',{
			speed : 1500,
			scrollbar: {
				container :'.swiper-scrollbar',
				hide: false,							
				draggable: true,
				autoplay: 2000,
				speed:1000,
		        snapOnRelease: true
			}
		});
		mySwiper.enableKeyboardControl();
		$('.arrow-left').on('click', function(e){
			mySwiper.swipePrev()
		});
		$('.arrow-right').on('click', function(e){
			mySwiper.swipeNext()
		})
	});
</script>