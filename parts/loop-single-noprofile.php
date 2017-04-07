<li class="person <?php echo get_the_roles($post); ?>">
	<div class="row">
		<div class="small-12 columns">
			<?php if ( has_post_thumbnail()) { ?>
				<?php the_post_thumbnail('directory'); ?>
			<?php } ?>
			<h3 class="no-margin">
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
				<?php else : ?>
					<?php the_title(); ?>
			<?php endif; ?>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>
			<p class="contact black">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><span class="fa fa-phone-square" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><br><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><span class="fa fa-envelope" aria-hidden="true"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a><br><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><span class="fa fa-map-marker" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><?php endif; ?>
			</p>
			<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
			<p><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p>
			<?php endif; ?>
		</div>
	</div>
</li>