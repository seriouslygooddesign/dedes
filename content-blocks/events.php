<?php
$post_type = 'event';

$loop = get_posts([
    'post_type' => $post_type,
    'posts_per_page' => 4
]);

$loop = get_sub_field('type') == 'select' ? get_sub_field($post_type) : $loop;

$event_args = [
    'loop' => $loop
];

if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);

    get_template_part('components/events', null, $event_args);

    get_template_part('components/block', 'end');

endif;
