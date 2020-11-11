<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jeverly_zmi
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the  password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$jeverly_zmi_comment_count = get_comments_number();
			if ( '1' === $jeverly_zmi_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought', 'jeverly_zmi' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments &ldquo;%2$s&rdquo;', '%1$s Comments ', $jeverly_zmi_comment_count, 'comments title', 'jeverly_zmi' ) ),
					number_format_i18n( $jeverly_zmi_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="commentlist">
			<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
		</ul>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jeverly_zmi' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(array(
		'fields' => array(
					'author' => '<input id="author" name="author" placeholder="Name" type="text" value="" size="30"' . $aria_req . $html_req . ' />',
					'email'  => '<input id="email" name="email" placeholder="Email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />',
					'cookies' => false
				),
		'comment_field' => '<input type="text" id="comment" placeholder="Comment" name="comment" aria-required="true">',
		'comment_notes_before' => false,
		'comment_notes_after' => false,
		'title_reply' => 'Send Comment',
		'label_submit' => 'send comment'

	));
	?>

</div><!-- #comments -->

<?php
function mytheme_comment( $comment, $args, $depth ) {
	
	?>
	<li >
		<div class="wrap-avatar">
			<?php echo get_avatar( $comment);?>
		</div>
		<div class="wrap-content">
			<div class="wrap_autor">
				<?php echo  get_comment_author( get_comment_ID() ); ?> - 
				<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'reply_text' => 'reply',
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					);
				?>
			</div>
			<div class="wrap_date">
				<?php
					printf(
						__( '%1$s at %2$s' ),
						get_comment_date(),
						get_comment_time()
					);
				?>
			</div>
			<?php comment_text(); ?>
		</div>
<?php 
}
