<?php if (is_active_sidebar('sidebar-2')) : ?>

  <aside class="sidebar col-md-4 h-100">
    <?php dynamic_sidebar('sidebar-2') ?>
  </aside>
<?php else : ?>
  <p>
    <?php _e('There&rsquo;s nothing yet to be displayed...',  'wpcurso'); ?>
  </p>
<?php endif; ?>