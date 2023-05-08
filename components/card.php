<?php
$args = wp_parse_args(
    $args,
    array(
        'image' => wp_get_attachment_image(get_post_thumbnail_id(), 'small', false, ['class' => 'stretch']),
        'title' => get_the_title(),
        'content' => get_the_excerpt(),
        'decor' => true,
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
    <div class="color-background-surface <?= $decor && $title ? 'card__header' : 'ratio-16-9'; ?>">
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
        <div class="card__content">
            <?= $title && !$decor ? "<h3 class='h6'>" . esc_html($title) . "</h3>" : null; ?>
            <?= wp_kses_post($content); ?>
        </div>
    <?php endif; ?>
    <?php
    if ($link && $link_title) : ?>
        <div class="card__link"><?= esc_html($link_title); ?><?php get_template_part('components/site-icon', null, ['icon' => 'arrow', 'class' => 'site-icon--arrow']); ?></div>
    <?php endif; ?>
</div>
<?= $link ? '</a>' : '</div>' ?>