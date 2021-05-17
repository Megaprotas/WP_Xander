<div class="hidden-class container-fluid p-0">
  <div class="row no-gutters"> 
    <div class="col-md-8 offset-md-2 col-xs-12" style="padding-left: 0px;">
      <div class="flexslider">
        <ul class="slides">
        <?php
          for ($i=1; $i < 4; $i++) { 
            $slider_page[$i] = get_theme_mod('set_slider_page' . $i);
            $slider_button_text[$i] = get_theme_mod('set_slider_button_text' . $i);
            $slider_url[$i] = get_theme_mod('set_slider_url' . $i);
          }

          $args = array(
            'post_type'       => 'page',
            'posts_per_page'  => 3,
            'post__in'        => $slider_page,
            'orderby'         => 'post__in'
          );

          $sliderLoop = new WP_Query($args);
          $i = 1;
          if ($sliderLoop->have_posts()) {
              while ($sliderLoop->have_posts()) {
                  $sliderLoop->the_post(); ?>
                  <li class='post-list post-styles-all'>
                      <div class='slider-container' style='height: 450px;'>
                        <?php the_post_thumbnail('sliderImage', array('classs' => 'fluid-img')); ?>
                        <div class="slider-inner-container">
                          <h2 class="common-slider-styles"><?php the_title(); ?></h2>
                          <p class="common-slider-styles" style='font-size: 24px;'><?php echo wp_trim_words(get_the_content(), 5); ?></p>
                          <button class="btn slider-button">
                            <a href="<?php echo $slider_url[$i]; ?>"><?php echo $slider_button_text[$i]; ?></a>
                          </button>
                        </div>
                      </div>
                  </li>
          <?php
              $i++;
            }
            wp_reset_postdata();
          }
        ?>
        </ul>
      </div>
    </div>
  </div>
</div>