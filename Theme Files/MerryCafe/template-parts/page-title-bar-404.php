<div class="page-title-container" style="background-image:url('<?php 

	if(get_the_post_thumbnail_url('mr_page_title_bar') == '')
	{
		echo wp_get_attachment_url(get_theme_mod( 'merryrestaurant_default_page_title_image'));
	}
	else
	{
		echo the_post_thumbnail_url('mr_page_title_bar');
	}
?>')">
	<div class="opacity-overlay">

		<div class="full-width-heading-transparent">
		 
		 		<h1><?php echo __("Page not found!","merryrestaurant"); ?></h1>

		</div>
	</div>

</div>





