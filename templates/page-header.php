<section class="nav-items-group">
  <span class="main-menu-close"><img class="iconic" data-src="<?= get_template_directory_uri(); ?>/dist/fonts/x.svg" alt="an x"></span>
  <?php
  $menu_args = array(
    'menu_class' => 'main-menu',
    'container' => 'nav',
    'theme_location' => 'primary_navigation'
  );
  wp_nav_menu($menu_args);
  ?>
</section>

<section class="page-header">
  <article class="site-logo--container">
    <img class="site-logo" src="<?= get_template_directory_uri(); ?>/dist/images/centrum-lakeview-logo.png" alt="Centrum Lakview Logo">
    <p class="tagline"><?php the_field('tagline'); ?></p>
  </article>

  <div class="color-overlay"></div>
  <nav class="page-header--content">
    <span class="menu-icon"></span>
    <ul class="info-links">
      <li class="info-links--item">
        <a class="info-links--inner error buttons" href="#contact">contact us</a>
      </li>
      <li class="info-links--item">
        <a class="info-links--inner primary buttons" href="#availability">check availability</a>
      </li>
    </ul>
  </nav>
</section>
