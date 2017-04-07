<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="expanded row">

	    <main id="main" class="medium-9 medium-push-3 columns" role="main">
			
			<?php get_template_part( 'parts/nav', 'breadcrumbs' ); ?>

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    	<?php get_template_part( 'parts/loop', 'single' ); ?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<div class="hide-for-small-only medium-3 medium-pull-9 columns">

		    <?php joints_sidebar_nav(); ?>
		    	
		</div>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>