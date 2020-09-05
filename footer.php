		<footer id="footer-global">
			    	
			<div class="container">
			            
				<div id="footer-widgets" class="row">
			
					<div class="span3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-1") ) : ?>
						<?php endif; ?>
					</div>
							
					<div class="span3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-2") ) : ?>
						<?php endif; ?>
					</div>
							
					<div class="span3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-3") ) : ?>
						<?php endif; ?>
					</div>
							
					<div class="span3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-4") ) : ?>
						<?php endif; ?>
					</div>
			            
			    </div><!-- end #footer-widgets -->
	
			</div><!-- end .container -->	
			    
		</footer><!-- end #footer-global -->

		<div id="copyright-and-credits">

			<div class="container">

				<div class="row">

					<div class="span12">

						<p>Copyright &copy; <?php echo date('Y') ?> Magnetic Webworks<?php //echo bloginfo('name'); ?>. All Rights Reserved. | <a href="contact">Contact</a></p>

					</div>

				</div>

			</div><!-- end .container -->

		</div><!-- end #copyright-and-credits -->

		<!--<div id="back-to-top" style="display: block;">
			
			<a href="#"></a>
		
		</div>--><!-- end #back-to-top -->

		<?php global $data; echo $data['google_analytics']; ?>

<?php wp_footer(); ?>


	</body>

</html>