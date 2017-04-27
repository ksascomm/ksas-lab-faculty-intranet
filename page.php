<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="expanded row">

		    <main id="main" class="medium-9 medium-push-3 columns" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
					<?php if ( get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) : ?>

			    		<?php get_template_part( 'parts/loop', 'page-sidebar' ); ?>

			    	<?php else :?>

			    		<?php the_breadcrumb(); ?>

			    		<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endif; endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->

			<div class="hide-for-small-only medium-3 medium-pull-9 columns">

		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>