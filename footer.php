  <footer>
    <div class="container">
      <div class="row">
        <div class="copyright col-sm-7 col-4">
          <p>Copyright</p>
        </div>
        <nav class="footer-menu col-sm-5 col-8 text-end">
          <?php wp_nav_menu( array( 'theme_location' => 'my_footer_menu' ) ); ?>
        </nav>
      </div>
    </div>
  </footer>
  <!-- wp_footer(); - serve para carregar os scripts do tema no rodapé do tema -->
  <?php wp_footer(); ?>
</body>
</html>