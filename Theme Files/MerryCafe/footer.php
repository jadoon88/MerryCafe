
	
	<div class="footer-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<?php dynamic_sidebar( 'Footer 1' );?>
					


				</div>
				<div class="col-md-4 col-sm-4">
					<?php dynamic_sidebar( 'Footer 2' );?>
					
				</div>
				<div class="col-md-4 col-sm-4">
					<?php dynamic_sidebar( 'Footer 3' );?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyrights-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<?php echo get_theme_mod('merryrestaurant_footer_lower_text', 'Copyrights '.date("Y"). ' Merry Cafe') ?>
				
				</div>
				
				
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	</body>

</html>

