
<style>
	.swiper-slide {
		position: relative;
	}
	.swiper-container-home {
		position: relative;
		width: 460px;
		height: 300px;
		overflow:hidden;
		background: #F0F0F0;
	}
	.swiper-container-home .arrow-left-homemag {
		background: url(images/arrows.png) no-repeat left top;
		position: absolute;
		left: 5px;
		top: 50%;
		margin-top: -23px;
		width: 50px;
		height: 45px;
		z-index: 50;
		filter:alpha(opacity=75); 
		-moz-opacity:0.75; 
		-khtml-opacity: 0.75; 
		opacity: 0.75;
	}
	.swiper-container-home .arrow-right-homemag {
		background: url(images/arrows.png) no-repeat left bottom;
		position: absolute;
		right: 5px;
		top: 50%;
		margin-top: -23px;
		width: 50px;
		height: 45px;
		z-index: 50;
		filter:alpha(opacity=75); 
		-moz-opacity:0.75; 
		-khtml-opacity: 0.75; 
		opacity: 0.75;
	}
	.swiper-container-home .arrow-left-homemag:hover, .swiper-container-home .arrow-right-homemag:hover{
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
		var mySwiperT = new Swiper('.swiper-container-home');
		mySwiperT.enableKeyboardControl();
		$('.arrow-left-homemag').on('click', function(e){
			mySwiperT.swipePrev()
		});
		$('.arrow-right-homemag').on('click', function(e){
			mySwiperT.swipeNext()
		})
	});
</script>