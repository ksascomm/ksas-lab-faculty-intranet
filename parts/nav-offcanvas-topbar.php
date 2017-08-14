<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<div class="roof hide-for-small-only">	 
	<?php get_template_part( 'parts/explore', 'ksas' ); ?>
</div>

<div class="top-bar hide-for-print" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu show-for-medium">
			<li><a href="http://krieger.jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal-md.png" alt="Krieger School of Arts and Sciences"></a></li>
			<li><h1><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?><br>
				<small><?php echo get_bloginfo ( 'description' ); ?></small></a></h1>
			</li>
		</ul>
		<ul class="vertical menu show-for-small-only">
			<li><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal-md.png" class="float-center" alt="Krieger School of Arts and Sciences"></li>
			<li><h1 class="center"><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?><br>
				<small><?php echo get_bloginfo ( 'description' ); ?></small></a></h1>
			</li>
		</ul>
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>