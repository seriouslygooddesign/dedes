<?php
//Disabling automatic scrolling on form submit
add_filter('gform_confirmation_anchor', '__return_false');

//Remove legend
add_filter('gform_required_legend', '__return_empty_string');
