<!-- Begin Sidebar -->
<div class="sidebar">
	<!-- Start Navigation for Sibling Pages -->	
	<?php 
		wp_reset_query();
		if( is_page() || is_singular() || is_tax() || is_home() ) { 
			global $post;
				$the_id = $post->ID;
		        $ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
		        	//Get the top-level page slug for sidebar/widget content conditionals
					$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
			        $the_ancestor = get_page( $ancestor_id );
			        $ancestor_url = get_permalink($post->post_parent);
			        $ancestor_title = $the_ancestor->post_title;
		     //If there are no ancestors display a menu of children
						?>						
					<div class="offset-gutter" id="sidebar_header">
						<h5 class="grey">Also in 
						<?php if (is_home()) :?>
							<a href="<?php echo site_url(); ?>/about" class="white bold">About</a>
						<?php else : ?>
							<a href="<?php echo $ancestor_url;?>" class="white bold"><?php echo $ancestor_title; ?></a>
						<?php endif;?>
						</h5>
					</div>
					<?php 
						wp_nav_menu( array( 
							'theme_location' => 'main-nav', 
							'menu_class' => 'nav', 
							'container_class' => '',
							'sub_menu' => true,
						));
					} ?>
	
<!-- End Sidebar -->
</div>

<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

	<div class="sidebar">

		<?php dynamic_sidebar( 'sidebar1' ); ?>
		
	</div>

<?php endif; ?>