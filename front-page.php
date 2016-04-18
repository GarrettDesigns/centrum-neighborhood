
<?php while (have_posts()) : the_post(); ?>
  <article id="ourmission" class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </article>

  <article class="amenities">
    <section class="amenities-hero">
      <?php get_template_part('templates/content', 'amenities-trap'); ?>
    </section>
    <!-- <section id="amenities" class="amenities-main">
      <?php get_template_part('templates/content', 'amenities'); ?>
    </section> -->
  </article>

  <article id="neighborhood" class="neighborhood-hero">
    <?php get_template_part('templates/content', 'neighborhood-hero'); ?>
  </article>

  <article id="gallery" class="neighborhood-main">
    <?php get_template_part('templates/content', 'neighborhood'); ?>
  </article>

  <article id="features" class="features">
    <?php get_template_part('templates/content', 'features-main'); ?>
  </article>

  <article class="interior-view-one">
    <?php get_template_part('templates/content', 'interior-trap'); ?>
  </article>

  <article class="interior-view-two">
    <?php get_template_part('templates/content', 'interior-trap-two'); ?>
  </article>

  <article id="availability" class="current-availability">
    <?php get_template_part('templates/content', 'current-availability'); ?>
  </article>

<?php endwhile; ?>
