<?php
$args = wp_parse_args($args,    [
    'object' => get_the_ID(),
]);
$object = $args['object'];

$post_type = get_post_type($object);
$img_options = get_field("banner_$post_type", 'options');

$args = wp_parse_args($args,    [
    'title' => get_the_title($object),
    'height' => 'min-height-small',
    'img_id' => $img_options && is_archive() ? $img_options : get_post_thumbnail_id($object),
    'img_alt' => get_the_title($object),
]);

extract($args);

$block_name = CONTENT_BLOCK_CLASS . ' ' . CONTENT_BLOCK_MODIFIER . basename(__FILE__, '.php');
$block_class = get_core_filter_implode([
    $block_name,
    'color-text-white',
    'color-background-surface',
    'overflow-hidden',
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
    <div class="<?= CONTENT_BLOCK_CONTENT; ?> container-md spacer-section-py text-center" data-animate>

        <?php
        if ($post_type != WHATS_ON_POST_TYPE_NAME) {
            get_template_part('components/breadcrumbs');
        } ?>

        <h1 class="uppercase page-header-title"><?= wp_kses_post($title); ?></h1>
        <?php
        $file = get_field('file');
        if ($file && is_single()) :
            $url = $file['url'];
            $type = $file['subtype'];
        ?>
            <a class="button button--outline uppercase" href="<?php echo esc_attr($url); ?>" download="">Download <?php echo esc_html($type); ?></a>
        <?php endif; ?>
        <?php
        if (is_singular('post')) {
            echo get_the_date();
        }
        ?>
        <?php
        $event_date = get_field('event_date', $object) ?? null;
        if ($event_date) : ?>
            <?php get_template_part('components/extra-field', null, ['icon' => 'calendar', 'content' => $event_date]); ?>
        <?php endif;
        ?>
    </div>
</div>