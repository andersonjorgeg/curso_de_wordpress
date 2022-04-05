<?php get_header(); ?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
<div class="content-area">
  <main>
    <section class="meddle-area">
      <div class="container">
        <div class="row">
          <div class="error-404">
            <header>
              <h1>Page not found</h1>
              <p>Unfortunately, the page you tried to reach does not exist on this site</p>
            </header>
            <div class="error">
              <p>How about doing a search?</p>
              <?php get_search_form(); ?>
              <!-- the_widget() -> Emita um widget arbitrário como uma tag de modelo. -->
              <!-- WP_Widget_Recent_Posts -> Classe principal usada para implementar um widget de postagens recentes. -->
              <?php 
                $args_recent_posts = array('title' => 'Latest Posts', 'number' => 3);
                the_widget('WP_Widget_Recent_Posts', $args_recent_posts); 
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>
<?php get_footer(); ?>