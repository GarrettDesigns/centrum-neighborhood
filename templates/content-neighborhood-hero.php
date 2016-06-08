<h2 class="neighborhood-hero--heading"><?php the_field( 'neighborhood_title' ); ?></h2>
<p class="neighborhood-hero--content">
  <?php the_field( 'neighborhood_content' ); ?>
</p>
<a href="#" class="map-modal-button primary buttons">check it out</a>
<article class="neighborhood-map-modal <?php if ( wp_is_mobile() ) { echo 'mobile'; } ?>">
  <button class="close-map">
    <img class="iconic" src="<?php echo get_template_directory_uri(); ?>/dist/fonts/x.svg" alt="an x">
  </button>
  <div class="map-legend">
    <h2 class="map-legend--title">welcome to<br> bucktown</h2>
    <ul class="map-legend--list">
      <li class="map-legend--list-item" data-category="restaurant"><span class="map-legend--icon restaurant"></span> restaurant &amp; bars</li>
      <li class="map-legend--list-item" data-category="grocery_or_supermarket"><span class="map-legend--icon grocery_or_supermarket"></span> grocery &amp; pharmacy</li>
      <li class="map-legend--list-item" data-category="gym"><span class="map-legend--icon gym"></span> fitness</li>
      <li class="map-legend--list-item" data-category="spa"><span class="map-legend--icon spa"></span> salon &amp; spa</li>
      <li class="map-legend--list-item" data-category="cafe"><span class="map-legend--icon cafe"></span> coffee shops</li>
      <li class="map-legend--list-item" data-category="school"><span class="map-legend--icon school"></span> education</li>
      <li class="map-legend--list-item" data-category="store"><span class="map-legend--icon store"></span> retail stores</li>
    </ul>
  </div>
  <div id="map"></div>
</article>
