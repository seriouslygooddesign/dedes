<?php
$args = wp_parse_args($args, [
    'menu' => 'menu-1',
    'class' => 'site-menu'
]);

extract($args);

wp_nav_menu(
    array(
        'container' => false,
        'theme_location' => $menu,
        'menu_class' => $class,
        'walker' => new Sub_Menu_Toggle
    )
);
