<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
?>
<div class="container">
    <div class="banner-decor" data-animate>
        <div>
            <?php echo get_sub_field('text') ?>
        </div>
    </div>
</div>

<?php get_template_part('components/block', 'end');
