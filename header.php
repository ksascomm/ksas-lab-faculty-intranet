<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		<meta name="date" content="<?php the_modified_date(); ?>" />
		<title><?php create_page_title(); ?></title>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/browserconfig.xml" />
		
		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<?php get_template_part('parts/analytics'); ?>
		<!-- end analytics -->
	
	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
	<?php $theme_option = flagship_sub_get_global_options(); $color_scheme = $theme_option['flagship_sub_color_scheme']; ?>
	<body <?php body_class($color_scheme); ?>>

		<div class="off-canvas-wrapper">
							
				<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
				
				<div class="off-canvas-content" data-off-canvas-content>
					
					<header class="header" role="banner">
							
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->

						 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
		 				
							<div class="show-for-print">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/krieger.small.horizontal.blue.jpg" alt="krieger logo">
								<h1><?php echo get_bloginfo( 'description' ); ?> <?php echo get_bloginfo( 'title' ); ?></h1>
							</div>						

					</header> <!-- end .header -->