<?php
$popups = [];
$popup_cpt_name = 'main-popup';

function generate_popup_trigger_shortcode_in_admin_panel($field)
{
    $popup_id = get_the_ID();
    $field['readonly'] = true;
    $field['wrapper']['class'] = 'popup-trigger-shortcode';

    // Generate the shortcode for the popup trigger
    $field['value'] = '[popup_trigger id="' . esc_attr($popup_id) . '" label="Learn More"]';

    // If the post is not published, add an instruction to publish it
    if (get_post_status($popup_id) !== 'publish') {
        $field['instructions'] .= '<span style="color: red; margin: .5em 0 .75em;">To use the shortcode, please publish this popup first</span>';
    }

    return $field;
}

// Add the filter to modify the ACF field named 'popup_trigger_shortcode'.
add_filter('acf/prepare_field/name=popup_trigger_shortcode', 'generate_popup_trigger_shortcode_in_admin_panel');

function is_core_popup_exists($popup_id)
{
    global $popup_cpt_name;
    $popup = get_post($popup_id);

    return $popup && $popup->post_status === 'publish' && $popup->post_type === $popup_cpt_name;
}

add_shortcode('popup_trigger', 'popup_trigger_shortcode');
function popup_trigger_shortcode($atts)
{
    global $popups;

    $label_text = 'Learn More';

    $atts = shortcode_atts(
        [
            'id' => null,
            'site_id' => get_current_blog_id(),
            'label' => $label_text,
            'type' => 'button',
            'class' => null,
        ],
        $atts,
        'popup_trigger'
    );

    $id = is_numeric($atts['id']) ? intval($atts['id']) : null;
    $site_id = is_numeric($atts['site_id']) ? intval($atts['site_id']) : null;
    $label = $atts['label'] ?: $label_text;
    $type = $atts['type'];
    $class = $atts['class'];

    if (!$id || !$site_id || !get_blog_details($site_id)) {
        return '';
    }

    switch_to_blog($site_id);
    if (!is_core_popup_exists($id)) {
        restore_current_blog();
        return '';
    }

    // Add to global popups array if not already added
    $popup_key = $id . '-' . $site_id;
    if (!array_key_exists($popup_key, $popups)) {
        $popups[$popup_key] = [
            'id' => $id,
            'site_id' => $site_id
        ];
    }

    restore_current_blog();

    $class = $type === 'button' && $class === null ? "button" : $class;
    $class_attr = $class ? " class='" . esc_attr($class) . "'" : '';
    return '<a href="#"' . $class_attr . ' data-popup-trigger="' . esc_attr($popup_key) . '">' . esc_html($label) . '</a>';
}

// If current object has popups, display them in footer
function display_core_popups()
{
    global $popups, $popup_cpt_name;
    if (empty($popups)) {
        return; // Ensure there are popups to display
    }

    foreach ($popups as $popup) {
        if (!isset($popup['id']) || !isset($popup['site_id'])) {
            continue;
        }

        $id = $popup['id'];
        $site_id = $popup['site_id'];
        $front_end_id = "$id-$site_id";
        switch_to_blog($site_id);

        if (is_core_popup_exists($id)) {
            $title = get_field('popup_title', $id);
            $content = apply_filters('the_content', get_post_field('post_content', $id));
            $selector = "[data-popup-trigger='$front_end_id']";

            $args = [
                'id' => "$popup_cpt_name-$front_end_id",
                'selector' => $selector,
                'content' => $content,
                'title' => $title
            ];
            get_template_part('components/popup', null, $args);
        }
        restore_current_blog();
    }
}
add_action('wp_footer', 'display_core_popups');
