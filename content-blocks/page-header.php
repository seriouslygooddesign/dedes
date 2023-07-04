<?php
$args = wp_parse_args($args, [
    'object' => get_the_ID(),
]);
$object = $args['object'];

get_template_part('components/page-header', null, ['object' => $object]);
