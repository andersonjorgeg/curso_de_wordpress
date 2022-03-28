<article <?php post_class( array( 'class' => 'secondary'))?>>
  <h2><?php the_title(); ?></h2>
  <div class="thumbnail">
    <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
  </div>
  <div class="meta-info">
    <p>
      by <span><?php the_author_posts_link(); ?></span>
      Categories: <span><?php the_category( ' ' ); ?></span> 
      <?php the_tags( 'Tags: <span>', ', ', '</span>' ); ?>
    </p>
  </div>
  <!-- the_excerpt() - Mostra o resumo do post. -->
  <!-- the_permalink() - Mostra o link do post. -->
  <a href="<?php the_permalink(); ?>" class=""><?php the_excerpt(); ?></a>
</article>