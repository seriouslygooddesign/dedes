<?php
$args = wp_parse_args(
    $args,
    array(
        'image' => get_post_thumbnail_id(),
        'title' => get_the_title(),
        'content' => get_the_excerpt(),
        'img_ratio' => 'ratio-16-10',
        'decor' => true,
        'extra_class' => null,
        'link' => [
            'link_title' => 'Read More',
            'link_url' => get_permalink(),
            'link_target' => '_self',
        ]
    )
);
$link_title = $link_url = $link_target = null;
extract($args);

$image = wp_get_attachment_image($image, 'medium_large', false, ['class' => 'stretch', 'loading' => 'lazy']);

if ($content && str_contains($content, 'href')) {
    $link = false;
}

if ($link) {
    extract($args['link']);
}

$card_start = $link ? "a href='" . esc_url($link_url) . "' target='" . esc_attr($link_target) . "'" : "div";
echo "<$card_start class='card $extra_class'>";
?>
<?php if ($image) : ?>
    <div class="color-background-surface overflow-hidden <?= $decor && $title ? 'card__header' : $img_ratio; ?>">
        <?= get_core_remove_width_height_attr($image); ?>
        <?php if ($title && $decor) : ?>
            <div class="overflow-hidden stretch">
                <div class="site-decor"></div>
            </div>
            <h3 class="h4 m-0 card__title"><?= esc_html($title) ?></h3>
        <?php endif; ?>
    </div>
<?php endif; ?>
<div class="card__body">
    <?php if ($content || ($title && !$decor)) : ?>
        <div class="card__content<?= !$link ? ' card__content-alt' : '' ?>">
            <?= $title && !$decor ? "<h3 class='h6'>" . esc_html($title) . "</h3>" : null; ?>
            <?= $content; ?>
        </div>
    <?php endif; ?>
    <?php
    if ($link && $link_title) : ?>
        <div class="card__link">
            <span class="card__link-title"><?= esc_html($link_title); ?></span>
            <span class="site-icon site-icon--arrow"></span>
        </div>
    <?php endif; ?>
</div>
<?= $link ? '</a>' : '</div>' ?>