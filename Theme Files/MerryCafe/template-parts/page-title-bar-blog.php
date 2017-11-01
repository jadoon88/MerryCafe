<div class="page-title-container" style="background-image:url('<?php 
	
	if(wp_get_attachment_url(get_theme_mod('merryrestaurant_posts_page_title_image')) == '')
	{
		echo wp_get_attachment_url(get_theme_mod('merryrestaurant_default_page_title_image'));
	}
	else
	{
		echo wp_get_attachment_url(get_theme_mod('merryrestaurant_posts_page_title_image'));
	}
?>')">
	<div class="opacity-overlay">

		<div class="full-width-heading-transparent"><h1><?php echo get_theme_mod('merryrestaurant_blog_post_page_title_text','Blog'); ?></h1></div>
	</div>

</div>

