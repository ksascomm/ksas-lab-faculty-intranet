<?php
/**
 * The template part for displaying an author byline
 */
?>

<p class="byline">
	<?php
	echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf(get_the_time('F j, Y') ) . '</time>';
	?>
</p>	