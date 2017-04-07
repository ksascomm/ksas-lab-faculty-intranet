<section class="news">
 
		<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
		<div class="row">		
		<article class="small-12 columns">
				<a href="<?php the_permalink(); ?>">
					<h6><?php the_date(); ?></h6>
					<h5 class="black"><?php the_title();?></h5>
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
					<?php } ?>
				</a>
					<?php the_excerpt(); ?>
				
				<hr>
		</article>
		</div>

		<div class="row">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><h5 class="black">View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h5></a>
		</div>
	
 </section>	