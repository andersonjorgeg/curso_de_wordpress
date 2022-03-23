<?php 

/* 

Template Name: General Template

*/

?>

<!-- get_header(); - serve para chamar o header.php do tema -->
<?php get_header(); ?>

  <div class="content-area">
    <main>
      <section class="meddle-area">
        <div class="container">
          <div class="general-template">
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
      </section>
    </main>
  </div>
<!-- get_footer(); - serve para chamar o footer.php do tema -->
<?php get_footer(); ?>
