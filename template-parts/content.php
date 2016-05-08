<!-- entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( 
				sprintf( 
					'<h2 class="entry-title h1"><a href="%s" rel="bookmark">',  
					esc_url( get_permalink() )
				),
				'</a></h2>'
			);
		?>
		
		<p class="entry-meta">
			<span class="entry-time">
				<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'F j, Y' ); ?></time>
			</span>
			
			<span class="entry-author">
				<?php _e( 'By ', 'mgzn' ); the_author_link(); ?>
			</span>
			
			<span class="entry-comments-link">
				<a href="<?php the_permalink(); ?>/#comments"><?php comments_number(); ?></a>
			</span>
		</p>
	</header>
	
	<div class="entry-content">
		<?php if( has_post_thumbnail() ): ?>
			<p class="entry-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</p>
		<?php endif; ?>
		
		<?php the_content( __( 'Read More &rarr;', 'mgzn' ) ); ?>
	</div>
</article>
<!-- entry -->