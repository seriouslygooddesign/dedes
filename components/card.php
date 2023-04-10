<?php
$args = wp_parse_args(
    $args,
    array(
        'image' => get_post_thumbnail_id(),
        'title' => get_the_title(),
        'content' => get_the_excerpt(),
        'link' => [
            'link_title' => 'Read More',
            'link_url' => get_permalink(),
            'link_target' => '_self',
        ]
    )
);
$link_title = null;
$link_url = null;
$link_target = null;

extract($args);

if ($content && str_contains($content, 'href')) {
    $link = false;
}

if ($link) {
    extract($args['link']);
}


$card_start = $link ? "a href='" . esc_url($link_url) . "' target='" . esc_attr($link_target) . "'" : "div";
echo "<$card_start class='card' data-animate>";
?>
<?php if ($image) : ?>
    <div class="color-background-surface ratio-4-3">
        <?= get_core_remove_width_height_attr(wp_get_attachment_image($image, 'small', false, ['class' => 'stretch'])); ?>
    </div>
<?php endif; ?>
<div class="card__content">
    <?php if ($title) : ?>
        <h3 class="h4"><?= esc_html($title) ?></h3>
    <?php endif; ?>
    <?= $content; ?>
    <?php
    if ($link && $link_title) : ?>
        <div class="card__link"><?= esc_html($link_title); ?><?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'card__icon rotate-270']); ?></div>
    <?php endif; ?>
</div>
<?= $link ? '</a>' : '</div>' ?>