<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php get_template_part("template-parts/dynamic-css"); ?>

  <?php if(get_theme_mod('merryrestaurant_favicon' ))
  {
   ?>
   <link rel="icon" 
      type="image/png" href="<?php echo esc_url( get_theme_mod( 'merryrestaurant_favicon' ) ); ?>">
  <?php } ?>


</head>


<body <?php body_class(); ?>>

  <?php get_template_part("template-parts/top-header"); ?>
  <?php 

  global $header_type;
  if(is_customize_preview())
  {
      $header_type=get_theme_mod('merryrestaurant_header_type','header-1');
  }

  get_template_part("template-parts/".$header_type);

    ?>