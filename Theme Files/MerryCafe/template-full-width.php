<?php
/**
 * Template Name: Full Width
 *
 * Full Width Template
 *
 */

get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar"); 
?>

<div class="container page-template single-page-template">
	<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 page-container">

					<?php while ( have_posts() ) : the_post(); ?>
					<?php if(has_post_thumbnail()) 
					{ ?>

						<?php
						}
						?>
						<div class="single-content">
							<!-- <h1><?php the_title(); ?></h1> -->
								<div class="page-content"><?php the_content(); ?></div>	
								
								<?php if ( comments_open()) {
									?>
									<div class="comments"> 
									<?php comments_template(); ?>
									</div>
									<?php } ?>
				
						</div>
					<?php endwhile; wp_reset_query();?>	
					

				</div>

	</div>
</div>

<?php get_footer(); ?>