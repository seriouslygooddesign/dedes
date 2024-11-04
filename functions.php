<?php

/**
 * Content Width
 */
function core_content_width()
{
	$GLOBALS['content_width'] = apply_filters('core_content_width', 2048);
}
add_action('after_setup_theme', 'core_content_width', 0);


/**
 * Core functions and definitions
 */
if (!function_exists('core_setup')) :
	function core_setup()
	{

		// Menus
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'core'),
			)
		);

		//Theme Support
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
				'comment-form',
				'comment-list',
				'style',
				'script',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size('small', 384, 384, false);

		add_theme_support('editor-styles');

		function plugin_mce_css($mce_css)
		{
			if (!empty($mce_css)) {
				$mce_css .= ',';
			}
			return $mce_css . get_template_directory_uri() . '/style-editor.css?v=1.0.22';
		}
		add_filter('mce_css', 'plugin_mce_css');
	}
endif;
add_action('after_setup_theme', 'core_setup');

/**
 * Extra Image Sizes In Editor
 */
function add_custom_image_sizes()
{
	return array(
		'thumbnail' => __('Thumbnail'),
		'small' => __('X Small'),
		'medium' => __('Small'),
		'medium_large' => __('Medium'),
		'large' => __('Large'),
		'1536x1536' => __('X Large'),
		'2048x2048' => __('XX Large'),
		'full' => __('Full Size')
	);
}
add_filter('image_size_names_choose', 'add_custom_image_sizes');

/**
 * Widgets
 */
function core_widgets_init()
{

	$register_footer_widget_counter = 1;
	while ($register_footer_widget_counter <= FOOTER_SIDEBAR_QUANTITY) {
		register_sidebar(
			array(
				'name'          => esc_html__("Footer Widget $register_footer_widget_counter", 'core'),
				'id'            => "footer-sidebar-$register_footer_widget_counter",
				'before_sidebar' => '<div id="%1$s">',
				'after_sidebar' => '</div>',
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="h5">',
				'after_title'   => '</h3>',
			)
		);
		$register_footer_widget_counter++;
	}
}
add_action('widgets_init', 'core_widgets_init');


/**
 * Enqueue scripts and styles.
 */

function swiper_js_css()
{
	wp_enqueue_style('swiper', get_core_enqueue_path('swiper.css'), [], null);
	wp_enqueue_script('core-defer-swiper', get_core_enqueue_path('swiper.js'), [], null);
}

function core_scripts()
{
	//Dequeue
	wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_script('comment-reply');


	//Core Files
	wp_enqueue_style('main', get_core_enqueue_path('main.css'), [], null);
	wp_enqueue_script('core-defer-main', get_core_enqueue_path('main.js'), [], null, true);


	// Swiper
	global $post;
	global $wpdb;
	$post_id = $post->ID ?? null;
	$post_meta_sql = "select * from $wpdb->postmeta where post_id = {$post_id} and meta_key not like '\_%' and meta_value like '%[gallery%'";
	$post_meta_results = $wpdb->get_results($post_meta_sql);

	// run the has_shortcode() as usual, works for all the_content() cases
	if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'gallery')) {
		swiper_js_css();
	}
	// for shortcodes in post_meta
	else if (is_a($post, 'WP_Post') && !empty($post_meta_results)) {
		swiper_js_css();

		// if the content blocks contain a slider
	} else if (have_rows('content_blocks')) {
		while (have_rows('content_blocks')) : the_row();
			if (in_array(get_row_layout(), ['posts', 'rooms', 'whats_on', 'testimonials']) && get_core_hide_block()) {
				swiper_js_css();
			}
		endwhile;
	}
}
add_action('wp_enqueue_scripts', 'core_scripts');


/**
 * Admin Panel CSS and JS
 */
function core_admin_enqueue()
{
	wp_enqueue_style('admin', get_core_enqueue_path('admin.css'), [], null);
	wp_enqueue_script('admin', get_core_enqueue_path('admin.js'), ['acf', 'jquery'], null, ['strategy' => 'defer']);
}

add_action('admin_enqueue_scripts', 'core_admin_enqueue');

/**
 * Require
 */
require get_template_directory() . '/inc/variables.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/actions.php';
require get_template_directory() . '/inc/filters.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/tiny-mce.php';
require get_template_directory() . '/inc/gravity-forms.php';
require get_template_directory() . '/inc/css-variables.php';
require get_template_directory() . '/inc/whats-on.php';
require get_template_directory() . '/inc/image-validation.php';
require get_template_directory() . '/inc/popups.php';

if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}
