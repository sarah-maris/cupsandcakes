<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (theme_locals("please_do_not"));

	if ( post_password_required() ) { ?>
	<?php echo '<p class="nocomments">' . theme_locals("password") . '</p>'; ?>
	<?php
		return;
	}
?>
<!-- BEGIN Comments -->	
	<?php if ( have_comments() ) : ?>
	<div id="comments" class="comment-holder">
		<h3 class="comments-h cups-comments">What our customers are saying about us</h3>
		<div class="pagination">
			<?php paginate_comments_links('prev_text=Prev&next_text=Next'); ?> 
		</div>
		<ol class="comment-list cups-list clearfix">
			<?php wp_list_comments('type=all&callback=mytheme_comment'); ?>
		</ol>
		<div class="pagination">
			<?php paginate_comments_links('prev_text=Prev&next_text=Next'); ?> 
		</div>
	</div>
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
		<?php echo '<p class="nocomments">' . theme_locals("no_comments_yet") . '</p>'; ?>
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
		<?php echo '<p class="nocomments">' . theme_locals("comments_are_closed") . '</p>'; ?>

		<?php endif; ?>
	
	<?php endif; ?>
	

	<?php if ( comments_open() ) : ?>

	<div id="respond" class="cups-comments">

	<h3>What do you say?</h3>

	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php echo theme_locals("you_must_be"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo theme_locals("logged_in"); ?></a> <?php echo theme_locals("post_a_comment"); ?></p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p><?php echo theme_locals("logged_in_as"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php echo theme_locals("log_account"); ?>"><?php echo theme_locals("log_out"); ?></a></p>

	<?php else : ?>

	<p class="field cups-list"><input type="text" name="author" id="author" value="Name" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

	<p class="field cups-list"><input type="text" name="email" id="email" value="Email (will not be published)" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

	<?php endif; ?>

	<!-- <p>You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: <code><?php echo allowed_tags(); ?></code></small></p> -->

	<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" onfocus="if(this.value=='<?php echo theme_locals("your_comment"); ?>'){this.value=''}" onblur="if(this.value==''){this.value='<?php echo theme_locals("your_comment"); ?>'}"><?php echo theme_locals("your_comment"); ?></textarea></p>

	<p class="comment_submit"><input name="submit" type="submit" class="btn btn-primary" id="submit" tabindex="5" value="<?php echo theme_locals("submit_comment"); ?>" />
		<?php comment_id_fields(); ?>
	</p>
	<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	</div>

<!-- END Comments -->

<?php endif; ?>