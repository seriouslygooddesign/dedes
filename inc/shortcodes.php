<?php
/*------------------------------------*\
	Shortcodes
\*------------------------------------*/
function generate_shortcode($field, $icon, $atts)
{
    $field = str_replace('-', '_', $field);
    extract(get_field($field, 'option'));
    $a = shortcode_atts(array(
        'wrap' => 'true',
    ), $atts);
    $wrap = $a['wrap'] === 'true' ? true : false;

    $link = $link ?? false;

    return get_core_icon_label($icon, $label, $link, $field, $wrap, $title);
}

$shortcodes = array(
    'phone' => 'phone',
    'email' => 'email',
    'address' => 'pin',
    'opening-hours' => 'clock'
);

foreach ($shortcodes as $shortcode => $icon) {
    add_shortcode($shortcode, function ($atts) use ($shortcode, $icon) {
        return generate_shortcode($shortcode, $icon, $atts);
    });
}


add_shortcode('social-icons', 'social_icons');
function social_icons($atts)
{
    $is_single = shortcode_atts(['type' => ''], $atts)['type'] === 'alt';
    $fields = get_field('social_icons', $is_single ? false : 'options');

    ob_start();
    get_template_part('components/social-icons', null, ['social_icons' => $fields]);
    return ob_get_clean();
}

add_shortcode('cta-link', 'cta_link');
function cta_link()
{
    $link = get_field('cta_link', 'option');
    $icon = '<span class="site-icon site-icon--arrow"></span>';

    if ($link) {
        $link_url = esc_url($link['url']);
        $link_title = esc_html($link['title']);
        $link_target = $link['target'] ? esc_attr($link['target']) : '_self';
        return "<a class='button' href='$link_url' target='$link_target'>$link_title$icon</a>";
    }
}

add_shortcode('dedes-sites', 'dedes_sites');
function dedes_sites()
{
    ob_start();
    get_template_part('components/sites');
    return ob_get_clean();
}
