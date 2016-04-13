<main class="features-list">
  <h2 class="features-list--heading">Features</h2>
  <ul class="features-list--columns">
    <?php if( have_rows('features_list_items') ) : while( have_rows('features_list_items') ) : the_row(); ?>
      <li  class="features-list--column">
        <ul>
          <?php if( have_rows('features_list_column_one') ) : while( have_rows('features_list_column_one') ) : the_row(); ?>
            <li class="features-list--item"><i class="fa fa-check-circle-o"></i> <?php the_sub_field('features_list_item'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
      </li>
      <li class="features-list--column">
        <ul>
          <?php if( have_rows('features_list_column_two') ) : while( have_rows('features_list_column_two') ) : the_row(); ?>
            <li class="features-list--item"><i class="fa fa-check-circle-o"></i> <?php the_sub_field('features_list_item'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
      </li>
      <li class="features-list--column">
        <ul>
          <?php if( have_rows('features_list_column_three') ) : while( have_rows('features_list_column_three') ) : the_row(); ?>
            <li class="features-list--item"><i class="fa fa-check-circle-o"></i> <?php the_sub_field('features_list_item'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
      </li>
    <?php endwhile; endif; ?>
  </ul>
</main>
