jQuery(document).ready(function ($) {
	var url = $('.hidden-url').text();	
	if ($('body.home')) {
		$('.site-wrapper-inner').css('background-image','url('+url+')');
	}
	$('form').attr('role','form').find('.ninja-forms-field').addClass('form-control');
	
});