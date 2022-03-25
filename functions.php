<?php

//? Função para chamar css e js
function load_scripts() {

  // wp_enqueue_script() - serve para carregar o js
  // sintaxe:
  // wp_enqueue_script( 'nome-do-js', 'url-do-js', array() de dependências, 'versão-do-js', true );
  wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), '5.1.3', true );

  // wp_enqueue_style() - serve para carregar o css
  // sintaxe:
  // wp_enqueue_style( 'nome-do-css', 'url-do-css', array() de dependências, 'versão-do-css', 'media' );
  // get_template_directory_uri() - serve para pegar o caminho do arquivo
  wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '5.1.3', 'all');
  wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
}

// chamando a função com a função add_action()
// add_action() - serve para associar um hook a uma função
// sintaxe:
// add_action( 'nome-do-hook', 'nome-da-função' );
// wp_enqueue_scripts - é um hook que carrega os scripts
add_action( 'wp_enqueue_scripts', 'load_scripts' );

//? funções de configuração do tema.
function wpcurso_config() {
  // Registrando menus
  // register_nav_menu() - serve para registrar um menu
  // sintaxe:
  // register_nav_menus( array( 'slug' => 'nome-do-menu-dentro-do-wp-admin' ) );
  // https://developer.wordpress.org/reference/functions/register_nav_menus/
  register_nav_menus( 
    array( 
      'my_main_menu' => 'Main Menu',
      'my_footer_menu' => 'Footer Menu'
    ) 
  );

  //https://developer.wordpress.org/reference/functions/add_theme_support/
  // add_theme_support() - Registra o suporte a temas para um determinado recurso.
  // add_theme_support( 'funcionalidade', array( 'argumentos' ) );
  $args = array(
    'height' => 225,
    'width' => 1920,
  );
  //* suporte a imagens de cabeçalho
  // custom-header - serve para registrar um cabeçalho personalizado
  add_theme_support('custom-header', $args); // cabeçalho customizável

  //* suporte a miniaturas
  // post-thumbnails - adiciona suporte a miniaturas para posts
  add_theme_support('post-thumbnails');

  //* suporte formatos de posts
  // post-formats - adiciona suporte a formatos de posts
  add_theme_support('post-formats' , array( 'video', 'image' ) );
}

// after_setup_theme - é um hook que dispara depois que o tema é carregado.
// add_action('hook', 'função', prioridade);
add_action( 'after_setup_theme', 'wpcurso_config', 0 );