<?php
$args = wp_parse_args($args, [
	'object' => get_the_ID(),
]);
$object = $args['object'];
if (have_rows('content_blocks', $object)) {
	while (have_rows('content_blocks', $object)) {
		the_row();
		if (get_core_hide_block()) {
			get_template_part('content-blocks/' . get_row_layout());
		}
	}
}
