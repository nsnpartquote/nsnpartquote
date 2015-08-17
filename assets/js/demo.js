$(document).ready(function(e) {	
	$('.child').hide();
	$('.child').find('li.active').parents('.sub-menu').find('.down').addClass('up').next().show();
    $(".sub-menu .parent").click(function(){
		$( this ).toggleClass( "up" );
		$(this).siblings('.child').slideToggle(200);
	})	
});