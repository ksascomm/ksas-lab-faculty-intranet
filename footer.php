					<footer class="footer hide-for-print" role="contentinfo">
						<div id="inner-footer" class="row">
		    				<div class="row" id="copyright" role="content-info">
								<div class="small-12 columns">
									<?php $theme_option = flagship_sub_get_global_options()?>
  									<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
					  			</div>
					  		</div>
					  		<div class="row">
						  		<?php global $blog_id; if ($blog_id == 93) : ?>
	   
								  		<div class="small-12 medium-4 columns">
							  				<a href="http://www.jhu.edu" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University"/></a>
							  			</div>
							  			<div class="small-12 medium-4 columns">
							  				<a href="http://www.press.jhu.edu" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/press.png" alt="University Press"/></a>
							  			</div>
							  			<div class="small-12 medium-4 columns">
							  				<a href="http://www.krieger.jhu.edu" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/krieger.png" alt="Krieger School"/></a>
							  			</div>

									<?php  else : ?>
		   
								  		<div class="small-12 small-centered medium-4 columns">
							  				<a href="http://www.jhu.edu" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University"/></a>
							  			</div>
							  			
								<?php endif; ?>
					  		</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->