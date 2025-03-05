<?php
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
