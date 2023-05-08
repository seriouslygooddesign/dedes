<?php
$args = wp_parse_args(
	$args,
	array(
		'show' => get_sub_field('block_header_group')['block_header_show'] ?? null,
		'content' => get_sub_field('block_header') ?? null,
		'link_url' =>  get_sub_field('block_header_group')['link']['url'] ?? null,
		'link_title' => get_sub_field('block_header_group')['link']['title'] ?? null,
		'link_target' => get_sub_field('block_header_group')['link']['target'] ?? null,
		'class' => false,
	)
);

extract($args);

$link = $link_url ? "<div class='col-auto'><p><a class='button' href='" . esc_url($link_url) . "' target='" . esc_attr($link_target) . "'>" . esc_html($link_title) . "</a></p></div>" : null;

if ($show) {
	$class_result = $class ? "class='" . esc_attr($class) . "'" : ''; ?>
	<div <?= $class_result ?> data-animate>
		<div class="block-header">
			<div class='row align-items-center'>
				<div class='col'>
					<?= wp_kses_post($content) ?>
				</div>
				<?= $link ?>
			</div>
		</div>
	</div>
<?php }
