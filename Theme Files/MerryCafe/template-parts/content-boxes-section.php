<?php 

if (
	get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_title', '') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_image','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_description','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_button_text','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_url','') == '' ||

	get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_title', '') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_image','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_description','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_button_text','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_url','') == '' ||

	get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_title', '') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_image','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_description','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text','') == '' ||
	get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_url','') == ''
	
	

		)
{ 	?>

	<div class="full-width-alert container" style="margin-bottom:10px;">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <div class="alert-text">Set the content boxes images and fill all the fields by going to <b>Home > Content Boxes Section</b> to enable the Content Boxes Section.</div>
	</div>

<?php 
}
else {

?>
<section class="content-boxes container">
		<div class="row">
			<div class="col-md-4 col-sm-4 nopadding">
				<div id="first-content-box">
					<div class="full-width-heading-small" id="first-content-box-heading" ><h2><?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_title',''); ?></h2></div>
					<div class="content-box-image">
						<img src="<?php echo wp_get_attachment_url(get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_image')); ?>" alt="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_title',''); ?>"/>
					</div>
					<div class="content-box-text">
						<span>
						<?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_description',''); ?>
						</span>
					</div>
					<div class="read-more-button-1">
						<a href="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_url',''); ?>">
						<div class="button"><?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_button_text',''); ?></div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 nopadding">
				<div id="second-content-box">
					<div class="full-width-heading-small" id="second-content-box-heading" ><h2><?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_title',''); ?></h2></div>
					<div class="content-box-image">
						<img src="<?php echo wp_get_attachment_url(get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_image')); ?>" alt="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_title',''); ?>"/>
					</div>
					<div class="content-box-text">
						<span>
						<?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_description',''); ?>
						</span>
					</div>
					<div class="read-more-button-2">
						<a href="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_url',''); ?>">
						<div class="button"><?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_button_text',''); ?></div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 nopadding">
				<div id="third-content-box">
					<div class="full-width-heading-small" id="third-content-box-heading" ><h2><?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_title',''); ?></h2></div>
					<div class="content-box-image">
						<img src="<?php echo wp_get_attachment_url(get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_image')); ?>" alt="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_title',''); ?>"/>
					</div>
					<div class="content-box-text">
						<span>
						<?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_description',''); ?>
						</span>
					</div>
					<div class="read-more-button-3">
						<a href="<?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_url',''); ?>">
						<div class="button"><?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text',''); ?></div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>