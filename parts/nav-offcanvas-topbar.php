<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar hide-for-print" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu show-for-medium">
			<li><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/krieger.png" alt="ksas logo"></a></li>
			<li><h1><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?><br>
				<small><?php echo get_bloginfo ( 'description' ); ?></small></a></h1>
			</li>
		</ul>
		<ul class="vertical menu show-for-small-only">
			<li><img src="<?php echo get_template_directory_uri() ?>/assets/images/krieger.png" class="float-center" alt="jhu logo"></li>
			<li><h1 class="center"><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?><br>
				<small><?php echo get_bloginfo ( 'description' ); ?></small></a></h1>
			</li>
		</ul>
	</div>
	<div class="top-bar-right float-right hide-for-small-only">
		<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="search-bar">
        	<input type="submit" class="icon-search" value="&#xe004;" />
        	<label for="s" class="screen-reader-text"><?php _x( 'Search for:', 'label' ); ?></label>
        	<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="search"/>
        </form>
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>