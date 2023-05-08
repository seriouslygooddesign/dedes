<?php
/*------------------------------------*\
	Shortcodes
\*------------------------------------*/

add_shortcode('phone', function ($atts) {
    extract(get_field('phone', 'option'));
    $a = shortcode_atts(array(
        'wrap' => 'true',
    ), $atts);
    $wrap = $a['wrap'] === 'true' ? true : false;
    if ($link) {
        return get_core_icon_label('phone', $label, $link, 'phone', $wrap);
    }
});

add_shortcode('email', function ($atts) {
    extract(get_field('email', 'option'));
    $a = shortcode_atts(array(
        'wrap' => 'true',
    ), $atts);
    $wrap = $a['wrap'] === 'true' ? true : false;
    if ($link) {
        return get_core_icon_label('email', $label, $link, 'email', $wrap);
    }
});

add_shortcode('address', function ($atts) {
    extract(get_field('address', 'option'));
    $a = shortcode_atts(array(
        'wrap' => 'true',
    ), $atts);
    $wrap = $a['wrap'] === 'true' ? true : false;
    if ($link) {
        return get_core_icon_label('pin', $label, $link, 'address', $wrap);
    }
});

add_shortcode('social-icons', 'social_icons');
function social_icons()
{
    ob_start();
    get_template_part('components/social-icons');
    return ob_get_clean();
}

add_shortcode('cta-link', 'cta_link');
function cta_link()
{
    $link = get_field('cta_link', 'option');
    ob_start();
    get_template_part('components/site-icon', null, ['icon' => 'arrow', 'class'=>'site-icon--arrow']);
    $icon = ob_get_clean();

    if ($link) {
        $link_url = esc_url($link['url']);
        $link_title = esc_html($link['title']);
        $link_target = $link['target'] ? esc_attr($link['target']) : '_self';
        return "<a class='button' href='$link_url' target='$link_target'>$link_title$icon</a>";
    }
}

add_shortcode( 'dedes-sites', 'dedes_sites' );
function dedes_sites() {
    ob_start();
    get_template_part('components/sites');
    return ob_get_clean();
}


