<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <header id="top" class="main-header">
      <?php get_template_part('templates/page', 'header'); ?>
    </header><!-- /.main-header -->
      <main class="main-site-container" role="main">
        <?php include Wrapper\template_path(); ?>
      </main><!-- /.main -->
      <footer class="content-info" role="contentinfo">
        <?php
          do_action('get_footer');
          get_template_part('templates/footer');
        ?>
      </footer><!-- /.content-info -->
    <?php wp_footer(); ?>
  </body>
</html>
