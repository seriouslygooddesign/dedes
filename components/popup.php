<?php
$args = wp_parse_args($args, [
    'id' => '',
    'title' => '',
    'selector' => '',
    'content' => '',
    'auto_open' => false,
    'auto_open_delay' => false, //milliseconds 
    'auto_open_expires' => null //days
]);
extract($args);

$popup_data['selector'] = esc_attr($selector);

$popup_id_attr = '';
$title_id_attr = '';
$aria_labelledby = '';

if ($id) {
    $popup_id_attr = 'id="' . esc_attr($id) . '" ';
    if ($title) {
        $title_id = "$id-title";
        $title_id_attr = 'id="' . esc_attr($title_id) . '" ';
        $aria_labelledby = 'aria-labelledby="' . esc_attr($title_id) . '" ';
    }
    if ($auto_open) {
        $popup_data['autoOpen']['key'] = wp_hash($id . $title . $content);
        if ($auto_open_delay) $popup_data['autoOpen']['delay'] = $auto_open_delay;
        if ($auto_open_expires) $popup_data['autoOpen']['expires'] = $auto_open_expires;
    }
}
$popup_data =  json_encode($popup_data);
?>
<div <?= $popup_id_attr; ?>role="dialog" aria-modal="true" <?= $aria_labelledby; ?>class="main-popup" data-popup="<?= esc_attr($popup_data); ?>" hidden>
    <div class="main-popup__dialog">
        <div class="main-popup__main" data-popup-main>
            <div class="row g-0 justify-content-end">
                <?php if ($title) : ?>
                    <div class="main-popup__title-wrap col">
                        <h2 <?= $title_id_attr; ?>class="h5 mt-0"><?= esc_html($title); ?></h2>
                    </div>
                <?php endif; ?>
                <div class="col-auto">
                    <button class="main-popup__close-button button button--square button--white" aria-label="Close" type="button" data-popup-toggler-close>
                        <?php get_template_part('components/site-icon', null, ['icon' => 'close', 'class' => 'toggler-button__icon']); ?>
                    </button>
                </div>
            </div>
            <div class="main-popup__body">
                <?= $content; ?>
            </div>
        </div>
    </div>
</div>