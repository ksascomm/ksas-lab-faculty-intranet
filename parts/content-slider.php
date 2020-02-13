<div class="hero">	
	<div class="grid-x">
			<div class="large-7 cell">
				<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" class="radius-top" alt="<?php $the_content = get_the_content(); if ( !empty($the_content) ) { echo $the_content; } else { echo 'Homepage Slider'; };?>"/>
			</div>
			<div class="small-12 large-5 cell vertical radius-topright">
				<div id="caption">
				<?php if ( ! the_title( ' ', ' ', false ) == '' ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php endif; ?>
					<h5><?php echo get_the_content(); ?></h5>
				   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
						<a class="button" href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')">
							Find Out More
						</a>
					<?php endif; ?>
				</div>
			</div>	
	</div>
</div>