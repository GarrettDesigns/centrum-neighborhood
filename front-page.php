<?php while (have_posts()) : the_post(); ?>
  <section class="main-header">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>
  <section class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </section>
  <section class="amenities-hero">

  </section>
<?php endwhile; ?>
