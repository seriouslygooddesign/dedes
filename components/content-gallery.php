<?php
$condition = get_row_index() % 2 !== 0;
$row_reverse = $condition ? ' flex-md-row-reverse' : '';
$color_background = !$condition ? ' color-background-surface' : '';
$content = get_sub_field('content');
$gallery = get_sub_field('gallery');
$links = [
    'custom_link' => get_sub_field('custom_link'),
    'link' => get_sub_field('link'),
];
$link_result = '';
foreach ($links as $key => $link) {
    if ($link) :
        $link_title = $link['title'] ?? 'Visit website';
        $link_url = $link['url'] ?? $link;
        $link_target = $link['target'] ?? '_blank';
        $link_class = $key == 'link' ? ' button--backgroundless' : '';
        $link_arrow = $key == 'link' ? ' <span class="site-icon site-icon--arrow">' : '';
        $link_result .= "<a href='$link_url' class='button$link_class' target='$link_target'>$link_title$link_arrow</span></a>";
    endif;
}
?>
<div class="row g-0<?= $row_reverse ?>">
    <div class="col-md-6 gallery-stretch" data-animate>
        <?php
        $images_string = implode(',', $gallery);
        $shortcode = sprintf('[gallery ids="%s" columns="1"]', esc_attr($images_string));
        
        echo do_shortcode($shortcode);
        ?>
    </div>
    <div class="col-md-6 d-flex pos-rel align-items-center<?= $color_background ?>" data-animate>
        <div class="container-sm container--panel spacer-section-py">
            <?= $content ?? '' ?>
            <?= $link_result ? "<div class='button-group'>$link_result</div>" : '' ?>
        </div>
    </div>
</div>