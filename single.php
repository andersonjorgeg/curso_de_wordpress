<?php get_header(); ?>

  <div id="primary">
    <div id="main">
      <div class="container">
        <?php 
          while( have_posts()): the_post();
            get_template_part( 'template-parts/content', 'single');

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
