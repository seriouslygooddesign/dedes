<?php
//Options 
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Header',
		'menu_title'    => 'Header',
		'parent_slug'   => 'options',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Styles',
		'menu_title'    => 'Styles',
		'parent_slug'   => 'options',
	));

	if(is_main_site()){
		acf_add_options_sub_page(array(
		  'page_title'  => 'Sites',
		  'menu_title'  => 'Sites',
		  'parent_slug' => 'options',
	  ));
	}
}

//Wysiwyg Editor Height
function core_apply_acf_modifications()
{
?>
	<style>
		.acf-editor-wrap iframe {
			min-height: 0;
		}
	</style>
	<script>
		(function($) {
			acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
				mceInit.wp_autoresize_on = true;
				return mceInit;
			});
			acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
				ed.settings.autoresize_min_height = 100;
				$('.acf-editor-wrap iframe').css('height', '150px');
			});
		})(jQuery)
	</script>
<?php
}
add_action('acf/input/admin_footer', 'core_apply_acf_modifications');

//Custom Styles
function my_acf_admin_head()
{
?>
    <style type="text/css">
        .acf-gallery {
            height: 400px !important;
        }
    </style>
<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');
