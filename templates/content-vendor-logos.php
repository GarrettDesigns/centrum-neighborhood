<ul class="vendor-logos-list">
	<?php if( have_rows("vendor_logos")) : while(have_rows("vendor_logos")) : the_row() ?>
		<li class="vendor-logos-list--item"><img src="<?php the_sub_field('vendor_logo'); ?>"></li>
	<?php endwhile; endif; ?>
</ul>
