<!-- get_header(); - serve para chamar o header.php do tema -->
<?php get_header(); ?>

  <div class="content-area">
    <main>
      <section class="slide">
        <!-- do_shortcode - Executa um código de shortcode. -->
       <?php echo do_shortcode( '[recent_post_slider design="design-2" limit="5"]' ) ?>
      </section>
      <section class="services">
        <div class="container">
          <h1>Our Services</h1>
          <div class="row">
            <div class="col-sm-4">
              <div class="services-item">
                <!-- chamando os widgets de serviços -->
                <?php 
                  if(is_active_sidebar( 'services-1' )){
                    dynamic_sidebar( 'services-1' );
                  }
                ?>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="services-item">
              <?php 
                  if(is_active_sidebar( 'services-2' )){
                    dynamic_sidebar( 'services-2' );
                  }
                ?>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="services-item">
                <?php 
                  if(is_active_sidebar( 'services-3' )){
                    dynamic_sidebar( 'services-3' );
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
            <?php get_sidebar( 'home' ); ?>
            <div class="news col-md-8">
              <div class="container">
                <h1>Latest News</h1>
                <div class="row">
                  <!-- loop para mostra o último post  -->
                  <!-- WP_Query - Classe para buscar posts no banco de dados. -->
                  <?php 
                    $featured = new WP_Query( 
                      // query string - serve para filtrar os posts
                      'post_type=post&posts_per_page=1&cat=12,6' 
                    );

                    if($featured->have_posts()):
                      while($featured->have_posts()): $featured->the_post();
                  ?>
                  
                    <div class="col-12">
                      <?php get_template_part( 'template-parts/content', 'featured' ); ?>
                    </div>
                    
                  <?php
                      endwhile;
                      // wp_reset_postdata(); - serve para limpar o loop
                      wp_reset_postdata();
                    endif;

                    // segundo loop para mostrar os posts
                    $args = array(
                      'post_type' => 'post',
                      'posts_per_page' => 2,
                      'category__not_in' => array(9),
                      'category__in' => array(12,6),
                      'offset' => 1
                    );
                    $secondary = new WP_Query($args);

                    if($secondary->have_posts()):
                      while($secondary->have_posts()): $secondary->the_post();
                  ?>
                    <div class="col-sm-6">
                      <?php get_template_part( 'template-parts/content', 'secondary' ); ?>
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
        <div class="container">
          <div class="row">Mapa</div>
        </div>
      </section>
    </main>
  </div>
<!-- get_footer(); - serve para chamar o footer.php do tema -->
<?php get_footer(); ?>
