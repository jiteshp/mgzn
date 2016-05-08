<?php
/**
 *	Set content width based on the theme's design. Override in the child theme
 *	by hooking into the 'mgzn_content_width' filter.
 *	----------------------------------------------------------------------------
 */
function mgzn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mgzn_content_width', 630 );
}

add_action( 'after_setup_theme', 'mgzn_content_width' );

/**
 *	Add support for theme features. Override in the child theme by creating your
 *	own 'mgzn_setup' function.
 *	----------------------------------------------------------------------------
 */
if( ! function_exists( 'mgzn_setup' ) ) {
	function mgzn_setup() {
		load_theme_textdomain( 'mgzn', get_template_directory() . '/languages' );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height' 	  => 100,
			'width'	 	  => 300,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		add_theme_support( 'html5', array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		) );
		add_theme_support( 'featured-content', array(
			'filter'	 => 'mgzn_get_featured_content',
			'max_posts'	 => 5,
			'post_types' => array( 'post', 'page' ),
		) );
		
		register_nav_menu( 'mgzn-primary-menu', __( 'Primary Menu', 'mgzn' ) );
	}
}

add_action( 'after_setup_theme', 'mgzn_setup' );

/**
 *	Setup image sizes as per the theme's design. Override in the child theme by 
 *	creating your own 'mgzn_image_sizes' function.
 *	----------------------------------------------------------------------------
 */
if( ! function_exists( 'mgzn_image_sizes' ) ) {
	function mgzn_image_sizes() {
		update_option( 'large_size_w', 960 );
		update_option( 'large_size_h', 9999 );
		
		update_option( 'medium_size_w', 630 );
		update_option( 'medium_size_h', 9999 );
		
		update_option( 'thumbnail_size_w', 300 );
		update_option( 'thumbnail_size_h', 200 );
		
		set_post_thumbnail_size( 1200, 630, true );
	}
}

add_action( 'after_setup_theme', 'mgzn_image_sizes' );
 
/**
 *	Add support for theme sidebars.
 *	----------------------------------------------------------------------------
 */
function mgzn_sidebar() {
	register_sidebar( array(
		'id'			=> 'mgzn-sidebar',
		'name'			=> __( 'Sidebar', 'mgzn' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	
	register_sidebar( array(
		'id'			=> 'mgzn-sidebar-footer',
		'name'			=> __( 'Footer', 'mgzn' ),
		'before_widget'	=> '<div class="col-xs-12 col-md-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside></div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}

add_action( 'after_setup_theme', 'mgzn_sidebar' );

/**
 *	Enqueue theme's styles & scripts.
 *	----------------------------------------------------------------------------
 */
function mgzn_scripts() {
	wp_enqueue_style( 'mgzn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mgzn-fonts', apply_filters(
		'mgzn_fonts_url',
		'https://fonts.googleapis.com/css?family=Roboto:400,400italic,700|Roboto+Slab:400,700'
	) );
	
	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if( mgzn_has_featured_content( 2 ) ) {
		wp_enqueue_script( 'mgzn-cycle2',
			get_template_directory_uri() . '/js/jquery.cycle2.min.js',
			array( 'jquery' ), null, true
		);
	}
	
	wp_enqueue_script( 'mgzn-script',
		get_template_directory_uri() . '/js/functions.js',
		array( 'jquery' ), null, true
	);
}

add_action( 'wp_enqueue_scripts', 'mgzn_scripts' );

/**
 *	Custom body classes.
 *	----------------------------------------------------------------------------
 */
function mgzn_body_class( $classes ) {
	if( ! is_active_sidebar( 'mgzn-sidebar' ) ) {
		$classes[] = 'xprt-no-sidebar';
	}
	
	return $classes;
}

add_filter( 'body_class', 'mgzn_body_class' );

/**
 *	Custom excerpt length.
 *	----------------------------------------------------------------------------
 */
function mgzn_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'mgzn_excerpt_length' );

/**
 *	Return featured content.
 *	----------------------------------------------------------------------------
 */
function mgzn_get_featured_content() {
	return apply_filters( 'mgzn_get_featured_content', array() );
}

/**
 *	Check if we have featured content
 *	----------------------------------------------------------------------------
 */
function mgzn_has_featured_content( $min_posts = 1 ) {
	if( is_paged() ) {
		return false;
	}
	
	$min_posts = absint( $min_posts );
	$featured_content = apply_filters( 'mgzn_get_featured_content', array() );
	
	if( ! is_array( $featured_content ) ) {
		return false;
	}
	
	if( $min_posts > count( $featured_content ) ) {
		return false;
	}
	
	return true;
}

/**
 *	Echo the post thumbnail url
 *	----------------------------------------------------------------------------
 */
function mgzn_post_thumbnail_url( $post_id = false, $size = 'full' ) {
	if( ! $post_id ) {
		global $post;
		$post_id = $post->ID;
	}
	
	if( has_post_thumbnail( $post_id ) ) {
		$thumbnail_id = get_post_thumbnail_id( $post_id );
		$featured_image = wp_get_attachment_image_src( $thumbnail_id, $size );
		
		echo esc_url( $featured_image[0] );
	}
}

/**
 *	Customizer options 
 *	----------------------------------------------------------------------------
 */
function mgzn_customizer_options( $customizer ) {
	// Theme options panel
	$customizer->add_panel( 'mgzn_theme_options', array(
		'priority' => 9999,
		'title'    => __( 'Theme Options', 'mgzn' ),
	) );
	
	// Header section
	$customizer->add_section( 'mgzn_header', array(
		'panel' => 'mgzn_theme_options',
		'title' => __( 'Header', 'mgzn' ),
	) );
	
	// Footer section
	$customizer->add_section( 'mgzn_footer', array(
		'panel' => 'mgzn_theme_options',
		'title' => __( 'Footer', 'mgzn' ),
	) );
	
	// Header call to action
	$customizer->add_setting( 'mgzn_header_cta', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$customizer->add_control( new WP_Customize_Control(
		$customizer, 'mgzn_header_cta', array(
			'label'   => __( 'Call To Action', 'mgzn' ),
			'section' => 'mgzn_header',
			'type' 	  => 'textarea',
		)
	) );
	
	// Copyright
	$customizer->add_setting( 'mgzn_copyright', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$customizer->add_control( new WP_Customize_Control(
		$customizer, 'mgzn_copyright', array(
			'label'   => __( 'Copyright', 'mgzn' ),
			'section' => 'mgzn_footer',
			'type' 	  => 'textarea',
		)
	) );
}

add_action( 'customize_register', 'mgzn_customizer_options' );