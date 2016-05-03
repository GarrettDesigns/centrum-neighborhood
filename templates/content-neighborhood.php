<?php
/**
 * This is the doc comment
 *
 * @package something or other
 * Template file: Neighborhood Content - Generates the galleries for the
 */

?>

<ul class="neighborhood-main--lifstyle-list">
	<?php if ( have_rows( 'feature_galleries' ) ) : while ( have_rows( 'feature_galleries' ) ) : the_row(); ?>
		<li class="neighborhood-main--lifestyle-list-item">
			<article class="list-item-main">
				<span class="list-item--text"><?php the_sub_field( 'gallery_name' ); ?></span>
				<span class="neighborhood-main--color-overlay"></span>
				<a href="#gallery" class="gallery-button <?php if ( wp_is_mobile() ) { echo 'mobile'; } ?> primary buttons" href="#">View Gallery</a>
				<img class="gallery--display-image" width='480' height='480' src="<?php echo esc_url( get_sub_field( 'gallery_tile_image' ) ); ?>" alt="<?php echo esc_attr( get_sub_field( 'gallery_name' ) ); ?>">
			</article>
			<article class="gallery-modal">
				<button class="gallery-close-button <?php if ( wp_is_mobile() ) { echo 'mobile'; } ?>">
					<img class="iconic" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/fonts/x.svg" alt="an x">
				</button>
				<h1 class="gallery-name"><?php the_sub_field( 'gallery_name' ); ?></h1>
				<div class="gallery-slider owl-carousel owl-theme">
					<?php if ( have_rows( 'gallery_images' ) ) : while ( have_rows( 'gallery_images' ) ) : the_row(); ?>
						<div class="gallery-slide">
							<?php if ( ! wp_is_mobile() ) : ?>
								<img src="<?php echo esc_url( get_sub_field( 'gallery_image' )['sizes']['large'] ); ?>">
							<?php else : ?>
								<img src="<?php echo esc_url( get_sub_field( 'gallery_image' )['sizes']['thumbnail'] ); ?>">
							<?php endif; ?>
							<!-- <h2 class="gallery--image-name"><?php the_sub_field( 'gallery_image_name' ); ?></h2> -->
						</div>
					<?php endwhile; endif; ?>
				</div>
				<!-- <p class="gallery-description"><?php the_sub_field( 'gallery_description' ); ?></p> -->
				<a class="load-next-gallery" href="#">Next Gallery</a>
			</article>
		</li>
	<?php endwhile; endif; ?>
</ul>
