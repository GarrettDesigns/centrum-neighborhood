<?php while (have_posts()) : the_post(); ?>

  <article class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </article>

  <article class="amenities-hero">
    <article class="amenities--trap-article left">
      <h2 class="amenities--trap-heading">Section Title</h2>
      <p class="amenities--trap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
    </article>
  </article>

  <article class="amenities-main">
    <?php get_template_part('templates/content', 'amenities'); ?>
  </article>

  <article class="neighborhood-hero">
    <h2 class="neighborhood-hero--heading">the neighborhood</h2>
    <p class="neighborhood-hero--content">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.
    </p>
  </article>

  <article class="neighborhood-main">
    <?php get_template_part('templates/content', 'neighborhood'); ?>
  </article>

  <article class="features">
    <?php get_template_part('templates/content', 'features-main'); ?>
  </article>

  <article class="interior-view-one">
    <div class="interior-view-one--trapezoid">
      <article class="features--trap-article left">
        <h2 class="features--trap-heading">Section Title</h2>
        <p class="features--trap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
      </article>
    </div>
  </article>

  <article class="interior-view-two">
    <div class="interior-view-two--trap">
      <article class="interior-view-two--trap-article right">
        <h2 class="interior-view-two--trap-heading">Section Title</h2>
        <p class="interior-view-two--trap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
      </article>
    </div>
  </article>

  <article class="current-availability">
    <?php get_template_part('content', 'current-availability'); ?>
  </article>
<?php endwhile; ?>
