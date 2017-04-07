<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="expanded row">

		 <main id="main" class="medium-9 medium-push-3 columns" role="main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<?php if (has_term('', 'role') && !has_term('job-market-candidate', 'role')) : ?>
					<div class="row">
						<div class="small-12 medium-3 medium-offset-9 columns">
							<label for="jump">
								<h5>Jump to Faculty Member</h5>
							</label>
							<select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<option>---<?php the_title(); ?></option> 
								<?php endwhile; endif; ?>
								<?php $jump_menu_query = new WP_Query(array(
									'post-type' => 'people',
									'role' => 'faculty',
									'meta_key' => 'ecpt_people_alpha',
									'orderby' => 'meta_value',
									'order' => 'ASC',
									'posts_per_page' => '-1')); ?>
								<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
									<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
								<?php endwhile; ?>
							</select>
						</div>
					</div>
				<?php endif; ?>	
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="small-12 medium-4 columns bio">

							<header class="article-header">	
							<?php if ( has_post_thumbnail()) { ?> 
									<?php the_post_thumbnail('full', array('class' => 'headshot')); ?>
								<?php } ?>			    
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
						   <?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
						   		<h2><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h2>
						   <?php endif; ?>
							</header>
						    <p class="listing">
						    	<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
						    		<span class="fa fa-map-marker" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><br>
						    	<?php endif; ?>
						    
						    	<?php if ( get_post_meta($post->ID, 'ecpt_hours', true) ) : ?>
						    		<span class="fa fa-calendar" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_hours', true); ?><br>
						    	<?php endif; ?>
						    
						    	<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
						    		<span class="fa fa-phone-square" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><br>
						    	<?php endif; ?>
						    
						    	<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
						    		<span class="fa fa-fax" aria-hidden="true"></span>  <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><br>
						    	<?php endif; ?>
						    
						    	<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
										<span class="fa fa-envelope" aria-hidden="true"></span> <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge($email); ?>">
										
											<?php echo email_munge($email); ?> </a><br>
									<?php endif; ?>
				
						    	<?php if ( get_post_meta($post->ID, 'ecpt_cv', true) ) : ?>
						    		<span class="fa fa-file-pdf-o" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_cv', true); ?>">Curriculum Vitae</a><br>
						    	<?php endif; ?>
						    
						    	<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
						    		<span class="fa fa-globe" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank">Personal Website</a><br>
						    	<?php endif; ?>
						    	<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
						    		<span class="fa fa-globe" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" target="_blank">Group/Lab Website</a><br>
						    	<?php endif; ?>
						    	<?php if (get_post_meta($post->ID, 'ecpt_google_id', true) ) : ?>
						    		<span class="fa fa-google"></span> <a href="http://scholar.google.com/citations?user=<?php echo get_post_meta($post->ID, 'ecpt_google_id', true); ?>" target="_blank">Google Scholar Profile</a><br>
						    	<?php endif; ?>
						    	<?php if (get_post_meta($post->ID, 'ecpt_microsoft_id', true) ) : ?>
						    		<span class="fa fa-windows"></span> <a href="https://academic.microsoft.com/#/detail/<?php echo get_post_meta($post->ID, 'ecpt_microsoft_id', true); ?>" target="_blank"> Microsoft Academic Profile</a>
								<?php endif; ?>
						    </p>
						</div>
					<div class="small-12 medium-8 columns end">
					<?php if (has_term('', 'role') && !has_term('job-market-candidate', 'role')) : ?>
						<ul class="tabs" data-tabs id="profile-tabs">
							<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
								<li class="tabs-title is-active"><a href="#bioTab">Biography</a></li>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?>
								 <li class="tabs-title"><a href="#researchTab">Research</a></li>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?>
								 <li class="tabs-title"><a href="#teachingTab">Teaching</a></li>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_publications', true)) : ?>
									 <li class="tabs-title"><a href="#publicationsTab">Publications</a></li>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title', true) ) : ?>
								 <li class="tabs-title"><a href="#extraTab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title', true); ?></a></li>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title2', true) ) : ?>
								 <li class="tabs-title"><a href="#extra2Tab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title2', true); ?></a></li>
							<?php endif; ?>			  
						</ul>
						
						<div class="tabs-content" data-tabs-content="profile-tabs">		
							<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
								<div class="tabs-panel is-active" id="bioTab" itemprop="articleBody">
									<?php echo get_post_meta($post->ID, 'ecpt_bio', true); ?>
								</div>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?>
								 <div class="tabs-panel" id="researchTab"><?php echo get_post_meta($post->ID, 'ecpt_research', true); ?></div>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?>
								 <div class="tabs-panel" id="teachingTab"><?php echo get_post_meta($post->ID, 'ecpt_teaching', true); ?></div>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_publications', true)) : ?>
								 <div class="tabs-panel" id="publicationsTab">
									<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : echo get_post_meta($post->ID, 'ecpt_publications', true); endif; ?>
								</div>
							<?php endif; ?>
						
							<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab', true) ) : ?>
								<div class="content"  id="extraTab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab', true); ?></div>
							<?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab2', true) ) : ?>
								 <div class="tabs-panel" id="extra2Tab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab2', true); ?></div>
							<?php endif; ?>			
						</div>
					<?php endif; ?>
					</div>
			<?php endwhile; endif; ?>
			</article>	
		</main> <!-- end #main -->
		<div class="hide-for-small-only medium-3 medium-pull-9 columns">

	    	<?php joints_sidebar_nav(); ?>
	    	
	    </div>	
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>