					<footer class="footer hide-for-print" role="contentinfo">
						<div id="inner-footer" class="row">
		    				<div class="row" id="copyright" role="content-info">
								<div class="small-12 columns">
									<?php $theme_option = flagship_sub_get_global_options()?>
  									<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
					  			</div>
					  		</div>
					  		<div class="row show-for-small-only">
					  		
					  			<div class="small-8 small-centered columns">
					
									<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="search-bar">
										<input type="submit" class="icon-search" value="&#xe004;" />
										<label for="s" class="screen-reader-text"><?php _x( 'Search for:', 'label' ); ?></label>
										<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="search"/>
									</form>
									
								</div>
					  		</div>
					  		<div class="row">
						  		<div class="small-12 small-centered medium-4 columns">
					  				<a href="http://www.jhu.edu" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University"/></a>
					  			</div>		
					  		</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->