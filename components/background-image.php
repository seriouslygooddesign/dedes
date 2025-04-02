<?php
$args = wp_parse_args(
    $args,
    array(
        'img_id' => get_post_thumbnail_id(),
        'curtain' => false,
    )
);
extract($args);

if ($img_id) {
    $img_args = [
        'class' => 'img-parallax stretch',
        'loading' => 'lazy'
    ];

    $image = wp_get_attachment_image($img_id, '2048x2048', false, $img_args);

    echo '<div class="overflow-hidden stretch">' . get_core_remove_width_height_attr($image) . '</div>';
    if ($curtain) {
        get_template_part('components/curtain');
    }
}
