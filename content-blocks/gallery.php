<?php
$block_args = [
	'modifier' => basename(__FILE__, '.php'),
	'class' => 'overflow-hidden'
];
get_template_part('components/block', 'start', $block_args);
$gallery = get_sub_field('gallery');
if ($gallery) : ?>
	<?php get_template_part('components/block', 'header', ['class' => 'container']); ?>
	<div class="swiper" data-swiper-gallery>
		<div class="swiper-wrapper">
			<?php foreach ($gallery as $item) : ?>
				<div class="swiper-slide"><?= wp_get_attachment_image($item['ID'], 'large'); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="container">
			<div class="row align-items-center justify-content-center spacer-element">
				<div class="col-auto">
					<button role="button" aria-label="Previous slide" class="button button--outline swiper-button-prev">
						<?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'rotate-90']); ?>
					</button>
				</div>
				<div class="col-auto">
					<div class="swiper-pagination text-center"></div>
				</div>
				<div class="col-auto">
					<button role="button" aria-label="Next slide" class="button button--outline swiper-button-next">
						<?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'rotate-270']); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part('components/block', 'footer', ['class' => 'container']); ?>
<?php
endif;
get_template_part('components/block', 'end');
