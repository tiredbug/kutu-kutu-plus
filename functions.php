<?php

require_once locate_template('/includes/navwalker.php');

function soil_nice_search_redirect() {
  global $wp_rewrite;
  if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
    return;
  }

  $search_base = $wp_rewrite->search_base;
  if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
    wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
    exit();
  }
}
add_action('template_redirect', 'soil_nice_search_redirect');


// Add page on theme activation and set it as homepage automatically
if (isset($_GET['activated']) && is_admin()){
  add_action('init', 'theme_frontpage_setup');
}

function theme_frontpage_setup(){
  if(get_option('page_on_front')=='0' && get_option('show_on_front')=='posts'){
    // Create frontpage
    $frontpage = array(
      'post_type'    => 'page',
      'post_title'    => 'Frontpage',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => 1
    ); 
    // Insert the post into the database
    $frontpage_id =  wp_insert_post( $frontpage );
    // Set the page template 
    update_post_meta($frontpage_id, '_wp_page_template', 'frontpage.php');
    // Set static front page
    $staticpage = get_page_by_title( 'Frontpage' );
    update_option( 'page_on_front', $staticpage->ID );
    update_option( 'show_on_front', 'page' );
  }
}

// Clean up wp_head()
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


// Remove the annoying:
// <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
add_filter( 'show_recent_comments_widget_style', '__return_false' );

// Add Post Thumbnails Support
add_theme_support('post-thumbnails');

// Register Menu Support
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'theme' ),
) );

// Register widgets support for theme
function theme_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Sidebar', 'theme' ),
    'id' => 'sidebar-widget-area',
    'description' => __( 'The sidebar widget area', 'theme' ),
    'before_widget' => '<section class="%1$s %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

// Replace searh form
function theme_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="form-group">
		    <input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
    </div>
		<button type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> '. esc_attr__('Search') .'</button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'theme_search_form' );

// Add favicon 
function blog_favicon() { ?>
<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/favicon.ico" >
<?php }
add_action('wp_head', 'blog_favicon');

// Add Enqueues
function theme_enqueues()
{
  wp_register_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
  wp_enqueue_style('bootstrap');

  wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
  wp_enqueue_style('font-awesome');
    
  wp_register_style('bootswatch_style', get_theme_mod('bootswatch_style'));
  wp_enqueue_style('bootswatch_style');

  wp_register_style('style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('style');

  wp_deregister_script('jquery');
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
  wp_enqueue_script('jquery');

  wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js');
  wp_enqueue_script('modernizr');

  wp_register_script('html5shiv', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js');
  wp_enqueue_script('html5shiv');

  wp_register_script('respond', '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js');
  wp_enqueue_script('respond');

  wp_register_script('bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
  wp_enqueue_script('bootstrapjs');

  wp_deregister_script( 'comment-reply' );
  wp_register_script('comment-reply', get_template_directory_uri() . '/assets/js/theme.js');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
  wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueues', 100);

// Bootswatch Costumizer
function bootswatch_register_theme_customizer( $wp_customize ){
  $styles = array(
    'Amelia' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/amelia/bootstrap.min.css',
    'Cerulean' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/cerulean/bootstrap.min.css',
    'Cosmo' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css',
    'Cyborg' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/cyborg/bootstrap.min.css',
    'Default' => '',
    'Flaty' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css',
    'Journal' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/journal/bootstrap.min.css',
    'Readable' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css',
    'Simplex' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/simplex/bootstrap.min.css',
    'Slate' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/slate/bootstrap.min.css',
    'Spacelab' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/spacelab/bootstrap.min.css',
    'United' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/united/bootstrap.min.css',
    'Yeti' => '//netdna.bootstrapcdn.com/bootswatch/3.1.1/yeti/bootstrap.min.css'
  );
  $labels = array_flip( $styles );
  $wp_customize->add_section(
    'bootswatch_themes',
    array(
      'title'     => 'BootSwatch Themes',
      'priority'  => 200
    )
  );
  $wp_customize->add_setting(
    'bootswatch_style',
      array(
        'default'     => '',
        #'transport'   => 'postMessage'
      )
  );
  $wp_customize->add_control(
    'bootswatch_style',
    array(
      'section'		=> 'bootswatch_themes',
      'label'		=> __( 'Bootswatch Theme', 'theme' ),
      'type'		=> 'select',
      'choices'		=> $labels,
      'settings'	=> 'bootswatch_style'
    )
  );
}
add_action( 'customize_register', 'bootswatch_register_theme_customizer' );

function navbar_customizer( $wp_customize ) {

	// add "Navbar Options" section
	$wp_customize->add_section( 'navbar_options_section' , array(
		'title'      => __( 'Navbar Options', 'theme' ),
		'priority'   => 190,
	) );
	
	// add setting for toggle checkbox
	$wp_customize->add_setting( 'navbar_toggle', array( 
		'default' => 1 
	) );
	
	// add control for toggle checkbox
	$wp_customize->add_control( 'navbar_toggle', array(
		'label'     => __( 'Inverse Navbar', 'theme' ),
		'section'   => 'navbar_options_section',
		'priority'  => 10,
		'type'      => 'checkbox'
	) );
}
add_action( 'customize_register', 'navbar_customizer' );

?>
