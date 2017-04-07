<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<h1 class="page-title"><?php the_title(); ?></h1>
					
    <div class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</div> <!-- end article section -->
						
</article> <!-- end article -->