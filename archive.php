<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="expanded row">

				
			<div class="hide-for-small-only medium-3 columns">
		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>
		    </div>

		    <main id="main" class="small-12 medium-9 columns" role="main">
			    
		    	<header>
		    		<h1 class="page-title"><?php the_archive_title(); ?></h1>
					<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
		    	</header>
		
			    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>

				<?php endwhile; ?>
				
					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>