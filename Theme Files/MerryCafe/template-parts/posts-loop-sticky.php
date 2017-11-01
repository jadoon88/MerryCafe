<?php if( have_posts() ): ?>

				        <?php while( have_posts() ): the_post(); ?>

				        

							<article class="row blog-post" id="post-list-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>
								<?php if(has_post_thumbnail()) 
								{ ?>
									<div class="col-md-6 col-sm-6 col-xs-12 blog-page-thumb">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( "mr_post_thumbnail" ); ?></a>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 blog-page-content">
									<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
									<div class="blog-page-meta">
										<div class="author_and_date"><?php echo __('Posted by','merrycafe').' '; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><b><?php the_author(); ?></b></a><?php echo ' '.__('on','merrycafe').' '; ?><b><?php the_time('F jS, Y'); ?></div>
										
									</div>
									<div class="post-excerpt"><?php the_excerpt(); ?></div>	
									</div>
									<div class="read-more-button-blog-container">
										<a class= "read-more-button-blog" href="<?php the_permalink(); ?>"><?php echo __('Read More','merrycafe'); ?></a>
									</div>
								

								<?php } 
								else {
								?>

									<div class="col-md-12 col-sm-12 col-xs-12 blog-page-content">
									<h2><?php the_title(); ?></h2>
									<div class="blog-page-meta">
										<div class="author_and_date"><?php echo __('Posted by','merrycafe').' '; ?> <b><?php the_author(); ?></b><?php echo ' '.__('on','merrycafe').' '; ?><b><?php the_time('F jS, Y'); ?></b></div>
				
									</div>
									<div class="post-excerpt-no-thumbnail"><?php the_excerpt(); ?></div>	
									</div>
									<div class="read-more-button-blog-container no-thumb">
										<a class= "read-more-button-blog" href="<?php the_permalink(); ?>"><?php echo __('Read More','merrycafe'); ?></a>
									</div>

								<?php } ?>
						

						

					</article>

					
					<?php endwhile;?>

					<?php 

						the_posts_pagination( array(
							'prev_text'          => __( '<', 'merrycafe' ),
							'next_text'          => __( '>', 'merrycafe' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'merrycafe' ) . ' </span>',
							'screen_reader_text' => ' '
						) );

					?>
					
				        <?php else: ?>

				       

					<?php endif; wp_reset_query(); ?>