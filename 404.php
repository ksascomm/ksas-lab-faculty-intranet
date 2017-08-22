<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="expanded row">
	
			<main id="main" class="medium-9 medium-push-3 columns" role="main">

				<article class="small-12 medium-9 columns" id="content-not-found">
				
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

			<div class="hide-for-small-only medium-3 medium-pull-9 columns">
			
		    	<?php joints_sidebar_nav(); ?>

		    	<div class="sidebar-nav search">
		    		<hr><?php get_search_form(); ?>
		    	</div>

		    </div>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>