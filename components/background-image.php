<?php
$args = wp_parse_args(
    $args,
    array(
        'img_id' => get_post_thumbnail_id(),
        'img_alt' => get_the_title(),
        'curtain' => false,
    )
);
extract($args);

if ($img_id) {
    $attachment_image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
    if ($attachment_image_alt) {
        $img_alt = $attachment_image_alt;
    }

    $img_args = [
        'class' => 'img-parallax stretch',
        'alt' => esc_attr($img_alt),
        'loading' => 'lazy'
    ];

    $image = wp_get_attachment_image($img_id, '2048x2048', false, $img_args);

    echo '<div class="overflow-hidden stretch">' . get_core_remove_width_height_attr($image) . '</div>';
    if ($curtain) {
        get_template_part('components/curtain');
    }
}
