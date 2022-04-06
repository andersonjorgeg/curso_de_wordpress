<?php 
// WP_Customizer_Manager - Personalize a classe Manager.
function wpcurso_customizer( $wp_customize ) {
  // criando a seção do copyright
  // $wp_customize - instância do objeto WP_Customize_Manager
  // add_section() - metodo para adicionar uma seção
  $wp_customize->add_section(
    'sec_copyright', // id da seção
    array(
      'title' => 'Copyright', // título da seção
      'description' => 'Copyright section', // descrição da seção
    )
  );
  // criando a configuração do copyright
  // add_setting() - metodo para adicionar um controle
  $wp_customize->add_setting(
    'set_copyright', // id da configuração
    array(
      'type' => 'theme_mod', // tipo do controle
      'default' => 'Copyright x, all rights reserved.', // valor padrão
      'sanitize_callback' => 'wp_filter_nohtml_kses', // remover tags html
    )
  );
  // criando o controle do copyright
  // add_control() - metodo para adicionar um controle
  $wp_customize->add_control(
    'set_copyright', // o id é o mesmo da configuração
    array(
      'label' => 'Copyright', // label do controle
      'description' => 'Choose whether to show the Services section or not.', // descrição do controle
      'section' => 'sec_copyright', // seção do controle
      'type' => 'text', // tipo do campo
    )
  );
}


// customize_register - é um hook que dispara depois que todos os controles padrão do WordPress foram registrados.
add_action( 'customize_register', 'wpcurso_customizer' );
