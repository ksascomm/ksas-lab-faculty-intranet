<li class="person <?php echo get_the_roles($post); ?>">
	<div class="row">
		<div class="small-12 columns">
			<?php if ( has_post_thumbnail()) { ?>
				<?php the_post_thumbnail('directory'); ?>
			<?php } ?>
			<h3 class="no-margin">
				<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>
			<p class="black">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
					<span class="fa fa-phone-square" aria-hidden="true"></span> <span class="contact"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span><br>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
					<span class="fa fa-fax" aria-hidden="true"></span> <span class="contact"> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span><br>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
					<span class="fa fa-envelope" aria-hidden="true"></span> <span class="contact"><a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge($email); ?>">
					<?php echo email_munge($email); ?></a></span><br>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
					<span class="fa fa-map-marker" aria-hidden="true"></span> <span class="contact"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span><br>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
					<span class="fa fa-globe" aria-hidden="true"></span> <br>
					<span class="contact">
						<a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>')" target="_blank">Group/Lab Website</a>
					</span>
				<?php endif; ?>
			</p>
			<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
				<p><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></p>
			<?php endif; ?>
	</div>
</div>
</li>