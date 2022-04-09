<article <?php post_class() ?>>
  <a href="<?php the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>
  <div class="meta-info">
    <p>
      <?php _e('by', 'wpcurso') ?> <?php the_author_posts_link(); ?>
    </p>
    <!-- mostra a categoria se tiver -->
    <!-- has_category() -> Verifica se a postagem atual tem alguma categoria determinada. -->
    <?php if(has_category()): ?>
      <p><?php _e('Categories:', 'wpcurso') ?> <?php the_category(' '); ?> </p>
    <?php endif; ?>
    <p><?php the_tags( __('Tags: ', 'wpcurso'), ', '); ?></p>
  </div>
  <?php the_excerpt() ?>
</article>