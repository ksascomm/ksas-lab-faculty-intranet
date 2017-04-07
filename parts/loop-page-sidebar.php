<div class="small-12 large-9 columns">
	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
							
		<h1 class="page-title"><?php the_title(); ?></h1>
						
	    <div class="entry-content" itemprop="articleBody">
		    <?php the_content(); ?>
		    <?php wp_link_pages(); ?>
		</div> <!-- end article section -->
							
	</article> <!-- end article -->
</div>

<aside class="small-12 large-3 columns sidebar" id="sidebar1">
					
	<!-- Page Specific Sidebar -->
	<?php 
		$sidebar = get_post_meta($post->ID, 'ecpt_page_sidebar', true);
		dynamic_sidebar($sidebar);
	
	?>
	<!-- END Page Specific Sidebar -->

</saide>