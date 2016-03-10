<?php while (have_posts()) : the_post(); ?>
  <section class="main-header">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>

  <section class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </section>

  <section class="amenities-hero">
  </section>

  <section class="amenities-main">
  </section>

  <section class="neighborhood-hero">
    <h2 class="neighborhood-hero--heading">the neighborhood</h2>
    <p class="neighborhood-hero--content">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.
    </p>
  </section>

  <section class="neighborhood-main">
    <ul class="neighborhood-main--lifstyle-list">
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">party room</span></li>
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">aquanaut brewery</span></li>
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">bow truss coffee roasters</span></li>
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">energy efficient</span></li>
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">transportation oriented</span></li>
      <li class="neighborhood-main--lifestyle-list-item"><span class="list-item--text">acoustically treated windows</span></li>
    </ul>
  </section>

  <section class="features">
    <h2 class="feetures-list--heading">Features</h2>
    <ul class="features-list">
      <li class="features-list--item">State-of-the-art fitness center</li>
      <li class="features-list--item">Party room with kitchenette, internet café
and billiards table</li>
      <li class="features-list--item">Outdoor terrace with lounge seating, private
BBQ cooking station and fire pit</li>
      <li class="features-list--item">Pressbox lockers</li>
      <li class="features-list--item">Luxer One package storage room</li>
      <li class="features-list--item">Bike parking and bike maintenance
equipment for urban cyclists</li>
      <li class="features-list--item">The building will have 7 interior and 1
exterior parking spaces. The outside parking
space will be reserved for a “car-sharing”
vehicle&mdash;Enterprise CarShare or Zipcar&mdash;
for eco-friendly travel</li>
      <li class="features-list--item">Two full service elevators
</li>
      <li class="features-list--item">A loading dock is provided off the
alley to the west for moving and
delivery of large items
</li>
      <li class="features-list--item">Professionally managed building</li>
      <li class="features-list--item">Building will be Energy Star certified</li>
      <li class="features-list--item">SNew Bow Truss Coffee location on
the ground floor
</li>
      <li class="features-list--item">Additional Restaurant/Retail users on
ground floor retail space
</li>
      <li class="features-list--item">Building is a Transportation Oriented
Development (TOD) taking advantage of
its proximity to public transportation and
Paulina Brown Line stop</li>
      <li class="features-list--item">Building recycling program</li>
      <li class="features-list--item">Energy efficient windows and expansive
glass for natural daylight</li>
      <li class="features-list--item">Non-smoking building</li>
      <li class="features-list--item">Free Wi-Fi in amenity areas</li>
      <li class="features-list--item">Acoustically treated windows on the
north side to help mitigate L noise</li>
      <li class="features-list--item">Pet-Friendly</li>
    </ul>
  </section>
<?php endwhile; ?>
