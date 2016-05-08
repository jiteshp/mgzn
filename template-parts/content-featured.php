<?php
	$mgzn_featured_content = mgzn_get_featured_content();
	
	if( 0 < count( $mgzn_featured_content ) ): ?>
		<!-- featured-content -->
		<div id="featured-content">
			<div class="container">
				<div class="cycle-slideshow"
					 data-cycle-slides="> .cycle-slide"
					 data-cycle-fx="scrollHorz"
					 data-cycle-pause-on-hover="true">
				<?php foreach( $mgzn_featured_content as $post ): setup_postdata( $post ); ?>
					<div class="cycle-slide">
						<div class="featured-post hentry"
							 style="background-image:url( '<?php mgzn_post_thumbnail_url(); ?>' );">
							<div class="featured-post-content">
								<div class="container-sm">
									<?php
										the_title(
											'<header class="entry-header"><h2 class="entry-title h1">',
											'</h2></header>'
										);
									?>
									
									<div class="entry-content">
										<?php the_content( __( 'Read More', 'xprt' ) ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				
				<?php if( 1 < count( $mgzn_featured_content ) ): ?>
					<!-- cycle-pager -->
					<div class="cycle-pager"></div>
					<!-- cycle-pager -->
				<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- featured-content --> <?php
		
		wp_reset_postdata();
	endif;