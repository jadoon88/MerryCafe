<style id='MerryResturant-Dynamic-CSS' type='text/css'>

@media
only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (   min--moz-device-pixel-ratio: 2),
only screen and (     -o-min-device-pixel-ratio: 2/1),
only screen and (        min-device-pixel-ratio: 2),
only screen and (                min-resolution: 192dpi),
only screen and (                min-resolution: 2dppx) { 
  
    <?php

    if(get_theme_mod('merryrestaurant_retina_logo'))
    {
    ?>
    .site-retina-logo
    {
        display: block;
    }
    .site-logo
    {
        display: none;
    }


    <?php
	}
	 ?>
    
}
<?php

    if(get_theme_mod("merryrestaurant_header_type") != "header-1")
    {

?>

.page-title-container {
    height: 170px;
}
.page-title-container .opacity-overlay {
    height: 170px;
}
.full-width-heading-transparent {

    padding-top: 80px;
}

.full-width-alert.container.alert-slider {
    margin-top: 0px;
    margin-bottom: 20px;
}


<?php } ?>

<?php

    if(get_theme_mod("merryrestaurant_header_type") == "header-1")
    {
?>
.full-width-alert.container.alert-slider {
    margin-top: 70px;
    margin-bottom: 20px;
}

<?php

} ?>
.home-price-tag { 
    border: 2px dashed <?php echo get_theme_mod('merryrestaurant_featured_section_price_tag_color', SECONDARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_featured_section_price_tag_color', SECONDARY_COLOR); ?>;
}
span.page-numbers.current {
    border: 1px solid <?php echo PRIMARY_COLOR; ?>;
    background-color: <?php echo PRIMARY_COLOR; ?>;
}
a.page-numbers:hover {
    border: 1px solid <?php echo PRIMARY_COLOR; ?>;
    background-color: <?php echo PRIMARY_COLOR; ?>;
}
a.page-numbers {
    padding: 10px;
    border: 1px solid <?php echo PRIMARY_COLOR; ?>;
    color:<?php echo PRIMARY_COLOR; ?>;
}
 #featured-subtitle
 {
    
    color:<?php echo get_theme_mod('merryrestaurant_featured_section_sub_title_color', SECONDARY_COLOR); ?>;
}
.site-retina-logo img {
    width:<?php echo get_theme_mod('merryrestaurant_retina_logo_width', "50%"); ?>px;
}
#header-3 nav {
    background-color: <?php echo get_theme_mod('merryrestaurant_menu_background_color', '#ffffff'); ?>;
    padding-top: 5px;
    padding-bottom: 5px;
}
input[type=submit] {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_form_buttons_color', SECONDARY_COLOR); ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_form_buttons_color', SECONDARY_COLOR); ?>;
}
input, select, textarea {
	
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_form_input_fields_border_color', "#e0e0e0"); ?>;
}
.slider-heading {
    background-color:<?php list($r, $g, $b) = sscanf(get_theme_mod('merryrestaurant_home_slider_heading_background_color', PRIMARY_COLOR), "#%02x%02x%02x"); echo "rgba($r,$g,$b,0.65)";?>;
}
.slider-description {
    background-color:<?php list($r, $g, $b) = sscanf(get_theme_mod('merryrestaurant_home_slider_description_background_color', '#e0e0e0'), "#%02x%02x%02x"); echo "rgba($r,$g,$b,0.65)";?>;
}
#header-1 #header-row{
    background:<?php list($r, $g, $b) = sscanf(get_theme_mod('merryrestaurant_header_background_color', '#ffffff'), "#%02x%02x%02x"); echo "rgba($r,$g,$b,0.7)";?>; 
}
 #header-2, #header-3, #header-4, #header-5 
 {
 	background:<?php list($r, $g, $b) = sscanf(get_theme_mod('merryrestaurant_header_background_color', '#ffffff'), "#%02x%02x%02x"); echo "rgb($r,$g,$b)";?>; 	
 }
 .mean-container .mean-nav {
    background:<?php echo get_theme_mod('merryrestaurant_menu_section_mobile_menu_background_color', "#0c1923"); ?>;
 
}
.menu-listing h1 {
    color:<?php echo get_theme_mod('merryrestaurant_food_menu_category_title_color', PRIMARY_COLOR); ?>;
}
.menu-food-item .item-name h3, .menu-food-item .item-price h3 {
    color:<?php echo get_theme_mod('merryrestaurant_food_menu_item_title_color', SECONDARY_COLOR); ?>;
}
.menu-food-item .item-description{
	color:<?php echo get_theme_mod('merryrestaurant_food_menu_item_description_color', "#333"); ?>;	
}
.read-more-button-blog {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_posts_read_more_button_color', PRIMARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_posts_read_more_button_color', PRIMARY_COLOR); ?>;
}
.read-more-button-blog:hover {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_posts_read_more_button_color', PRIMARY_COLOR); ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_posts_read_more_button_color', PRIMARY_COLOR); ?>;
}
.blog-page-content h2, #blog-single-content h1  {
    color: <?php echo get_theme_mod('merryrestaurant_posts_title_color', PRIMARY_COLOR); ?>;
}
.blog-page-meta {
    color: <?php echo get_theme_mod('merryrestaurant_posts_meta_text_color', '#777'); ?>;
}
.post-content, .post-excerpt {
    color: <?php echo get_theme_mod('merryrestaurant_posts_content_text_color', '#333'); ?>;
}
.post-categories a, .blog-page-meta a {
    color: <?php echo get_theme_mod('merryrestaurant_posts_meta_link_color', '#777'); ?>;
}
.post-categories a:hover, .blog-page-meta a:hover {
    color: <?php echo get_theme_mod('merryrestaurant_posts_meta_link_hover_color', SECONDARY_COLOR); ?>;
}
.page-container h1 {
    color: <?php echo get_theme_mod('merryrestaurant_page_title_color', PRIMARY_COLOR); ?>;
}
.page-container .page-content 
{
	color: <?php echo get_theme_mod('merryrestaurant_page_content_text_color', '#333'); ?>;	
}
.top-header{
	display:<?php if(get_theme_mod('merryrestaurant_top_header_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_top_header_background_color_setting', PRIMARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_top_header_text_color', '#ffffff'); ?>;
}
.home-price-tag{
    display:<?php if(get_theme_mod('merryrestaurant_featured_section_price_tag')!=''){echo "block";}else echo "none"; ?>;
}
#featured-section{
	display:<?php if(get_theme_mod('merryrestaurant_featured_section_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;
}
.recommended-section{
	display:<?php if(get_theme_mod('merryrestaurant_recommended_section_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;
}
.recommended-section-heading{
	display:<?php if(get_theme_mod('merryrestaurant_recommended_section_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;
}
.event.container
{
	display:<?php if(get_theme_mod('merryrestaurant_event_section_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;

}
.content-boxes
{
	display:<?php if(get_theme_mod('merryrestaurant_content_boxes_section_show_hide_toggle', true)){echo "block";}else echo "none"; ?>;

}
.home-page-content-section
{
	display:<?php if(get_theme_mod('merryrestaurant_page_content_section_section_show_hide_toggle', false)){echo "block";}else echo "none"; ?>;
}

#top-header-icons a {
    color: <?php echo get_theme_mod('merryrestaurant_top_header_icon_color', '#ffffff'); ?>;
}
#top-header-icons a:hover {
    background-color: <?php echo get_theme_mod('merryrestaurant_top_header_icon_color', '#ffffff'); ?>;
    color:<?php echo get_theme_mod('merryrestaurant_top_header_background_color_setting', PRIMARY_COLOR); ?>;
}
.footer-widget-area {
    background-color:<?php echo get_theme_mod('merryrestaurant_footer_widgets_background_color', '#e8e8e8'); ?>;
    width:100%;
}
.footer-widget-area h2 {
    color:<?php echo get_theme_mod('merryrestaurant_footer_widgets_headings_color', '#333333'); ?>;
}
#first-content-box-heading
{
 background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_heading_background_color', SECONDARY_COLOR); ?>;
}
#first-content-box-heading h2
{
 color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_heading_color_control', '#ffffff'); ?>;
}
#first-content-box .content-box-text span
{
	color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_first_content_box_text_color', '#333333'); ?>;

}
.read-more-button-1 .button {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_button_text_and_border_color', SECONDARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_button_text_and_border_color', SECONDARY_COLOR); ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_button_fill_color', '#ffffff'); ?>
}
#second-content-box-heading
{
 background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_heading_background_color', PRIMARY_COLOR); ?>;
}
#second-content-box-heading h2
{
 color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_heading_color_control', '#ffffff'); ?>;
}
#second-content-box .content-box-text span
{
	color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_second_content_box_text_color', '#333333'); ?>;

}
.read-more-button-2 .button {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color', PRIMARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color', PRIMARY_COLOR); ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_fill_color', '#ffffff'); ?>
}
#third-content-box-heading
{
 background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_heading_background_color', SECONDARY_COLOR); ?>;
}
#third-content-box-heading h2
{
 color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_heading_color_control', '#ffffff'); ?>;
}
#third-content-box .content-box-text span
{
	color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_text_color', '#333333'); ?>;

}
.read-more-button-3 .button {
    border: 1px solid <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color', SECONDARY_COLOR); ?>;
    color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color', SECONDARY_COLOR); ?>;
    background-color: <?php echo get_theme_mod('merryrestaurant_content_boxes_section_third_content_box_button_fill_color', '#ffffff'); ?>
}

.widget {
    color: <?php echo get_theme_mod('merryrestaurant_footer_widgets_text_color', '#333333'); ?>;
}
.footer-copyrights-area{
	background-color: <?php echo get_theme_mod('merryrestaurant_footer_lower_background_color', '#f1f1f1'); ?>;
	color:<?php echo get_theme_mod('merryrestaurant_footer_lower_text_color', '#737373'); ?>;;
}
#home-menu
{
background-color: <?php echo get_theme_mod('merryrestaurant_recommended_section_heading_text_background_color', PRIMARY_COLOR); ?>;
}
#home-menu h1 {
    color: <?php echo get_theme_mod('merryrestaurant_recommended_section_heading_text_color', '#ffffff'); ?>;
}
.home-menu h2 {
	color: <?php echo get_theme_mod('merryrestaurant_recommended_item_title_color', '#333333'); ?>;
}
.home-menu h3 {
	color: <?php echo get_theme_mod('merryrestaurant_recommended_item_price_color', SECONDARY_COLOR); ?>;
}
.home-menu span
{
	color: <?php echo get_theme_mod('merryrestaurant_recommended_item_description_color', '#333333'); ?>;
}
#featured-title-event
{
	color: <?php echo get_theme_mod('merryrestaurant_event_section_title_text_color', PRIMARY_COLOR); ?>;

}
#featured-subtitle-event
{
	color:<?php echo get_theme_mod('merryrestaurant_event_section_subtitle_text_color', '#ffffff'); ?>;
}
.event span
 {
    color:<?php echo get_theme_mod('merryrestaurant_event_section_detail_text_color', '#ffffff'); ?>;
 }
 .event-timings-box {
    color: <?php echo get_theme_mod('merryrestaurant_event_section_datetime_box_color', '#ffffff'); ?>;
}

h1, h2, h3, h4, h5
{
	font-family: <?php echo get_theme_mod('merryrestaurant_headings_font_family', "'Pacifico', handwriting"); ?>;
}
.slider-heading
{
    font-family: <?php echo get_theme_mod('merryrestaurant_headings_font_family', "'Pacifico', handwriting"); ?>;
}
nav a {
    font-family: <?php echo get_theme_mod('merryrestaurant_menu_font_family', "'Raleway', sans-serif"); ?>;
}
body
{
	font-family:<?php echo get_theme_mod('merryrestaurant_content_font_family', "'Raleway', sans-serif"); ?>; !important;
}
.mean-container a.meanmenu-reveal span{

	background:<?php echo get_theme_mod('merryrestaurant_menu_section_mobile_menu_icon_color_setting', '#000000'); ?>;
}
.sf-menu a {
	color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_color_setting', '#000000'); ?>;
	font-weight: bolder;
	font-size: <?php echo get_theme_mod('merryrestaurant_menu_section_item_font_size_setting', '14'); ?>px;
}
.sf-arrows .sf-with-ul:after {
	border-top-color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_color_setting', '#000000'); ?>;
}
.sf-arrows ul .sf-with-ul:after {
	border-left-color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_hover_color_setting', '#000000'); ?>;
}
.sf-menu li:hover .sf-with-ul:after
{
	border-top-color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_hover_color_setting', '#000000'); ?>;
	-webkit-transition: none;
	transition:none;
}
.sf-menu li:hover ul .sf-with-ul:after  
{
	border-left-color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_hover_color_setting', '#000000'); ?>;
	border-top-color:transparent; 
}
.sf-menu li:hover,
.sf-menu .current-menu-item,
.sf-menu ul li,
.sf-menu ul ul li
 {
	background: <?php echo get_theme_mod('merryrestaurant_menu_section_item_hover_background_color_setting', '#ffffff'); ?>;;
}
.sf-menu li:hover a,
.sf-menu li.sfHover a,
.sf-menu .current-menu-item a {
	color: <?php echo get_theme_mod('merryrestaurant_menu_section_item_hover_color_setting', '#000000'); ?>;
}
#featured-title
 {
 	/*font-family: 'Pacifico', cursive;*/
 	color:<?php echo get_theme_mod('merryrestaurant_featured_section_title_color'); ?>;
 	font-size:28px;
 }
 @media screen and (max-width:470px) { 
    
     <?php

    if(get_theme_mod('merryrestaurant_header_type') != 'header-1')
    {
    ?>
	    .full-width-heading-transparent {
	        padding-top: 13%;
	    }

    <?php
	}
	else { ?>

		.full-width-heading-transparent {
        padding-top: 18%;
    	}

	<?php
	}
	 ?>
 
    .
}

 <?php echo get_theme_mod('merryrestaurant_custom_css') ?>

</style>