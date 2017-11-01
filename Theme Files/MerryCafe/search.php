<?php
/**
 * Search Page
 *
 */


get_header();

?>


<?php

get_template_part("template-parts/page-title-bar-search"); 
?>


<div class="container blog-template">
	<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12 blog-container">

					<?php get_template_part("template-parts/posts-loop"); ?>
					

				</div>
				<div class="col-md-3 col-sm-3 col-xs-12" id="blog-sidebar">
				<?php dynamic_sidebar( 'Sidebar' );?>	
				</div>

	</div>
</div>

<?php get_footer(); ?>