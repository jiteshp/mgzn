<?php get_header(); ?>
		
	<!-- site-content -->
	<div id="site-content">
		<div class="container">
			<div class="row">
				<?php if( is_home() && ! is_front_page() ): ?>
				<!-- page-header -->
				<header id="page-header" class="col-xs-12">
					<div class="container-sm">
						<h1 id="page-title"><?php single_post_title(); ?></h1>
					</div>
				</header>
				<!-- page-header -->
				<?php endif; ?>
				
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