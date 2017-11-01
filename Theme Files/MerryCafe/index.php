<?php

get_header();

?>

<!-- Page Content Here -->


<?php

get_template_part("template-parts/page-title-bar-blog"); 
?>



<div class="container blog-template">
	<div class="row">

				<div class="col-md-9 col-sm-9 col-xs-12 blog-container">

					<?php
					if(get_option( 'sticky_posts' ))
					{
						$regular_posts_args = array(

						'post_type' 			=>	'post',
						'post_status' 			=>	'publish',
						'paged'					=>	get_query_var('paged'),
						'ignore_sticky_posts'	=>	1,
						'post__in'				=> get_option( 'sticky_posts' )

						);

						query_posts($regular_posts_args); 				
						get_template_part("template-parts/posts-loop");
					}


						

					?>

					<?php

						$regular_posts_args = array(

						'post_type' 			=>	'post',
						'post_status' 			=>	'publish',
						'paged'					=>	get_query_var('paged'),
						'ignore_sticky_posts'	=>	1,
						'post__not_in'				=> get_option( 'sticky_posts' )

						);				

					?>
					<?php query_posts($regular_posts_args); ?>
					<?php get_template_part("template-parts/posts-loop"); ?>
					

				</div>

				<div class="col-md-3 col-sm-3 col-xs-12" id="blog-sidebar">
				<?php dynamic_sidebar( 'Blog' );?>	
				</div>

	</div>
</div>

<?php get_footer(); ?>