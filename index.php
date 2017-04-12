<?php get_header(); ?>
<?php $theme_option = flagship_sub_get_global_options(); 
$news_query_cond = $theme_option['flagship_sub_news_query_cond']; ?>	
			
	<div id="content">
	
		<div id="inner-content" class="expanded row">

		    <main id="main" class="medium-9 medium-push-3 columns" role="main">

		    	<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
		
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
		    
			<div class="hide-for-small-only medium-3 medium-pull-9 columns">

		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>