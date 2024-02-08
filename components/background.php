<?php
$background = get_sub_field('background');
if (!$background) return;
$background_type = $background['bg_type'];
$background_overlay = $background['text_settings']['background_overlay'];

if ($background_type !== 'none') {

    //Background Color
    if ($background_type === 'color') {
        $background_type_color = $background['bg_type_color'];
        $background_color =  $background_type_color['bg_color'];
        if ($background_color !== 'custom') {
            echo "<div class='stretch $background_color'></div>";
        } else {
            $background_color_custom = $background_type_color['bg_color_custom'];
            echo "<div class='stretch' style='background-color:$background_color_custom'></div>";
        }
    }

    //Background Image
    if ($background_type === 'image') {
        $image = $background['bg_type_image'];
        if ($image) {
            $args = [
                'img_id' => $image['ID']
            ];
            get_template_part('components/background-image', null, $args);
        }
    }

    //Background Video
    if ($background_type === 'video') {
        $video = $background['bg_type_video'];
        if ($video) {
            $src = $video['url'];
            $mime_type = $video['mime_type'];
            $poster = null;
            $poster_image =  $background['bg_type_video_poster'];
            if ($poster_image) {
                $poster = $poster_image['sizes']['large'];
            }
            echo sprintf(
                "<video playsinline autoplay muted loop %s class='stretch'><source data-src='%s' type='%s'></video>",
                $poster ? "poster='" . esc_url($poster) . "'" : '',
                esc_url($src),
                esc_attr($mime_type)
            );
        }
    }

    //Background Overlay
    if ($background_overlay && ($background_type === 'image' || $background_type === 'video')) {
        get_template_part('components/curtain');
    }
}
