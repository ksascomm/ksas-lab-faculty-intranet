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
								<div class="grid-x">
									<div class="small-12 cell">
										<div class="footer-links">
											<ul class="menu align-center" role="menu">
											<li role="menuitem"><a href="https://accessibility.jhu.edu/" target="_blank">Accessibility</a></li>	
											<li role="menuitem"><a href="https://it.johnshopkins.edu/policies/privacystatement" target="_blank">Privacy Statement</a></li>
										</ul>
										</div>
									</div>
								<div class="small-12 cell">
									<div class="copyright">
										<?php $theme_option = flagship_sub_get_global_options(); ?>
											<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright']; ?></p>
										</div>
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