<div class="flexslider-container">
<div class="flexslider" id="home-slider">
	  <div class="slider-loading">
	  	<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
	  </div>
	  <ul class="slides">

	  	<?php $loop = new WP_Query( array('post_type' => 'slides') ); 

	  	if($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
	  	?> <li> <?php
  			
  			echo '<img src="'.wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ).'" alt="'.get_the_title(get_post_thumbnail_id($post->ID)).'"/>'; ?>

  			<div class="slider-content">
  				<div class="slider-heading-container"><h1 class="slider-heading" ><?php the_title(); ?></h1></div>
  				<div class="slider-description">

				<?php

	  			
				if(strlen(get_the_content())>60)
	  			{
	  				$description=substr(get_the_content(), 0, strpos(get_the_content(), ' ', 60))."...";
	  				echo $description;
	  				

	  			}
	  			else
	  			{
	  				echo get_the_content();
	  			}
		  		?>

	  			</div>
	  		</div>

  			</li>
  			
		<?php endwhile; else: ?>

		<div class="full-width-alert container alert-slider">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <div class="alert-text">Add slides to <b>Dashboard > Home Slider</b> to enable the Slider.</div>
		</div>

		<?php endif; ?>
	    
	  </ul>
	</div>
</div>



