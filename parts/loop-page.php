<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php
	// If a featured image is set, insert into layout and use Interchange
	// to select the optimal image size per named media query.
	if ( has_post_thumbnail( $post->ID ) ) :
		?>

		<div class="grid-x">
				<div class="hero">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>
		</div>

		<h1 class="entry-title clear"><?php the_title(); ?></h1>

	<?php else : ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

	<?php endif; ?>
	<div class="entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div> <!-- end article section -->					
</article> <!-- end article -->
