<?php 
	$home_url = home_url();
	$theme_option = flagship_sub_get_global_options();	
	
		if ( is_single() && !is_singular(array( 'bulletinboard', 'ai1ec_event' ))) { 
			global $post;
			$article_title = $post->post_title;
			//$article_link = $post->guid;
		?>
		<nav  class="sidebar" aria-label="You are here:" role="navigation">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/about">About</a></li>
				<li><a href="<?php echo $home_url; ?>/about/archive">News Archive</a></li>
				<li><a href="<?php echo get_permalink(); ?>"><?php echo $article_title; ?></a></li>
			</ul>
			</nav>	<?php } 
	elseif (is_singular('ai1ec_event')) { ?>
		<nav aria-label="breadcrumbs">
			<ul id="menu-main-menu-2" class="breadcrumbs">
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo $home_url; ?>/events">Events</a></li>
				<li><strong><?php echo the_title(); ?></strong></li>
			</ul>
		</nav>
		<?php }	
	elseif ( $theme_option['flagship_sub_breadcrumbs']  == '1' ) { ?>

		<nav aria-label="breadcrumbs">

		<?php  wp_nav_menu( array( 
				'container' => 'false',
				'container_class' => 'offset-topgutter hide-for-print',
				'theme_location' => 'main_nav',
				'menu_class' => 'breadcrumbs',
				'items_wrap' => '<ul id="%1$s" class="%2$s"><li><a href="' . $home_url . '">' . $theme_option['flagship_sub_breadcrumb_home'] . '</a></li>%3$s</ul>',
				'walker'=> new flagship_bread_crumb )); 
		} ?>
		</nav>