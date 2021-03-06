</article><?php get_header(); ?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
<div class="content-area">
  <main>
    <section class="meddle-area">
      <div class="container">
        <div class="row">
          <div class="tag col-md-8">
            <?php
              the_archive_title( '<h1 class="tag-title">', '</h1>' );
              the_archive_description( '<p>', '</p>' );
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>
                <?php get_template_part('template-parts/content', 'tag'); ?>

              <?php
              endwhile;
              ?>
              <div class="row">
                <div class="pages text-start col-6">
                  <?php previous_posts_link('<< Newer Posts'); ?>
                </div>
                <div class="pages text-end col-6">
                  <?php next_posts_link('Older Posts >>'); ?>
                </div>
              </div>

            <?php
            else :

            ?>
              <p>There's nothing yet to be displayed...</p>
            <?php endif; ?>
          </div>
          <?php get_sidebar('blog'); ?>
        </div>
      </div>
    </section>
  </main>
</div>
<?php get_footer(); ?>