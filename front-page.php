<?php while (have_posts()) : the_post(); ?>

  <article class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </article>

  <article class="amenities-hero">
    <?php get_template_part('templates/content', 'amenities-trap'); ?>
  </article>

  <article class="amenities-main">
    <?php get_template_part('templates/content', 'amenities'); ?>
  </article>

  <article class="neighborhood-hero">
    <?php get_template_part('templates/content', 'neighborhood-hero'); ?>
  </article>

  <article class="neighborhood-main">
    <?php get_template_part('templates/content', 'neighborhood'); ?>
  </article>

  <article class="features">
    <?php get_template_part('templates/content', 'features-main'); ?>
  </article>

  <article class="interior-view-one">
    <?php get_template_part('templates/content', 'interior-trap'); ?>
  </article>

  <article class="interior-view-two">
    <?php get_template_part('templates/content', 'interior-trap-two'); ?>
  </article>

  <article class="current-availability">
    <?php get_template_part('templates/content', 'current-availability'); ?>
  </article>

<?php endwhile; ?>
