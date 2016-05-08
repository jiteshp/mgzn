<?php
	if( post_password_required() ) {
		return;
	}
?>

<!-- comments -->
<div id="comments" class="comments-area">
	<?php if( have_comments ): ?>
	<h2 id="comments-title">
		<?php comments_number( '', __( 'Comments', 'mgzn' ), __( 'Comments (%)', 'mgzn' ) ); ?>
	</h2>
	
	<ol id="comments-list">
		<?php
			wp_list_comments( array(
				'avatar_size' => 50,
				'style' 	  => 'ol',
				'type' 	  	  => 'comment',
			) );
		?>
	</ol>
	<?php endif; ?>
	
	<?php if( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>
	<p class="comments-closed"><?php _e( 'Comments are closed.', 'mgzn' ); ?></p>
	<?php endif; ?>
	
	<?php comment_form(); ?>
</div>
<!-- comments -->