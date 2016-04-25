<h2 class="neighborhood-hero--heading"><?php the_field('neighborhood_title'); ?></h2>
<p class="neighborhood-hero--content">
  <?php the_field('neighborhood_content'); ?>
</p>
<a href="#" class="map-modal-button primary buttons">check it out</a>
<article class="neighborhood-map-modal <?php if(wp_is_mobile()) { echo "mobile"; } ?>">
  <button class="close-map">
    <img class="iconic" src="<?= get_template_directory_uri(); ?>/dist/fonts/x.svg" alt="an x">
  </button>
  <div class="map-legend">
    <h2 class="map-legend--title">welcome to<br> lakeview</h2>
    <ul class="map-legend--list">
      <li class="map-legend--list-item" data-category="dining"><span class="map-legend--icon dining"></span> restaurant &amp; bars</li>
      <li class="map-legend--list-item" data-category="grocery"><span class="map-legend--icon grocery"></span> grocery &amp; pharmacy</li>
      <li class="map-legend--list-item" data-category="fitness"><span class="map-legend--icon fitness"></span> fitness</li>
      <li class="map-legend--list-item" data-category="salon"><span class="map-legend--icon salon"></span> salon &amp; spa</li>
      <li class="map-legend--list-item" data-category="coffee"><span class="map-legend--icon coffee"></span> coffee shops</li>
      <li class="map-legend--list-item" data-category="education"><span class="map-legend--icon education"></span> education</li>
      <li class="map-legend--list-item" data-category="retail"><span class="map-legend--icon retail"></span> retail stores</li>
    </ul>
  </div>
  <div id="map"></div>
</article>
