<?php
$block_args = [
	'modifier' => basename(__FILE__, '.php'),
	'class' => 'overflow-hidden'
];
get_template_part('components/block', 'start', $block_args);
get_template_part('components/block', 'header', ['class' => 'container']);

$galleries = get_sub_field('galleries');
if (have_rows('galleries')) :
	$has_galleries = count($galleries) > 1 && array_column($galleries, 'title') ? 'galleries' : ''; ?>
	<div class="<?= $has_galleries; ?>" data-animate>
		<?php if ($has_galleries) : ?>
			<div class="button-menu spacer-section-py">
				<?php while (have_rows('galleries')) : the_row(); ?>
					<?php $title = get_sub_field('title'); ?>
					<button type="button" class="button<?= get_row_index() === 1 ? ' active' : ''; ?>"><?= esc_html($title); ?></button>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<div class="gallery__images">
			<?php while (have_rows('galleries')) : the_row();
				$gallery = get_sub_field('gallery');
				$title = sanitize_title(get_sub_field('title'));
			?>
				<div class="gallery<?= get_row_index() === 1 && $has_galleries ? ' active' : ''; ?>" <?= $has_galleries ? "data-gallery-name='" . esc_attr($title) . "'" : ''; ?> data-photoswipe>
					<?php foreach ($gallery as $item) : ?>
						<?= wp_get_attachment_link($item['ID']); ?>
					<?php endforeach; ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif;

get_template_part('components/block', 'footer', ['class' => 'container']);
get_template_part('components/block', 'end'); ?>