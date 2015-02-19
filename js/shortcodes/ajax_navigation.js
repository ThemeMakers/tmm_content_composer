jQuery(function() {
	jQuery('.ajax_navigation_link').life('click', function() {
		jQuery('.ajax-content').show();
		jQuery('.ajax-navigation-content > li').hide();
		jQuery('.ajax_navigation_content_' + jQuery(this).data('page-id')).show(333);
		jQuery(this).parent().parent().find('li').removeClass('current');
		jQuery(this).parent().addClass('current');
		return false;
	});
	
	jQuery('.ajax-nav').find('.ajax_navigation_link').eq(0).trigger('click');
});


