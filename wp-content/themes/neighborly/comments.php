<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to neighborly_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package neighborly
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'neighborly' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<div class="comment-navigation">
				<?php paginate_comments_links(); ?>
            </div>
		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array( 'callback' => 'neighborly_comment', 'avatar_size' => 36 ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<div class="comment-navigation">
				<?php paginate_comments_links(); ?>
            </div>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'neighborly' ); ?></p>
	<?php endif; ?>
	
    <?php $required_text = '' ; ?>
    
    <?php $neighborly_comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	'author' => '<p class="comment-form-author">' .
                '<label for="author">' . __( 'Name [required]', 'neighborly' ) . '</label> ' .
                ( $req ? '<span class="required"></span>' : '' ) .
                '<input id="author" name="author"  aria-required="true" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '"  />' .
                '</p>',
    'email'  => '<p class="comment-form-email">' .
                '<label for="email">' . __( 'Email [required but will not be published]', 'neighborly' ) . '</label> ' .
                ( $req ? '<span class="required"></span>' : '' ) .
                '<input id="email" name="email" aria-required="true" type="text" value="' . 
				esc_attr(  $commenter['comment_author_email'] ) . '" />' .
				'</p>',
    'url'    => '<p class="comment-form-url">' .
				'<label for="url">' . __( 'Website', 'neighborly' ) . '</label>' .
	            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>' ) ),
    'comment_field' => '<p class="comment-form-comment">' .
                '<label for="comment">' . __( 'Comment [required]', 'neighborly' ) . '</label> ' .
				( $req ? '<span class="required"></span>' : '' ) .
                '<textarea id="comment" name="comment" aria-required="true" rows="8"></textarea>' .
                '</p>',
    'comment_notes_after' => '',
	'title_reply'=> __( 'Leave a Reply', 'neighborly' ),
	'logged_in_as'=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="">Log out?</a>', 'neighborly' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'label_submit'=> __( 'Post Comment', 'neighborly' ),
	'comment_notes_before'=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'neighborly' ) . ( $req ? $required_text : '' ) . '</p>',
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'neighborly' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'cancel_reply_link' => __( 'Cancel reply', 'neighborly' ),
	); ?>
    
	<?php comment_form($neighborly_comment_args); ?>

</div>