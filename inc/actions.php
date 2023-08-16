<?php
//Remove wordpress css variables
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Remove Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove rss feed links
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

//Disable wlwmanifest link
remove_action('wp_head', 'wlwmanifest_link');

//Remove html margin top when logged in
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

//Admin Panel CSS
add_action('admin_head', 'custom_admin_panel_css');
function custom_admin_panel_css()
{
    //Hide CPT links on main site
    if (is_main_site()) {
        echo '<style>
        #adminmenu #menu-posts-faq,
        #adminmenu #menu-posts-room,
        #adminmenu #menu-posts-testimonial,
        #adminmenu #menu-posts-menu,
        #adminmenu #menu-posts-team {
            display:none;
        }
        </style>';
    }
    
    //Hide "What's On" CPT link on child sites
    // if (!is_main_site()) {
    //     echo '<style>#adminmenu #menu-posts-' . WHATS_ON_POST_TYPE_NAME . '{display:none;}</style>';
    // }
}
