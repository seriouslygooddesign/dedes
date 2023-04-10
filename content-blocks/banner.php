<?php
$block_args = [
	'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
?>
<div class="container">
	<?php echo get_sub_field('text')?>
</div>
<?php get_template_part('components/block', 'end');
