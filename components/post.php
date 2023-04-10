<div class="underline-reverse" data-animate>
    <a href="<?php the_permalink(); ?>" class="color-background-surface ratio-4-3" tabindex="-1" aria-hidden="true">
        <?= get_core_remove_width_height_attr(get_the_post_thumbnail(get_the_ID(), 'small', ['class' => 'stretch'])); ?>
    </a>
    <h3 class="h4 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if (get_post_type() === 'post') : ?>
        <small><?= esc_html(get_the_date()); ?></small>
    <?php endif; ?>
</div>