<?php get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

				
			<div class="hide-for-small-only siderail">
		    	<?php ksaslab_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    </div>

		    <main class="main auto cell" role="main" id="page">
			    
		    	<header>
		    		<h1 class="page-title"><?php the_archive_title(); ?></h1>
					<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
		    	</header>
		
			    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>

				<?php endwhile; ?>
				
					<?php ksaslab_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>