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
		add_editor_style('style-editor.css');
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
				'before_sidebar' => '<div id="%1$s" class="col-md">',
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
function core_scripts()
{
	//Dequeue
	wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_script('comment-reply');


	//Core Files
	wp_enqueue_style('main', get_template_directory_uri() . '/dist/main/main.css', array(), '1.0.1');
	wp_enqueue_script('core-defer-main', get_template_directory_uri() . '/dist/main/main.js', array(), '1.0.1');

	//Swiper
	if (have_rows('content_blocks')) {
		while (have_rows('content_blocks')) {
			the_row();
			if (get_row_layout() === 'gallery' && get_core_hide_block()) {
				wp_enqueue_style('swiper', get_template_directory_uri() . '/dist/swiper/swiper.css', array(), '1.0.1');
				wp_enqueue_script('core-defer-swiper', get_template_directory_uri() . '/dist/swiper/swiper.js', array(), '1.0.1');
			}
		}
	}
}
add_action('wp_enqueue_scripts', 'core_scripts');


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
