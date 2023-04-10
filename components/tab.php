<?php
$args = wp_parse_args($args, [
    'i' => 1,
    'main_class' => 'tab',
    'class' => null,
    'title' => get_sub_field('title')
]);

extract($args);

$class_result = $main_class;

if ($i === 1) {
    $class_result .= " $main_class--active";
}

if ($class) {
    $class_result .= " $class";
}
?>
<button class="button <?= $class_result; ?>" type="button" data-tab-rel="<?= esc_attr($i); ?>">
    <?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'tab__icon']); ?>
    <span class="tab__title"><?= esc_html($title); ?></span>
</button>