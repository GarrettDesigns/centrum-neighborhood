<?php while (have_posts()) : the_post(); ?>
  <section class="main-header">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>
<?php endwhile; ?>
