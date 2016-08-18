
<style media="screen">
  .amenities-hero .background-image {
    z-index: -1;
    background: url('<?php echo get_field('callout_one_background'); ?>');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-filter: saturate(.25);
    filter: saturate(.25);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .interior-view-one .background-image {
    background-image: url('<?php echo get_field('callout_two_background'); ?>');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

  }
  .interior-view-two .background-image {
    background-image: url('<?php echo get_field('callout_three_background'); ?>');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

  }
  @media screen and (max-width: 450px) {
    .interior-view-two {
      background-position: -780px center;
    }
  }
</style>

<?php while (have_posts()) : the_post(); ?>
  <article id="ourmission" class="mission-body">
    <?php get_template_part('templates/page', 'body'); ?>
  </article>

  <article class="amenities">
    <section class="amenities-hero">
      <div class="background-image"></div>
      <?php get_template_part('templates/content', 'amenities-trap'); ?>
    </section>
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

  <article class="vendor-logos">
    <?php get_template_part('templates/content', 'vendor-logos'); ?>
  </article>

  <article class="interior-view-one">
    <div class="background-image"></div>
    <?php get_template_part('templates/content', 'interior-trap'); ?>
  </article>

  <article class="interior-view-two">
    <div class="background-image"></div>
    <?php get_template_part('templates/content', 'interior-trap-two'); ?>
  </article>

  <article id="availability" class="current-availability">
    <?php get_template_part('templates/content', 'current-availability'); ?>
  </article>

  <article class="contact-us">
    <div class="background-image"></div>
    <?php get_template_part('templates/content', 'contact-us'); ?>
  </article>

<?php endwhile; ?>
