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
      <section class="meddle-area">
        <div class="container">
          <div class="row">
            <div class="news col-md-8">
              <!-- criando loop wordpress -->
              <?php 
                // have_posts() - Determina se a consulta atual do WordPress tem postagens para fazer um loop.
                if ( have_posts() ):
                  // the_post() - Itere o índice de postagem no loop. 
                  while( have_posts() ): the_post();
                ?>
                <!--//? mostrando os posts do loop -->
                <!-- // get_template_part - Carrega uma peça de modelo em um modelo. -->
                <!-- // get_template_part( 'caminho sem .php' ); -->
                <!-- // get_post_format() - Retorna o formato de postagem atual. -->
                <?php get_template_part( 'template-parts/content', get_post_format()); ?>

                <?php
                  endwhile;
                // se não hover posts
                else:

              ?>
                <p>There's nothing yet to be displayed...</p>
              <?php endif; ?>
              <!-- fim do loop wordpress -->
            </div>
            <?php get_sidebar( 'blog' ); ?>
          </div>
        </div>
      </section>
    </main>
  </div>
<!-- get_footer(); - serve para chamar o footer.php do tema -->
<?php get_footer(); ?>
