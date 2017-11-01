<?php

get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar-404"); 
?>

<div class="container page-template single-page-template">
	<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12 page-container">

	
						<div class="single-content">
							<!-- <h1><?php the_title(); ?></h1> -->
								<div class="page-content">
									<?php echo __("Page you are looking for was not found.","merryrestaurant"); ?>
								</div>	
								
								
				
						</div>
					

				</div>
				<div class="col-md-3 col-sm-3 col-xs-12" id="page-sidebar">
				<?php dynamic_sidebar( 'Page' );?>	
				</div>

	</div>
</div>

<?php get_footer(); ?>