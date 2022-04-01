<!--//? mostrando os posts do loop -->
<!-- // post_class() - Retorna uma lista de classes para o post atual. -->
<article <?php post_class() ?>>

  <!-- the_title() - Exiba ou recupere o título da postagem atual com marcação opcional. -->
  <a href="<?php the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>
  <div class="meta-info">
    <!-- the_post_thumbnail() - Exiba a miniatura da postagem. -->
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(array(275, 275)); ?>
    </a>
    <p>
      <!-- get_the_date() - Recupere a data em que o post foi escrito. -->
      Published in <?php echo get_the_date(); ?>
      <!-- get_the_author() - Exibe um link HTML para a página do autor da postagem atual. -->
      by <?php the_author_posts_link(); ?>
    </p>
    <!-- the_category() - Exibe a lista de categorias para uma postagem em lista HTML ou formato personalizado. -->
    <p>Categories: <?php the_category(' '); ?> </p>
    <!-- the_tags() - Exibe as tags de uma postagem. -->
    <p><?php the_tags('Tags: ', ', '); ?></p>
    <!-- the_content() - Exiba o conteúdo da postagem. -->
  </div>
  <?php the_content() ?>
</article>