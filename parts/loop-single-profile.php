<li class="person <?php echo get_the_roles($post); ?>">
	<div class="media-object">
		<?php if ( has_post_thumbnail() ) { ?> 
			<div class="media-object-section hide-for-print">
				<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>'s website"><?php $title=get_the_title();
				the_post_thumbnail('directory', array('class' => 'hide-for-small-only', 'alt' => $title)); ?>
				</a>							
			</div>
		<?php } ?>	
		<div class="media-object-section">
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>	
			<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
				<h5><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h5>
			<?php endif; ?>
			<ul class="contact">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
					<li><span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
					<li><span class="fa fa-fax"></span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
					<li><span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
					<li><span class="fa fa-map-marker-alt"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
					<li><span class="fa fa-globe"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>')" target="_blank" aria-label="<?php the_title(); ?>'s Group/Lab Website">Group/Lab Website</a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
					<li><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></li>
				<?php endif; ?>			
			</ul>
		</div>
	</div>
</li>