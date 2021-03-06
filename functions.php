<?php

// require -> inclui o arquivo e executa o código
// get_template_directory() -> retorna o caminho do diretório do tema
require get_template_directory() . '/inc/customizer.php';

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
      'my_main_menu' => __('Main Menu', 'wpcurso'),
      'my_footer_menu' => __('Footer Menu', 'wpcurso'),
    ) 
  );

  //https://developer.wordpress.org/reference/functions/add_theme_support/
  // add_theme_support() - Registra o suporte a temas para um determinado recurso.
  // sintaxe:
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

  //* suporte a titulo de página
  // title-tag - adiciona suporte ao title-tag
  add_theme_support('title-tag');

  //* suporte a logo personalizada
  // custom-logo - adiciona suporte a logo personalizada
  add_theme_support('custom-logo', array( 'height' => 110, 'width' => 200 ));

  //? habilitando suporte a tradução
  // variavel recebe o nome do theme que está sendo utilizado
  $textdomain = 'wpcurso';
  // load_theme_textdomain() - Carregue as strings traduzidas do tema.
  // sintaxe:
  // load_theme_textdomain( 'nome-do-theme', 'caminho-do-arquivo-de-idiomas' );
  load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );
}

// after_setup_theme - é um hook que dispara depois que o tema é carregado.
// add_action('hook', 'função', prioridade);
add_action( 'after_setup_theme', 'wpcurso_config', 0 );

// widgets_init - é um hook que dispara depois que todos os widgets padrão do WordPress foram registrados.
// add_action('hook', 'função');
add_action( 'widgets_init', 'wpcurso_sidebars' );

//? função para registrar widgets
function wpcurso_sidebars() {
  // Registrando siderbar
  // register_sidebar() - Cria a definição para uma única barra lateral e retorna o ID.
  // sintaxe:
  // register_sidebar( array( args ) );
  // sidebar da página Home
  register_sidebar( 
    array ( 
      'name' => __('Home Page Sidebar', 'wpcurso'), // name - nome da sidebar
      'id' => 'sidebar-1', // id - id da sidebar (deve ser único)
      'description' => __('Sidebar to be used Home Page', 'wpcurso'), // description - descrição da sidebar
      'before_widget' => '<div class="widget-wrapper">', // before_widget - HTML antes do widget
      'after_widget' => '</div>', // after_widget - HTML depois do widget
      'before_title' => '<h2 class="widget-title">', // before_title - HTML antes do título do widget
      'after_title' => '</h2>', // after_title - HTML depois do título do widget
    )
   );

  // sidebar da página Blog
   register_sidebar( 
    array ( 
      'name' => __('Blog Sidebar', 'wpcurso'),
      'id' => 'sidebar-2', 
      'description' => __('Sidebar to be used Blog Page', 'wpcurso'), 
      'before_widget' => '<div class="widget-wrapper">', 
      'after_widget' => '</div>', 
      'before_title' => '<h2 class="widget-title">', 
      'after_title' => '</h2>', 
    )
   );
   // widget de services
   register_sidebar( 
    array ( 
      'name' => __('services 1', 'wpcurso'),
      'id' => 'services-1', 
      'description' => __('First services area.', 'wpcurso'), 
      'before_widget' => '<div class="widget-wrapper">', 
      'after_widget' => '</div>', 
      'before_title' => '<h2 class="widget-title">', 
      'after_title' => '</h2>', 
    )
   );
   register_sidebar( 
    array ( 
      'name' => __('services 2', 'wpcurso'),
      'id' => 'services-2', 
      'description' => __('Second services area.', 'wpcurso'),
      'before_widget' => '<div class="widget-wrapper">', 
      'after_widget' => '</div>', 
      'before_title' => '<h2 class="widget-title">', 
      'after_title' => '</h2>', 
    )
   );
   register_sidebar( 
    array ( 
      'name' => __('services 3', 'wpcurso'),
      'id' => 'services-3', 
      'description' => __('Third services area.', 'wpcurso'), 
      'before_widget' => '<div class="widget-wrapper">', 
      'after_widget' => '</div>', 
      'before_title' => '<h2 class="widget-title">', 
      'after_title' => '</h2>', 
    )
   );
    register_sidebar( 
    array ( 
      'name' => __('social Icons', 'wpcurso'),
      'id' => 'social-media', 
      'description' => __('Place your social media icons here.', 'wpcurso'),
      'before_widget' => '<div class="widget-wrapper">', 
      'after_widget' => '</div>', 
      'before_title' => '<h2 class="widget-title">', 
      'after_title' => '</h2>', 
      )
    );
}
