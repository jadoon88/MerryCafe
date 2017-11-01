<?php
/**
 * Template Name: Home Page
 *
 * Home Page Template
 *
 */


get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part( "template-parts/".get_theme_mod('merryrestaurant_above_the_fold_content_type','home-slider')); 
get_template_part("template-parts/featured-section");
get_template_part("template-parts/recommended-section");
get_template_part("template-parts/event-section");
get_template_part("template-parts/content-boxes-section");
get_template_part("template-parts/home-page-content");
?>




	

<?php get_footer(); ?>