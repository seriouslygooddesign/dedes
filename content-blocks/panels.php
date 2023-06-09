<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php')
];
get_template_part('components/block', 'start', $block_args);
$reverse_columns = get_core_reverse_columns();
if (have_rows('panels')) : ?>
    <div class="<?= get_core_filter_implode(['row g-0', $reverse_columns]) ?>">
        <?php while (have_rows('panels')) : the_row();
            $decor = get_sub_field('panel_decor') ? '<div class="site-decor"></div>' : '';
            $panel_content = get_sub_field('content');
        ?>
            <div class="col-md d-flex pos-rel align-items-center overflow-hidden" data-animate>
                <?php
                get_template_part('components/background');
                echo $decor;
                if (empty($panel_content)) : ?>
                    <div class="ratio-4-3 d-md-none"></div>
                <?php else : ?>
                    <div class="<?= get_core_filter_implode(['container-sm container--panel spacer-section-py', get_core_color_text_white()]) ?>" data-animate="up">
                        <?= $panel_content; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        <?php endwhile; ?>
    </div>
<?php
endif;
get_template_part('components/block', 'end');
