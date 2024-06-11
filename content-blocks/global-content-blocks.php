<?php
$args = wp_parse_args($args, [
    'global_content_blocks' => get_sub_field('global_content_blocks')
]);
$global_content_blocks = $args['global_content_blocks'];
if ($global_content_blocks) {
    foreach ($global_content_blocks as $page_id) {
        get_template_part('components/content-blocks', null, ['object' => $page_id]);
    }
}
