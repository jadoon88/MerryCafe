<div class="page-title-container" style="background-image:url('<?php 

	if(has_post_thumbnail())
	{
		the_post_thumbnail_url('mr_page_title_bar');
		
	}
	else if(wp_get_attachment_url(get_theme_mod( 'merryrestaurant_pages_page_title_image')) != '')
	{
		echo wp_get_attachment_url(get_theme_mod( 'merryrestaurant_pages_page_title_image'));
	}
	else
	{
		echo wp_get_attachment_url(get_theme_mod( 'merryrestaurant_default_page_title_image'));	
	}
?>')">
	<div class="opacity-overlay">

		<div class="full-width-heading-transparent"><h1><?php echo get_the_title(); ?></h1></div>
	</div>

</div>


