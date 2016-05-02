<div class="amenities-main--content">
	<header class="amenities-main--heading"><span class="inner-heading">Amenities</span></header>
	<ul class="amenities-main--list">

		<?php if ( have_rows( 'amenity_slide' ) ) : while ( have_rows( 'amenity_slide' ) ) : the_row(); ?>
			<li class="amenities-main--list-item">
				<img src="<?php the_sub_field( 'amenity_icon' ); ?>" alt="a water faucet icon">
				<article class="amenity-description">
					<button class="amenity-close-button">
						<img class="iconic" data-src="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/fonts/x.svg" alt="an x">
					</button>
					<h2 class='amenity-description--title'><?php the_sub_field( 'amenity_title' ); ?></h2>
					<p class="amenity-description--text">
						<?php the_sub_field( 'amenity_description' ); ?>
					</p>
				</article>
			</li>
		<?php endwhile; endif; ?>

	</ul>
</div>
