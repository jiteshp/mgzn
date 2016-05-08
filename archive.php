<?php get_header(); ?>
		
	<!-- site-content -->
	<div id="site-content">
		<div class="container">
			<div class="row">
				<!-- page-header -->
				<header id="page-header" class="col-xs-12">
					<div class="container-sm">
						<?php
							the_archive_title( '<h1 id="page-title">', '</h1>' );
							the_archive_description( '<div class="page-description">', '</div>' );
						?>
					</div>
				</header>
				<!-- page-header -->
				
				<!-- main -->
				<div id="main" class="col-xs-12 col-md-8" role="main">
					<?php
						if( have_posts() ) {
							while( have_posts() ) {
								the_post();
								get_template_part( 'template-parts/content' );
							}
							
							the_posts_navigation();
						}
						else {
							get_template_part( 'template-parts/content', 'none' );
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