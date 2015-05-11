<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'mcsa' );
define( 'CHILD_THEME_URL', 'http://www.generatedesign.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


add_action( 'wp_enqueue_scripts', 'mcsa_scripts' );
function mcsa_scripts(){
	wp_enqueue_style('sass-styles', get_stylesheet_directory_uri() . '/stylesheets/screen.css', array(), CHILD_THEME_VERSION); 
	
	/** Might not need this 
	wp_enqueue_script('banner-height', get_stylesheet_directory_uri() . '/js/height.js', array(), CHILD_THEME_VERSION, true); 
	**/
}


/** Add bar before header **/
add_action('genesis_before_header', 'top_bar'); 
function top_bar(){
	echo '<div class="top-bar"><a href="https://motorcarriersafetyanalysis.sharefile.com" target="_blank">Client Login</a></div>'; 
}

/** Footer Functions **/ 
add_theme_support( 'genesis-footer-widgets', 6 );


/** Change Footer credentials **/ 
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	?>
	<p><img class="cc-logos" src="http://generatedesignstaging.com/mcsa/wp-content/uploads/2015/05/credit-card-logos.jpeg"></p>
	<p>&copy; <?php echo date("Y") ?> Motor Carrier Safety Analysis, All Rights Reserved</p>
	<?php
}


// Register responsive menu script
add_action( 'wp_enqueue_scripts', 'mcsa_enqueue_scripts' );
function mcsa_enqueue_scripts() {

	wp_enqueue_script( 'mcsa-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );

}