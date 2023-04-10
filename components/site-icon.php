<?php
$args = wp_parse_args($args, [
    'icon' => '',
    'class' => null,
]);

extract($args);

$icon = $args['icon'];
$extra_class = $args['class'];

$main_class = 'site-icon';
if ($class) $main_class .= " $class";
?>
<svg class="<?= $main_class ?>">
    <use href="<?= get_core_get_sprite_url() . "#$icon"; ?>"></use>
</svg>