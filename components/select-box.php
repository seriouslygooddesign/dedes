<?php
$args = wp_parse_args($args, [
    'item' => '',
    'button_title' => '',
]);
extract($args);
if ($item) :
?>
    <div class="select-box">
        <div class="container">
            <button class="select-box__button">
                <span class="select-box__text"><?= $button_title; ?></span>
                <?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'select-box__icon']) ?>
            </button>
            <div class="select-box__content">
                <div class="container">
                    <ul class="select-box__list underline-reverse">
                        <?= $item; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>