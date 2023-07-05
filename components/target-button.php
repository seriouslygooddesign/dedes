<?php
$args = wp_parse_args($args, [
    'title' => get_the_title(),
    'i' => ''
]);
extract($args);
?>

<a href="#<?= esc_attr(sanitize_title($title)) ?>" role="button" class="button-menu__button<?= $i == 1 ? ' active' : ''; ?>"><?= esc_html(ucwords(strtolower($title))); ?></a>