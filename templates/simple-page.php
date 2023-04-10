<?php
/* Template name: Simple Page */
get_header(); ?>
<div class="container spacer-section-py">
    <?php
    the_title('<h1>', '</h1>');
    the_post_thumbnail('large');
    the_content();
    ?>
</div>
<?php
get_footer();
