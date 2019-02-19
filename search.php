<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="expanded row">

			<div class="hide-for-small-only medium-3 columns">

		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>	

			 <main id="main" class="medium-9 columns" role="main">
				
				<div class="small-12 medium-9 columns">

					<h1 class="page-title">
						<?php _e('Search Results for:', 'jointstheme'); ?> 
						<strong><?php echo esc_attr(get_search_query()); ?></strong>
					</h1>

					<div class="callout primary">
						<p>You are currently searching on <strong><?php echo bloginfo('name'); ?></strong>. Would you like to search the entire <a href="http://krieger.jhu.edu/search/?q=<?php echo esc_attr(get_search_query()); ?>">Kreiger network</a>?</p>
					</div>

					<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
				 
						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'search-results' ); ?>

					<?php endwhile; ?>	

						<?php joints_page_navi(); ?>
						
					<?php else : ?>
					
						<?php get_template_part( 'parts/content', 'missing' ); ?>
							
				    <?php endif; ?>
				</div>

		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
