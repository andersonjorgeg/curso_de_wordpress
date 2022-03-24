<!-- get_header(); - serve para chamar o header.php do tema -->
<?php get_header(); ?>
<!-- header_image(); - Exibe o URL da imagem do cabeçalho. -->
<!-- get_custom_header(); - Obtém os dados da imagem do cabeçalho. -->
<img 
  class="img-fluid"
  src="<?php header_image(); ?>" 
  height="<?php echo get_custom_header()->height; ?>"
  width="<?php echo get_custom_header()->width; ?>"
  alt=""
/>  
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
            <aside class="sidebar col-md-4">Barra Lateral</aside>
            <div class="news col-md-8">
              <!-- criando loop wordpress -->
              <?php 
                // have_posts() - Determina se a consulta atual do WordPress tem postagens para fazer um loop.
                if ( have_posts() ):
                  // the_post() - Itere o índice de postagem no loop. 
                  while( have_posts() ): the_post();
                ?>
                <!-- mostrando os posts do loop -->
                <article>
                  <!-- the_title() - Exiba ou recupere o título da postagem atual com marcação opcional. -->
                  <h2><?php the_title(); ?></h2>
                  
                  <p>
                    <!-- get_the_date() - Recupere a data em que o post foi escrito. -->
                    Published in <?php echo get_the_date();?> 
                    <!-- get_the_author() - Exibe um link HTML para a página do autor da postagem atual. -->
                  by <?php the_author_posts_link(); ?>
                  </p>
                  <!-- the_category() - Exibe a lista de categorias para uma postagem em lista HTML ou formato personalizado. -->
                  <p>Categories: <?php the_category( ' ' ); ?> </p>
                  <!-- the_tags() - Exibe as tags de uma postagem. -->
                  <p><?php the_tags( 'Tags: ', ', ' ); ?></p>
                  <!-- the_content() - Exiba o conteúdo da postagem. -->
                  <?php the_content() ?>
                </article>

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
