<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- site-header -->
		<header id="site-header" role="banner">
			<div class="container">
				<div class="row">
					<!-- brand -->
					<div id="brand" class="col-xs-12 col-sm-6 col-md-4">
						<?php if( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>
						
						<?php if( is_home() && is_front_page() ): ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else: ?>
						<p class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
						
						<?php if( ( $description = get_bloginfo( 'description', 'display' ) ) ): ?>
						<p class="site-description screen-reader-text"><?php echo $description; ?></p>
						<?php endif; ?>
					</div>
					<!-- brand -->
					
					<?php if( ( $cta = get_theme_mod( 'mgzn_header_cta', '' ) ) ): ?>
					<!-- site-header-cta -->
					<div id="site-header-cta" class="col-xs-12 col-md-8">
						<?php echo wp_kses_post( $cta ); ?>
					</div>
					<!-- site-header-cta -->
					<?php endif; ?>
				</div>
			</div>
		</header>
		<!-- site-header -->
		
		<?php if( has_nav_menu( 'mgzn-primary-menu' ) ): ?>
		<!-- primary-nav -->
		<nav id="primary-nav" role="navigation">
			<div class="container">
				<button id="primary-menu-toggle"><?php _e( 'Menu', 'mgzn' ); ?></button>
				
				<?php
					wp_nav_menu( array(
						'container' 	 => false,
						'depth' 	 	 => 1,
						'menu_id' 	 	 => 'primary-menu',
						'theme_location' => 'mgzn-primary-menu',
					) );
				?>
			</div>
		</nav>
		<!-- primary-nav -->
		<?php endif; ?>
		
		<?php
			if( is_front_page() ) {
				get_template_part( 'template-parts/content', 'featured' );
			}
		?>