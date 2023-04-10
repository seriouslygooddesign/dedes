<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
?>
<div class="container">
    <?php get_template_part('components/block', 'header'); ?>
    <?php if (have_rows('tabs')) : ?>
        <div class="tabs row">
            <div class="col-md-4 d-none d-md-block" data-animate>
                <div class="tabs__menu">
                    <?php
                    $i = 1;
                    while (have_rows('tabs')) {
                        the_row();
                        get_template_part('components/tab', null, ['i' => $i]);
                        $i++;
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-8" data-animate>
                <?php
                $i = 1;
                while (have_rows('tabs')) : the_row(); ?>
                    <?php get_template_part('components/tab', null, ['i' => $i, 'class' => 'tab--accordion d-md-none']); ?>
                    <div data-tab-id="<?= $i; ?>" class="tab__content element-collapse<?= $i === 1 ? ' element-show' : null; ?>">
                        <h3 class="tab-title"><?= esc_html(get_sub_field('title')) ?></h3>
                        <?php the_sub_field('text'); ?>
                    </div>
                <?php
                    $i++;
                endwhile;
                ?>
            </div>
        </div>
    <?php endif; ?>
    <?php get_template_part('components/block', 'footer'); ?>
</div>
<?php
get_template_part('components/block', 'end');
