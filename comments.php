<?php
if(post_password_required()){
    return;
}
;?>
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', '' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list list-unstyled">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 64,
						'style'       => 'ol',
						'short_ping'  => true,
                        'reply_text'  => 'Reply',
                        'title_reply' =>  'Leave a Reply',
                        'max-depth'   =>  5,
                        'format'      =>  'html5',
                        'type'        => 'comment'
					)
				);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', '' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', '' ) . '</span>',
			)
		);
    
endif; // Check if have_comments().
    if (!comments_open()) :
        ?>
        <h4 class="no-comments font-weight-bold mt-4"><?php esc_html_e( 'Comments are closed. - Herbanext', 'Herbanext' ); ?></h4>
        <?php
    endif;
    $fields = array(
        'author' =>  '<input id="author" type="text" class="form-control px-3 py-3 mb-4" name="author" value="" placeholder="Your Name*"'. esc_attr($commenter['comment_author']) . 'required/>',
        'email'  =>  '<input id="email" type="text" class="form-control px-3 py-3 mb-4" name="email" value="" placeholder="Your Email*"'. esc_attr($commenter['comment_author_email']) . '"required/>',
    );
    $args = array(
        'title_reply' => 'Share Your Thoughts',
        
        'class_submit' => 'btn btn-lg btn-primary px-5 py-2 mt-4 ripple',
        'label_submit' => __('Post Comment'),
        'comment_field' => 
        '<textarea id="comment" class="form-control px-3 py-3 mb-4" name="comment"  rows="4" placeholder="Your comment..." required></textarea>',
        'fields'       => apply_filters('comment_form_default_fields',$fields),
        'comment_notes_before' => '<p class="comment-notes">Your email address will be publsihed. All fields are required.</p>'
    );
    comment_form($args);
	?>
</div><!-- #comments -->
