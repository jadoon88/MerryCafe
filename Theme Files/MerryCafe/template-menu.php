<?php
/**
 * Template Name: Menu
 *
 * Menu Template
 *
 */


get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar"); 

?>

<div class="container">
<?php 

	wp_reset_query();
	$slide_images=array();
	$menu_titles=array();
	$menu_prices=array();
	$menu_descriptions=array();



	$category_counter=0;

	$menu_categories =  get_terms( array(
    						'taxonomy' => 'menu_categories',
    						'hide_empty' => true,


						) );

	if (empty($menu_categories)) { ?>

		<article class="not-found">
			<h1>Menu is empty</h2>
			<span>No menu items were found.</span>
		</article>
     
	<?php 
	}


	foreach ($menu_categories as $key => $value) {
		

		$loop = new WP_Query( array(
				'post_type' 		=>	'menu-items', 
				'menu_categories'	=>	$value->name,	
				'posts_per_page' => '100'

			)); 


		if($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
  			

				$thumb=wp_get_attachment_image_src(get_post_thumbnail_id(), 'mr_menu_items_var_1');

				

				if($thumb != '')
				{
	  				array_push($slide_images, $thumb[0]);
	  			}

	  			array_push($menu_titles, get_the_title());

	  			if(strlen(get_the_content()>150))
	  			{
	  				$description=substr(get_the_content(), 0, strpos(get_the_content(), ' ', 150))."...";
	  				array_push(get_the_content(), $description);
	  				

	  			}
	  			else
	  			{
	  				array_push($menu_descriptions, get_the_content());
	  			}
	  			
	  			array_push($menu_prices, get_post_meta(get_the_id(),'_price_tag',true));
  			
		endwhile; else: ?>

		<article class="not-found">
			<h1><?php __("Menu is empty", "merrycafe"); ?></h2>
			<span><?php __("No menu items were found" , "merrycafe"); ?> </span>
		</article>

		<?php endif; ?>

		

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 nopadding">

				<?php
				if($category_counter % 2 ==0)
				{
					merrycode_get_menu_var_1_slides($slide_images); 
				}
				else
				{
					merrycode_get_menu_var_1_food_items_slides($menu_titles, $menu_prices, $menu_descriptions, $value->name);
				}
				 
				 ?>
				
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 nopadding">

				<?php 
				
				if($category_counter % 2 ==0)
				{
					merrycode_get_menu_var_1_food_items_slides($menu_titles, $menu_prices, $menu_descriptions, $value->name);
				}
				else
				{
					merrycode_get_menu_var_1_slides($slide_images); 
					
				}

				?>
				    
				  	
			</div>
				
				
		</div>

		<?php 

		unset($slide_images);
		$slide_images=array();
		unset($menu_titles);
		$menu_titles=array();
		unset($menu_prices);
		$menu_prices=array();
		unset($menu_descriptions);
		$menu_descriptions=array();
		$category_counter++;

		} ?>


</div>

<?php get_footer(); ?>