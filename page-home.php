<!-- get_header(); - serve para chamar o header.php do tema -->
<?php get_header(); ?>

  <div class="content-area">
    <main>
      <section class="slide">
        <div class="container">
          <div class="row">Slide</div>
        </div>
      </section>
      <section class="services">
        <div class="container">
          <div class="row">Serviços</div>
        </div>
      </section>
      <section class="meddle-area">
        <div class="container">
          <div class="row">
            <!-- get_sidebar() - Carregar modelo de barra lateral. -->
            <!-- get_sidebar( 'name' ); -->
            <?php get_sidebar( 'home' ); ?>
            <div class="news col-md-8">
              <!-- criando loop wordpress -->
              <?php 
                // have_posts() - Determina se a consulta atual do WordPress tem postagens para fazer um loop.
                if ( have_posts() ):
                  // the_post() - Itere o índice de postagem no loop. 
                  while( have_posts() ): the_post();
                ?>
                <p>Conteúdo vindo do arquivo page-home.php</p>
                <?php
                  endwhile;
                // se não hover posts
                else:

              ?>
                <p>There's nothing yet to be displayed...</p>
              <?php endif; ?>
              <!-- fim do loop wordpress -->
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
