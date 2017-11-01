<?php 
if (
	wp_get_attachment_url(get_theme_mod( 'merryrestaurant_featured_section_image')) == '' ||
	get_theme_mod('merryrestaurant_featured_section_title') == '' ||
	get_theme_mod('merryrestaurant_featured_section_description') == ''
		)
{
	?>
	<div class="full-width-alert container">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <div class="alert-text">Set the values of all required fields by going to <b>Home > Featured Section</b> to enable the Featured Section.</div>
	</div>
	<?php

}
else
{

	?>
	<section id="featured-section" class="container">
		<div class="row">
				<div class="col-md-5 col-sm-6 col-xs-12 featured-image-column">
					<img src='<?php echo wp_get_attachment_url(get_theme_mod( 'merryrestaurant_featured_section_image')); ?>' alt="<?php echo get_theme_mod('merryrestaurant_featured_section_title'); ?>"/>
				</div>
				<div class="col-md-7 col-sm-6 col-xs-12">
					<div class="margined-content-box">
						<h1 id="featured-title">  <?php echo get_theme_mod('merryrestaurant_featured_section_title'); ?> </h1>
						<h1 id="featured-subtitle"><?php echo get_theme_mod('merryrestaurant_featured_section_sub_title'); ?></h1>
						<span>
							<?php echo get_theme_mod('merryrestaurant_featured_section_description');?>
						</span>
					</div>
					<div class="home-price-tag"><?php echo get_theme_mod('merryrestaurant_featured_section_price_tag'); ?></div>

				</div>

		</div>

	</section>
<?php } ?>


	
