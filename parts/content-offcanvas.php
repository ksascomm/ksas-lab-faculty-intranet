<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<form method="GET" action="<?php echo home_url( '/' ); ?>" role="search" aria-label="Mobile Menu Search">
	
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="mobile-search" placeholder="Search this site" aria-label="search"/>
					<label for="mobile-search" class="screen-reader-text">
		                Search This Website
		            </label>

		    		<input type="submit" class="button expanded" value="Search &#xf002;">
			</form>
		</div>	
	</div>
	<?php joints_off_canvas_nav(); ?>
</div>