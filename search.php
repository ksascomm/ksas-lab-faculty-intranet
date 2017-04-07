<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="expanded row">
	
			 <main id="main" class="medium-9 medium-push-3 columns" role="main">
				
				<div class="small-12 medium-9 columns">

					<h1 class="page-title">
						<?php _e('Search Results for:', 'jointstheme'); ?> 
						<strong><?php echo esc_attr(get_search_query()); ?></strong>
					</h1>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				 
						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'search-results' ); ?>
					    
					<?php endwhile; ?>	

						<?php joints_page_navi(); ?>
						
					<?php else : ?>
					
						<?php get_template_part( 'parts/content', 'missing' ); ?>
							
				    <?php endif; ?>
				</div>

		    </main> <!-- end #main -->

			<div class="hide-for-small-only medium-3 medium-pull-9 columns">

		    	<?php joints_sidebar_nav(); ?>
		    	
		    </div>	

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
