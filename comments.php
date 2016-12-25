<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
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

	<?php if ( have_comments() ) : ?>




		<ol class="comment-list">
			<?php
			/*	wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 42,


				) );	*/
			?>
		</ol><!-- .comment-list -->

		<ol class="comment-list">
			<?php wp_list_comments('type=comment&callback=alphaBlog_comment&avatar_size=80'); ?>
		</ol>


		<?php the_comments_navigation(); ?>
    <div class="text-center">
      <?php paginate_comments_links(); ?>
    </div>



	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.' ); ?></p>
	<?php endif; ?>




<?php
  $cargs = array(
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit',
    'name_submit'       => 'submit',
    'title_reply'       => __( '' ),
    'title_reply_to'    => __( 'Leave a Reply to %s' ),
    'cancel_reply_link' => __( 'Cancel Reply' ),
    'label_submit'      => __( 'Post Comment' ),


  'comment_field' =>  '<textarea id="comment" name="comment" cols="45" rows="8" class="form-control" aria-required="true"> </textarea>' ,

  'logged_in_as' => ''
  );

  comment_form($cargs);


 ?>

<!---<button type="button" name="button" class="btn btn-default"><i class="fa fa-envelope-o fa-fw"></i> test</button>--->

 <script>
   document.getElementById("submit").className += " btn btn-primary";


 </script>
</div>
