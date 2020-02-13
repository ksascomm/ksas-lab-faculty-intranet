<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
 					<footer class="footer hide-for-print" role="contentinfo">
						<div class="inner-footer">
		    				<div class="grid-x" id="copyright">
								<div class="small-12 cell">
									<?php $theme_option = flagship_sub_get_global_options(); ?>
  									<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright']; ?></p>
					  			</div>
					  		</div>
					  		<div class="grid-x">
						  		<div class="small-12 cell">
					  				<a href="http://www.jhu.edu" target="_blank"><img class="jhushield" src="<?php echo get_template_directory_uri(); ?>/assets/images/university.jpg" alt="Johns Hopkins University"/></a>
					  			</div>		
					  		</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->