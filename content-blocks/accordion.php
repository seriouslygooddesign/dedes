<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php')
];
get_template_part('components/block', 'start', $block_args);
get_template_part('components/block', 'header');
$total = count(get_sub_field('accordion'));
if (have_rows('accordion')) {
    while (have_rows('accordion')) {
        the_row();
        $accordion_args = [
            'total' => $total,
            'current' => get_row_index()
        ];
        get_template_part('components/accordion', null, $accordion_args);
    }
}
get_template_part('components/block', 'footer');
get_template_part('components/block', 'end');
