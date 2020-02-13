// Used to remove block options in editor

// Remove outline & Square Block
wp.domReady( () => {
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
} );