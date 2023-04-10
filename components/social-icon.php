<?php
$args = wp_parse_args($args, [
    'icon' => 'facebook',
    'url' => '#',
]);
$icon = $args['icon'];
$url = esc_url($args['url']);
if (!$url) {
    return;
}
?>
<li class="social-icons__item">
    <a class="social-icons__link site-icon-rounded" href="<?= esc_url($url); ?>" aria-label="<?= esc_attr($icon); ?>" target="_blank" rel="noopener noreferrer">
        <?php get_template_part('components/site-icon', null, ['icon' => $icon]); ?>
    </a>
</li>