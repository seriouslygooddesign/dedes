<?php
$args = wp_parse_args($args,    [
    'title' => get_the_title(),
    'height' => 'min-height-small',
    'img_id' => get_post_thumbnail_id(),
    'img_alt' => get_the_title(),
]);
extract($args);

$block_name = CONTENT_BLOCK_CLASS . ' ' . CONTENT_BLOCK_MODIFIER . basename(__FILE__, '.php');
$block_class = get_core_filter_implode([
    $block_name,
    'color-text-white',
    'color-background-surface',
    ' overflow-hidden',
    $height
]);
?>
<div class="<?= $block_class;  ?>">
    <?php
    $img_args = [
        'curtain' => true,
        'img_id' => $img_id,
        'img_alt' => $img_alt
    ];
    get_template_part('components/background-image', null, $img_args);
    ?>
    <div class="site-decor"></div>
    <div class="<?= CONTENT_BLOCK_CONTENT; ?> container spacer-section-py text-center" data-animate>
        <?php get_template_part('components/breadcrumbs') ?>
        <h1 class="uppercase"><?= wp_kses_post($title); ?></h1>
        <?php
        $file = get_field('file');
        if ($file && is_single()) :
            $url = $file['url'];
            $type = $file['subtype'];
        ?>
            <a class="button button--outline uppercase" href="<?php echo esc_attr($url); ?>" download="">Download <?php echo esc_html($type); ?></a>
        <?php endif; ?>
        <?php
        if (is_singular(['post', 'event'])) {
            echo get_the_date();
        }
        ?>
    </div>
</div>