<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
	<div class="row">
		<div class="small-12 columns">
			<form method="GET" action="<?php echo site_url('/search'); ?>" role="search" aria-label="Mobile Menu Search">
				<div class="input-group">
					<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="mobile-search" placeholder="Search this site" aria-label="search"/>
					<label for="mobile-search" class="screen-reader-text">
		                Search This Website
		            </label>
		            <div class="input-group-button">
		    			<input type="submit" class="button" value="Search &#xf002;">
		  			</div>	
				</div>
			</form>
		</div>	
	</div>
	<?php joints_off_canvas_nav(); ?>
</div>