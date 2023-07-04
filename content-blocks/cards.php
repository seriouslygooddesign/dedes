<?php
$block_args = [
	'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
?>
<div class="container">
	<?php get_template_part('components/block', 'header'); ?>
	<?php if (have_rows('cards')) : ?>
		<div class="row justify-content-center g-3 row-cols-md-3">
			<?php while (have_rows('cards')) : the_row(); ?>
				<div class="col-12" data-animate>
					<?php
					$link = get_sub_field('link');
					$card_args = array(
						'image' => get_sub_field('image'),
						'title' => get_sub_field('title'),
						'content' => get_sub_field('content'),
						'link' => $link ? [
							'link_title' => $link['title'],
							'link_url' => $link['url'],
							'link_target' => $link['target'] ?: '_self',
						] : false
					);
					get_template_part('components/card', null, $card_args); ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<?php get_template_part('components/block', 'footer'); ?>
</div>
<?php get_template_part('components/block', 'end');
