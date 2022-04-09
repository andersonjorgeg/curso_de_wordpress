<article <?php post_class() ?>>
  <a href="<?php the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>
  <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail(array(275, 275)); ?>
  </a>
  <div class="meta-info">
    <p>
    <?php _e('by', 'wpcurso'); ?> <?php the_author_posts_link(); ?>
    </p>
    <p><?php _e('Categories:' , 'wpcurso'); ?> <?php the_category(' '); ?> </p>
    <p><?php the_tags( __('Tags: ', 'wpcurso'), ', '); ?></p>
  </div>
  <?php the_content() ?>
</article>