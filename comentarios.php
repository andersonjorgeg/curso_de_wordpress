<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
// post_password_required() -> Se a postagem requer senha e a senha correta foi fornecida.
if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div class="comments" id="comments">

		<?php
		$comments_number = absint( get_comments_number() );
		?>

		<div class="comments-header section-inner small max-percentage">

			<h2 class="comment-reply-title">
			<?php
      // have_comments() -> Determina se a consulta atual do WordPress tem comentários para fazer um loop.
			if ( ! have_comments() ) {
				_e( 'Leave a comment', 'wpcurso' );
			} elseif ( 1 === $comments_number ) {
				/* translators: %s: Post title. */
        // get_the_title() -> Recupere o título da postagem.
				// _x() -> Recupere a string traduzida com o contexto gettext.
				printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'wpcurso' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: Number of comments, 2: Post title. */
					//_nx() -> Traduz e recupera a forma singular ou plural com base no número fornecido, com contexto gettext.
					_nx(
						'%1$s reply on &ldquo;%2$s&rdquo;',
						'%1$s replies on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'wpcurso'
					),
          // number_format_i18n() -> Converta o número flutuante para o formato com base na localidade.
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}

			?>
			</h2><!-- .comments-title -->

		</div><!-- .comments-header -->

		<div class="comments-inner section-inner thin max-percentage">

			<?php
      // wp_list_comments() -> Exibe uma lista de comentários.
			wp_list_comments(
				array(
					'walker'      => new TwentyTwenty_Walker_Comment(),
					'avatar_size' => 120,
					'style'       => 'div',
				)
			);
      // paginate_comments_links() -> Exibe ou recupera links de paginação para os comentários na postagem atual.
			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Newer Comments', 'twentytwenty' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'twentytwenty' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

        <!-- esc_attr_e() -> Exibe o texto traduzido que foi escapado para uso seguro em um atributo. -->
				<nav class="comments-pagination pagination<?php echo $pagination_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'twentytwenty' ); ?>">
          <!-- wp_kses_post() -> Sanitiza o conteúdo das tags HTML permitidas para o conteúdo da postagem. -->
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</div><!-- .comments-inner -->

	</div><!-- comments -->

	<?php
}
// pings_open() -> Determina se a postagem atual está aberta para pings.
if ( comments_open() || pings_open() ) {

	if ( $comments ) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}

  // comment_form() -> Gera um formulário de comentários completo para uso em um modelo.
	comment_form(
		array(
			'class_form'         => 'section-inner thin max-percentage',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
// is_single() -> Determina se a consulta é para uma única postagem existente.
} elseif ( is_single() ) {

	if ( $comments ) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}

	?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e( 'Comments are closed.', 'wpcurso' ); ?></p>

	</div><!-- #respond -->

	<?php
}