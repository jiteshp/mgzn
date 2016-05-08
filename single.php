<?php get_header(); ?>
		
	<!-- site-content -->
	<div id="site-content">
		<div class="container">
			<div class="row">
				<!-- main -->
				<div id="main" class="col-xs-12 col-md-8" role="main">
					<?php
						while( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', 'single' );
							
							if( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
					?>
				</div>
				<!-- main -->
				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- site-content -->
		
<?php get_footer(); ?>