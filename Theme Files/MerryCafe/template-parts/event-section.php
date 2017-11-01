<?php 

if (
	get_theme_mod('merryrestaurant_event_section_image', '') == '' ||
	get_theme_mod('merryrestaurant_event_section_title_text','') == '' ||
	get_theme_mod('merryrestaurant_event_section_subtitle_text','') == '' ||
	get_theme_mod('merryrestaurant_event_section_detail_text','') == '' ||
	get_theme_mod('merryrestaurant_event_section_datetime_text','') == ''
	
	

		)
{ ?>
	<div class="full-width-alert container" style="margin-bottom:10px;">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <div class="alert-text">Set the event image and fill all the fields by going to <b>Home > Event Section</b> to enable the Event Section.</div>
	</div>

<?php 
}
else {

?>
<?php if(get_theme_mod('merryrestaurant_event_section_url','') != ''){  ?>
 
 <a href="<?php get_theme_mod('merryrestaurant_event_section_url','') ?>"> 
 
 <?php } ?>
<section class="event container" style="background-image: url('<?php echo wp_get_attachment_url(get_theme_mod('merryrestaurant_event_section_image')); ?>');">
	<div class="event-hover-container">
		<div class="row">
		
				<div class="col-md-4 col-sm-4 event-text-container">
					<h1 id="featured-title-event"><?php echo get_theme_mod('merryrestaurant_event_section_title_text',''); ?></h1>
					<h1 id="featured-subtitle-event"><?php echo get_theme_mod('merryrestaurant_event_section_subtitle_text',''); ?></h1>
					<span>
							<?php echo get_theme_mod('merryrestaurant_event_section_detail_text',''); ?> 
					</span>
					<div class="even-timings-box-container">
						<div class="event-timings-box"><?php echo get_theme_mod('merryrestaurant_event_section_datetime_text',''); ?></div>
					</div>
				</div>
		
		</div>
	</div>

	</section>
<?php if(get_theme_mod('merryrestaurant_event_section_url','') != ''){  ?>
 
 </a> 
 
 <?php } ?>

<?php
}
 ?>