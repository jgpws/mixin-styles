jQuery(document).ready(function() {

jQuery('#reset_button').click(function() {
	clearimgurl = jQuery('#image_url').attr('value', '');
	clearimgwidth = jQuery('#image_width').attr('value', '');
	clearimgheight = jQuery('#image_height').attr('value', '');
	clearpaddingtop = jQuery('#padding_top').attr('value', '');
	clearpaddingright = jQuery('#padding_right').attr('value', '');
	clearpaddingbottom = jQuery('#padding_bottom').attr('value', '');
	clearpaddingleft = jQuery('#padding_left').attr('value', '');
	selecteddefstyle = jQuery('#default_style').attr('checked', 'checked');
	selecteddefbg = jQuery('#no_bg').attr('checked', 'checked');
	selecteddefremblogtitle = jQuery('#remove_blogtitle').removeAttr('checked', 'checked');
});

});