<?php get_header(); ?>

  <div id="primary">
    <div id="main">
      <div class="container">
        <?php 
          while( have_posts()): the_post();
            get_template_part( 'template-parts/content', 'single');
        ?>
            <!-- Paginação -->
          <div class="row">
            <div class="pages text-start col-6">
              <!-- next_post_link() -> Exibe o link da próxima postagem adjacente à postagem atual. -->
              <?php next_post_link('&laquo; %link'); ?>
            </div>
            <div class="pages text-end col-6">
              <!-- previous_post_link() -> Exibe o link da postagem anterior adjacente à postagem atual. -->
              <?php previous_post_link('%link &raquo;'); ?>
            </div>
          </div>
          <?php
            // comments_open() -> Determina se a postagem atual está aberta para comentários.
            // get_comments_number() -> Recupera a quantidade de comentários de uma postagem.
            if ( comments_open() || get_comments_number() ):
              // comments_template() -> Carrega o modelo de comentário especificado em $file.
              comments_template();
            endif;
          endwhile;
          ?>
      </div>
    </div>
  </div>
  
<?php get_footer(); ?>
