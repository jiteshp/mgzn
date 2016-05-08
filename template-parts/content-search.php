<!-- entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		the_title( 
			sprintf( 
				'<header class="entry-header"><h2 class="entry-title"><a href="%s" rel="bookmark">',  
				esc_url( get_permalink() )
			),
			'</a></h2></header>'
		);
	?>
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>
<!-- entry -->