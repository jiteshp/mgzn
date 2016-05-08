<!-- entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<p class="entry-meta">
			<span class="entry-time">
				<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'F j, Y' ); ?></time>
			</span>
			
			<span class="entry-author">
				<?php _e( 'By ', 'mgzn' ); the_author_link(); ?>
			</span>
			
			<span class="entry-comments-link">
				<a href="#comments"><?php comments_number(); ?></a>
			</span>
		</p>
	</header>
	
	<div class="entry-content">
		<?php if( has_post_thumbnail() ): ?>
			<p class="entry-image"><?php the_post_thumbnail(); ?></p>
		<?php endif; ?>
		
		<?php the_content(); ?>
	</div>
	
	<footer class="entry-footer entry-meta">
		<span class="entry-category">
			<?php _e( 'Filed under: ', 'mgzn' ); the_category( ', ' ) ?>
		</span>
		
		<?php 
			the_tags(
				'<span class="entry-tags">' . __( 'Tagged width: ', 'mgzn' ),
				', ',
				'</span>'
			); 
		?>
	</footer>
</article>
<!-- entry -->