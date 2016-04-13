<h2 class="neighborhood-hero--heading"><?php the_field('neighborhood_title'); ?></h2>
<p class="neighborhood-hero--content">
  <?php the_field('neighborhood_content'); ?>
</p>
<a href="#" class="map-modal-button primary buttons">check it out</a>
<article class="neighborhood-map-modal">
  <button class="close-map">
    <img class="iconic" data-src="<?= get_template_directory_uri(); ?>/dist/fonts/x.svg" alt="an x">
  </button>
  <div class="map-legend">
    <h2 class="map-legend--title">welcome to<br> lakeview</h2>
    <ul class="map-legend--list">
      <li class="map-legend--list-item"><span class="map-legend--icon dining"></span> restaurant</li>
      <li class="map-legend--list-item"><span class="map-legend--icon grocery-pharmacy"></span> grocery/pharmacy</li>
      <li class="map-legend--list-item"><span class="map-legend--icon fitness"></span> fitness</li>
      <li class="map-legend--list-item"><span class="map-legend--icon salon-spa"></span> salon/spa</li>
      <li class="map-legend--list-item"><span class="map-legend--icon coffee-shops"></span> coffee shops</li>
      <li class="map-legend--list-item"><span class="map-legend--icon education"></span> education</li>
      <li class="map-legend--list-item"><span class="map-legend--icon retail-stores"></span> retail stores</li>
    </ul>
  </div>
  <div id="map"></div>
</article>
