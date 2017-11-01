<?php
 /*
 * Template Name: Contact
 *
 * Contact Template
 *
 */
get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar"); 
?>

<div class="container page-template single-page-template contact-template">
	<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 page-container" id="contact-maps">
					<div class="page-content">
						<?php echo do_shortcode(get_theme_mod('merryrestaurant_contact_forms_7_shortcode')); ?>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-12 page-container">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="single-content">
								<div class="page-content">
									<?php the_content(); ?>
								</div>	
						</div>
					<?php endwhile; wp_reset_query();?>	
					

				</div>
				

	</div>
</div>

<?php get_footer(); ?>