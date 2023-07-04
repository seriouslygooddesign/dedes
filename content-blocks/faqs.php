<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);

$loop = get_sub_field('faqs');
$total = count($loop);
$i = 1;
$header_show = get_sub_field('block_header_show');
$header_content = get_sub_field('block_header');

if ($loop) :
?>
    <div class="container">
        <div class="row gx-md-4">
            <?php if ($header_show) : ?>
                <div class="col-md-4 vstack mb-spacer-element" data-animate>
                    <?= $header_content ?>
                </div>
            <?php endif; ?>
            <div class="col-md" data-animate>
                <?php
                foreach ($loop as $post) :
                    setup_postdata($post);
                    $accordion_args = [
                        'total' => $total,
                        'current' => $i,
                        'title' => get_the_title(),
                        'text' => '<p>' . get_the_content() . '</p>',
                    ];
                    get_template_part('components/accordion', null, $accordion_args);
                    $i++;
                endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_template_part('components/block', 'end');
