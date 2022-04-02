<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
// wp_unique_id -> Obtém ID exclusivo.
$twentytwentyone_unique_id = wp_unique_id( 'search-form-' );

// esc_attr() -> Escape para atributos HTML.
$twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<!-- esc_url() -> Verifica e limpa um URL. -->
<!-- home_url() -> Recupera a URL do site atual em que o front-end está acessível. -->
<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <!-- get_search_query() -> Recupera o conteúdo da variável de consulta do WordPress de pesquisa. -->
	<input type="search" id="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
  <!-- esc_attr_x() -> Traduza a string com o contexto gettext e o escape para uso seguro em um atributo. -->
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Ok', 'submit button', 'twentytwentyone' ); ?>" />
</form>

<script>
  // limpar o campo de pesquisa ao clicar no botão
  // querySelector() -> Seleciona um elemento pelo seu ID, seletor CSS ou classe.
  // addEventListener() -> Adiciona um evento a um elemento.
  document.querySelector('.search-submit').addEventListener('click', function(){
    document.querySelector('#<?php echo esc_attr( $twentytwentyone_unique_id ); ?>').value = '';
  });

</script>
