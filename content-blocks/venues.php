<?php
$block_args = [
	'modifier' => basename(__FILE__, '.php'),
	'class' => 'container spacer-section-py'
];
get_template_part('components/block', 'start', $block_args);
get_template_part('components/block', 'header', ['extra_class' => 'container-fluid']);

echo do_shortcode('[dedes-sites type="venues"]');

get_template_part('components/block', 'end');
