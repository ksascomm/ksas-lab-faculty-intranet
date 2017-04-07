<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

	<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
	  <button class="menu-icon" type="button" data-toggle></button>
	  <div class="title-bar-title">Menu</div>
	</div>

	<div class="row">
		<div class="small-12 columns" id="logo_nav">
			<div class="small-12 large-3 columns">
				<div class="logo"><a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences"><img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu.png" alt="jhu logo"></a></div>
			</div>
			<div class="small-12 large-7 columns">
				<h1><a href="<?php echo site_url(); ?>"><small><?php echo get_bloginfo ( 'description' ); ?></small><?php echo get_bloginfo( 'title' ); ?></a></h1>
			</div>
			<div id="search-bar" class="small-12 large-2 columns">
				<div class="row">
					<div class="small-12 columns">
					<?php $theme_option = flagship_sub_get_global_options(); 
							$collection_name = $theme_option['flagship_sub_search_collection'];
					?>

					<form method="GET" action="<?php echo site_url('/search'); ?>">
						<input type="submit" class="icon-search" value="&#xe004;" />
						<input type="text" name="q" placeholder="Search this site" />
						<input type="hidden" name="site" value="<?php echo $collection_name; ?>" />
					</form>
					</div>
				</div>	
			</div>	<!-- End #search-bar	 -->
		</div>
	</div>


	<div class="top-bar" id="top-bar-menu">
		<div class="top-bar-right">
			<?php joints_top_nav(); ?>
		</div>
	</div>