<?php get_header(); ?>
<?php
$theme_option = flagship_sub_get_global_options();
?>
	
			
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<div class="hide-for-small-only siderail">

		    	<?php ksaslab_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>

		    <main class="main auto cell" role="main" id="page">

				<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>

			    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
						<div class="news-feed">
							<!-- To see additional archive styles, visit the /parts directory -->
							<?php get_template_part( 'parts/loop', 'archive' ); ?>
						</div> 
				<?php endwhile; ?>	

					<?php ksaslab_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
																								
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>