<?php get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<div class="hide-for-small-only siderail">

				<?php ksaslab_sidebar_nav(); ?>

				<div class="sidebar-nav search">
					<hr><?php get_search_form(); ?>
				</div>

			</div>

			<main class="main auto cell" role="main">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
 
						<?php if ( get_post_meta( $post->ID, 'ecpt_page_sidebar', true ) ) : ?>

							<?php the_breadcrumb(); ?>

							<?php get_template_part( 'parts/loop', 'page-sidebar' ); ?>

					<?php else : ?>

						<?php the_breadcrumb(); ?>

						<?php get_template_part( 'parts/loop', 'page' ); ?>

						<?php
				endif;
endwhile;
endif;
				?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
