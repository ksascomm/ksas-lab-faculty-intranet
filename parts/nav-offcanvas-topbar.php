<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<!-- By default, this menu will use off-canvas for small
	and a topbar for medium-up -->
<div class="roof hide-for-small-only">	 
	<?php get_template_part( 'parts/explore', 'ksas' ); ?>
</div>

<div class="top-bar hide-for-print" id="top-bar-menu">
		<div class="nav-shield">
			<a href="http://krieger.jhu.edu">
			<?php 
			$theme_option = flagship_sub_get_global_options();
			$color_scheme = $theme_option['flagship_sub_color_scheme'];
			if ( 'spirit' === $color_scheme ) : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ksas-horizontal-black.png" class="float-center" alt="Krieger School of Arts and Sciences" width="300" height="87">
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/krieger.white.svg" alt="Krieger School of Arts and Sciences" width="300" height="87">
			<?php endif; ?>	
			</a>
		</div>
		<div class="site-title">
			<h1>
				<a href="<?php echo esc_url( site_url() ); ?>"><?php bloginfo( 'title' ); ?>
					<?php if ( get_bloginfo( 'description' ) ) : ?>
						<br>
						<small><?php bloginfo( 'description' ); ?></small>
					<?php endif; ?>
				</a>
			</h1>
		</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'ksaslab' ); ?></a></li>
		</ul>
	</div>
</div>
