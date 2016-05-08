		<!-- site-footer -->
		<footer id="site-footer">
			<?php if( is_active_sidebar( 'mgzn-sidebar-footer' ) ): ?>
			<!-- sidebar-footer -->
			<div id="sidebar-footer">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'mgzn-sidebar-footer' ); ?>
					</div>
				</div>
			</div>
			<!-- sidebar-footer -->
			<?php endif; ?>
		
			<!-- copyright -->
			<div id="copyright">
				<div class="container">
					<?php
						$copyright = trim( get_theme_mod( 'mgzn_copyright', '' ) );
					
						if( '' == $copyright ) {
							$copyright = sprintf(
								__( 
									'&copy; %1$s <a href="%2$s" rel="home">%3$s</a>. All rights reserved.', 
									'mgzn' 
								),
								date( 'Y' ), 
								esc_url( home_url( '/' ) ), 
								get_bloginfo( 'name' )
							);
						}
						
						echo wp_kses_post( $copyright );
					?>
				</div>
			</div>
			<!-- copyright -->
		</footer>
		<!-- site-footer -->
		
		<?php wp_footer(); ?>
	</body>
</html>