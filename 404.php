<?php get_header(); ?>
		
	<!-- site-content -->
	<div id="site-content">
		<div class="container">
			<div class="row">
				<!-- main -->
				<div id="main" class="col-xs-12" role="main">
					<!-- error-404 -->
					<div class="error-404 hentry container-sm">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Page not found', 'mgzn' ); ?></h1>
						</header>
						
						<div class="entry-content">
							<p><?php _e( 'The page you&rsquo;re looking for couldn&rsquo;t be found. It may have been moved elsewhere. Perhaps searching can help.' ); ?></p>
							
							<?php get_search_form(); ?>
						</div>
					</div>
					<!-- error-404 -->
				</div>
				<!-- main -->
			</div>
		</div>
	</div>
	<!-- site-content -->
		
<?php get_footer(); ?>