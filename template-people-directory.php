<?php
   /*
   Template Name: People Directory
   */
?>
<?php
get_header();
	$theme_option = flagship_sub_get_global_options();
	$roles        = get_terms(
		'role',
		array(
			'orderby'    => 'slug',
			'order'      => 'ASC',
			'hide_empty' => true,
		)
	);
	$role_slugs   = array();
	foreach ( $roles as $role ) {
		$role_slugs[] = $role->slug;
	}
	$role_classes = implode( ' ', $role_slugs );
	?>

	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<div class="hide-for-small-only siderail">

				<?php ksaslab_sidebar_nav(); ?>

				<div class="sidebar-nav search">
					<hr><?php get_search_form(); ?>
				</div>
				
			</div>
			
			<main class="main auto cell" role="main" id="page">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
				<div class="grid-x">
					<div class="large-12 cell">
						<?php the_breadcrumb(); ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
					</div>
				</div>
					<?php
			endwhile;
endif;
			?>
			<div class="grid-x" id="fields_container">
				<ul id="directory">
				<?php foreach ( $roles as $role ) : ?>
					<?php
					$role_slug        = $role->slug;
					$role_name        = $role->name;
						$people_query = new WP_Query(
							array(
								'post_type'      => 'people',
								'role'           => $role_slug,
								'meta_key'       => 'ecpt_people_alpha',
								'orderby'        => 'meta_value',
								'order'          => 'ASC',
								'posts_per_page' => '-1',
							)
						);

					if ( $people_query->have_posts() ) :
						?>
						<li class="person sub-head quicksearch-match <?php echo $role->slug; ?>"><h2 class="black capitalize"><?php echo $role_name; ?></h2></li>


						<?php
						while ( $people_query->have_posts() ) :
							$people_query->the_post();
							?>

							<?php
							if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) {
								get_template_part( 'parts/loop', 'single-profile' );
							} else {
								get_template_part( 'parts/loop', 'single-noprofile' );
							}
							?>

							<?php
				endwhile;
endif;
endforeach;
				wp_reset_postdata();
				?>

				</ul>

				<!-- Page Content -->
			</div>
			<div class="grid-x">
				<div class="large-12 cell">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						<div class="entry-content" itemprop="articleBody">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div> <!-- end article section -->					
					</article> <!-- end article -->
						<?php
				endwhile;
endif;
				?>
				</div>
			</div>
	   </main>
	   <!-- end #main -->

	</div> <!-- end #inner-content -->
</div>
<!-- end #content -->
<?php get_footer(); ?>
