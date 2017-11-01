<?php 
if (
	get_theme_mod('merryrestaurant_recommended_first_column_menu_item', 'Choose') == 'Choose' ||
	get_theme_mod('merryrestaurant_recommended_second_column_menu_item','Choose') == 'Choose' ||
	get_theme_mod('merryrestaurant_recommended_third_column_menu_item','Choose') == 'Choose'
		)
{
	?>
	<div class="full-width-alert container">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <div class="alert-text">Set the values of all recommended items by going to <b>Home > Recommended Section</b> to enable the Recommended Section.</div>
	</div>
	<?php

}
else
{

	?>
	<div class="full-width-heading recommended-section-heading" id="home-menu"><h1><?php echo get_theme_mod('merryrestaurant_recommended_section_heading_text', 'Chef\'s Recommended'); ?></h1></div>
	<?php

	$post_1=get_post(get_theme_mod('merryrestaurant_recommended_first_column_menu_item', 'One'));
	$post_2=get_post(get_theme_mod('merryrestaurant_recommended_second_column_menu_item'));
	$post_3=get_post(get_theme_mod('merryrestaurant_recommended_third_column_menu_item'));

	 ?>
		<section class="home-menu container recommended-section" >
			<div class="row">

				<div class="col-md-4 col-sm-4 nopadding">
					<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post_1->ID), 'mr_home_menu')[0] ?>" alt="<?php echo get_the_title(get_post_thumbnail_id($post_1->ID)); ?>"/>
					<h2><?php echo $post_1->post_title; ?></h2>
					<span><?php echo $post_1->post_content; ?></span>
					<h3><?php echo get_post_meta($post_1->ID,'_price_tag',true); ?></h3>
				</div>
				<div class="col-md-4 col-sm-4 nopadding">
					<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post_2->ID), 'mr_home_menu')[0] ?>" alt="<?php echo get_the_title(get_post_thumbnail_id($post_2->ID)); ?>"/>
					<h2><?php echo $post_2->post_title; ?></h2>
					<span><?php echo $post_2->post_content; ?></span>
					<h3><?php echo get_post_meta($post_2->ID,'_price_tag',true); ?></h3>
				</div>
				<div class="col-md-4 col-sm-4 nopadding">
					<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post_3->ID), 'mr_home_menu')[0] ?>" alt="<?php echo get_the_title(get_post_thumbnail_id($post_3->ID)); ?>"/>
					<h2><?php echo $post_3->post_title; ?></h2>
					<span><?php echo $post_3->post_content; ?></span>
					<h3><?php echo get_post_meta($post_3->ID,'_price_tag',true); ?></h3>
				</div>
			</div>
		</section>
<?php } ?>