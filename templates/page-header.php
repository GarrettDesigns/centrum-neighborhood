<section class="nav-items-group">
	<span class="main-menu-close"><img class="iconic" data-src="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/fonts/x.svg" alt="an x"></span>
	<?php
	$menu_args = array(
		'menu_class' => 'main-menu',
		'container' => 'nav',
		'theme_location' => 'primary_navigation',
	);
	wp_nav_menu( $menu_args );
	?>
</section>

<section class="page-header">
    <div class="background-image"></div>
	<article class="site-logo--container">
		<img class="site-logo" src="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/images/centrum-bucktown.svg" alt="Centrum Bucktown Logo">
		<p class="tagline"><?php the_field( 'tagline' ); ?></p>
	</article>

	<div class="color-overlay"></div>
	<nav class="page-header--content">
		<span class="menu-icon"></span>
		<ul class="info-links">
			<li class="info-links--item">
				<a class="info-links--inner error buttons" href="#availability">check availability</a>
			</li>
			<li class="info-links--item">
				<a class="info-links--inner primary buttons" href="#">resident portal</a>
			</li>
            <li class="info-links--item">
            <a href="#" class="info-links--inner"><img src="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/images/train.svg"></a>
            </li>
		</ul>
	</nav>
</section>
