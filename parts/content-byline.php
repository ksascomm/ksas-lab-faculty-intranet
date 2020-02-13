<?php
/**
 * The template part for displaying an author byline
 */
?>

<p class="byline">
	<?php
	printf( __( '%1$s', 'jointswp' ),
		get_the_time( __('F j, Y', 'jointswp') ),
	);
	?>
</p>	