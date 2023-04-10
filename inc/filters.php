<?php
//Body Class
add_filter('body_class', 'core_custom_body_class');
function core_custom_body_class($classes)
{
    $classes[] = 'sticky-footer';
    return $classes;
}

//Remove WordPress Version Number
add_filter('the_generator', '__return_empty_string');

//Getting rid of archive "prefix"
function my_theme_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'my_theme_archive_title');


//Read More
function new_excerpt_more($more)
{
    return '...<br><a href="' . get_permalink(get_the_ID()) . '"><b>Read More</b></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Function for defer parsing of javascripts, for loading the website faster
function defer_parsing_of_js($url)
{
    if (strpos($url, 'core-defer')) {
        return str_replace(' src', ' defer src', $url);
    }
    return $url;
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);


// Change the button text after clicking it
function gf_change_submit_button_text($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $onclick = $input->getAttribute('onclick');
    $onclick .= " this.value='Sending...'";
    $input->setAttribute('onclick', $onclick);
    return $dom->saveHtml($input);
}
add_filter('gform_submit_button', 'gf_change_submit_button_text', 10, 2);

//Disable wpo-plugins-tables-list.json file
add_filter('wpo_update_plugin_json', '__return_false');

//Rename "Default template" to "Content Blocks"
add_filter('default_page_template_title', function () {
    return __('Content Blocks', 'your_text_domain');
});


//Upload WOFF and WOFF2 files
add_filter('upload_mimes', 'add_custom_upload_mimes');
function add_custom_upload_mimes($existing_mimes)
{
    $existing_mimes['woff'] = 'application/x-font-woff';
    $existing_mimes['woff2'] = 'application/x-font-woff2';
    return $existing_mimes;
}
