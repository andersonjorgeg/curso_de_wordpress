<?php 
// WP_Customizer_Manager - Personalize a classe Manager.
function wpcurso_customizer( $wp_customize ) {
  //? copyright
  // $wp_customize - instância do objeto WP_Customize_Manager
  // add_section() - metodo para adicionar uma seção
  $wp_customize->add_section(
    'sec_copyright', // id da seção
    array(
      'title' => __('Copyright', 'wpcurso'), // título da seção
      'description' => __('Copyright section', 'wpcurso'),// descrição da seção
    )
  );
  // criando a configuração do copyright
  // add_setting() - metodo para adicionar uma configuração
  $wp_customize->add_setting(
    'set_copyright', // id da configuração
    array(
      'type' => 'theme_mod', // tipo do controle
      'default' => __('Copyright x, all rights reserved.', 'wpcurso'), // valor padrão
      'sanitize_callback' => 'wp_filter_nohtml_kses', // remover tags html
    )
  );
  // criando o controle do copyright
  // add_control() - metodo para adicionar um controle
  $wp_customize->add_control(
    'set_copyright', // o id é o mesmo da configuração
    array(
      'label' => __('Copyright', 'wpcurso'), // label do controle
      'description' => __('Choose whether to show the Services section or not.', 'wpcurso'), // descrição do controle
      'section' => 'sec_copyright', // seção do controle
      'type' => 'text', // tipo do campo
    )
  );

  //? map
  $wp_customize->add_section(
    'sec_map', 
    array(
      'title' => __('Map', 'wpcurso'), 
      'description' => __('Map section', 'wpcurso'), 
    )
  );
  $wp_customize->add_setting(
    'set_map_address', 
    array(
      'type' => 'theme_mod',
      'default' => '', 
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
  );
  $wp_customize->add_control(
    'set_map_address', 
    array(
      'label' => __('Type your address here', 'wpcurso'),
      'description' => __('enter the url of the address without the html tags of the map', 'wpcurso'),
      'section' => 'sec_map', 
      'type' => 'text', 
    )
  );

  //? slider
  $wp_customize->add_section(
    'sec_slider', 
    array(
      'title' => __('Slider', 'wpcurso'), 
      'description' => __('Slider section', 'wpcurso'), 
    )
  );

  // Design
  $wp_customize->add_setting(
    'set_slider_option', 
    array(
      'type' => 'theme_mod',
      'default' => '1', 
      'sanitize_callback' => 'wpcurso_sanitize_select', 
    )
  );
  $wp_customize->add_control(
    'set_slider_option', 
    array(
      'label' => __('Choose your design type here', 'wpcurso'), 
      'description' => __('Choose your design type', 'wpcurso'),
      'section' => 'sec_slider', 
      'type' => 'select', 
      'choices' => array(
        '1' => __('Design Type 1', 'wpcurso'), 
        '2' => __('Design Type 2', 'wpcurso'),
        '3' => __('Design Type 3', 'wpcurso'),
        '4' => __('Design Type 4', 'wpcurso'),
        
      )
    )
  );

  // Limit
  $wp_customize->add_setting(
    'set_slider_limit', 
    array(
      'type' => 'theme_mod',
      'default' => '5', 
      'sanitize_callback' => 'absint', 
    )
  );
  $wp_customize->add_control(
    'set_slider_limit', 
    array(
      'label' => __('Number of posts to display', 'wpcurso'), 
      'description' => __('Choose the number of posts to be displayed', 'wpcurso'), 
      'section' => 'sec_slider', 
      'type' => 'number', 
    )
  );

  //? Front Page Loops
  $wp_customize->add_section(
    'sec_loops', 
    array(
      'title' => __('Front Page Loops', 'wpcurso'), 
      'description' => __('Controls the loops in front page', 'wpcurso'),
    )
  );

  $wp_customize->add_setting(
    'set_loop1_categories',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
  );
  $wp_customize->add_control(
    'set_loop1_categories',
    array(
      'label' => __('Choose the category for the first loop', 'wpcurso'),
      'description' => __('Choose the categories to include in the first loop. Use commas to separate the categories. For example 4,5,8,20', 'wpcurso'),
      'section' => 'sec_loops',
      'type' => 'type',
    )
  );

  $wp_customize->add_setting(
		'set_loop2_posts_per_page', array(
			'type' => 'theme_mod',
			'default' => '2',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control(
		'set_loop2_posts_per_page', array(
			'label' => __('Number of posts to display in second loop', 'wpcurso'),
			'description' => __('Choose the number of posts to display in second loop', 'wpcurso'),
			'section' => 'sec_loops',
			'type' => 'number'
		)
	);

  $wp_customize->add_setting(
		'set_loop2_categories_to_exclude', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$wp_customize->add_control(
		'set_loop2_categories_to_exclude', array(
			'label' => __('Categories to exclude in second loop', 'wpcurso'),
			'description' => __('Choose the categories to exclude in the second loop. Use commas to separate the categories. For example 4,5,8,20', 'wpcurso'),
			'section' => 'sec_loops',
			'type' => 'text'
		)
	);

  $wp_customize->add_setting(
		'set_loop2_categories_to_include', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$wp_customize->add_control(
		'set_loop2_categories_to_include', array(
			'label' => __('Categories to include in second loop', 'wpcurso'),
			'description' => __('Choose the categories to include in the second loop. Use commas to separate the categories. For example 4,5,8,20', 'wpcurso'),
			'section' => 'sec_loops',
			'type' => 'text'
		)
	);

}

// customize_register - é um hook que dispara depois que todos os controles padrão do WordPress foram registrados.
add_action( 'customize_register', 'wpcurso_customizer' );

//função para sanitizar o valor do select 
function wpcurso_sanitize_select( $input, $setting ){
          
  //entrada deve ser um slug: caracteres alfanuméricos minúsculos, traços e sublinhados são permitidos apenas
  $input = sanitize_key($input);

  //obter a lista de opções de seleção possíveis
  $choices = $setting->manager->get_control( $setting->id )->choices;
                    
  //retornar a entrada se válida ou retornar a opção padrão
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
    
}
