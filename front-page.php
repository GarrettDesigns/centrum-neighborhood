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
    <ul class="amenities-main--list">
      <li class="amenities-main--heading">Amenities</li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/house.svg" alt="a house icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/barbell.svg" alt="a barbell icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/swimming.svg" alt="a swimming icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/washer.svg" alt="a washer icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bicycle.svg" alt="a bicycle icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/envelope.svg" alt="an envelope icon"></li>
      <li class="amenities-main--list-item"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/coffee.svg" alt="a coffee icon"></li>
    </ul>
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
    <div class="features--trapezoid">
      <article class="features--trap-article right">
        <h2 class="features--trap-heading">Section Title</h2>
        <p class="features--trap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
      </article>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-trapezoid.svg" alt="blue trapezoid">
    </div>
    <article class="features-list">
    <h2 class="features-list--heading">Features</h2>
    <ul>
      <li class="features-list--column">
        <ul>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> State-of-the-art fitness center</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Party room with kitchenette, internet café
    and billiards table</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Outdoor terrace with lounge seating, private
    BBQ cooking station and fire pit</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Pressbox lockers</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Luxer One package storage room</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Bike parking and bike maintenance
    equipment for urban cyclists</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> The building will have 7 interior and 1
    exterior parking spaces. The outside parking
    space will be reserved for a “car-sharing”
    vehicle&mdash;Enterprise CarShare or Zipcar&mdash;
    for eco-friendly travel</p></li>
        </ul>
      </li>
      <li class="features-list--column">
        <ul>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Two full service elevators
          </li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> A loading dock is provided off the
    alley to the west for moving and
    delivery of large items
  </p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Professionally managed building</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Building will be Energy Star certified</p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> SNew Bow Truss Coffee location on
    the ground floor
  </p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Additional Restaurant/Retail users on
    ground floor retail space
  </p></li>
          <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Building is a Transportation Oriented
    Development (TOD) taking advantage of
    its proximity to public transportation and
    Paulina Brown Line stop</p></li>
  </ul>
</li>
<li class="features-list--column">
  <ul>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Building recycling program</p></li>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Energy efficient windows and expansive
glass for natural daylight</p></li>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Non-smoking building</p></li>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Free Wi-Fi in amenity areas</p></li>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Acoustically treated windows on the
north side to help mitigate L noise</p></li>
      <li class="features-list--item"><i class="fa fa-check-circle-o"></i><p> Pet-Friendly</p></li>
    </ul>
  </li>
</ul>
</article>
  </section>

  <section class="interior-view-one">
    <div class="interior-view-one--trapezoid">
      <article class="features--trap-article left">
        <h2 class="features--trap-heading">Section Title</h2>
        <p class="features--trap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
      </article>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/interior-trapezoid.svg" alt="a trapezoid">
    </div>
  </section>

  <section class="interior-view-two">

  </section>

  <section class="current-availability">
    <h2 class="current-availability--heading">Current Availability</h2>
    <ul class="bedroom-options">
      <li class="bedroom-options--label">Number of Bedrooms</li>
      <li class="bedroom-options--item">All</li>
      <li class="bedroom-options--item">1</li>
      <li class="bedroom-options--item">2</li>
    </ul>
    <ul class="availability-table">
      <li class="availability-table--head">
        <li class="availability-table--head-cell">Apartment</li>
        <li class="availability-table--head-cell">Bedrooms</li>
        <li class="availability-table--head-cell">Bathrooms</li>
        <li class="availability-table--head-cell">Size</li>
        <li class="availability-table--head-cell">Rent</li>
        <li class="availability-table--head-cell">Floorplan</li>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
      <li class="availability-table--row">
        <span class="availability-table--cell">100</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">2</span>
        <span class="availability-table--cell">1541 sq ft</span>
        <span class="availability-table--cell">$3,200,000</span>
        <span class="availability-table--cell">View</span>
      </li>
    </ul>
  </section>
<?php endwhile; ?>
