<!-- get_header(); - serve para chamar o header.php do tema -->
<?php get_header(); ?>

<div class="content-area">
  <main>
    <section class="slide">
      <!-- do_shortcode() - Executa um código de shortcode. -->
      <?php
      $design = get_theme_mod('set_slider_option');
      $limit = get_theme_mod('set_slider_limit');
      echo do_shortcode('[recent_post_slider design="design-' . $design . '" limit="' . $limit . '" category="12"]');
      ?>
    </section>
    <section class="services">
      <div class="container">
        <h1>Our Services</h1>
        <div class="row">
          <div class="col-sm-4">
            <div class="services-item">
              <!-- chamando os widgets de serviços -->
              <?php
              if (is_active_sidebar('services-1')) {
                dynamic_sidebar('services-1');
              }
              ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services-item">
              <?php
              if (is_active_sidebar('services-2')) {
                dynamic_sidebar('services-2');
              }
              ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="services-item">
              <?php
              if (is_active_sidebar('services-3')) {
                dynamic_sidebar('services-3');
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="meddle-area">
      <div class="container">
        <div class="row">
          <!-- get_sidebar() - Carregar modelo de barra lateral. -->
          <!-- get_sidebar( 'name' ); -->
          <?php get_sidebar('home'); ?>
          <div class="news col-md-8">
            <div class="container">
              <h1>Latest News</h1>
              <div class="row">
                <!-- loop para mostra o último post  -->
                <!-- WP_Query - Classe para buscar posts no banco de dados. -->
                <?php
                $loop1cats = get_theme_mod('set_loop1_categories');

                $featured = new WP_Query(
                  // query string - serve para filtrar os posts
                  'post_type=post&posts_per_page=1&cat=' . $loop1cats
                );

                if ($featured->have_posts()) :
                  while ($featured->have_posts()) : $featured->the_post();
                ?>

                    <div class="col-12">
                      <?php get_template_part('template-parts/content', 'featured'); ?>
                    </div>

                  <?php
                  endwhile;
                  // wp_reset_postdata(); - serve para limpar o loop
                  wp_reset_postdata();
                endif;

                $per_page = get_theme_mod( 'set_loop2_posts_per_page' );
                // explode - divide uma string em um array
                // explode(' separador ', string)
                $loop2_cat_exclude = explode(',', get_theme_mod('set_loop2_categories_to_exclude'));
                $loop2_cat_include = explode(',', get_theme_mod('set_loop2_categories_to_include'));

                // segundo loop para mostrar os posts
                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => $per_page,
                  'category__not_in' => $loop2_cat_exclude, // 9
                  'category__in' =>  $loop2_cat_include, // 12, 6
                  'offset' => 1
                );
                $secondary = new WP_Query($args);

                if ($secondary->have_posts()) :
                  while ($secondary->have_posts()) : $secondary->the_post();
                  ?>
                    <div class="col-sm-6">
                      <?php get_template_part('template-parts/content', 'secondary'); ?>
                    </div>
                <?php
                  endwhile;
                  wp_reset_postdata();
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="map">
      <?php
      // chamando o mapa do google
      // urlencode() - codifica uma string para uma URL.
      $address = get_theme_mod('set_map_address');

      ?>
      <iframe src="<?php echo $address ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
  </main>
</div>
<!-- get_footer(); - serve para chamar o footer.php do tema -->
<?php get_footer(); ?>