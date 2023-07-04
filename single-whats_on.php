<?php
get_header();

//Get Single What's On Data
$is_main_site = is_main_site();
switch_to_blog(1);

$id = get_the_ID();
if (!$is_main_site) {
	$page_by_path = get_page_by_path(get_query_var(WHATS_ON_QUERY_VAR), 'OBJECT', WHATS_ON_POST_TYPE_NAME);
	$id = $page_by_path->ID;
}

get_template_part('components/content-blocks', null, ['object' => $id]);

restore_current_blog();

get_footer();
