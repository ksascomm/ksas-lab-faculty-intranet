<?php get_header(); ?>
			
	<div class="content">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	

			<div class="hide-for-small-only siderail">
			
		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>

		    </div>
	
			<main class="main auto cell" role="main">

				<article class="content-not-found">
				
					<header class="article-header">
						<h1><?php _e('Page Not Found', 'jointswp'); ?></h1>
					</header> <!-- end article header -->
			
					<section class="entry-content">
						<p><?php _e('The page you were looking for was not found, but maybe try looking again!', 'jointswp'); ?>. Or, email us at <a href="mailto:ksasweb@jhu.edu">ksasweb@jhu.edu</a></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
		
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>