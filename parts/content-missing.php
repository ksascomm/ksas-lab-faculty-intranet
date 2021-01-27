<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<div class="post-not-found">
	
	<?php if ( is_search() ) : ?>
		
		<header class="article-header">
			<h1><?php _e( 'Sorry, No Results.', 'ksaslab' );?></h1>
		</header>
		
		<section class="entry-content">
			<p><?php _e( 'Try your search again.', 'ksaslab' );?></p>
		</section>
		
	<?php else: ?>
	
		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'ksaslab' ); ?></h1>
		</header>
		
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'ksaslab' ); ?></p>
		</section>
		
			
	<?php endif; ?>
	
</div>