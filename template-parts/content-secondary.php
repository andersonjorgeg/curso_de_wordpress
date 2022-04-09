<article <?php post_class( array( 'class' => 'secondary'))?>>
  <div class="thumbnail">
  <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
  </a>
  </div>
  <a href="<?php the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>
  <div class="meta-info">
    <p>
      <?php _e('by', 'wpcurso'); ?> <span><?php the_author_posts_link(); ?></span>
      <?php _e('Categories:' , 'wpcurso'); ?> <span><?php the_category( ' ' ); ?></span> 
      <p><?php the_tags( __('Tags: ', 'wpcurso'), ', '); ?></p>
    </p>
  </div>
  <!-- the_excerpt() - Mostra o resumo do post. -->
  <?php the_excerpt(); ?>
</article>