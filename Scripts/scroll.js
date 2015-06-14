$(function(){
	$(window).scroll(function(){
		if($(this).scrollTop()>1000){
			$(".scrollToTop").fadeIn("slow");
		}else{
			$(".scrollToTop").fadeOut("slow");
		}
	});
	$(".scrollToTop").click(function(){
		$("html,body").animate({scrollTop: 0}, 500);
		return false;
	});
});