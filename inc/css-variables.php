<?php
function css_variables()
{
    /**
     * Functions
     */
    function color_array_to_rgb($input)
    {
        //Remove 'alpha' array item
        unset($input['alpha']);
        //Escape and convert array to rgb string: 0,0,0
        return esc_html(implode(',', $input));
    }

    /**
     * Colors
     */
    $colors = get_field('colors', 'option');
    if ($colors) {
        //Primary
        $color_primary_rgb = color_array_to_rgb($colors['primary']);
        $color_primary_rgb = $color_primary_rgb ?: "0,0,0";

        //Secondary
        $color_secondary_rgb = color_array_to_rgb($colors['secondary']);
        $color_secondary_rgb = $color_secondary_rgb ?: "var(--color-primary-rgb)";

        //Surface
        $color_surface = esc_html($colors['surface']);
        $color_surface = $color_surface ?: "rgba(var(--color-primary-rgb),0.05)";

        //Body
        $color_body = esc_html($colors['body']);
        $color_body = $color_body ?: "var(--color-white)";

        //Text
        $color_text_rgb = color_array_to_rgb($colors['text']);
        $color_text_rgb = $color_text_rgb ?: "0,0,0";
    }

    /**
     * Fonts
     */
    $fonts = get_field('fonts', 'option');
    $fonts_css_variables = [];

    /**
     * Open <style>
     */
    echo "<style>";

    //Font Faces
    if ($fonts) {
        foreach ($fonts as $font) {
            $font_title = esc_html($font['title']);
            $font_type =  esc_html($font['type']);

            //Push font css variable to array
            $font_css_variable = "--ff-$font_type: '$font_title', sans-serif;";
            array_push($fonts_css_variables, $font_css_variable);

            $font_variations = $font['variations'];
            if ($font_variations) {
                foreach ($font_variations as $font_variant) {
                    $font_style = esc_html($font_variant['style']);
                    $font_weight = esc_html($font_variant['weight']);
                    $font_src = [];
                    //woff
                    $font_woff_url = esc_url($font_variant['woff']);
                    if ($font_woff_url) {
                        array_push($font_src, "url('$font_woff_url') format('woff')");
                    }
                    //woff2
                    $font_woff2_url = esc_url($font_variant['woff2']);
                    if ($font_woff2_url) {
                        array_push($font_src, "url('$font_woff2_url') format('woff2')");
                    }
                    //combine font formats
                    $font_src = implode(', ', $font_src);

                    echo "
    @font-face {
        font-family: $font_title;
        font-style: $font_style;
        font-weight: $font_weight;
        font-display: swap;
        src: $font_src;
    }
";
                } //foreach font_variations
            } //if font_variations
        } //foreach fonts
    } //if fonts

    $fonts_css_variables = $fonts_css_variables ? implode('', $fonts_css_variables) : null;

    echo "
    :root {
        --color-primary-rgb: $color_primary_rgb; 
        --color-primary: rgb(var(--color-primary-rgb));
        --color-secondary-rgb: $color_secondary_rgb;
        --color-secondary: rgb(var(--color-secondary-rgb));
        --color-surface: $color_surface; 
        --color-surface-solid: linear-gradient(var(--color-surface), var(--color-surface)), linear-gradient(var(--color-body), var(--color-body));
        --color-body: $color_body;
        --color-text-rgb: $color_text_rgb;
        --color-text: rgb(var(--color-text-rgb));
        --color-text-muted: rgba(var(--color-text-rgb),0.6);
        --color-white: #ffffff;
        --color-white-muted: rgba(255, 255, 255, 0.6);
        --color-error: #f44336;
        --color-success: #0f834d;
        --color-curtain: var(--color-surface);
        --color-link: var(--color-primary);
        --color-button-background: var(--color-primary);
        --color-button-background-hover: var(--color-text);
        --color-button-border: var(--color-primary);
        --color-button-text: var(--color-white);
        --color-border: rgba(var(--color-text-rgb),0.2);
        --color-input-border: var(--color-border);
        --color-input-border-hover: var(--color-text);
        --color-input-border-focus: var(--color-primary);
        --color-input-background: var(--color-white);
        --color-shadow: rgba(var(--color-primary-rgb),0.025);
        $fonts_css_variables
    }
</style>
";
}
add_action('wp_head', 'css_variables');
add_action('edit_page_form', 'css_variables');
