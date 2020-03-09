jQuery(document).ready( function($) {
	$('.off-canvas ul li').removeAttr('role', 'treeitem');
	$('.off-canvas ul li').attr('role', 'menuitem');
});