<?php
$args = wp_parse_args($args, [
    'label' => 'menu',
    'area' => 'Show Menu'
]);
extract($args);
?>

<button role="button" type="button" class="overlay-menu-toggle" aria-label="<?= $area; ?>" data-overlay-menu-toggle>
    <?php get_template_part('components/site-icon', null, ['icon' => $label, 'class' => 'overlay-menu-toggle__icon']); ?>
    <span class="overlay-menu-toggle__label"><?= $label; ?></span>
</button>