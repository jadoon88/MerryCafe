<?php

get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar"); 
?>

<div class="container page-template single-page-template">
	<div class="row">
				<article class="col-md-9 col-sm-9 col-xs-12 page-container" id="post-<?php the_ID(); ?>" <?php post_class(' clearfix'); ?>>

					<?php while ( have_posts() ) : the_post(); ?>
					<?php if(has_post_thumbnail()) 
					{ ?>

						<?php
						}
						?>
						<div class="single-content">
								<div class="page-content"><?php the_content(); ?></div>	
								
								<?php if ( comments_open()) {
									?>
									<div class="comments"> 
									<?php comments_template(); ?>
									</div>
									<?php } ?>
				
						</div>
					<?php endwhile; wp_reset_query();?>	
					

				</article>
				<div class="col-md-3 col-sm-3 col-xs-12" id="page-sidebar">
					<?php dynamic_sidebar( 'Page' );?>	
				</div>

	</div>
</div>

<?php get_footer(); ?>