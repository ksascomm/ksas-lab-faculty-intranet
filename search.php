<?php 
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
 	
get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<div class="hide-for-small-only siderail">

		    	<?php ksaslab_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>	

			<main class="main auto cell" role="main">

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

						<?php ksaslab_page_navi(); ?>
						
					<?php else : ?>
					
						<?php get_template_part( 'parts/content', 'missing' ); ?>
							
				    <?php endif; ?>

		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
