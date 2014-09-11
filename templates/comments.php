<?php
 
// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
  <div class="alert alert-warning">
    <?php _e('This post is password protected. Enter the password to view comments.', 'theme'); ?>
  </div>
<?php
  return; 
}
// End do not delete section

?>

<?php

// Function Comment list
function theme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);
  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
  <?php endif; ?>
    <div class="comment-author vcard">
      <div style="width: 60px; float: left;">
        <?php echo get_avatar( $comment->comment_author_email, $size = '40'); ?>
      </div>
      <div>
        <h4 style="margin: 0 0 5px 0"><?php comment_author(); ?></h4>
        <p class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a></p>
        <?php if ($comment->comment_approved == '0') : ?>
          <p><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <hr/>
      	<?php comment_text() ?>
      </div>  
    </div>
    <div class="reply">
      <p class="text-right"><?php edit_comment_link(__('<span class="btn btn-default btn-info">Edit</span>'),' ','' );	?> <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
    </div>
      <?php if ( 'div' != $args['style'] ) : ?>
    </div>
  <?php endif; ?>
<?php 
} 
// End Function Comment list

?>

<?php

// Function Comment Form
if (have_comments()) : ?>

<h3>Feedback</h3>
<p class="text-muted" style="margin-bottom: 20px;">
  <i class="glyphicon glyphicon-comment"></i>&nbsp; Comments: <?php comments_number('None', '1', '%'); ?>
</p>
  
<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=theme_comment');?>
</ol>

<ul class="pagination">
  <li class="older"><?php previous_comments_link() ?></li>
  <li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
  else :
	  if (comments_open()) :
  echo"<p class='alert alert-info'>Be the first to write a comment.</p>";
		else :
			echo"<p class='alert alert-warning'>Comments are closed for this post.</p>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond">
  <h3><?php comment_form_title(__('Your feedback', 'theme'), __('Responses to %s', 'theme')); ?></h3>
  <p><?php cancel_comment_reply_link(); ?></p>
  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'theme'), wp_login_url(get_permalink())); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if (is_user_logged_in()) : ?>
    <p>
      <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'theme'), get_option('siteurl'), $user_identity); ?>
      <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'theme'); ?>"><?php _e('Log out <i class="glyphicon glyphicon-arrow-right"></i>', 'theme'); ?></a>
    </p>
    <?php else : ?>
    <div class="form-group">
      <label for="author"><?php _e('Your name', 'theme'); if ($req) _e(' <span class="text-muted">(required)</span>', 'theme'); ?></label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Your name" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="email"><?php _e('Your email address', 'theme'); if ($req) _e(' <span class="text-muted">(required, but will not be published)</span>', 'theme'); ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Your email address" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="url"><?php _e('Your website <span class="text-muted">if you have one (not required)</span>', 'theme'); ?></label>
      <input type="url" class="form-control" name="url" id="url" placeholder="Your website url" value="<?php echo esc_attr($comment_author_url); ?>">
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="comment"><?php _e('Your comment', 'theme'); ?></label>
      <textarea name="comment" class="form-control" id="comment" placeholder="Your comment" rows="8" aria-required="true"></textarea>
    </div>
    <p><input name="submit" class="btn btn-primary" type="submit" id="submit" value="<?php _e('Submit comment', 'theme'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; ?>
</section>
<?php endif; 
// End Function Comment Form

?>
