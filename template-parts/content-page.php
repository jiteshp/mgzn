<!-- entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
<!-- entry -->