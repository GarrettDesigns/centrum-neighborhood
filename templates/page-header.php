
<header class="page-header">
  <span class="color-overlay">
  <section class="page-header--content">

    <span class="menu-icon"></span>

    <?php
      $menu_args = array(
        'menu_class' => 'main-menu',
        'container' => 'nav',
        'theme_location' => 'primary_navigation'
      );
      wp_nav_menu($menu_args);
    ?>

    <ul class="info-links">
      <li class="info-links--item"><a class="info-links--inner error buttons" href="#">contact us</a></li>
      <li class="info-links--item"><a class="info-links--inner primary buttons" href="#">check availability</a></li>
    </ul>

  </section>

    <div class="site-logo--container">
      <img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/centrum-lakeview-logo.png" alt="Centrum Lakview Logo">
    </div>
</span>
</header>
