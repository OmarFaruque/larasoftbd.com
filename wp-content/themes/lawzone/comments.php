<?php
/**
 *
 * @package WordPress
 * @subpackage Lawzone
 * @since 1.0
 * @version 1.0
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

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	<?php $comments = get_comments(
		array(
			'post_id'=>$post->ID,
			'parent' => 0 )
		); 

	foreach($comments as $cmn): 
		$avater = get_avatar_url( $cmn->comment_author_email, null );
		$dip2 = get_comments(
			array(
				'post_id' => $post->ID,
				'parent' => (int)$cmn->comment_ID
				)
		);

		?>
        <div class="media mt40">
 		<div class="pull-left pr10">
            <a href="#">
            <img class="img-responsive inner-media" src="<?= $avater; ?>" alt="Generic placeholder image">
        </a>
    	</div>
    	<div class="media-body"> 
                <h4 class="media-heading comment-heading text-theme-color"><?= $cmn->comment_author;  ?> says  <?= get_comment_reply_link(array('depth' => 1, 'max_depth' => 10, 'reply_text' => 'Replay'), $cmn, $post->ID);  ?></h4>
            <div class="comment-info">
            	<p class="text-capitalize">
            		<?= comment_date( 'F d, Y \a\t g:i A', $cmn->comment_ID ); ?> 
            	</p>
            </div>                                   
            <?= $cmn->comment_content; ?>
                        		
            <?php 
            foreach($dip2 as $child1): 
            	$avater2 = get_avatar_url( $child1->comment_author_email, null );
                $dip3 = get_comments(
                    array(
                        'post_id' => $post->ID,
                        'parent' => (int)$child1->comment_ID
                        )
                    );
            ?>
            <div class="media mt40">
                <a class="pull-left pr10" href="#">
                    <img class="img-responsive inner-media" src="<?= $avater2; ?>" alt="Generic placeholder image">
                </a>
             	<div class="media-body">
                    <h4 class="media-heading comment-heading text-theme-color"><?= $child1->comment_author;  ?> says <?= get_comment_reply_link(array('depth' => 1, 'max_depth' => 10, 'reply_text' => 'Replay'), $child1, $post->ID);  ?></h4>
                    <div class="comment-info">
                   	<p class="text-capitalize">
            			<?= comment_date( 'F d, Y \a\t g:i A', $child1->comment_ID ); ?> 
            		</p>

                    </div>
                    <?= $child1->comment_content; ?>
                </div>
            </div>

            <?php
            foreach($dip3 as $child2): 
                $avater3 = get_avatar_url( $child2->comment_author_email, null );
            ?>
            <div class="media mt40">
                <a class="pull-left pr10" href="#">
                    <img class="img-responsive inner-media" src="<?= $avater3; ?>" alt="Generic placeholder image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading comment-heading text-theme-color"><?= $child2->comment_author;  ?> says </h4>
                    <div class="comment-info">
                    <p class="text-capitalize">
                        <?= comment_date( 'F d, Y \a\t g:i A', $child2->comment_ID ); ?> 
                    </p>

                    </div>
                    <?= $child2->comment_content; ?>
                </div>
            </div>
            <?php endforeach; ?>
        	<?php endforeach; ?>
        </div>
        </div>
	<?php endforeach;
 		the_comments_pagination( );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;
	?>
	<?php global $aria_req;  $comment_args = array( 'title_reply'=>'<span class="icon icon-Goto"></span> Post a comment',

    'fields' => apply_filters( 'comment_form_default_fields', array(

	'author' => '<div class="row"><div class="col-sm-4"><div class="form-group">' .

        '<input id="author" class="form-control" name="author" type="text" placeholder="Your Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',   

    'email'  => '<div class="col-sm-4"><div class="form-group">' .
                '<input id="email" name="email" type="text" class="form-control" placeholder="E-mail" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</div></div>',
    'url'    => '<div class="col-sm-4"><div class="form-group">' .
                '<input id="url" name="url" type="url" class="form-control" placeholder="Website (optional)" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30" />'.'</div></div></div>') ),

    'comment_field' => '<div class="row"><div class="col-sm-12"><div class="form-group"><textarea class="form-control" placeholder="Your Comment" id="comment" name="comment" style="height: 237px;" cols="45" rows="8" aria-required="true"></textarea></div></div></div>',

    'comment_notes_after' => '',
    'title_reply' => 'Post a comment',
    'submit_button' => '<div class="form-group"><input name="submit" type="submit" id="submit" class="submit btn theme-btn" value="Send Your Comment"></div>'
);

comment_form($comment_args); ?>

</div><!-- #comments -->
