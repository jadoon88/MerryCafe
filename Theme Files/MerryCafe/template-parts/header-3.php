<div class="logo-mobile">
    <?php get_template_part("template-parts/logo"); ?>
  </div>
<div id="header-3" class="header-container">   
		<div id="header-row" class="fluid-container">
			<div class="row">
				<div class="col-md-12" id="logo">
          <?php get_template_part("template-parts/logo"); ?>
        </div>
				<div class="col-md-12">
      
      <?php
       
      $menu_args =array(

        'menu'  => 'main-menu',
        'menu_class'      => 'sf-menu',
        'menu_id'      => 'merry-menu',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'container' => 'nav'

        );

       wp_nav_menu($menu_args); 
       ?>

			</div>

		</div>
		</div>
	</div>




