<?php

add_filter('mce_buttons_2', 'fb_mce_editor_buttons');
function fb_mce_editor_buttons($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'fb_mce_before_init');
function fb_mce_before_init($settings)
{
    $heading_order = 'h1,h2,h3,h4,h5,h6,p';
    $style_formats = array(
        array(
            'title' => 'Heading Size',
            'items' => array(
                array(
                    'title' => 'H1',
                    'selector' => $heading_order,
                    'classes' => 'h1'
                ),
                array(
                    'title' => 'H2',
                    'selector' => $heading_order,
                    'classes' => 'h2'
                ),
                array(
                    'title' => 'H3',
                    'selector' => $heading_order,
                    'classes' => 'h3'
                ),
                array(
                    'title' => 'H4',
                    'selector' => $heading_order,
                    'classes' => 'h4'
                ),
                array(
                    'title' => 'H5',
                    'selector' => $heading_order,
                    'classes' => 'h5'
                ),
                array(
                    'title' => 'H6',
                    'selector' => $heading_order,
                    'classes' => 'h6'
                ),
            ),
        ),
        array(
            'title' => 'Text Size',
            'items' => array(
                array(
                    'title' => 'Small',
                    'inline' => 'small',
                ),
                array(
                    'title' => 'Big',
                    'inline' => 'span',
                    'classes' => 'fs-lg'
                ),
            ),
        ),
        array(
            'title' => 'Text Color',
            'items' => array(
                array(
                    'title' => 'Primary',
                    'inline' => 'span',
                    'classes' => 'color-text-primary'
                ),
                array(
                    'title' => 'Secondary',
                    'inline' => 'span',
                    'classes' => 'color-text-secondary'
                ),
                array(
                    'title' => 'Muted',
                    'inline' => 'span',
                    'classes' => 'color-text-muted'
                ),
            ),
        ),
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button',
        ),
        array(
            'title' => 'Subtitle',
            'selector' => 'p',
            'classes' => 'site-subtitle',
        ),
        array(
            'title' => 'Text Indent',
            'block' => 'div',
            'wrapper' => true,
            'classes' => 'text-indent',
        ),
        array(
            'title' => 'Button Styles',
            'items' => array(
                array(
                    'title' => 'Outline',
                    'selector' => '.button',
                    'classes' => 'button--outline'
                ),
                array(
                    'title' => 'White',
                    'selector' => '.button',
                    'classes' => 'button--white'
                ),
            ),
        ),

    );
    $settings['paste_as_text'] = true;
    $settings['style_formats'] = json_encode($style_formats);
    return $settings;
}
