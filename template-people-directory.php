<?php
   /*
   Template Name: People Directory
   */
   ?>
<?php get_header();
	$theme_option = flagship_sub_get_global_options();
	$roles = get_terms('role', array(
						'orderby' 		=> 'ID',
						'order'			=> 'ASC',
						'hide_empty'    => true,
						));
	$filters = get_terms('filter', array(
						'orderby'       => 'name',
						'order'         => 'ASC',
						'hide_empty'    => true,
						));
	$role_slugs = array();
	$filter_slugs = array();
	foreach($roles as $role) {
		$role_slugs[] = $role->slug;
	}
	$role_classes = implode(' ', $role_slugs);
	foreach($filters as $filter) {
		$filter_slugs[] = $filter->slug;
	}
	$filter_classes = implode(' ', $filter_slugs);
	?>

<div id="content">
	<div id="inner-content" class="expanded row">
		<main id="main" class="medium-9 medium-push-3 columns" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="row">
					<div class="large-12 columns">
            <?php the_breadcrumb(); ?>
						<?php get_template_part( 'parts/loop', 'page' ); ?>
					</div>
				</div>
			<?php endwhile; endif; ?>
		    <div class="row" id="fields_container">
				<ul id="directory" data-isotope='{ "itemSelector": ".person", "layoutMode": "masonry" }'>
				<?php foreach($roles as $role) : ?>
					<?php $role_slug = $role->slug;
					$role_name = $role->name;
						$people_query = new WP_Query(array(
								'post_type' => 'people',
								'role' => $role_slug,
								'meta_key' => 'ecpt_people_alpha',
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'posts_per_page' => '-1'));

					if ($people_query->have_posts()) : ?>
						<li class="person sub-head quicksearch-match <?php echo $role->slug; ?>"><h2 class="black capitalize"><?php echo $role_name; ?></h2></li>


				<?php while ($people_query->have_posts()) : $people_query->the_post(); ?>


				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) {
						get_template_part('parts/loop', 'single-profile');
					} else {
						get_template_part( 'parts/loop', 'single-noprofile' );
					} ?>

				<?php endwhile; endif; endforeach; wp_reset_postdata(); ?>

				</ul>

				<!-- Page Content -->
			</div>
	   </main>
	   <!-- end #main -->

		<div class="hide-for-small-only medium-3 medium-pull-9 columns">

	    	<?php joints_sidebar_nav(); ?>

	    	<div class="sidebar-nav search">
	    		<hr><?php get_search_form(); ?>
	    	</div>

	    </div>

	</div> <!-- end #inner-content -->
</div>
<!-- end #content -->
<?php get_footer(); ?>
