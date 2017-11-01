<?php

get_header();

?>
<?php

get_template_part("template-parts/page-title-bar-blog"); 
?>

<div class="container blog-single-page">
	<div class="row">

				<article id="post-list-<?php the_ID(); ?>">
					<div class="col-md-9 col-sm-9 col-xs-12" id="blog-single-content" <?php post_class("clearfix"); ?>>
						 <?php while ( have_posts() ) : the_post(); ?>
						<?php if(has_post_thumbnail()) 
						{ ?>

							<img src="<?php echo the_post_thumbnail_url('mr_single_post_featured_image');?>"/>

							<?php
							}
							?>
							<div class="single-content">
								<h1><?php the_title(); ?></h1>
									<div class="blog-page-meta">
										<div class="author_and_date"><?php echo __('Posted by','merryrestaurant').' '; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><b><?php the_author(); ?></b></a><?php echo ' '.__('on','merryrestaurant').' '; ?><b><?php the_time('F jS, Y'); ?></b><?php echo ' '.__('in','merryrestaurant').'&nbsp'; ?></div>
										<?php the_category(', '); ?>
									</div>
									<div class="post-content"><?php the_content(); ?></div>	
									
									<?php 
									if(has_tag())
									{
									?>
										<div class="blog-page-meta">
											<b><?php __("Tags:", 'merrycafe'); the_tags();?>
											
										</div>
									<?php

									}

									?>

									<div class="comments">
									<?php if ( comments_open()) {
										comments_template();
									} ?>
					</div>
							</div>
						<?php endwhile; wp_reset_query();?>	
					</div>
				</article>
				<div class="col-md-3 col-sm-3 col-xs-12" id="blog-sidebar">
					<?php dynamic_sidebar( 'Blog' );?>	
				</div>

	</div>
</div>

<?php get_footer(); ?>