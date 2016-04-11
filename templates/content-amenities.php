<div class="amenities-main--content">
  <header class="amenities-main--heading"><span class="inner-heading">Amenities</span></header>
  <ul class="amenities-main--list">

    <?php if( have_rows('amenity_slide') ) : while( have_rows('amenity_slide') ) : the_row(); ?>
      <li class="amenities-main--list-item">
        <img src="<?php the_sub_field('amenity_icon'); ?>" alt="a water faucet icon">
        <article class="amenity-description">
          <button class="amenity-close-button">
            <svg width="100%" height="100%" viewBox="0 0 60 60" preserveAspectRatio="none">
    					<g class="icon">
    						<line x1="4.5" y1="55.5" x2="54.953" y2="5.046"/>
    						<line x1="54.953" y1="55.5" x2="4.5" y2="5.047"/>
    					</g>
    				</svg>
          </button>
          <h2 class='amenity-description--title'><?php the_sub_field('amenity_title'); ?></h2>
          <p class="amenity-description--text">
            <?php the_sub_field('amenity_description'); ?>
          </p>
        </article>
      </li>
    <?php endwhile; endif; ?>
    
  </ul>
</div>
