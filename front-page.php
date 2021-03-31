<?php get_header(); ?>
	<div class="content">
		<?php
			$theme_option = flagship_sub_get_global_options();
			$slider_query = new WP_Query(
			array(
				'post_type' => 'slider',
				'posts_per_page' => '5',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			)
		);
			if ( $slider_query->have_posts() ) :
            ?>
			
			<div class="orbit" role="region" aria-label="Featured Images" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
				<ul class="orbit-container">

					<?php if ($slider_query->post_count > 1 ) : ?>
					<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		   			<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
					<?php endif; ?>

					<?php while ($slider_query->have_posts() ) : $slider_query->the_post(); ?>
						<li class="orbit-slide">	
							<?php get_template_part('parts/content', 'slider'); ?>
				   		</li>
				   <?php endwhile; ?>
				</ul>
			</div>
			<?php endif; ?>
    
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

					
			<div class="hide-for-small-only siderail">
		    	<?php ksaslab_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>	


		    <main class="main auto cell" role="main" id="page">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="margin10 entry-content">
						<?php
							// If a featured image is set, insert into layout and use Interchange
							// to select the optimal image size per named media query.
							if ( has_post_thumbnail( $post->ID ) ) :
						    ?>

							
							<header class="featured-hero home" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
							</header>
							
						<?php endif;?>
						
						<?php $frontpagecontent = the_content(); if ($frontpagecontent != '' ) : ?>
						
						<?php the_content(); ?>	
							
					</div>
				<?php endif; ?>

				<?php endwhile; endif; ?>	

			    <?php
                 // News Query
					$news_quantity = $theme_option['flagship_sub_news_quantity'];
					$news_query = new WP_Query(
					array(
						'post_type' => 'post',
						'posts_per_page' => $news_quantity,
					)
				);
				if ( $news_query->have_posts() ) :
                ?>

				<div class="news-feed">

					<h1 class="feed-title"><?php echo $theme_option['flagship_sub_feed_name']; ?></h1>

					<?php while ($news_query->have_posts() ) : $news_query->the_post(); ?>
						
						<?php get_template_part( 'parts/loop', 'news' ); ?>
							
					<?php endwhile; ?>

					 <div class="row">
						<a class="button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
						</a>
					</div>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'homepage1' ) && is_active_sidebar( 'homepage2' ) ) : ?>
				    <div class="grid-x grid-margin-x" id="hp-buckets">
				    	<div class="small-12 medium-6 cell hide-for-print" role="complementary">
				    		<div class="primary callout">
				    			<?php dynamic_sidebar('homepage1'); ?>
				    		</div> 
						</div>
						<div class="small-12 medium-6 cell hide-for-print" role="complementary">
							<div class="primary callout">
				    			<?php dynamic_sidebar('homepage2'); ?>
				    		</div> 
						</div>
				    </div>
				<?php endif; ?>

			</main> <!-- end #main -->	

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>