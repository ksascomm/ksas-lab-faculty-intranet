<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->
					
    <div class="entry-content" itemprop="articleBody">
    	<?php if ( has_post_thumbnail()) : 
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
		?> 
    	<div class="imageblockleft small-centered medium-uncentered columns">
    		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<a href="<?php echo $thumb_url; ?>" data-lightbox="image-1">
					<?php if (!is_singular('ai1ec_event')) : ?>
						<?php the_post_thumbnail('full', array('class'	=> "thumbnail", 'itemprop' => 'image')); ?>
					<?php endif;?>
				</a>
			</div>
		</div>
		<?php endif; ?>
		<?php the_content(); ?>
	</div> <!-- end article section -->
													
</article> <!-- end article -->