<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link" href="#site-content">Skip to main content</a>
	<?php wp_body_open();
	
	$hasSiteHeader = false;
	foreach (get_field('content_blocks') as $block) {
		if ($block['acf_fc_layout'] === 'site-header') {
			$hasSiteHeader = true;
			break;
		}
	}

	if (!$hasSiteHeader) {
		get_template_part('components/header');
	}
	?>
	<main id="site-content" class="site-content">