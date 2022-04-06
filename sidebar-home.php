<!--  is_active_sidebar() - Determina se uma barra lateral contém widgets. -->
<!-- if ( is_active_sidebar( 'id' ) ): -->
<?php if (is_active_sidebar( 'sidebar-1' )): ?>

  <aside class="sidebar search col-md-4 h-100">
    <!-- dynamic_sidebar() - Exibir barra lateral dinâmica. -->
    <!-- dynamic_sidebar( 'id' ); -->
    <?php dynamic_sidebar( 'sidebar-1' ) ?>
  </aside>
<?php else: ?>
  <p>There's nothing yet to be displayed...</p>
<?php endif; ?>