<?php get_header(); ?>
<?php
$theme_option = flagship_sub_get_global_options();
?>
	
			
	<div id="content">
	
		<div id="inner-content" class="expanded row">

			<div class="hide-for-small-only medium-3 columns">

		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>

		    <main id="main" class="medium-9 columns" role="main">

				<?php
				// If a featured image is set, insert into layout and use Interchange
				// to select the optimal image size per named media query.
				if ( has_post_thumbnail( $post->ID ) ) :
			    ?>
					<header class="featured-hero" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
					</header>

					<h1 class="entry-title clear"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
				
				<?php else : ?>	

					<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
					
				<?php endif; ?>

			    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
						<div class="news-feed">
							<!-- To see additional archive styles, visit the /parts directory -->
							<?php get_template_part( 'parts/loop', 'archive' ); ?>
						</div> 
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>