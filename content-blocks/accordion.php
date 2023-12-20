<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php')
];
get_template_part('components/block', 'start', $block_args);
get_template_part('components/block', 'header');
$total = count(get_sub_field('accordion'));
$faq_schema = get_sub_field('faq_schema');
if (have_rows('accordion')) {
    while (have_rows('accordion')) {
        the_row();
        $accordion_args = [
            'total' => $total,
            'current' => get_row_index(),
            'faq_schema' => $faq_schema
        ];
        get_template_part('components/accordion', null, $accordion_args);
    }
}
get_template_part('components/block', 'footer');
get_template_part('components/block', 'end');
