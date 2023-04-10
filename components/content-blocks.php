<?php
if (have_rows('content_blocks')) {
	while (have_rows('content_blocks')) {
		the_row();
		if (get_core_hide_block()) {
			get_template_part('content-blocks/' . get_row_layout());
		}
	}
}
