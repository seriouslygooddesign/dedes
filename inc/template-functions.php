<?php
//Decode manifest.json to string to get a path to a file
function get_core_enqueue_path($name, $template_directory_uri = true)
{
    $manifest_file_path = get_template_directory() . '/dist/manifest.json';
    if (!file_exists($manifest_file_path)) return;
    $manifest_file = file_get_contents($manifest_file_path);
    $manifest_data = json_decode($manifest_file, true);
    $result = $manifest_data[$name] ?? null;
    $before_path = null;
    if ($template_directory_uri) {
        $before_path = get_template_directory_uri();
    }
    return $result ? $before_path . $result : null;
}


//Filter & Implode
if (!function_exists('get_core_filter_implode')) {
    function get_core_filter_implode(array $array)
    {
        return implode(' ', array_filter($array));
    }
}

//Remove image width And height attributes
if (!function_exists('get_core_remove_width_height_attr')) {
    function get_core_remove_width_height_attr($html)
    {
        $html = preg_replace('/(width|height)="\d*"/', '', $html);
        return $html;
    }
}

//Get icon sprite url
if (!function_exists('get_core_get_sprite_url')) {
    function get_core_get_sprite_url()
    {
        $file_name = "sprite.svg?1.0.3";
        return  get_stylesheet_directory_uri() . "/dist/sprite/$file_name";
    }
}



//Hide Block Logic
if (!function_exists('get_core_hide_block')) {
    function get_core_hide_block()
    {
        return get_sub_field('hide_block') === true ? false : true;
    }
}

//Spacer
if (!function_exists('get_core_spacer')) {
    function get_core_spacer()
    {
        $padding = get_sub_field('padding');
        if (!$padding) {
            return;
        }
        $top = 'top';
        $bottom = 'bottom';
        if (in_array($bottom, $padding) && in_array($top, $padding)) {
            $class = 'spacer-section-py';
        } elseif (in_array($bottom, $padding)) {
            $class = 'spacer-section-pb';
        } elseif (in_array($top, $padding)) {
            $class = 'spacer-section-pt';
        } else {
            $class = null;
        }
        return $class;
    }
}

//Container Width
if (!function_exists('get_core_container_width')) {
    function get_core_container_width()
    {
        $container_width = get_sub_field('container_width');
        if ($container_width) {
            $container_width = $container_width !== 'default' ? "-" . esc_attr($container_width) : null;
            return "container$container_width";
        }
    }
}

//Height
if (!function_exists('get_core_height')) {
    function get_core_height()
    {
        $height = get_sub_field('height');
        if ($height && $height !== 'auto') {
            return  "min-height-" . esc_attr($height);
        }
    }
}

//Reverse Columns
if (!function_exists('get_core_reverse_columns')) {
    function get_core_reverse_columns()
    {
        $reverse_columns = get_sub_field('reverse_columns');
        if ($reverse_columns) {
            return "flex-column-reverse flex-md-row";
        }
    }
}

//Vertical Align
if (!function_exists('get_core_vertical_align')) {
    function get_core_vertical_align()
    {
        $vertical_align = get_sub_field('vertical_align');
        if ($vertical_align && $vertical_align !== 'start') {
            return "align-items-" . esc_attr($vertical_align);
        }
    }
}

//Horizontal Align
if (!function_exists('get_core_horizontal_align')) {
    function get_core_horizontal_align()
    {
        $horizontal_align = get_sub_field('horizontal_align');
        if ($horizontal_align && $horizontal_align !== 'start') {
            return "justify-content-" . esc_attr($horizontal_align);
        }
    }
}

//White Text Color
if (!function_exists('get_core_color_text_white')) {
    function get_core_color_text_white($smart = true)
    {
        $bg = get_sub_field('background');
        if (!$bg) return;
        $color_text_white = $bg['text_settings']['white_text_color'];
        $color_text_class = "color-text-white";
        if ($smart) {
            $bg_type = $bg['bg_type'];
            return $bg_type !== 'none' && $color_text_white ? $color_text_class : null;
        }
        return $color_text_white ? $color_text_class : null;
    }
}
//Theme Color
if (!function_exists('get_core_theme_color')) {
    function get_core_theme_color($location)
    {
        $theme_color = get_field($location . '_theme_color', 'options');
        if ($theme_color == 'dark') {
            $class = ' color-text-white color-background-primary theme-color-dark';
        }
        return $class ?? null;
    }
}


//Edit First <p> In Accordion for SEO
function get_core_accordion_first_p($content)
{
    return preg_replace('/<p/', '<p itemprop="text"', $content, 1);
}

//Icon Label Component
function get_core_icon_label($title, $icon = 'email', $label = 'Label', $href = '#', $type = '', $wrap = false)
{
    $label = nl2br(esc_html($label));
    $href = esc_html($href);
    $title = esc_html($title);

    //link attributes based on $type
    $attributes = '';
    switch ($type) {
        case 'phone':
            $attributes = "href='tel:$href'";
            break;
        case 'email':
            $href = antispambot($href, 1);
            $attributes = "href='mailto:$href' target='_blank'";
            break;
        case 'address':
            $attributes = "href='$href' target='_blank' rel='noopener noreferrer'";
            break;
        default:
            $attributes = "href='$href'";
    }

    // Get icon
    ob_start();
    get_template_part('components/site-icon', null, ['icon' => $icon]);
    $icon_html = ob_get_clean();

    // Determine content
    $content = $href ? "<a $attributes>$label</a>" : $label;

    // Prepare wrapping tags if required
    $wrap_class = $title ? ' class="contact-spacer"' : '';
    $before = $wrap ? "<p$wrap_class>" : '';
    $after = $wrap ? '</p>' : '';

    $content = $title ? "$before<span class='icon-label'>$icon_html$title</span><span class='d-block text-indent fs-lg'>$content</span>$after" : "$before<a class='hstack gap-1 d-inline-flex' $attributes>$icon_html$label</a>$after";

    // Construct the result
    return $content;
}

//Column Width
function get_core_column_width($width = 'default', $breakpoint = 'medium')
{
    $breakpoint_class = '';
    switch ($breakpoint) {
        case 'large':
            $breakpoint_class = 'lg';
            break;
        case 'small':
            $breakpoint_class = 'sm';
            break;
        default:
            $breakpoint_class = 'md';
    }
    $breakpoint_class = $breakpoint_class !== 'sm' ? "-$breakpoint_class" : '';
    return $width === 'default' ? "col$breakpoint_class" : "col$breakpoint_class-$width";
}

function overlay_menu_toggle_button($label, $icon)
{
    ob_start();
?>
    <button type="button" role="button" class="overlay-menu-toggle" aria-label="<?php echo $label; ?>" data-overlay-menu-toggle>
        <?php get_template_part('components/site-icon', null, ['icon' => $icon, 'class' => 'overlay-menu-toggle__icon']); ?>
        <span class="overlay-menu-toggle__label"><?php echo $label; ?></span>
    </button>
<?php
    return ob_get_clean();
}

//Icon
function get_core_icon($icon = '', $class = '')
{
    $args = [
        'icon' => $icon,
        'class' => $class ? $class : null,
    ];
    ob_start();
    get_template_part('components/site-icon', null, $args);
    return ob_get_clean();
}
