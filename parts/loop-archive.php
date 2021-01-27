<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-article'); ?> role="article">					
	
	<header class="article-header">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header> <!-- end article header -->
					
	<section class="entry-content" itemprop="text">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php the_excerpt('<button class="tiny">' . __( 'Read more...', 'ksaslab' ) . '</button>'); ?>
	</section> <!-- end article section -->
				    						
</article> <!-- end article -->
