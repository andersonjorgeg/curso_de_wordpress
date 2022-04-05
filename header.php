<!DOCTYPE html>
<!-- language_attributes() -> Exibe os atributos de idioma para a tag 'html'. -->
<html <?php language_attributes() ?>>
<head>
  <!-- bloginfo() -> Exibe informações sobre o site atual. -->
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- wp_head() - serve para carregar os scripts do tema -->
  <?php wp_head(); ?>
</head>
<!-- body_class(); - mostra o nome da classe do body -->
<body <?php body_class(); ?>>
  <header>
    <section class="top-bar">
      <div class="container">
        <div class="row">
          <div class="social-media-icons col-xl-9 col-sm-7 col-6">
            <?php
              if(is_active_sidebar('social-media')){
                dynamic_sidebar('social-media');
              }
            ?>
          </div>
          <div class="search col-xl-3 col-sm-5 col-6 text-end">
            <?php
              // get_search_form() -> Exibir formulário de pesquisa.
              get_search_form();
            ?>
          </div>
        </div>
      </div>
    </section>
    <section class="menu-area">
      <div class="container">
        <div class="row">
          <section class="logo col-md-2 col-12 text-center">Logo</section>
          <nav class="main-menu col-md-10 text-end">
            <!-- wp_nav_menu() - serve para carregar o menu -->
            <!-- https://developer.wordpress.org/reference/functions/wp_nav_menu/ -->
            <?php wp_nav_menu( array( 'theme_location' => 'my_main_menu' ) ); ?>
          </nav>
        </div>
      </div>
    </section>
  </header>