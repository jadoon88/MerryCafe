<div class="container page-container home-page-content-section">

					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="single-content">
							<!-- <h1><?php the_title(); ?></h1> -->
								<div class="page-content"><?php the_content(); ?></div>	
								
						</div>
					<?php endwhile; wp_reset_query();?>	
					

</div>