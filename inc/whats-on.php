<?php
define('WHATS_ON_POST_TYPE_NAME', 'whats_on');
define('WHATS_ON_URL_PREFIX', 'whats-on');
define('WHATS_ON_TEMPLATE_NAME', 'single-' . WHATS_ON_POST_TYPE_NAME . '.php');
define('WHATS_ON_QUERY_VAR', 'whats_on_title');

//Hide post type link in admin panel using CSS if not main site
// add_action('admin_head', 'hide_whats_on_admin_link');
function hide_whats_on_admin_link()
{
    if (!is_main_site()) {
        echo '<style>#adminmenu #menu-posts-' . WHATS_ON_POST_TYPE_NAME . '{display:none;}</style>';
    }
}

//Create ACF checkboxes to select where "what's on" should be displayed 
add_action('acf/init', 'custom_acf_fields');
function custom_acf_fields()
{

    $sites = get_sites();
    if (!$sites && count($sites) >= 1) {
        return;
    }

    //create field choices
    $choices = [];
    foreach ($sites as $site) {
        $id = $site->blog_id;

        //skip main site
        if ($id === '1') {
            continue;
        }

        $title = get_blog_details($id)->blogname;
        $url = get_blog_details($id)->domain;
        $label = "<b>$title</b><br><small>$url</small>";
        $choices[$id] = $label;
    }

    //create field
    acf_add_local_field(array(
        'parent' => 'group_648b243523d74', //group key, where it should be added
        'name' => 'list_of_websites',
        'label' => 'Display on',
        'type' => 'checkbox',
        'choices' => $choices,
        'return_format' => 'value',
    ));
}

//Rewrite Rule
add_action('init', 'custom_rewrite_rule');
function custom_rewrite_rule()
{
    if (!is_main_site()) {
        add_rewrite_rule('^' . WHATS_ON_URL_PREFIX . '/([^/]*)/?', 'index.php?' . WHATS_ON_QUERY_VAR . '=$matches[1]', 'top');
    }
}

//Query Vars
add_filter('query_vars', 'custom_query_vars');
function custom_query_vars($query_vars)
{
    $query_vars[] = WHATS_ON_QUERY_VAR;
    return $query_vars;
}

//Template
add_action('template_include', 'custom_template_include');
function custom_template_include($template)
{
    //skip if not "what's on" single page
    $whats_on_query_var = get_query_var(WHATS_ON_QUERY_VAR);
    if ($whats_on_query_var == false || $whats_on_query_var == '') {
        return $template;
    }
    return get_template_directory() . '/' . WHATS_ON_TEMPLATE_NAME;
}

//Change <title> tag
function custom_head_title_tag($title)
{
    $whats_on_query_var = get_query_var(WHATS_ON_QUERY_VAR);
    if ($whats_on_query_var == false || $whats_on_query_var == '') {
        return $title;
    }

    switch_to_blog(1);
    global $wp;
    $post_id = url_to_postid(home_url($wp->request));
    $post_title = get_the_title($post_id);
    restore_current_blog();

    $site_title = get_bloginfo('name');
    return "$post_title — $site_title";
}
add_filter('pre_get_document_title', 'custom_head_title_tag');

//Add meta description
add_action('wp_head', 'custom_meta_description');
function custom_meta_description()
{
    $whats_on_query_var = get_query_var(WHATS_ON_QUERY_VAR);
    if ($whats_on_query_var == false || $whats_on_query_var == '') {
        return;
    }
    switch_to_blog(1);
    global $wp;
    $post_id = url_to_postid(home_url($wp->request));
    $post_description = get_the_excerpt($post_id);
    $rank_math_description = get_post_meta($post_id, 'rank_math_description', true);
    if ($rank_math_description) {
        $post_description = $rank_math_description;
    }
    restore_current_blog();
    if ($post_description) {
        echo '<meta name="description" content="' . esc_attr($post_description) . '">';
    }
}
