<?php get_header(); ?>

	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<div class="hide-for-small-only medium-3 cell">

		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    	
		    </div>
		    
		    <main class="main medium-9 cell" role="main">

			<?php the_breadcrumb(); ?>

			<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/loop', 'single' ); ?>

			<?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
