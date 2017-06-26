<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php
	// If a featured image is set, insert into layout and use Interchange
	// to select the optimal image size per named media query.
	if ( has_post_thumbnail( $post->ID ) ) : ?>

	<div class="small-12 large-9 columns">
		<header class="featured-hero" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
		</header>
		<div class="row">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>	
	</div>

	<?php else: ?>	

		<h1 class="page-title"><?php the_title(); ?></h1>
		
	<?php endif;?>

    <div class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</div> <!-- end article section -->
						
</article> <!-- end article -->