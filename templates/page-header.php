
<div class="page-header">
  <section class="page-header-content">
    <?php
      $menu_args = array(
        'menu_class' => 'main-menu',
        'container' => 'nav',
        'theme_location' => 'primary_navigation'
      );
      wp_nav_menu($menu_args);
    ?>
    <ul class="info-links">
      <li><a href="#">contact us</a></li>
      <li><a href="#">check availability</a></li>
    </ul>
  </section>
</div>
