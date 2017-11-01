<?php 

define("PRIMARY_COLOR",get_theme_mod("merryrestaurant_default_primary_color", "#bba225"));
define("SECONDARY_COLOR",get_theme_mod("merryrestaurant_default_secondary_color", "#076eb0"));

//Translation text domain
load_theme_textdomain( 'merrycafe', get_template_directory_uri().'/languages' );

//Content Width
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

//TGM Plugin Activation
require_once dirname( __FILE__ ) . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'merrycafe_register_required_plugins' );

function merrycafe_register_required_plugins() {
	
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Customizer Sync', // The plugin name.
			'slug'               => 'customizer-sync', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/customizer-sync.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'Posts Types Order',
			'slug'      => 'post-types-order',
			'required'  => true,
		),
		array(
			'name'      => 'Category Order and Taxonomy Terms Order',
			'slug'      => 'taxonomy-terms-order',
			'required'  => true,
		),

		
	$config = array(
		'id'           => 'merrycafe',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	));

	tgmpa( $plugins, $config );
}
//Post Thumbnails Support
add_theme_support( 'post-thumbnails' ); 

//Custom Image Sizes
add_image_size( 'mr_featured_image_dashboard_preview', 313);
add_image_size( 'mr_menu_items_var_1', 585, 570,true );
add_image_size( 'mr_page_title_bar', 1336, 207,true );
add_image_size( 'mr_home_menu', 343, 340,true );
add_image_size( 'mr_post_thumbnail', 366, 256,true);
add_image_size( 'mr_single_post_featured_image', 878, 478,true);

//Global variables
$header_type=get_theme_mod('merryrestaurant_header_type','header-1');

//Feed support
add_theme_support( 'automatic-feed-links' );

//Excerpt Length
function merryrestaurant_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'merryrestaurant_excerpt_length');

//Comments Template Function
function merrycode_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="pingback">
                    <p><?php _e('Pingback:', 'merryrestaurant'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'merryrestaurant'), ' '); ?></p>
                </li>
                <?php
                break;
            default :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>">

                        <div class="comment-wrap clearfix">

                            <a class="avatar"
                               href="<?php echo comment_author_url(); ?>"><?php echo get_avatar($comment, 80); ?></a>

                            <div class="comment-detail-wrap">
                                <div class="comment-meta">
                                    <?php comment_reply_link(array_merge(array('before' => ''), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                    <h5 class="author"><cite class="fn"><?php printf(__('%s', 'merryrestaurant'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></cite>
                                    </h5>
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php printf(__('%1$s', 'merryrestaurant'), get_comment_date()); ?>
                                    </time>
                                </div>

                                <div class="comment-body entry-content">
                                    <?php comment_text(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- end of comment -->
                <?php
                break;
        endswitch;
    }
//Resizing Customizer Preview
function merryresturant_customizer_preview_size()
{

	?>
	<style>
	.wp-full-overlay.expanded {
	    margin-left: 280px;
	}
	#customize-controls {
	    width: 280px;
	}
	.expanded .wp-full-overlay-footer {
	    width: 280px !important;
	}
	</style>
	<?php
}

add_action ('customize_controls_print_styles', 'merryresturant_customizer_preview_size');

//Registering Sidebars
register_sidebar( array( 

	'name' => __('Sidebar','merryrestaurant'),
	'id'            => 'sidebar-1',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n", 

	) );
register_sidebar( array( 

	'name' => __('Page','merryrestaurant'),
	'id'            => 'page-sidebar-1',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n", 

	) );

register_sidebars( 1, array( 

	'name' => __('Blog','merryrestaurant'),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => "</h3>\n", 

	) );

register_sidebars( 3, array( 

	'name' => __('Footer %d','merryrestaurant'),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n", 

	) );


//For Loading Theme Styles
if ( ! function_exists( 'merrycode_enqueue_theme_styles' ) ) {
	
	function merrycode_enqueue_theme_styles() {
		if ( ! is_admin() ) {

			$protocol = is_ssl() ? 'https' : 'http';

			//Google Fonts
			//Heading Fonts
			$heading_font=get_theme_mod('merryrestaurant_headings_font_family', "'Raleway', sans-serif"); 
			$menu_font=get_theme_mod('merryrestaurant_menu_font_family', "'Pacifico', handwriting");
			$content_font=get_theme_mod('merryrestaurant_content_font_family', "'Raleway', sans-serif"); 
			wp_enqueue_style('google-font-headings',"$protocol://fonts.googleapis.com/css?family=".substr($heading_font,1,strpos($heading_font, "'",1)-1));
			wp_enqueue_style('google-font-menu',"$protocol://fonts.googleapis.com/css?family=".substr($menu_font,1,strpos($menu_font, "'",1)-1));
			wp_enqueue_style('google-font-content',"$protocol://fonts.googleapis.com/css?family=".substr($content_font,1,strpos($content_font, "'",1)-1));

			//Default CSS
			wp_enqueue_style( 'core', get_template_directory_uri().'/style.css'); 
			
			//Bootstrap Styles
			wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/inc/bootstrap/css/bootstrap.min.css'); 

			//Flexslider
			wp_enqueue_style( 'flexslider', get_template_directory_uri().'/inc/flexslider/flexslider.css');

			//Superfish
			wp_enqueue_style( 'superfish', get_template_directory_uri().'/inc/superfish/superfish.css');			

			//Fontawesome
			wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/inc/fontawesome/font-awesome.min.css',array(),"4.6.3");

			//Mean Menu
			wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/inc/meanmenu/meanmenu.css');			

		}

	}
	add_action( 'wp_enqueue_scripts', 'merrycode_enqueue_theme_styles' );
}


//For Loading Theme Scripts
if ( ! function_exists( 'merrycode_enqueue_theme_scripts' ) ) {
	
	function merrycode_enqueue_theme_scripts() {
		if ( ! is_admin() ) {

			$protocol = is_ssl() ? 'https' : 'http';

			//jQuery
			wp_enqueue_script('jquery');

			//Bootstrap
			wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/inc/bootstrap/js/bootstrap.min.js'); 

			//Flexslider
			wp_enqueue_script( 'flexslider-js', get_template_directory_uri().'/inc/flexslider/jquery.flexslider.js'); 

			//Superfish
			wp_enqueue_script( 'superfish-js', get_template_directory_uri().'/inc/superfish/superfish.js'); 
			wp_enqueue_script( 'hoverintent-js', get_template_directory_uri().'/inc/superfish/hoverIntent.js');

			//Mean menu
			wp_enqueue_script( 'meanmenu-js', get_template_directory_uri().'/inc/meanmenu/jquery.meanmenu.js'); 

			//MerryCafe scripts
			wp_enqueue_script( 'merrycafe-js', get_template_directory_uri().'/inc/merrycode/merrycafe_scripts.js');  
			


		}
	}
	add_action( 'wp_enqueue_scripts', 'merrycode_enqueue_theme_scripts' );
}
//Page Featured Image Metabox rename to Page Title Bar Image
add_action('do_meta_boxes', 'merrycode_replace_featured_image_box');
function merrycode_replace_featured_image_box()
{
    remove_meta_box( 'postimagediv', 'page', 'side' );
    add_meta_box('postimagediv', __('Page Title Featured Image'), 'post_thumbnail_meta_box', 'page', 'side', 'low');
}  

//Price Tag Metaboxes
function merrycode_menu_items_register_meta_boxes() {
    add_meta_box( 'price-tag-metabox', __( 'Price Tag', 'merryrestaurant' ), 'merrycode_menu_items_metaboxes_display_callback', 'menu-items' );
  
}
add_action( 'add_meta_boxes', 'merrycode_menu_items_register_meta_boxes' );

function merrycode_menu_items_metaboxes_display_callback( $post ) {
 global $post;
	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="menu_item_noncename" id="menu_item_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the location data if its already been entered
	$price_tag = get_post_meta($post->ID, '_price_tag', true);
	
	// Echo out the field
	echo '<input type="text" name="_price_tag" value="' . $price_tag  . '" />';
}
 

function merrycode_menu_item_save_meta_box( $post_id, $post ) {

	if ( isset($_POST['menu_item_noncename']) && !wp_verify_nonce( $_POST['menu_item_noncename'], plugin_basename(__FILE__) )) {
	return $post_id;
	}
	if ( !current_user_can( 'edit_post', $post->ID ))
	{
		return $post_id;

	}

	if(isset($_POST['_price_tag']))
	{
		$menu_items_meta['_price_tag'] = $_POST['_price_tag'];
		
		foreach ($menu_items_meta as $key => $value) {
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
			if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
			} else { // If the custom field doesn't have a value
				add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
		}
	}

    
}
add_action( 'save_post', 'merrycode_menu_item_save_meta_box',1,2 );

//Register a menu
function merrycode_register_main_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'merrycode_register_main_menu' );

//Food Menu Slider Post Type
function merrycode_menu_items_post_type()
{
	$labels=array(
		'name'					=>	_x('Menu Items', 'Post Type General Name', 'merryrestaurant'),
		'singular name'			=>	_x('Menu Item', 'Post Type Singular Name' , 'merryrestaurant'),
		'menu_name'				=>	__('Menu Items', 'merryrestaurant'),
		'all_items'				=>	__('All Menu Items', 'merryrestaurant'),
		'view_item'				=> 	__('View Menu Item', 'merryrestaurant'),
		'add_new_item'			=>	__('Add New Menu Item', 'merryrestaurant'),
		'add_new'				=>	__('Add New', 'merryrestaurant'),
		'edit_item'				=>	__('Edit Menu Item', 'merryrestaurant'),
		'update_item'			=> 	__('Update Menu Item', 'merryrestaurant'),
		'search_item'			=>	__('Search Menu Item', 'merryrestaurant'),
		'not_found'				=>	__('Not Found' , 'merryrestaurant'),
		'not_found_in_trash'	=>	__('Not Found In Trash', 'merryrestaurant'),
		'featured_image'		=>	__('Menu Image', 'merryrestaurant'),
		'set_featured_image'	=>	__('Set menu image', 'merryrestaurant')


		);

	$args=array(

		'label'					=>	__('menu item', 'merryrestaurant'),
		'description'			=>	__('Items for food menu', 'merryrestaurant'),
		'labels'				=>	$labels,
		'supports'				=>	array('title', 'editor','thumbnail'),
		'hierarchical'			=>	false,
		'public'				=> 	false,
		'show_ui'				=>	true,
		'show_in_menu'			=>	true,
		'show_in_nav_menus'		=> 	true,
		'show_in_admin_bar'		=>	true,
		'menu_position'			=>	7,
		'can_export'			=>	true,
		'has_archive'			=>	false,
		'exclude_from_search'	=>	true,
		'publicly_queryable'	=>	false,
		'menu_icon'				=>	'dashicons-carrot',
		



		);

	register_post_type( 'menu-items', $args );

}
add_action( 'init', 'merrycode_menu_items_post_type', 0 );

//Create catagory taxononomy for menu items

function merrycode_create_menu_category_taxonomy()
{
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Menu Categories', 'taxonomy general name', 'merryrestaurant' ),
		'singular_name'              => _x( 'Menu Category', 'taxonomy singular name', 'merryrestaurant' ),
		'search_items'               => __( 'Search Menu Categories' ),
		'popular_items'              => __( 'Popular Menu Categories' ),
		'all_items'                  => __( 'All Menu Categories' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Menu Category' ),
		'update_item'                => __( 'Update Menu Category' ),
		'add_new_item'               => __( 'Add New Menu Category' ),
		'new_item_name'              => __( 'New Menu Category' ),
		'separate_items_with_commas' => __( 'Separate menu categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove writers' ),
		'choose_from_most_used'      => __( 'Choose from the most used menu categories' ),
		'not_found'                  => __( 'No menu categories found.' ),
		'menu_name'                  => __( 'Menu Categories' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'menu-categories' ),
	);

	register_taxonomy( 'menu_categories', 'menu-items', $args );
}
add_action( 'init', 'merrycode_create_menu_category_taxonomy');

//Home Page Slider Post Type
function merrycode_homepage_slider_post_type()
{
	$labels=array(
		'name'					=>	_x('Slides', 'Post Type General Name', 'merryrestaurant'),
		'singular name'			=>	_x('Slide', 'Post Type Singular Name' , 'merryrestaurant'),
		'menu_name'				=>	__('Home Slides', 'merryrestaurant'),
		'all_items'				=>	__('All Slides', 'merryrestaurant'),
		'view_item'				=> 	__('View Slide', 'merryrestaurant'),
		'add_new_item'			=>	__('Add New Slide', 'merryrestaurant'),
		'add_new'				=>	__('Add New', 'merryrestaurant'),
		'edit_item'				=>	__('Edit Slide', 'merryrestaurant'),
		'update_item'			=> 	__('Update Slide', 'merryrestaurant'),
		'search_item'			=>	__('Search Slide', 'merryrestaurant'),
		'not_found'				=>	__('Not Found' , 'merryrestaurant'),
		'not_found_in_trash'	=>	__('Not Found In Trash', 'merryrestaurant'),
		'featured_image'		=>	__('Slide Image', 'merryrestaurant'),
		'set_featured_image'	=>	__('Set slide image', 'merryrestaurant')


		);

	$args=array(

		'label'					=>	__('slides', 'merryrestaurant'),
		'description'			=>	__('Slides For Homepage Slider', 'merryrestaurant'),
		'labels'				=>	$labels,
		'supports'				=>	array('title', 'editor','thumbnail'),
		'hierarchical'			=>	false,
		'public'				=> 	false,
		'show_ui'				=>	true,
		'show_in_menu'			=>	true,
		'show_in_nav_menus'		=> 	true,
		'show_in_admin_bar'		=>	true,
		'menu_position'			=>	5,
		'can_export'			=>	true,
		'has_archive'			=>	false,
		'exclude_from_search'	=>	true,
		'publicly_queryable'	=>	false,
		'menu_icon'				=>	'dashicons-images-alt2'


		);

	register_post_type( 'slides', $args );

}
add_action( 'init', 'merrycode_homepage_slider_post_type', 0 );

//Showing featured images in columns
add_filter('manage_slides_posts_columns', 'merrycode_slider_columns');
add_action('manage_slides_posts_custom_column', 'merryrest_columns_content', 10, 2);  

function merrycode_slider_columns($defaults) {  
    $defaults['featured_image'] = 'Slide Image';  
    return $defaults;  
}

function merryrest_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'mr_featured_image_dashboard_preview');
        return $post_thumbnail_img[0];
    }
}
function merryrest_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = merryrest_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}



