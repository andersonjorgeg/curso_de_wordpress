<?php

// Função para chamar css e js
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