//Cutomizer Objects
function merryrestaurant_customize_register( $wp_customize ) {

	//Defaults Section
	$wp_customize->add_section( 'merryrestaurant_defaults_section' , array(
	    'title'       => __( 'Defaults', 'merryrestaurant' ),
	    'description' => 'Default Options',
	    'priority'    => 30,
	) );

	


	//Default Primary Color
	$wp_customize->add_setting('merryrestaurant_default_primary_color', array(
        'default'        => '#bba225',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_default_primary_color_control',
			array(
				'label'		=>	__('Primary Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_defaults_section',
				'settings'	=>	'merryrestaurant_default_primary_color',
				)
			)
		
		);
     //Default Secondary Color
	$wp_customize->add_setting('merryrestaurant_default_secondary_color', array(
        'default'        => '#076eb0',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_default_secondary_color_control',
			array(
				'label'		=>	__('Secondary Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_defaults_section',
				'settings'	=>	'merryrestaurant_default_secondary_color',
				)
			)
		
		);

    //Default Page Title Image
    $wp_customize->add_setting( 'merryrestaurant_default_page_title_image' );

  	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_default_page_title_image', array(
    'label'    => __( 'Default Page Title Image', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_defaults_section',
    'settings' => 'merryrestaurant_default_page_title_image',
    'width'			=>	'1336',
	'height'		=>	'207'
	) ) );

	//Posts Section
	$wp_customize->add_section( 'merryrestaurant_posts_section' , array(
	    'title'       => __( 'Posts', 'merryrestaurant' ),
	    'description' => 'Posts\' Options',
	    'priority'    => 12,
	) );

	//Posts Page Title Image
    $wp_customize->add_setting( 'merryrestaurant_posts_page_title_image' );

  	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_posts_page_title_image_control', array(
    'label'    => __( 'Post page title image', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_posts_section',
    'settings' => 'merryrestaurant_posts_page_title_image',
    'width'			=>	'1336',
	'height'		=>	'207'
	) ) );

	//Single Blog Post Page Title
	$wp_customize->add_setting('merryrestaurant_blog_post_page_title_text', array(

			'default' => 'Blog'
		));

	$wp_customize->add_control('merryrestaurant_blog_post_page_title_text_control',
			array(
				'label'		=>	__('Single blog post page title text', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_blog_post_page_title_text',
				'type'		=> 'text',
			));
	//Posts Title Color
	$wp_customize->add_setting('merryrestaurant_posts_title_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_title_color_control',
			array(
				'label'		=>	__('Post title color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_title_color',
				)
			)
		
		);

    //Meta Text Color
	$wp_customize->add_setting('merryrestaurant_posts_meta_text_color', array(
        'default'        => '#777',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_meta_text_color_control',
			array(
				'label'		=>	__('Post meta text color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_meta_text_color',
				)
			)
		
		);

    //Meta Link Color
	$wp_customize->add_setting('merryrestaurant_posts_meta_link_color', array(
        'default'        => '#777',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_meta_link_color_control',
			array(
				'label'		=>	__('Post meta link color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_meta_link_color',
				)
			)
		
		);

    //Meta Link Hover Color
	$wp_customize->add_setting('merryrestaurant_posts_meta_link_hover_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_meta_link_hover_color_control',
			array(
				'label'		=>	__('Post meta link hover color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_meta_link_hover_color',
				)
			)
		
		);

    //Blog Content Text Color
	$wp_customize->add_setting('merryrestaurant_posts_content_text_color', array(
        'default'        => '#333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_content_text_color_control',
			array(
				'label'		=>	__('Blog content text color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_content_text_color',
				)
			)
		
		);
	
	//Pages Section
	$wp_customize->add_section( 'merryrestaurant_pages_section' , array(
	    'title'       => __( 'Pages', 'merryrestaurant' ),
	    'description' => 'Pages\' Options',
	    'priority'    => 13,
	) );

	//Default Page Title Image
    $wp_customize->add_setting( 'merryrestaurant_pages_page_title_image' );

  	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_pages_page_title_image_control', array(
    'label'    => __( 'Default page title image', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_pages_section',
    'settings' => 'merryrestaurant_pages_page_title_image',
    'width'			=>	'1336',
	'height'		=>	'207'
	) ) );

	//Page Title Color
	$wp_customize->add_setting('merryrestaurant_page_title_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_page_title_color_control',
			array(
				'label'		=>	__('Page title color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_pages_section',
				'settings'	=>	'merryrestaurant_page_title_color',
				)
			)
		
		);

    //Page Content Text Color
	$wp_customize->add_setting('merryrestaurant_page_content_text_color', array(
        'default'        => '#333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_page_content_text_color_control',
			array(
				'label'		=>	__('Page content text color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_pages_section',
				'settings'	=>	'merryrestaurant_page_content_text_color',
				)
			)
		
		);
   

	//Blog Page Read More Button Color
	$wp_customize->add_setting('merryrestaurant_posts_read_more_button_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_posts_read_more_button_color_control',
			array(
				'label'		=>	__('Blog \'Read More\' button color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_posts_section',
				'settings'	=>	'merryrestaurant_posts_read_more_button_color',
				)
			)
		
		); 

    //Contact Section
	$wp_customize->add_section( 'merryrestaurant_contact_section' , array(
	    'title'       => __( 'Contact', 'merryrestaurant' ),
	    'description' => 'Contact form options',
	    'priority'    => 14,
	) );

	//Contact Form 7 shortcode
	$wp_customize->add_setting('merryrestaurant_contact_forms_7_shortcode', array(

			'default' => ''
		));

	$wp_customize->add_control('merryrestaurant_contact_forms_7_shortcode_control',
			array(
				'label'		=>	__('Contact Form 7 Shortcode', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_contact_section',
				'settings'	=>	'merryrestaurant_contact_forms_7_shortcode',
				'type'		=> 'text',
				)
			);
	
	//Food Menu Section
	$wp_customize->add_section( 'merryrestaurant_food_menu_section' , array(
	    'title'       => __( 'Food Menu', 'merryrestaurant' ),
	    'description' => 'Food Menu Options',
	    'priority'    => 7,
	) );

	$wp_customize->add_setting('merryrestaurant_food_menu_category_title_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_food_menu_category_title_color_control',
			array(
				'label'		=>	__('Menu category title color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_food_menu_section',
				'settings'	=>	'merryrestaurant_food_menu_category_title_color',
				)
			)
		
		); 
     $wp_customize->add_setting('merryrestaurant_food_menu_item_title_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_food_menu_item_title_color_control',
			array(
				'label'		=>	__('Menu item title color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_food_menu_section',
				'settings'	=>	'merryrestaurant_food_menu_item_title_color',
				)
			)
		
		); 

    $wp_customize->add_setting('merryrestaurant_food_menu_item_description_color', array(
        'default'        => '#333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_food_menu_item_description_control',
			array(
				'label'		=>	__('Menu item description color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_food_menu_section',
				'settings'	=>	'merryrestaurant_food_menu_item_description_color',
				)
			)
		
		); 


  
  	//Header Panel
  	$wp_customize->add_panel( 'merryrestaurant_panel_header', array(
	 'priority'       => 5,
	 'title'          => __('Header', 'merryrestaurant'),
	 'description'    => __('Header Options', 'merryrestaurant'),
	) );

	//Home Panel
  	$wp_customize->add_panel( 'merryrestaurant_panel_home', array(
	 'priority'       => 6,
	 'title'          => __('Home', 'merryrestaurant'),
	 'description'    => __('Hope Options', 'merryrestaurant'),
	) );

	//Footer Panel
  	$wp_customize->add_panel( 'merryrestaurant_panel_footer', array(
	 'priority'       => 8,
	 'title'          => __('Footer', 'merryrestaurant'),
	 'description'    => __('Footer Options', 'merryrestaurant'),
	) );

	//Top Header Section
	$wp_customize->add_section( 'merryrestaurant_top_header_section' , array(
	    'title'       => __( 'Top Header', 'merryrestaurant' ),
	    'description' => 'Top Header Options',
	    'priority'    => 11,
	    'panel'			=> 'merryrestaurant_panel_header'
	) );


	//Header Section
	$wp_customize->add_section( 'merryrestaurant_header_type_section' , array(
	    'title'       => __( 'Primary Header', 'merryrestaurant' ),
	    'description' => 'Primary header options',
	    'priority'    => 11,
	    'panel'			=> 'merryrestaurant_panel_header'
	) );
	//Footer Widgets Section
	$wp_customize->add_section( 'merryrestaurant_footer_widget_section' , array(
	    'title'       => __( 'Footer Widgets Section', 'merryrestaurant' ),
	    'description' => 'Footer Widgets Options',
	    'priority'    => 11,
	    'panel'			=> 'merryrestaurant_panel_footer'
	) );
	//Footer Lower Section
	$wp_customize->add_section( 'merryrestaurant_footer_lower_section' , array(
	    'title'       => __( 'Footer Lower Section', 'merryrestaurant' ),
	    'description' => 'Footer Lower Section Options',
	    'priority'    => 11,
	    'panel'			=> 'merryrestaurant_panel_footer'
	) );

	//Footer Lower Section Background
	$wp_customize->add_setting('merryrestaurant_footer_lower_background_color', array(
        'default'        => '#f1f1f1',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_footer_lower_background_color_control',
			array(
				'label'		=>	__('Footer Lower Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_lower_section',
				'settings'	=>	'merryrestaurant_footer_lower_background_color',
				)
			)
		
		);

    //Footer Lower Section Text Color
	$wp_customize->add_setting('merryrestaurant_footer_lower_text_color', array(
        'default'        => '#737373',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_footer_lower_text_color_control',
			array(
				'label'		=>	__('Footer Lower Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_lower_section',
				'settings'	=>	'merryrestaurant_footer_lower_text_color',
				)
			)
		
		);
     //Footer Lower Text
	$wp_customize->add_setting('merryrestaurant_footer_lower_text', array(

			'default' => 'Copyrights '.date("Y").' MerryCafe'
		));

	$wp_customize->add_control('merryrestaurant_lower_text_control',
			array(
				'label'		=>	__('Footer Lower Text', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_lower_section',
				'settings'	=>	'merryrestaurant_footer_lower_text',
				'type'		=> 'text',
				)
			);

	//Footer Widgets Background
	$wp_customize->add_setting('merryrestaurant_footer_widgets_background_color', array(
        'default'        => '#e8e8e8',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_footer_widgets_background_color_control',
			array(
				'label'		=>	__('Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_widget_section',
				'settings'	=>	'merryrestaurant_footer_widgets_background_color',
				)
			)
		
		);

    //Footer Widgets Heading Color
    $wp_customize->add_setting('merryrestaurant_footer_widgets_headings_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_footer_widgets_headings_color_control',
			array(
				'label'		=>	__('Footer Widgets Headings Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_widget_section',
				'settings'	=>	'merryrestaurant_footer_widgets_headings_color',
				)
			)
		
		);
    //Footer Widgets Text Color
    $wp_customize->add_setting('merryrestaurant_footer_widgets_text_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_footer_widgets_text_color_control',
			array(
				'label'		=>	__('Footer Widgets Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_footer_widget_section',
				'settings'	=>	'merryrestaurant_footer_widgets_text_color',
				)
			)
		
		);

	//Footer Lower Section
	$wp_customize->add_section( 'merryrestaurant_footer_lower_section' , array(
	    'title'       => __( 'Footer Lower Section', 'merryrestaurant' ),
	    'description' => 'Footer Lower Sections',
	    'priority'    => 11,
	    'panel'			=> 'merryrestaurant_panel_footer'
	) );


	//Choose Header Type
	$wp_customize->add_setting('merryrestaurant_header_type', array(
        'default'        => 'header-1',
    ));
    $wp_customize->add_control('merryrestaurant_header_type_control', array(
        'label'      => __('Choose Header Type', 'merryrestaurant'),
        'section'    => 'merryrestaurant_header_type_section',
        'settings'   => 'merryrestaurant_header_type',
        'type'       => 'radio',
        'choices'    => array(
            'header-1' => 'Translucent with logo on left',
            'header-2' => 'Simple with logo on left',
            'header-3' => 'Simple with centered logo on top',
            'header-4' => 'Left aligned menu without logo',
            'header-5' => 'Centrally aligned menu without logo',
        ),
    ));
    //Primary Header background color
    $wp_customize->add_setting('merryrestaurant_header_background_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_header_background_color_control',
			array(
				'label'		=>	__('Header background color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_header_type_section',
				'settings'	=>	'merryrestaurant_header_background_color',
				)
			)
		
		);
	//Top Header Show/Hide
	$wp_customize->add_setting('merryrestaurant_top_header_show_hide_toggle',
		array(

			'default'	=>	'true',
			'capability'        => 'edit_theme_options',
			'panel'			=> 'merryrestaurant_panel_header'

			)
		
		);

	$wp_customize->add_control('merryrestaurant_show_top_header', array(
        'settings' => 'merryrestaurant_top_header_show_hide_toggle',
        'label'    => __('Show Top Header', 'merryrestaurant'),
        'section'	=>	'merryrestaurant_top_header_section',
        'type'     => 'checkbox',
    ));

    //Top Header Background Color
	$wp_customize->add_setting('merryrestaurant_top_header_background_color_setting',
		array(

			'default'	=>	PRIMARY_COLOR,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_top_header_background_color',
			array(
				'label'		=>	__('Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_background_color_setting',
				)
			)
		
		);

	//Top Header Text
	$wp_customize->add_setting('merryrestaurant_top_header_text', array(

			'default' => 'Open Daily: 7:30 AM to 11:00 PM'
		));

	$wp_customize->add_control('merryrestaurant_top_header_text_control',
			array(
				'label'		=>	__('Top Header Text', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_text',
				'type'		=> 'text',
				)
			);

	//Top Header Text Color
	$wp_customize->add_setting('merryrestaurant_top_header_text_color',
		array(

			'default'	=>	'#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_top_header_text_color_control',
			array(
				'label'		=>	__('Top Header Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_text_color',
				)
			)
		
		);

	//Top Header Facebook Icon URL

	$wp_customize->add_setting('merryrestaurant_top_header_facebook_icon_url');

	$wp_customize->add_control('merryrestaurant_top_header_facebook_icon_url_control',
			array(
				'label'		=>	__('Top Header Facebook Link', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_facebook_icon_url',
				'type'		=> 'text',
				)
	);
	//Top Header Twitter Icon URL

	$wp_customize->add_setting('merryrestaurant_top_header_twitter_icon_url');

	$wp_customize->add_control('merryrestaurant_top_header_twitter_icon_url_control',
			array(
				'label'		=>	__('Top Header Twitter Link', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_twitter_icon_url',
				'type'		=> 'text',
				)
	);
	//Top Header Instagram Icon URL
	$wp_customize->add_setting('merryrestaurant_top_header_instagram_icon_url');

	$wp_customize->add_control('merryrestaurant_top_header_instagram_icon_url_control',
			array(
				'label'		=>	__('Top Header Instagram Link', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_instagram_icon_url',
				'type'		=> 'text',
				)
	);

	//Top Header Icon Color
	$wp_customize->add_setting('merryrestaurant_top_header_icon_color',
		array(

			'default'	=>	'#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_top_header_icon_color_control',
			array(
				'label'		=>	__('Top Header Icon Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_top_header_section',
				'settings'	=>	'merryrestaurant_top_header_icon_color',
				)
			)
		
		);

	//Menu Section
	$wp_customize->add_section( 'merryrestaurant_menu_section' , array(
	    'title'       => __( 'Menu', 'merryrestaurant' ),
	    'priority'    => 21,
	    'description' => 'Menu Styling Options',
	    'panel'			=> 'merryrestaurant_panel_header'
	) );




	//Menu Item Color
	$wp_customize->add_setting('merryrestaurant_menu_section_item_color_setting',
		array(

			'default'	=>	'#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_section_item_color_control',
			array(
				'label'		=>	__('Item Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_section_item_color_setting',
				)
			)
		
		);
	//Menu Item Hover Color
	$wp_customize->add_setting('merryrestaurant_menu_section_item_hover_color_setting',
		array(

			'default'	=>	'#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);

	 
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_section_item_hover_color_control',
			array(
				'label'		=>	__('Highlighted Item Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_section_item_hover_color_setting',
				)
			)
		
		);
	//Menu Item Hover Background Color
	$wp_customize->add_setting('merryrestaurant_menu_section_item_hover_background_color_setting',
		array(

			'default'	=>	'#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);

	 
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_section_item_hover_background_color_control',
			array(
				'label'		=>	__('Highlighted Item Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_section_item_hover_background_color_setting',
				)
			)
		
		);

	//Menu Item Font Size
	$wp_customize->add_setting('merryrestaurant_menu_section_item_font_size_setting',
		array(
			'default'	=>	'14',
			)
		
		);

	 
	$wp_customize->add_control(
		'merryrestaurant_menu_section_item_font_size_control',
		array(

			'label'		=>	__('Desktop Menu Font Size (in px)', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_menu_section',
			'settings'	=>	'merryrestaurant_menu_section_item_font_size_setting',
			'type'		=>	'text'


			)
		);

	//Menu background color
	$wp_customize->add_setting('merryrestaurant_menu_background_color',
		array(

			'default'	=>	'#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',1
			

			)
		
		);
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_background_color_control',
			array(
				'label'		=>	__('Menu background color (for header with logo in center', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_background_color',
				)
			)
		
		);

	//Mobie Menu Icon Color
	$wp_customize->add_setting('merryrestaurant_menu_section_mobile_menu_icon_color_setting',
		array(

			'default'	=>	'#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',1
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_section_mobile_menu_icon_color_control',
			array(
				'label'		=>	__('Mobile Menu Icon Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_section_mobile_menu_icon_color_setting',
				)
			)
		
		);

	//Mobile Mobie Background Color
	$wp_customize->add_setting('merryrestaurant_menu_section_mobile_menu_background_color',
		array(

			'default'	=>	'#0c1923',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',1
			

			)
		
		);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_menu_section_mobile_menu_background_color',
			array(
				'label'		=>	__('Mobile menu background color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_menu_section',
				'settings'	=>	'merryrestaurant_menu_section_mobile_menu_background_color',
				)
			)
		
		);

  	//Typography Section
	$wp_customize->add_section( 'merryrestaurant_fonts_section' , array(
	    'title'       => __( 'Typography', 'merryrestaurant' ),
	    'priority'    => 20,
	    'description' => 'Choose from Google Fonts',
	    //'panel'			=> 'merryrestaurant_panel_typography'
	) );

	$wp_customize->add_setting( 'merryrestaurant_headings_font_family',

		array(

			'default'	=>"'Pacifico', handwriting"

			)

	 );
	$wp_customize->add_setting( 'merryrestaurant_menu_font_family',

		array(

			'default'	=>"'Raleway', sans-serif"

			)

	 );
	$wp_customize->add_setting( 'merryrestaurant_content_font_family',

		array(

			'default'	=>"'Raleway', sans-serif"

			)

	 );
	$wp_customize->add_control( 'merryrestaurant_menu_font_family_control', array(
        'settings' => 'merryrestaurant_menu_font_family',
        'label'   => 'Menu Font:',
        'section' => 'merryrestaurant_fonts_section',
        'type'    => 'select',
        'choices'    => merrycode_get_google_fonts_list_array(),
    ));
	$wp_customize->add_control( 'merryrestaurant_headings_font_family_control', array(
        'settings' => 'merryrestaurant_headings_font_family',
        'label'   => 'Headings Font:',
        'section' => 'merryrestaurant_fonts_section',
        'type'    => 'select',
        'choices'    => merrycode_get_google_fonts_list_array(),
    ));
    $wp_customize->add_control( 'merryrestaurant_content_font_family_control', array(
        'settings' => 'merryrestaurant_content_font_family',
        'label'   => 'Content Font:',
        'section' => 'merryrestaurant_fonts_section',
        'type'    => 'select',
        'choices'    => merrycode_get_google_fonts_list_array(),
    ));

  	//Logo Section
	$wp_customize->add_section( 'merryrestaurant_logo_section' , array(
	    'title'       => __( 'Logo', 'merryrestaurant' ),
	    'priority'    => 10,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	    'panel'			=> 'merryrestaurant_panel_header'
	) );

  	$wp_customize->add_setting( 'merryrestaurant_logo' );

  	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'merryrestaurant_logo', array(
    'label'    => __( 'Logo', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_logo_section',
    'settings' => 'merryrestaurant_logo',
	) ) );

	//Retina Logo
	$wp_customize->add_setting( 'merryrestaurant_retina_logo' );

  	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'merryrestaurant_retina_logo', array(
    'label'    => __( 'Retina display logo', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_logo_section',
    'settings' => 'merryrestaurant_retina_logo',
	) ) );
	
	//Retina logo width
	$wp_customize->add_setting('merryrestaurant_retina_logo_width');

	$wp_customize->add_control(
		'merryrestaurant_retina_logo_width_control',
		array(

			'label'		=>	__('Retina logo width in px', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_logo_section',
			'settings'	=>	'merryrestaurant_retina_logo_width',
			'type'		=>	'text'


			)
		);


  	//Favicon Section
	$wp_customize->add_section( 'merryrestaurant_favicon_section' , array(
	    'title'       => __( 'Favicon', 'merryrestaurant' ),
	    'priority'    => 10,
	    'description' => 'Upload a .png file for favicon',
	    'panel'			=> 'merryrestaurant_panel_header'
	) );
	//Favicon
	$wp_customize->add_setting( 'merryrestaurant_favicon' );

  	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'merryrestaurant_favicon', array(
    'label'    => __( 'Favicon', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_favicon_section',
    'settings' => 'merryrestaurant_favicon',
	) ) );

	//Above The Fold Section
  	$wp_customize->add_section('merryrestaurant_above_the_fold_section_section', array(

	  	'title'			=>	__('Above The Fold (Slider area)', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for above the fold area on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);

  	//Choose above the fold content
	$wp_customize->add_setting('merryrestaurant_above_the_fold_content_type', array(
        'default'        => 'home-slider',
    ));
    $wp_customize->add_control('merryrestaurant_above_the_fold_content_type_control', array(
        'label'      => __('Choose content type', 'merryrestaurant'),
        'section'    => 'merryrestaurant_above_the_fold_section_section',
        'settings'   => 'merryrestaurant_above_the_fold_content_type',
        'type'       => 'radio',
        'choices'    => array(
            'home-slider' => 'Home slider',
            'home-image' => 'Image',
            
        ),
    ));

    $wp_customize->add_setting( 'merryrestaurant_above_the_fold_image' );

  	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'merryrestaurant_above_the_fold_image_control', array(
    'label'    => __( 'Above the fold image', 'merryrestaurant' ),
    'section'  => 'merryrestaurant_above_the_fold_section_section',
    'settings' => 'merryrestaurant_above_the_fold_image',
	) ) );

	//Home slider heading background color
	$wp_customize->add_setting('merryrestaurant_home_slider_heading_background_color',
		array(

			'default'	=>	PRIMARY_COLOR,
			'sanitize_callback' => 'sanitize_hex_color',
			)
		
		);

	 
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_home_slider_heading_background_color_control',
			array(
				'label'		=>	__('Home slider heading background color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_above_the_fold_section_section',
				'settings'	=>	'merryrestaurant_home_slider_heading_background_color',
				)
			)
		
		);

	//Home slider description background color
	$wp_customize->add_setting('merryrestaurant_home_slider_description_background_color',
		array(

			'default'	=>	"#e0e0e0",
			'sanitize_callback' => 'sanitize_hex_color',
			)
		
		);

	 
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_home_slider_description_background_color_control',
			array(
				'label'		=>	__('Home slider description background color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_above_the_fold_section_section',
				'settings'	=>	'merryrestaurant_home_slider_description_background_color',
				)
			)
		
		);

  	//Featured Section
  	$wp_customize->add_section('merryrestaurant_featured_section_section', array(

	  	'title'			=>	__('Featured Section', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for featured area on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);

  	$wp_customize->add_setting('merryrestaurant_featured_section_image');
	$wp_customize->add_setting('merryrestaurant_featured_section_title');
	$wp_customize->add_setting('merryrestaurant_featured_section_title_color',
		array(

			'default'	=>	PRIMARY_COLOR,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	//Featured Section Show/Hide
	$wp_customize->add_setting('merryrestaurant_featured_section_show_hide_toggle',
		array(

			'default'	=>	'true',
			'capability'        => 'edit_theme_options',

			)
		
		);

	$wp_customize->add_control('merryrestaurant_featured_section_show_hide_toggle_control', array(
        'settings' => 'merryrestaurant_featured_section_show_hide_toggle',
        'label'    => __('Show featured section', 'merryrestaurant'),
        'section'	=>	'merryrestaurant_featured_section_section',
        'type'     => 'checkbox',
    ));

	$wp_customize->add_setting('merryrestaurant_featured_section_sub_title');
	$wp_customize->add_setting('merryrestaurant_featured_section_description');
	$wp_customize->add_setting('merryrestaurant_featured_section_price_tag');


	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_featured_section_image', 
				array(
				'label'			=>	__('Featured Image (Required)', 'merryrestaurant'),
				'section'		=>	'merryrestaurant_featured_section_section',
				'settings'		=>	'merryrestaurant_featured_section_image',
				'width'			=>	'458',
				'height'		=>	'435'

				)
			)
		);

	$wp_customize->add_control(
		'featured_section_title',
		array(

			'label'		=>	__('Title (Required)', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_featured_section_section',
			'settings'	=>	'merryrestaurant_featured_section_title',
			'type'		=>	'text'


			)
		);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_featured_section_title_color',
			array(
				'label'		=>	__('Title Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_featured_section_section',
				'settings'	=>	'merryrestaurant_featured_section_title_color',
				)
			)
		
		);

	$wp_customize->add_control(
		'featured_section_sub_title',
		array(

			'label'		=>	__('Sub-Title', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_featured_section_section',
			'settings'	=>	'merryrestaurant_featured_section_sub_title',
			'type'		=>	'text'


			)
		);

	$wp_customize->add_setting('merryrestaurant_featured_section_sub_title_color',
		array(

			'default'	=>	SECONDARY_COLOR,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_featured_section_sub_title_color_control',
			array(
				'label'		=>	__('Subtitle Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_featured_section_section',
				'settings'	=>	'merryrestaurant_featured_section_sub_title_color',
				)
			)
		
		);
	$wp_customize->add_setting('merryrestaurant_featured_section_price_tag_color',
		array(

			'default'	=>	SECONDARY_COLOR,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			

			)
		
		);
	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_featured_section_price_tag_color_control',
			array(
				'label'		=>	__('Price Tag Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_featured_section_section',
				'settings'	=>	'merryrestaurant_featured_section_price_tag_color',
				)
			)
		
		);

	$wp_customize->add_control(
		'featured_section_description',
		array(

			'label'		=>	__('Description (Required)', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_featured_section_section',
			'settings'	=>	'merryrestaurant_featured_section_description',
			'type'		=>	'textarea'


			)
		);

	$wp_customize->add_control(
		'featured_section_price',
		array(

			'label'		=>	__('Price Tag', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_featured_section_section',
			'settings'	=>	'merryrestaurant_featured_section_price_tag',
			'type'		=>	'text'


			)
		);
	
	//Recommended Section
  	$wp_customize->add_section('merryrestaurant_recommended_section_section', array(

	  	'title'			=>	__('Recommended Section', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for recommended section on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);

	//Recommended Section Show/Hide
	$wp_customize->add_setting('merryrestaurant_recommended_section_show_hide_toggle',
		array(

			'default'	=>	'true',
			'capability'        => 'edit_theme_options',

			)
		
		);

	$wp_customize->add_control('merryrestaurant_recommended_section_show_hide_toggle_control', array(
        'settings' => 'merryrestaurant_recommended_section_show_hide_toggle',
        'label'    => __('Show recommended section', 'merryrestaurant'),
        'section'	=>	'merryrestaurant_recommended_section_section',
        'type'     => 'checkbox',
    ));

	//Recommended Section Heading Text
    $wp_customize->add_setting('merryrestaurant_recommended_section_heading_text', array('default' => 'Chef\'s Recommended'));
	$wp_customize->add_control('merryrestaurant_recommended_section_heading_text_control',
		array(

			'label'		=>	__('Recommended Section Heading', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_recommended_section_section',
			'settings'	=>	'merryrestaurant_recommended_section_heading_text',
			'type'		=>	'text'


			)
		);	

	//Recommended Section Heading Background Color
	$wp_customize->add_setting('merryrestaurant_recommended_section_heading_text_background_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_recommended_section_heading_text_background_color_control',
			array(
				'label'		=>	__('Recommended Section Heading Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_recommended_section_section',
				'settings'	=>	'merryrestaurant_recommended_section_heading_text_background_color',
				)
			)
		
		);

    //Recommended Section Heading Text Color
	$wp_customize->add_setting('merryrestaurant_recommended_section_heading_text_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_recommended_section_heading_text_color_control',
			array(
				'label'		=>	__('Recommended Section Heading Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_recommended_section_section',
				'settings'	=>	'merryrestaurant_recommended_section_heading_text_color',
				)
			)
		
		);

     //Recommended Item Title Color
	$wp_customize->add_setting('merryrestaurant_recommended_item_title_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_recommended_item_title_color_control',
			array(
				'label'		=>	__('Recommended Item Title Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_recommended_section_section',
				'settings'	=>	'merryrestaurant_recommended_item_title_color',
				)
			)
		
		);
     //Recommended Item Description Color
	$wp_customize->add_setting('merryrestaurant_recommended_item_description_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_recommended_item_description_color_control',
			array(
				'label'		=>	__('Recommended Item Description Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_recommended_section_section',
				'settings'	=>	'merryrestaurant_recommended_item_description_color',
				)
			)
		
		);
    
     //Recommended Item Price Color
	$wp_customize->add_setting('merryrestaurant_recommended_item_price_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_recommended_item_price_color_control',
			array(
				'label'		=>	__('Recommended Item Price Tag Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_recommended_section_section',
				'settings'	=>	'merryrestaurant_recommended_item_price_color',
				)
			)
		
		);

  	//First Column Content
  	$wp_customize->add_setting( 'merryrestaurant_recommended_first_column_menu_item',

		array(

			'default'	=>"Choose"

			)

	 );
	$wp_customize->add_control( 'merryrestaurant_recommended_first_column_menu_item_control', array(
        'settings' => 'merryrestaurant_recommended_first_column_menu_item',
        'label'   => __('First Recommended Item', 'merryrestaurant'),
        'section' => 'merryrestaurant_recommended_section_section',
        'type'    => 'select',
        'choices'    => merrycode_get_menu_items_list_array(),
    ));
    //Second Column Content
  	$wp_customize->add_setting( 'merryrestaurant_recommended_second_column_menu_item',

		array(

			'default'	=>"Choose"

			)

	 );
	$wp_customize->add_control( 'merryrestaurant_recommended_second_column_menu_item_control', array(
        'settings' => 'merryrestaurant_recommended_second_column_menu_item',
        'label'   => __('Second Recommended Item', 'merryrestaurant'),
        'section' => 'merryrestaurant_recommended_section_section',
        'type'    => 'select',
        'choices'    => merrycode_get_menu_items_list_array(),
    ));

    //Third Column Content
  	$wp_customize->add_setting( 'merryrestaurant_recommended_third_column_menu_item',

		array(

			'default'	=>"Choose"

			)

	 );
	$wp_customize->add_control( 'merryrestaurant_recommended_third_column_menu_item_control', array(
        'settings' => 'merryrestaurant_recommended_third_column_menu_item',
        'label'   => __('Third Recommended Item', 'merryrestaurant'),
        'section' => 'merryrestaurant_recommended_section_section',
        'type'    => 'select',
        'choices'    => merrycode_get_menu_items_list_array(),
    ));

  	//Event Section
  	$wp_customize->add_section('merryrestaurant_event_section_section', array(

	  	'title'			=>	__('Event Section', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for event section on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);
	//Event Section Show/Hide
	$wp_customize->add_setting('merryrestaurant_event_section_show_hide_toggle',
		array(

			'default'	=>	'true',
			'capability'        => 'edit_theme_options',

			)
		
		);

	$wp_customize->add_control('merryrestaurant_event_section_show_hide_toggle_control', array(
        'settings' => 'merryrestaurant_event_section_show_hide_toggle',
        'label'    => __('Show event section', 'merryrestaurant'),
        'section'	=>	'merryrestaurant_event_section_section',
        'type'     => 'checkbox',
    ));

	//Event Section Image
	$wp_customize->add_setting('merryrestaurant_event_section_image');
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_event_section_image',
				array(
				'label'			=>	__('Event Background Image', 'merryrestaurant'),
				'section'		=>	'merryrestaurant_event_section_section',
				'settings'		=>	'merryrestaurant_event_section_image',
				'width'			=>	'1170',
				'height'		=>	'371'

				)
			)
		);

	//Event Section Title Text
    $wp_customize->add_setting('merryrestaurant_event_section_title_text', array('default' => ''));
	$wp_customize->add_control('merryrestaurant_event_section_title_text_control',
		array(

			'label'		=>	__('Event Section Title Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_event_section_section',
			'settings'	=>	'merryrestaurant_event_section_title_text',
			'type'		=>	'text'


			)
		);	

	//Event Section Sub-Title Text
    $wp_customize->add_setting('merryrestaurant_event_section_subtitle_text', array('default' => ''));
	$wp_customize->add_control('merryrestaurant_event_section_subtitle_text_control',
		array(

			'label'		=>	__('Event Section Subtitle Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_event_section_section',
			'settings'	=>	'merryrestaurant_event_section_subtitle_text',
			'type'		=>	'text'


			)
		);
	//Event Section Detail Text
    $wp_customize->add_setting('merryrestaurant_event_section_detail_text', array('default' => ''));
	$wp_customize->add_control('merryrestaurant_event_section_detail_text_control',
		array(

			'label'		=>	__('Event Section Detail Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_event_section_section',
			'settings'	=>	'merryrestaurant_event_section_detail_text',
			'type'		=>	'textarea'


			)
		);

	//Event Section Date/Time Text
    $wp_customize->add_setting('merryrestaurant_event_section_datetime_text', array('default' => ''));
	$wp_customize->add_control('merryrestaurant_event_section_datetime_text_control',
		array(

			'label'		=>	__('Event Section Date/Time ', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_event_section_section',
			'settings'	=>	'merryrestaurant_event_section_datetime_text',
			'type'		=>	'text'


			)
		);

	//Event Section URL
    $wp_customize->add_setting('merryrestaurant_event_section_url');
	$wp_customize->add_control('merryrestaurant_event_section_url_control',
		array(

			'label'		=>	__('Event Section Link', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_event_section_section',
			'settings'	=>	'merryrestaurant_event_section_url',
			'type'		=>	'text'


			)
		);		

	//Event Section Title Text Color
	$wp_customize->add_setting('merryrestaurant_event_section_title_text_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_event_section_title_text_color_control',
			array(
				'label'		=>	__('Event Section Title Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_event_section_section',
				'settings'	=>	'merryrestaurant_event_section_title_text_color',
				)
			)
		
		);

	//Event Section Subtitle Text Color
	$wp_customize->add_setting('merryrestaurant_event_section_subtitle_text_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_event_section_subtitle_text_color_control',
			array(
				'label'		=>	__('Event Section Subtitle Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_event_section_section',
				'settings'	=>	'merryrestaurant_event_section_subtitle_text_color',
				)
			)
		
		);
	//Event Section Detail Text Color
	$wp_customize->add_setting('merryrestaurant_event_section_detail_text_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_event_section_detail_text_color_control',
			array(
				'label'		=>	__('Event Section Detail Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_event_section_section',
				'settings'	=>	'merryrestaurant_event_section_detail_text_color',
				)
			)
		
		);


	//Event Section Date/Time Box Color
	$wp_customize->add_setting('merryrestaurant_event_section_datetime_box_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_event_section_datetime_box_color_control',
			array(
				'label'		=>	__('Event Section Date/Time Box Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_event_section_section',
				'settings'	=>	'merryrestaurant_event_section_datetime_box_color',
				)
			)
		
		);							

    //Content Boxes Section
  	$wp_customize->add_section('merryrestaurant_content_boxes_section_section', array(

	  	'title'			=>	__('Content Boxes Section', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for event section on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);
	//Content Boxes Section Show/Hide
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_show_hide_toggle',
		array(

			'default'	=>	'true',
			'capability'        => 'edit_theme_options',

			)
		
		);

	//Home page content section
  	$wp_customize->add_section('merryrestaurant_page_content_section_section', array(

	  	'title'			=>	__('Page content', 'merryrestaurant'),
	  	'priority'		=>	31,
	  	'description'	=>	'Options for page content on the homepage',
	  	'panel'			=> 'merryrestaurant_panel_home'
	  	)
	);
	//Home page content section Show/Hide
	$wp_customize->add_setting('merryrestaurant_page_content_section_section_show_hide_toggle',
		array(

			'default'	=>	'false',
			'capability'        => 'edit_theme_options',

			)
		
		);

	$wp_customize->add_control('merryrestaurant_page_content_section_section_show_hide_toggle_control', array(
        'settings' => 'merryrestaurant_page_content_section_section_show_hide_toggle',
        'label'    => __('Show page content', 'merryrestaurant'),
        'section'	=>	'merryrestaurant_page_content_section_section',
        'type'     => 'checkbox',
    ));

	//Content Box 1 Title
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_title');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_first_content_box_title_control',
		array(

			'label'		=>	__('First Content Box Title', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_title',
			'type'		=>	'text'


			)
		);	

	//Content Box 1 Image
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_image');
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_image_control',
				array(
				'label'			=>	__('First Content Box Image', 'merryrestaurant'),
				'section'		=>	'merryrestaurant_content_boxes_section_section',
				'settings'		=>	'merryrestaurant_content_boxes_section_first_content_box_image',
				'width'			=>	'400',
				'height'		=>	'258'

				)
			)
		);

	//Content Box 1 Description
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_description');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_first_content_box_description_control',
		array(

			'label'		=>	__('First Content Box Description', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_description',
			'type'		=>	'textarea'


			)
		);

	//Content Box 1 Button Text
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_button_text');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_first_content_box_button_text_control',
		array(

			'label'		=>	__('First Content Box Button Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_button_text',
			'type'		=>	'text'


			)
		);
	//Content Box 1 Button URL
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_url');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_first_content_box_url_control',
		array(

			'label'		=>	__('First Content Box Button URL', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_url',
			'type'		=>	'text'


			)
		);					
	//Content Box 1 Heading Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_heading_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_heading_color_control',
			array(
				'label'		=>	__('First Content Box Heading Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_heading_color',
				)
			)
		
		);
    //Content Box 1 Heading Background Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_heading_background_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_heading_background_color_control',
			array(
				'label'		=>	__('First Content Box Heading Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_heading_background_color',
				)
			)
		
		);

    //Content Box 1 Heading Text Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_text_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_text_color_control',
			array(
				'label'		=>	__('First Content Box Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_text_color',
				)
			)
		
		); 
    
    //Content Box 1 Button Text & Border
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_button_text_and_border_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_button_text_and_border_control',
			array(
				'label'		=>	__('First Content Box  Button Text & Border Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_button_text_and_border_color',
				)
			)
		
		);

	//Content Box 1 Button Fill Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_first_content_box_button_fill_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_first_content_box_button_fill_control',
			array(
				'label'		=>	__('First Content Box Button Fill Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_first_content_box_button_fill_color',
				)
			)
		
		);
	//Content Box 2 Title
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_title');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_second_content_box_title_control',
		array(

			'label'		=>	__('Second Content Box Title', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_title',
			'type'		=>	'text'


			)
		);	

	//Content Box 2 Image
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_image');
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_image_control',
				array(
				'label'			=>	__('Second Content Box Image', 'merryrestaurant'),
				'section'		=>	'merryrestaurant_content_boxes_section_section',
				'settings'		=>	'merryrestaurant_content_boxes_section_second_content_box_image',
				'width'			=>	'400',
				'height'		=>	'258'

				)
			)
		);

	//Content Box 2 Description
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_description');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_second_content_box_description_control',
		array(

			'label'		=>	__('Second Content Box Description', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_description',
			'type'		=>	'textarea'


			)
		);

	//Content Box 2 Button Text
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_button_text');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_second_content_box_button_text_control',
		array(

			'label'		=>	__('Second Content Box Button Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_button_text',
			'type'		=>	'text'


			)
		);
	//Content Box 2 Button URL
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_url');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_second_content_box_url_control',
		array(

			'label'		=>	__('Second Content Box Button URL', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_url',
			'type'		=>	'text'


			)
		);					
	//Content Box 2 Heading Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_heading_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_heading_color_control',
			array(
				'label'		=>	__('Second Content Box Heading Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_heading_color',
				)
			)
		
		);
    //Content Box 2 Heading Background Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_heading_background_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_heading_background_color_control',
			array(
				'label'		=>	__('Second Content Box Heading Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_heading_background_color',
				)
			)
		
		);

    //Content Box 2 Heading Text Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_text_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_text_color_control',
			array(
				'label'		=>	__('Second Content Box Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_text_color',
				)
			)
		
		); 
    
    //Content Box 2 Button Text & Border
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_button_text_and_border_color', array(
        'default'        => PRIMARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_button_text_and_border_control',
			array(
				'label'		=>	__('Second Content Box  Button Text & Border Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_button_text_and_border_color',
				)
			)
		
		);

	//Content Box 2 Button Fill Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_second_content_box_button_fill_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_second_content_box_button_fill_control',
			array(
				'label'		=>	__('Second Content Box Button Fill Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_second_content_box_button_fill_color',
				)
			)
		
		);	 		

	//Content Box 3 Title
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_title');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_third_content_box_title_control',
		array(

			'label'		=>	__('Third Content Box Title', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_title',
			'type'		=>	'text'


			)
		);	

	//Content Box 3 Image
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_image');
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_image_control',
				array(
				'label'			=>	__('Third Content Box Image', 'merryrestaurant'),
				'section'		=>	'merryrestaurant_content_boxes_section_section',
				'settings'		=>	'merryrestaurant_content_boxes_section_third_content_box_image',
				'width'			=>	'400',
				'height'		=>	'258'

				)
			)
		);

	//Content Box 3 Description
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_description');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_third_content_box_description_control',
		array(

			'label'		=>	__('Third Content Box Description', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_description',
			'type'		=>	'textarea'


			)
		);

	//Content Box 3 Button Text
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_button_text');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_third_content_box_button_text_control',
		array(

			'label'		=>	__('Third Content Box Button Text', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_button_text',
			'type'		=>	'text'


			)
		);
	//Content Box 3 Button URL
    $wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_url');
	$wp_customize->add_control('merryrestaurant_content_boxes_section_third_content_box_url_control',
		array(

			'label'		=>	__('Third Content Box Button URL', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_content_boxes_section_section',
			'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_url',
			'type'		=>	'text'


			)
		);					
	//Content Box 3 Heading Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_heading_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_heading_color_control',
			array(
				'label'		=>	__('Third Content Box Heading Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_heading_color',
				)
			)
		
		);
    //Content Box 3 Heading Background Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_heading_background_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_heading_background_color_control',
			array(
				'label'		=>	__('Third Content Box Heading Background Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_heading_background_color',
				)
			)
		
		);

    //Content Box 3 Heading Text Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_text_color', array(
        'default'        => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_text_color_control',
			array(
				'label'		=>	__('Third Content Box Text Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_text_color',
				)
			)
		
		); 
    
    //Content Box 3 Button Text & Border
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_control',
			array(
				'label'		=>	__('Third Content Box  Button Text & Border Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_button_text_and_border_color',
				)
			)
		
		);

	//Content Box 3 Button Fill Color
	$wp_customize->add_setting('merryrestaurant_content_boxes_section_third_content_box_button_fill_color', array(
        'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
     $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_content_boxes_section_third_content_box_button_fill_control',
			array(
				'label'		=>	__('Third Content Box Button Fill Color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_content_boxes_section_section',
				'settings'	=>	'merryrestaurant_content_boxes_section_third_content_box_button_fill_color',
				)
			)
		
		); 

    //Form styles
	$wp_customize->add_section( 'merryrestaurant_form_styles_section' , array(
	    'title'       => __( 'Form Styles', 'merryrestaurant' ),
	    'description' => 'Default Options',
	    'priority'    => 30,
	) );

	


	//Form button color
	$wp_customize->add_setting('merryrestaurant_form_buttons_color', array(
        'default'        => SECONDARY_COLOR,
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_form_buttons_color_control',
			array(
				'label'		=>	__('Buttons color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_form_styles_section',
				'settings'	=>	'merryrestaurant_form_buttons_color',
				)
			)
		
		);
    //Input fields border color
	$wp_customize->add_setting('merryrestaurant_form_input_fields_border_color', array(
        'default'        => "e0e0e0",
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'merryrestaurant_form_input_fields_border_color_control',
			array(
				'label'		=>	__('Input fields border color', 'merryrestaurant'),
				'section'	=>	'merryrestaurant_form_styles_section',
				'settings'	=>	'merryrestaurant_form_input_fields_border_color',
				)
			)
		
		);

   	//Custom CSS
	$wp_customize->add_section( 'merryrestaurant_custom_css_section' , array(
	    'title'       => __( 'Custom CSS', 'merryrestaurant' ),
	    'priority'    => 50,
	    'description' => 'Add custom CSS here',
	) );
	//Favicon
	$wp_customize->add_setting( 'merryrestaurant_custom_css' );

  	$wp_customize->add_control(
		'merryrestaurant_custom_css_control',
		array(

			'label'		=>	__('Custom CSS', 'merryrestaurant'),
			'section'	=>	'merryrestaurant_custom_css_section',
			'settings'	=>	'merryrestaurant_custom_css',
			'type'		=>	'textarea'


			)
		);



}
add_action( 'customize_register', 'merryrestaurant_customize_register' );

//Return Menu Template Variation 1 Slides
function merrycode_get_menu_var_1_slides($slides)
{?>
	<div class="menu-images">
		<div class="menu-slider-loading">
	  		<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
	  	</div>
					<ul class="slides">

						<?php
						foreach ($slides as $value) {
							
							echo '<li><img src="'.$value.'" alt="menu item image"/></li>';
						}
						?>
			
				    
				  	</ul>
				</div>
<?php }

//Return Menu Template Variation 1 Slides for menu items
function merrycode_get_menu_var_1_food_items_slides($menu_titles, $menu_prices, $menu_descriptions,$category_name)
{
	?>

	<div class="menu-listing">

					<div class="full-width-heading-transparent"><h1><?php echo $category_name; ?></h1></div>
					<ul class="slides">

	<?php
	$slide_counter=0;

						for($i=0;$i<sizeof($menu_titles);$i++) {
							
							if($slide_counter==0)
							{
								echo "<li>";
							}

							?>

							<div class="menu-food-item">
								<div class="item-name"><h3><?php echo $menu_titles[$i];?></h3>
								</div>
								<div class="item-price"><h3><?php echo $menu_prices[$i];?></h3></div>
								<div class="item-description">
									<?php echo $menu_descriptions[$i];?>
								</div>
							</div>

							<?php

							if($slide_counter == 3 || $i==sizeof($menu_titles))
							{
								$slide_counter = 0;

								echo "</li>";
								continue;
							}

							$slide_counter++;


						}
						?>
						</ul>
					</div>
						<?php

}
function merrycode_get_menu_items_list_array()
{
	$menu_items=array('0' => 'None');

	$loop = new WP_Query( array(
				'post_type' 		=>	'menu-items', 

			)); 


		while ( $loop->have_posts() ) : $loop->the_post();
  			if ( has_post_thumbnail() )
  			{
  				$menu_items[get_the_ID()]=get_the_title();
  			}
	  		
  			
		endwhile;

		return $menu_items;

}
function merrycode_get_google_fonts_list_array()
{
  $fonts_list=array(

	"'ABeeZee', sans-serif" =>  'ABeeZee',
	"'Abel', sans-serif"  =>  'Abel',
	"'Abril Fatface', display"  =>  'Abril Fatface',
	"'Aclonica', sans-serif"  =>  'Aclonica',
	"'Acme', sans-serif"  =>  'Acme',
	"'Actor', sans-serif" =>  'Actor',
	"'Adamina', serif"  =>  'Adamina',
	"'Advent Pro', sans-serif"  =>  'Advent Pro',
	"'Aguafina Script', handwriting"  =>  'Aguafina Script',
	"'Akronim', display"  =>  'Akronim',
	"'Aladin', handwriting" =>  'Aladin',
	"'Aldrich', sans-serif" =>  'Aldrich',
	"'Alef', sans-serif"  =>  'Alef',
	"'Alegreya', serif" =>  'Alegreya',
	"'Alegreya SC', serif"  =>  'Alegreya SC',
	"'Alegreya Sans', sans-serif" =>  'Alegreya Sans',
	"'Alegreya Sans SC', sans-serif"  =>  'Alegreya Sans SC',
	"'Alex Brush', handwriting" =>  'Alex Brush',
	"'Alfa Slab One', display"  =>  'Alfa Slab One',
	"'Alice', serif"  =>  'Alice',
	"'Alike', serif"  =>  'Alike',
	"'Alike Angular', serif"  =>  'Alike Angular',
	"'Allan', display"  =>  'Allan',
	"'Allerta', sans-serif" =>  'Allerta',
	"'Allerta Stencil', sans-serif" =>  'Allerta Stencil',
	"'Allura', handwriting" =>  'Allura',
	"'Almendra', serif" =>  'Almendra',
	"'Almendra Display', display" =>  'Almendra Display',
	"'Almendra SC', serif"  =>  'Almendra SC',
	"'Amarante', display" =>  'Amarante',
	"'Amaranth', sans-serif"  =>  'Amaranth',
	"'Amatic SC', handwriting"  =>  'Amatic SC',
	"'Amethysta', serif"  =>  'Amethysta',
	"'Amiri', serif"  =>  'Amiri',
	"'Amita', handwriting"  =>  'Amita',
	"'Anaheim', sans-serif" =>  'Anaheim',
	"'Andada', serif" =>  'Andada',
	"'Andika', sans-serif"  =>  'Andika',
	"'Angkor', display" =>  'Angkor',
	"'Annie Use Your Telescope', handwriting" =>  'Annie Use Your Telescope',
	"'Anonymous Pro', monospace"  =>  'Anonymous Pro',
	"'Antic', sans-serif" =>  'Antic',
	"'Antic Didone', serif" =>  'Antic Didone',
	"'Antic Slab', serif" =>  'Antic Slab',
	"'Anton', sans-serif" =>  'Anton',
	"'Arapey', serif" =>  'Arapey',
	"'Arbutus', display"  =>  'Arbutus',
	"'Arbutus Slab', serif" =>  'Arbutus Slab',
	"'Architects Daughter', handwriting"  =>  'Architects Daughter',
	"'Archivo Black', sans-serif" =>  'Archivo Black',
	"'Archivo Narrow', sans-serif"  =>  'Archivo Narrow',
	"'Arimo', sans-serif" =>  'Arimo',
	"'Arizonia', handwriting" =>  'Arizonia',
	"'Armata', sans-serif"  =>  'Armata',
	"'Artifika', serif" =>  'Artifika',
	"'Arvo', serif" =>  'Arvo',
	"'Arya', sans-serif"  =>  'Arya',
	"'Asap', sans-serif"  =>  'Asap',
	"'Asar', serif" =>  'Asar',
	"'Asset', display"  =>  'Asset',
	"'Astloch', display"  =>  'Astloch',
	"'Asul', sans-serif"  =>  'Asul',
	"'Atomic Age', display" =>  'Atomic Age',
	"'Aubrey', display" =>  'Aubrey',
	"'Audiowide', display"  =>  'Audiowide',
	"'Autour One', display" =>  'Autour One',
	"'Average', serif"  =>  'Average',
	"'Average Sans', sans-serif"  =>  'Average Sans',
	"'Averia Gruesa Libre', display"  =>  'Averia Gruesa Libre',
	"'Averia Libre', display" =>  'Averia Libre',
	"'Averia Sans Libre', display"  =>  'Averia Sans Libre',
	"'Averia Serif Libre', display" =>  'Averia Serif Libre',
	"'Bad Script', handwriting" =>  'Bad Script',
	"'Balthazar', serif"  =>  'Balthazar',
	"'Bangers', display"  =>  'Bangers',
	"'Basic', sans-serif" =>  'Basic',
	"'Battambang', display" =>  'Battambang',
	"'Baumans', display"  =>  'Baumans',
	"'Bayon', display"  =>  'Bayon',
	"'Belgrano', serif" =>  'Belgrano',
	"'Belleza', sans-serif" =>  'Belleza',
	"'BenchNine', sans-serif" =>  'BenchNine',
	"'Bentham', serif"  =>  'Bentham',
	"'Berkshire Swash', handwriting"  =>  'Berkshire Swash',
	"'Bevan', display"  =>  'Bevan',
	"'Bigelow Rules', display"  =>  'Bigelow Rules',
	"'Bigshot One', display"  =>  'Bigshot One',
	"'Bilbo', handwriting"  =>  'Bilbo',
	"'Bilbo Swash Caps', handwriting" =>  'Bilbo Swash Caps',
	"'Biryani', sans-serif" =>  'Biryani',
	"'Bitter', serif" =>  'Bitter',
	"'Black Ops One', display"  =>  'Black Ops One',
	"'Bokor', display"  =>  'Bokor',
	"'Bonbon', handwriting" =>  'Bonbon',
	"'Boogaloo', display" =>  'Boogaloo',
	"'Bowlby One', display" =>  'Bowlby One',
	"'Bowlby One SC', display"  =>  'Bowlby One SC',
	"'Brawler', serif"  =>  'Brawler',
	"'Bree Serif', serif" =>  'Bree Serif',
	"'Bubblegum Sans', display" =>  'Bubblegum Sans',
	"'Bubbler One', sans-serif" =>  'Bubbler One',
	"'Buda', display" =>  'Buda',
	"'Buenard', serif"  =>  'Buenard',
	"'Butcherman', display" =>  'Butcherman',
	"'Butterfly Kids', handwriting" =>  'Butterfly Kids',
	"'Cabin', sans-serif" =>  'Cabin',
	"'Cabin Condensed', sans-serif" =>  'Cabin Condensed',
	"'Cabin Sketch', display" =>  'Cabin Sketch',
	"'Caesar Dressing', display"  =>  'Caesar Dressing',
	"'Cagliostro', sans-serif"  =>  'Cagliostro',
	"'Calligraffitti', handwriting" =>  'Calligraffitti',
	"'Cambay', sans-serif"  =>  'Cambay',
	"'Cambo', serif"  =>  'Cambo',
	"'Candal', sans-serif"  =>  'Candal',
	"'Cantarell', sans-serif" =>  'Cantarell',
	"'Cantata One', serif"  =>  'Cantata One',
	"'Cantora One', sans-serif" =>  'Cantora One',
	"'Capriola', sans-serif"  =>  'Capriola',
	"'Cardo', serif"  =>  'Cardo',
	"'Carme', sans-serif" =>  'Carme',
	"'Carrois Gothic', sans-serif"  =>  'Carrois Gothic',
	"'Carrois Gothic SC', sans-serif" =>  'Carrois Gothic SC',
	"'Carter One', display" =>  'Carter One',
	"'Catamaran', sans-serif" =>  'Catamaran',
	"'Caudex', serif" =>  'Caudex',
	"'Caveat', handwriting" =>  'Caveat',
	"'Caveat Brush', handwriting" =>  'Caveat Brush',
	"'Cedarville Cursive', handwriting" =>  'Cedarville Cursive',
	"'Ceviche One', display"  =>  'Ceviche One',
	"'Changa One', display" =>  'Changa One',
	"'Chango', display" =>  'Chango',
	"'Chau Philomene One', sans-serif"  =>  'Chau Philomene One',
	"'Chela One', display"  =>  'Chela One',
	"'Chelsea Market', display" =>  'Chelsea Market',
	"'Chenla', display" =>  'Chenla',
	"'Cherry Cream Soda', display"  =>  'Cherry Cream Soda',
	"'Cherry Swash', display" =>  'Cherry Swash',
	"'Chewy', display"  =>  'Chewy',
	"'Chicle', display" =>  'Chicle',
	"'Chivo', sans-serif" =>  'Chivo',
	"'Chonburi', display" =>  'Chonburi',
	"'Cinzel', serif" =>  'Cinzel',
	"'Cinzel Decorative', display"  =>  'Cinzel Decorative',
	"'Clicker Script', handwriting" =>  'Clicker Script',
	"'Coda', display" =>  'Coda',
	"'Coda Caption', sans-serif"  =>  'Coda Caption',
	"'Codystar', display" =>  'Codystar',
	"'Combo', display"  =>  'Combo',
	"'Comfortaa', display"  =>  'Comfortaa',
	"'Coming Soon', handwriting"  =>  'Coming Soon',
	"'Concert One', display"  =>  'Concert One',
	"'Condiment', handwriting"  =>  'Condiment',
	"'Content', display"  =>  'Content',
	"'Contrail One', display" =>  'Contrail One',
	"'Convergence', sans-serif" =>  'Convergence',
	"'Cookie', handwriting" =>  'Cookie',
	"'Copse', serif"  =>  'Copse',
	"'Corben', display" =>  'Corben',
	"'Courgette', handwriting"  =>  'Courgette',
	"'Cousine', monospace"  =>  'Cousine',
	"'Coustard', serif" =>  'Coustard',
	"'Covered By Your Grace', handwriting"  =>  'Covered By Your Grace',
	"'Crafty Girls', handwriting" =>  'Crafty Girls',
	"'Creepster', display"  =>  'Creepster',
	"'Crete Round', serif"  =>  'Crete Round',
	"'Crimson Text', serif" =>  'Crimson Text',
	"'Croissant One', display"  =>  'Croissant One',
	"'Crushed', display"  =>  'Crushed',
	"'Cuprum', sans-serif"  =>  'Cuprum',
	"'Cutive', serif" =>  'Cutive',
	"'Cutive Mono', monospace"  =>  'Cutive Mono',
	"'Damion', handwriting" =>  'Damion',
	"'Dancing Script', handwriting" =>  'Dancing Script',
	"'Dangrek', display"  =>  'Dangrek',
	"'Dawning of a New Day', handwriting" =>  'Dawning of a New Day',
	"'Days One', sans-serif"  =>  'Days One',
	"'Dekko', handwriting"  =>  'Dekko',
	"'Delius', handwriting" =>  'Delius',
	"'Delius Swash Caps', handwriting"  =>  'Delius Swash Caps',
	"'Delius Unicase', handwriting" =>  'Delius Unicase',
	"'Della Respira', serif"  =>  'Della Respira',
	"'Denk One', sans-serif"  =>  'Denk One',
	"'Devonshire', handwriting" =>  'Devonshire',
	"'Dhurjati', sans-serif"  =>  'Dhurjati',
	"'Didact Gothic', sans-serif" =>  'Didact Gothic',
	"'Diplomata', display"  =>  'Diplomata',
	"'Diplomata SC', display" =>  'Diplomata SC',
	"'Domine', serif" =>  'Domine',
	"'Donegal One', serif"  =>  'Donegal One',
	"'Doppio One', sans-serif"  =>  'Doppio One',
	"'Dorsa', sans-serif" =>  'Dorsa',
	"'Dosis', sans-serif" =>  'Dosis',
	"'Dr Sugiyama', handwriting"  =>  'Dr Sugiyama',
	"'Droid Sans', sans-serif"  =>  'Droid Sans',
	"'Droid Sans Mono', monospace"  =>  'Droid Sans Mono',
	"'Droid Serif', serif"  =>  'Droid Serif',
	"'Duru Sans', sans-serif" =>  'Duru Sans',
	"'Dynalight', display"  =>  'Dynalight',
	"'EB Garamond', serif"  =>  'EB Garamond',
	"'Eagle Lake', handwriting" =>  'Eagle Lake',
	"'Eater', display"  =>  'Eater',
	"'Economica', sans-serif" =>  'Economica',
	"'Eczar', serif"  =>  'Eczar',
	"'Ek Mukta', sans-serif"  =>  'Ek Mukta',
	"'Electrolize', sans-serif" =>  'Electrolize',
	"'Elsie', display"  =>  'Elsie',
	"'Elsie Swash Caps', display" =>  'Elsie Swash Caps',
	"'Emblema One', display"  =>  'Emblema One',
	"'Emilys Candy', display" =>  'Emilys Candy',
	"'Engagement', handwriting" =>  'Engagement',
	"'Englebert', sans-serif" =>  'Englebert',
	"'Enriqueta', serif"  =>  'Enriqueta',
	"'Erica One', display"  =>  'Erica One',
	"'Esteban', serif"  =>  'Esteban',
	"'Euphoria Script', handwriting"  =>  'Euphoria Script',
	"'Ewert', display"  =>  'Ewert',
	"'Exo', sans-serif" =>  'Exo',
	"'Exo 2', sans-serif" =>  'Exo 2',
	"'Expletus Sans', display"  =>  'Expletus Sans',
	"'Fanwood Text', serif" =>  'Fanwood Text',
	"'Fascinate', display"  =>  'Fascinate',
	"'Fascinate Inline', display" =>  'Fascinate Inline',
	"'Faster One', display" =>  'Faster One',
	"'Fasthand', serif" =>  'Fasthand',
	"'Fauna One', serif"  =>  'Fauna One',
	"'Federant', display" =>  'Federant',
	"'Federo', sans-serif"  =>  'Federo',
	"'Felipa', handwriting" =>  'Felipa',
	"'Fenix', serif"  =>  'Fenix',
	"'Finger Paint', display" =>  'Finger Paint',
	"'Fira Mono', monospace"  =>  'Fira Mono',
	"'Fira Sans', sans-serif" =>  'Fira Sans',
	"'Fjalla One', sans-serif"  =>  'Fjalla One',
	"'Fjord One', serif"  =>  'Fjord One',
	"'Flamenco', display" =>  'Flamenco',
	"'Flavors', display"  =>  'Flavors',
	"'Fondamento', handwriting" =>  'Fondamento',
	"'Fontdiner Swanky', display" =>  'Fontdiner Swanky',
	"'Forum', display"  =>  'Forum',
	"'Francois One', sans-serif"  =>  'Francois One',
	"'Freckle Face', display" =>  'Freckle Face',
	"'Fredericka the Great', display" =>  'Fredericka the Great',
	"'Fredoka One', display"  =>  'Fredoka One',
	"'Freehand', display" =>  'Freehand',
	"'Fresca', sans-serif"  =>  'Fresca',
	"'Frijole', display"  =>  'Frijole',
	"'Fruktur', display"  =>  'Fruktur',
	"'Fugaz One', display"  =>  'Fugaz One',
	"'GFS Didot', serif"  =>  'GFS Didot',
	"'GFS Neohellenic', sans-serif" =>  'GFS Neohellenic',
	"'Gabriela', serif" =>  'Gabriela',
	"'Gafata', sans-serif"  =>  'Gafata',
	"'Galdeano', sans-serif"  =>  'Galdeano',
	"'Galindo', display"  =>  'Galindo',
	"'Gentium Basic', serif"  =>  'Gentium Basic',
	"'Gentium Book Basic', serif" =>  'Gentium Book Basic',
	"'Geo', sans-serif" =>  'Geo',
	"'Geostar', display"  =>  'Geostar',
	"'Geostar Fill', display" =>  'Geostar Fill',
	"'Germania One', display" =>  'Germania One',
	"'Gidugu', sans-serif"  =>  'Gidugu',
	"'Gilda Display', serif"  =>  'Gilda Display',
	"'Give You Glory', handwriting" =>  'Give You Glory',
	"'Glass Antiqua', display"  =>  'Glass Antiqua',
	"'Glegoo', serif" =>  'Glegoo',
	"'Gloria Hallelujah', handwriting"  =>  'Gloria Hallelujah',
	"'Goblin One', display" =>  'Goblin One',
	"'Gochi Hand', handwriting" =>  'Gochi Hand',
	"'Gorditas', display" =>  'Gorditas',
	"'Goudy Bookletter 1911', serif"  =>  'Goudy Bookletter 1911',
	"'Graduate', display" =>  'Graduate',
	"'Grand Hotel', handwriting"  =>  'Grand Hotel',
	"'Gravitas One', display" =>  'Gravitas One',
	"'Great Vibes', handwriting"  =>  'Great Vibes',
	"'Griffy', display" =>  'Griffy',
	"'Gruppo', display" =>  'Gruppo',
	"'Gudea', sans-serif" =>  'Gudea',
	"'Gurajada', serif" =>  'Gurajada',
	"'Habibi', serif" =>  'Habibi',
	"'Halant', serif" =>  'Halant',
	"'Hammersmith One', sans-serif" =>  'Hammersmith One',
	"'Hanalei', display"  =>  'Hanalei',
	"'Hanalei Fill', display" =>  'Hanalei Fill',
	"'Handlee', handwriting"  =>  'Handlee',
	"'Hanuman', serif"  =>  'Hanuman',
	"'Happy Monkey', display" =>  'Happy Monkey',
	"'Headland One', serif" =>  'Headland One',
	"'Henny Penny', display"  =>  'Henny Penny',
	"'Herr Von Muellerhoff', handwriting" =>  'Herr Von Muellerhoff',
	"'Hind', sans-serif"  =>  'Hind',
	"'Hind Siliguri', sans-serif" =>  'Hind Siliguri',
	"'Hind Vadodara', sans-serif" =>  'Hind Vadodara',
	"'Holtwood One SC', serif"  =>  'Holtwood One SC',
	"'Homemade Apple', handwriting" =>  'Homemade Apple',
	"'Homenaje', sans-serif"  =>  'Homenaje',
	"'IM Fell DW Pica', serif"  =>  'IM Fell DW Pica',
	"'IM Fell DW Pica SC', serif" =>  'IM Fell DW Pica SC',
	"'IM Fell Double Pica', serif"  =>  'IM Fell Double Pica',
	"'IM Fell Double Pica SC', serif" =>  'IM Fell Double Pica SC',
	"'IM Fell English', serif"  =>  'IM Fell English',
	"'IM Fell English SC', serif" =>  'IM Fell English SC',
	"'IM Fell French Canon', serif" =>  'IM Fell French Canon',
	"'IM Fell French Canon SC', serif"  =>  'IM Fell French Canon SC',
	"'IM Fell Great Primer', serif" =>  'IM Fell Great Primer',
	"'IM Fell Great Primer SC', serif"  =>  'IM Fell Great Primer SC',
	"'Iceberg', display"  =>  'Iceberg',
	"'Iceland', display"  =>  'Iceland',
	"'Imprima', sans-serif" =>  'Imprima',
	"'Inconsolata', monospace"  =>  'Inconsolata',
	"'Inder', sans-serif" =>  'Inder',
	"'Indie Flower', handwriting" =>  'Indie Flower',
	"'Inika', serif"  =>  'Inika',
	"'Inknut Antiqua', serif" =>  'Inknut Antiqua',
	"'Irish Grover', display" =>  'Irish Grover',
	"'Istok Web', sans-serif" =>  'Istok Web',
	"'Italiana', serif" =>  'Italiana',
	"'Italianno', handwriting"  =>  'Italianno',
	"'Itim', handwriting" =>  'Itim',
	"'Jacques Francois', serif" =>  'Jacques Francois',
	"'Jacques Francois Shadow', display"  =>  'Jacques Francois Shadow',
	"'Jaldi', sans-serif" =>  'Jaldi',
	"'Jim Nightshade', handwriting" =>  'Jim Nightshade',
	"'Jockey One', sans-serif"  =>  'Jockey One',
	"'Jolly Lodger', display" =>  'Jolly Lodger',
	"'Josefin Sans', sans-serif"  =>  'Josefin Sans',
	"'Josefin Slab', serif" =>  'Josefin Slab',
	"'Joti One', display" =>  'Joti One',
	"'Judson', serif" =>  'Judson',
	"'Julee', handwriting"  =>  'Julee',
	"'Julius Sans One', sans-serif" =>  'Julius Sans One',
	"'Junge', serif"  =>  'Junge',
	"'Jura', sans-serif"  =>  'Jura',
	"'Just Another Hand', handwriting"  =>  'Just Another Hand',
	"'Just Me Again Down Here', handwriting"  =>  'Just Me Again Down Here',
	"'Kadwa', serif"  =>  'Kadwa',
	"'Kalam', handwriting"  =>  'Kalam',
	"'Kameron', serif"  =>  'Kameron',
	"'Kanit', sans-serif" =>  'Kanit',
	"'Kantumruy', sans-serif" =>  'Kantumruy',
	"'Karla', sans-serif" =>  'Karla',
	"'Karma', serif"  =>  'Karma',
	"'Kaushan Script', handwriting" =>  'Kaushan Script',
	"'Kavoon', display" =>  'Kavoon',
	"'Kdam Thmor', display" =>  'Kdam Thmor',
	"'Keania One', display" =>  'Keania One',
	"'Kelly Slab', display" =>  'Kelly Slab',
	"'Kenia', display"  =>  'Kenia',
	"'Khand', sans-serif" =>  'Khand',
	"'Khmer', display"  =>  'Khmer',
	"'Khula', sans-serif" =>  'Khula',
	"'Kite One', sans-serif"  =>  'Kite One',
	"'Knewave', display"  =>  'Knewave',
	"'Kotta One', serif"  =>  'Kotta One',
	"'Koulen', display" =>  'Koulen',
	"'Kranky', display" =>  'Kranky',
	"'Kreon', serif"  =>  'Kreon',
	"'Kristi', handwriting" =>  'Kristi',
	"'Krona One', sans-serif" =>  'Krona One',
	"'Kurale', serif" =>  'Kurale',
	"'La Belle Aurore', handwriting"  =>  'La Belle Aurore',
	"'Laila', serif"  =>  'Laila',
	"'Lakki Reddy', handwriting"  =>  'Lakki Reddy',
	"'Lancelot', display" =>  'Lancelot',
	"'Lateef', handwriting" =>  'Lateef',
	"'Lato', sans-serif"  =>  'Lato',
	"'League Script', handwriting"  =>  'League Script',
	"'Leckerli One', handwriting" =>  'Leckerli One',
	"'Ledger', serif" =>  'Ledger',
	"'Lekton', sans-serif"  =>  'Lekton',
	"'Lemon', display"  =>  'Lemon',
	"'Libre Baskerville', serif"  =>  'Libre Baskerville',
	"'Life Savers', display"  =>  'Life Savers',
	"'Lilita One', display" =>  'Lilita One',
	"'Lily Script One', display"  =>  'Lily Script One',
	"'Limelight', display"  =>  'Limelight',
	"'Linden Hill', serif"  =>  'Linden Hill',
	"'Lobster', display"  =>  'Lobster',
	"'Lobster Two', display"  =>  'Lobster Two',
	"'Londrina Outline', display" =>  'Londrina Outline',
	"'Londrina Shadow', display"  =>  'Londrina Shadow',
	"'Londrina Sketch', display"  =>  'Londrina Sketch',
	"'Londrina Solid', display" =>  'Londrina Solid',
	"'Lora', serif" =>  'Lora',
	"'Love Ya Like A Sister', display"  =>  'Love Ya Like A Sister',
	"'Loved by the King', handwriting"  =>  'Loved by the King',
	"'Lovers Quarrel', handwriting" =>  'Lovers Quarrel',
	"'Luckiest Guy', display" =>  'Luckiest Guy',
	"'Lusitana', serif" =>  'Lusitana',
	"'Lustria', serif"  =>  'Lustria',
	"'Macondo', display"  =>  'Macondo',
	"'Macondo Swash Caps', display" =>  'Macondo Swash Caps',
	"'Magra', sans-serif" =>  'Magra',
	"'Maiden Orange', display"  =>  'Maiden Orange',
	"'Mako', sans-serif"  =>  'Mako',
	"'Mallanna', sans-serif"  =>  'Mallanna',
	"'Mandali', sans-serif" =>  'Mandali',
	"'Marcellus', serif"  =>  'Marcellus',
	"'Marcellus SC', serif" =>  'Marcellus SC',
	"'Marck Script', handwriting" =>  'Marck Script',
	"'Margarine', display"  =>  'Margarine',
	"'Marko One', serif"  =>  'Marko One',
	"'Marmelad', sans-serif"  =>  'Marmelad',
	"'Martel', serif" =>  'Martel',
	"'Martel Sans', sans-serif" =>  'Martel Sans',
	"'Marvel', sans-serif"  =>  'Marvel',
	"'Mate', serif" =>  'Mate',
	"'Mate SC', serif"  =>  'Mate SC',
	"'Maven Pro', sans-serif" =>  'Maven Pro',
	"'McLaren', display"  =>  'McLaren',
	"'Meddon', handwriting" =>  'Meddon',
	"'MedievalSharp', display"  =>  'MedievalSharp',
	"'Medula One', display" =>  'Medula One',
	"'Megrim', display" =>  'Megrim',
	"'Meie Script', handwriting"  =>  'Meie Script',
	"'Merienda', handwriting" =>  'Merienda',
	"'Merienda One', handwriting" =>  'Merienda One',
	"'Merriweather', serif" =>  'Merriweather',
	"'Merriweather Sans', sans-serif" =>  'Merriweather Sans',
	"'Metal', display"  =>  'Metal',
	"'Metal Mania', display"  =>  'Metal Mania',
	"'Metamorphous', display" =>  'Metamorphous',
	"'Metrophobic', sans-serif" =>  'Metrophobic',
	"'Michroma', sans-serif"  =>  'Michroma',
	"'Milonga', display"  =>  'Milonga',
	"'Miltonian', display"  =>  'Miltonian',
	"'Miltonian Tattoo', display" =>  'Miltonian Tattoo',
	"'Miniver', display"  =>  'Miniver',
	"'Miss Fajardose', handwriting" =>  'Miss Fajardose',
	"'Modak', display"  =>  'Modak',
	"'Modern Antiqua', display" =>  'Modern Antiqua',
	"'Molengo', sans-serif" =>  'Molengo',
	"'Molle', handwriting"  =>  'Molle',
	"'Monda', sans-serif" =>  'Monda',
	"'Monofett', display" =>  'Monofett',
	"'Monoton', display"  =>  'Monoton',
	"'Monsieur La Doulaise', handwriting" =>  'Monsieur La Doulaise',
	"'Montaga', serif"  =>  'Montaga',
	"'Montez', handwriting" =>  'Montez',
	"'Montserrat', sans-serif"  =>  'Montserrat',
	"'Montserrat Alternates', sans-serif" =>  'Montserrat Alternates',
	"'Montserrat Subrayada', sans-serif"  =>  'Montserrat Subrayada',
	"'Moul', display" =>  'Moul',
	"'Moulpali', display" =>  'Moulpali',
	"'Mountains of Christmas', display" =>  'Mountains of Christmas',
	"'Mouse Memoirs', sans-serif" =>  'Mouse Memoirs',
	"'Mr Bedfort', handwriting" =>  'Mr Bedfort',
	"'Mr Dafoe', handwriting" =>  'Mr Dafoe',
	"'Mr De Haviland', handwriting" =>  'Mr De Haviland',
	"'Mrs Saint Delafield', handwriting"  =>  'Mrs Saint Delafield',
	"'Mrs Sheppards', handwriting"  =>  'Mrs Sheppards',
	"'Muli', sans-serif"  =>  'Muli',
	"'Mystery Quest', display"  =>  'Mystery Quest',
	"'NTR', sans-serif" =>  'NTR',
	"'Neucha', handwriting" =>  'Neucha',
	"'Neuton', serif" =>  'Neuton',
	"'New Rocker', display" =>  'New Rocker',
	"'News Cycle', sans-serif"  =>  'News Cycle',
	"'Niconne', handwriting"  =>  'Niconne',
	"'Nixie One', display"  =>  'Nixie One',
	"'Nobile', sans-serif"  =>  'Nobile',
	"'Nokora', serif" =>  'Nokora',
	"'Norican', handwriting"  =>  'Norican',
	"'Nosifer', display"  =>  'Nosifer',
	"'Nothing You Could Do', handwriting" =>  'Nothing You Could Do',
	"'Noticia Text', serif" =>  'Noticia Text',
	"'Noto Sans', sans-serif" =>  'Noto Sans',
	"'Noto Serif', serif" =>  'Noto Serif',
	"'Nova Cut', display" =>  'Nova Cut',
	"'Nova Flat', display"  =>  'Nova Flat',
	"'Nova Mono', monospace"  =>  'Nova Mono',
	"'Nova Oval', display"  =>  'Nova Oval',
	"'Nova Round', display" =>  'Nova Round',
	"'Nova Script', display"  =>  'Nova Script',
	"'Nova Slim', display"  =>  'Nova Slim',
	"'Nova Square', display"  =>  'Nova Square',
	"'Numans', sans-serif"  =>  'Numans',
	"'Nunito', sans-serif"  =>  'Nunito',
	"'Odor Mean Chey', display" =>  'Odor Mean Chey',
	"'Offside', display"  =>  'Offside',
	"'Old Standard TT', serif"  =>  'Old Standard TT',
	"'Oldenburg', display"  =>  'Oldenburg',
	"'Oleo Script', display"  =>  'Oleo Script',
	"'Oleo Script Swash Caps', display" =>  'Oleo Script Swash Caps',
	"'Open Sans', sans-serif" =>  'Open Sans',
	"'Open Sans Condensed', sans-serif" =>  'Open Sans Condensed',
	"'Oranienbaum', serif"  =>  'Oranienbaum',
	"'Orbitron', sans-serif"  =>  'Orbitron',
	"'Oregano', display"  =>  'Oregano',
	"'Orienta', sans-serif" =>  'Orienta',
	"'Original Surfer', display"  =>  'Original Surfer',
	"'Oswald', sans-serif"  =>  'Oswald',
	"'Over the Rainbow', handwriting" =>  'Over the Rainbow',
	"'Overlock', display" =>  'Overlock',
	"'Overlock SC', display"  =>  'Overlock SC',
	"'Ovo', serif"  =>  'Ovo',
	"'Oxygen', sans-serif"  =>  'Oxygen',
	"'Oxygen Mono', monospace"  =>  'Oxygen Mono',
	"'PT Mono', monospace"  =>  'PT Mono',
	"'PT Sans', sans-serif" =>  'PT Sans',
	"'PT Sans Caption', sans-serif" =>  'PT Sans Caption',
	"'PT Sans Narrow', sans-serif"  =>  'PT Sans Narrow',
	"'PT Serif', serif" =>  'PT Serif',
	"'PT Serif Caption', serif" =>  'PT Serif Caption',
	"'Pacifico', handwriting" =>  'Pacifico',
	"'Palanquin', sans-serif" =>  'Palanquin',
	"'Palanquin Dark', sans-serif"  =>  'Palanquin Dark',
	"'Paprika', display"  =>  'Paprika',
	"'Parisienne', handwriting" =>  'Parisienne',
	"'Passero One', display"  =>  'Passero One',
	"'Passion One', display"  =>  'Passion One',
	"'Pathway Gothic One', sans-serif"  =>  'Pathway Gothic One',
	"'Patrick Hand', handwriting" =>  'Patrick Hand',
	"'Patrick Hand SC', handwriting"  =>  'Patrick Hand SC',
	"'Patua One', display"  =>  'Patua One',
	"'Paytone One', sans-serif" =>  'Paytone One',
	"'Peddana', serif"  =>  'Peddana',
	"'Peralta', display"  =>  'Peralta',
	"'Permanent Marker', handwriting" =>  'Permanent Marker',
	"'Petit Formal Script', handwriting"  =>  'Petit Formal Script',
	"'Petrona', serif"  =>  'Petrona',
	"'Philosopher', sans-serif" =>  'Philosopher',
	"'Piedra', display" =>  'Piedra',
	"'Pinyon Script', handwriting"  =>  'Pinyon Script',
	"'Pirata One', display" =>  'Pirata One',
	"'Plaster', display"  =>  'Plaster',
	"'Play', sans-serif"  =>  'Play',
	"'Playball', display" =>  'Playball',
	"'Playfair Display', serif" =>  'Playfair Display',
	"'Playfair Display SC', serif"  =>  'Playfair Display SC',
	"'Podkova', serif"  =>  'Podkova',
	"'Poiret One', display" =>  'Poiret One',
	"'Poller One', display" =>  'Poller One',
	"'Poly', serif" =>  'Poly',
	"'Pompiere', display" =>  'Pompiere',
	"'Pontano Sans', sans-serif"  =>  'Pontano Sans',
	"'Poppins', sans-serif" =>  'Poppins',
	"'Port Lligat Sans', sans-serif"  =>  'Port Lligat Sans',
	"'Port Lligat Slab', serif" =>  'Port Lligat Slab',
	"'Pragati Narrow', sans-serif"  =>  'Pragati Narrow',
	"'Prata', serif"  =>  'Prata',
	"'Preahvihear', display"  =>  'Preahvihear',
	"'Press Start 2P', display" =>  'Press Start 2P',
	"'Princess Sofia', handwriting" =>  'Princess Sofia',
	"'Prociono', serif" =>  'Prociono',
	"'Prosto One', display" =>  'Prosto One',
	"'Puritan', sans-serif" =>  'Puritan',
	"'Purple Purse', display" =>  'Purple Purse',
	"'Quando', serif" =>  'Quando',
	"'Quantico', sans-serif"  =>  'Quantico',
	"'Quattrocento', serif" =>  'Quattrocento',
	"'Quattrocento Sans', sans-serif" =>  'Quattrocento Sans',
	"'Questrial', sans-serif" =>  'Questrial',
	"'Quicksand', sans-serif" =>  'Quicksand',
	"'Quintessential', handwriting" =>  'Quintessential',
	"'Qwigley', handwriting"  =>  'Qwigley',
	"'Racing Sans One', display"  =>  'Racing Sans One',
	"'Radley', serif" =>  'Radley',
	"'Rajdhani', sans-serif"  =>  'Rajdhani',
	"'Raleway', sans-serif" =>  'Raleway',
	"'Raleway Dots', display" =>  'Raleway Dots',
	"'Ramabhadra', sans-serif"  =>  'Ramabhadra',
	"'Ramaraja', serif" =>  'Ramaraja',
	"'Rambla', sans-serif"  =>  'Rambla',
	"'Rammetto One', display" =>  'Rammetto One',
	"'Ranchers', display" =>  'Ranchers',
	"'Rancho', handwriting" =>  'Rancho',
	"'Ranga', display"  =>  'Ranga',
	"'Rationale', sans-serif" =>  'Rationale',
	"'Ravi Prakash', display" =>  'Ravi Prakash',
	"'Redressed', handwriting"  =>  'Redressed',
	"'Reenie Beanie', handwriting"  =>  'Reenie Beanie',
	"'Revalia', display"  =>  'Revalia',
	"'Rhodium Libre', serif"  =>  'Rhodium Libre',
	"'Ribeye', display" =>  'Ribeye',
	"'Ribeye Marrow', display"  =>  'Ribeye Marrow',
	"'Righteous', display"  =>  'Righteous',
	"'Risque', display" =>  'Risque',
	"'Roboto', sans-serif"  =>  'Roboto',
	"'Roboto Condensed', sans-serif"  =>  'Roboto Condensed',
	"'Roboto Mono', monospace"  =>  'Roboto Mono',
	"'Roboto Slab', serif"  =>  'Roboto Slab',
	"'Rochester', handwriting"  =>  'Rochester',
	"'Rock Salt', handwriting"  =>  'Rock Salt',
	"'Rokkitt', serif"  =>  'Rokkitt',
	"'Romanesco', handwriting"  =>  'Romanesco',
	"'Ropa Sans', sans-serif" =>  'Ropa Sans',
	"'Rosario', sans-serif" =>  'Rosario',
	"'Rosarivo', serif" =>  'Rosarivo',
	"'Rouge Script', handwriting" =>  'Rouge Script',
	"'Rozha One', serif"  =>  'Rozha One',
	"'Rubik', sans-serif" =>  'Rubik',
	"'Rubik Mono One', sans-serif"  =>  'Rubik Mono One',
	"'Rubik One', sans-serif" =>  'Rubik One',
	"'Ruda', sans-serif"  =>  'Ruda',
	"'Rufina', serif" =>  'Rufina',
	"'Ruge Boogie', handwriting"  =>  'Ruge Boogie',
	"'Ruluko', sans-serif"  =>  'Ruluko',
	"'Rum Raisin', sans-serif"  =>  'Rum Raisin',
	"'Ruslan Display', display" =>  'Ruslan Display',
	"'Russo One', sans-serif" =>  'Russo One',
	"'Ruthie', handwriting" =>  'Ruthie',
	"'Rye', display"  =>  'Rye',
	"'Sacramento', handwriting" =>  'Sacramento',
	"'Sahitya', serif"  =>  'Sahitya',
	"'Sail', display" =>  'Sail',
	"'Salsa', display"  =>  'Salsa',
	"'Sanchez', serif"  =>  'Sanchez',
	"'Sancreek', display" =>  'Sancreek',
	"'Sansita One', display"  =>  'Sansita One',
	"'Sarala', sans-serif"  =>  'Sarala',
	"'Sarina', display" =>  'Sarina',
	"'Sarpanch', sans-serif"  =>  'Sarpanch',
	"'Satisfy', handwriting"  =>  'Satisfy',
	"'Scada', sans-serif" =>  'Scada',
	"'Scheherazade', serif" =>  'Scheherazade',
	"'Schoolbell', handwriting" =>  'Schoolbell',
	"'Seaweed Script', display" =>  'Seaweed Script',
	"'Sevillana', display"  =>  'Sevillana',
	"'Seymour One', sans-serif" =>  'Seymour One',
	"'Shadows Into Light', handwriting" =>  'Shadows Into Light',
	"'Shadows Into Light Two', handwriting" =>  'Shadows Into Light Two',
	"'Shanti', sans-serif"  =>  'Shanti',
	"'Share', display"  =>  'Share',
	"'Share Tech', sans-serif"  =>  'Share Tech',
	"'Share Tech Mono', monospace"  =>  'Share Tech Mono',
	"'Shojumaru', display"  =>  'Shojumaru',
	"'Short Stack', handwriting"  =>  'Short Stack',
	"'Siemreap', display" =>  'Siemreap',
	"'Sigmar One', display" =>  'Sigmar One',
	"'Signika', sans-serif" =>  'Signika',
	"'Signika Negative', sans-serif"  =>  'Signika Negative',
	"'Simonetta', display"  =>  'Simonetta',
	"'Sintony', sans-serif" =>  'Sintony',
	"'Sirin Stencil', display"  =>  'Sirin Stencil',
	"'Six Caps', sans-serif"  =>  'Six Caps',
	"'Skranji', display"  =>  'Skranji',
	"'Slabo 13px', serif" =>  'Slabo 13px',
	"'Slabo 27px', serif" =>  'Slabo 27px',
	"'Slackey', display"  =>  'Slackey',
	"'Smokum', display" =>  'Smokum',
	"'Smythe', display" =>  'Smythe',
	"'Sniglet', display"  =>  'Sniglet',
	"'Snippet', sans-serif" =>  'Snippet',
	"'Snowburst One', display"  =>  'Snowburst One',
	"'Sofadi One', display" =>  'Sofadi One',
	"'Sofia', handwriting"  =>  'Sofia',
	"'Sonsie One', display" =>  'Sonsie One',
	"'Sorts Mill Goudy', serif" =>  'Sorts Mill Goudy',
	"'Source Code Pro', monospace"  =>  'Source Code Pro',
	"'Source Sans Pro', sans-serif" =>  'Source Sans Pro',
	"'Source Serif Pro', serif" =>  'Source Serif Pro',
	"'Special Elite', display"  =>  'Special Elite',
	"'Spicy Rice', display" =>  'Spicy Rice',
	"'Spinnaker', sans-serif" =>  'Spinnaker',
	"'Spirax', display" =>  'Spirax',
	"'Squada One', display" =>  'Squada One',
	"'Sree Krushnadevaraya', serif" =>  'Sree Krushnadevaraya',
	"'Stalemate', handwriting"  =>  'Stalemate',
	"'Stalinist One', display"  =>  'Stalinist One',
	"'Stardos Stencil', display"  =>  'Stardos Stencil',
	"'Stint Ultra Condensed', display"  =>  'Stint Ultra Condensed',
	"'Stint Ultra Expanded', display" =>  'Stint Ultra Expanded',
	"'Stoke', serif"  =>  'Stoke',
	"'Strait', sans-serif"  =>  'Strait',
	"'Sue Ellen Francisco', handwriting"  =>  'Sue Ellen Francisco',
	"'Sumana', serif" =>  'Sumana',
	"'Sunshiney', handwriting"  =>  'Sunshiney',
	"'Supermercado One', display" =>  'Supermercado One',
	"'Sura', serif" =>  'Sura',
	"'Suranna', serif"  =>  'Suranna',
	"'Suravaram', serif"  =>  'Suravaram',
	"'Suwannaphum', display"  =>  'Suwannaphum',
	"'Swanky and Moo Moo', handwriting" =>  'Swanky and Moo Moo',
	"'Syncopate', sans-serif" =>  'Syncopate',
	"'Tangerine', handwriting"  =>  'Tangerine',
	"'Taprom', display" =>  'Taprom',
	"'Tauri', sans-serif" =>  'Tauri',
	"'Teko', sans-serif"  =>  'Teko',
	"'Telex', sans-serif" =>  'Telex',
	"'Tenali Ramakrishna', sans-serif"  =>  'Tenali Ramakrishna',
	"'Tenor Sans', sans-serif"  =>  'Tenor Sans',
	"'Text Me One', sans-serif" =>  'Text Me One',
	"'The Girl Next Door', handwriting" =>  'The Girl Next Door',
	"'Tienne', serif" =>  'Tienne',
	"'Tillana', handwriting"  =>  'Tillana',
	"'Timmana', sans-serif" =>  'Timmana',
	"'Tinos', serif"  =>  'Tinos',
	"'Titan One', display"  =>  'Titan One',
	"'Titillium Web', sans-serif" =>  'Titillium Web',
	"'Trade Winds', display"  =>  'Trade Winds',
	"'Trocchi', serif"  =>  'Trocchi',
	"'Trochut', display"  =>  'Trochut',
	"'Trykker', serif"  =>  'Trykker',
	"'Tulpen One', display" =>  'Tulpen One',
	"'Ubuntu', sans-serif"  =>  'Ubuntu',
	"'Ubuntu Condensed', sans-serif"  =>  'Ubuntu Condensed',
	"'Ubuntu Mono', monospace"  =>  'Ubuntu Mono',
	"'Ultra', serif"  =>  'Ultra',
	"'Uncial Antiqua', display" =>  'Uncial Antiqua',
	"'Underdog', display" =>  'Underdog',
	"'Unica One', display"  =>  'Unica One',
	"'UnifrakturCook', display" =>  'UnifrakturCook',
	"'UnifrakturMaguntia', display" =>  'UnifrakturMaguntia',
	"'Unkempt', display"  =>  'Unkempt',
	"'Unlock', display" =>  'Unlock',
	"'Unna', serif" =>  'Unna',
	"'VT323', monospace"  =>  'VT323',
	"'Vampiro One', display"  =>  'Vampiro One',
	"'Varela', sans-serif"  =>  'Varela',
	"'Varela Round', sans-serif"  =>  'Varela Round',
	"'Vast Shadow', display"  =>  'Vast Shadow',
	"'Vesper Libre', serif" =>  'Vesper Libre',
	"'Vibur', handwriting"  =>  'Vibur',
	"'Vidaloka', serif" =>  'Vidaloka',
	"'Viga', sans-serif"  =>  'Viga',
	"'Voces', display"  =>  'Voces',
	"'Volkhov', serif"  =>  'Volkhov',
	"'Vollkorn', serif" =>  'Vollkorn',
	"'Voltaire', sans-serif"  =>  'Voltaire',
	"'Waiting for the Sunrise', handwriting"  =>  'Waiting for the Sunrise',
	"'Wallpoet', display" =>  'Wallpoet',
	"'Walter Turncoat', handwriting"  =>  'Walter Turncoat',
	"'Warnes', display" =>  'Warnes',
	"'Wellfleet', display"  =>  'Wellfleet',
	"'Wendy One', sans-serif" =>  'Wendy One',
	"'Wire One', sans-serif"  =>  'Wire One',
	"'Work Sans', sans-serif" =>  'Work Sans',
	"'Yanone Kaffeesatz', sans-serif" =>  'Yanone Kaffeesatz',
	"'Yantramanav', sans-serif" =>  'Yantramanav',
	"'Yellowtail', handwriting" =>  'Yellowtail',
	"'Yeseva One', display" =>  'Yeseva One',
	"'Yesteryear', handwriting" =>  'Yesteryear',
	"'Zeyada', handwriting" =>  'Zeyada',

  );

return $fonts_list;
}




?>
