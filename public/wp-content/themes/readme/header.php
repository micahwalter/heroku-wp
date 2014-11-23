<?php
	if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) )
	{
		header( 'X-UA-Compatible: IE=edge,chrome=1' );
	}
	
	
	$fixed_header = get_option( 'fixed_header', 'Yes' );
	
	if ( $fixed_header == 'No' )
	{
		$fixed_header = "";
	}
	else
	{
		$fixed_header = 'is-header-fixed';
	}
?>
<!doctype html>

<html <?php language_attributes(); ?> class="<?php echo $fixed_header; ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<?php
		$mobile_zoom = get_option( 'mobile_zoom', 'Yes' );
		
		if ( $mobile_zoom == 'No' )
		{
			?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

			<?php
		}
		else
		{
			?>

<meta name="viewport" content="width=device-width, initial-scale=1">

			<?php
		}
	?>
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
			<h1 class="site-title">
				<?php
					$logo_type = get_option( 'logo_type', 'Text Logo' );
					
					if ( $logo_type == 'Image Logo' )
					{
						$logo_image = get_option( 'logo_image', "" );
						
						?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $logo_image; ?>">
							</a>
						<?php
					}
					else
					{
						$select_text_logo = get_option( 'select_text_logo', 'WordPress Site Title' );
						
						if ( $select_text_logo == 'Theme Site Title' )
						{
							$text_logo_out = stripcslashes( get_option( 'theme_site_title', "" ) );
						}
						else
						{
							$text_logo_out = get_bloginfo( 'name' );
						}
						
						?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $text_logo_out; ?></a>
						<?php
					}
				?>
			</h1>
			
			
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<a class="menu-toggle toggle-link"></a>
				
				<div class="nav-menu">
					<?php
						wp_nav_menu( array( 'theme_location' => 'pixelwars_theme_menu_location_1',
											'menu' => 'pixelwars_theme_menu_location_1',
											'menu_id' => 'nav',
											'menu_class' => 'menu-custom vs-nav',
											'container' => false,
											'depth' => 0,
											'fallback_cb' => 'pixelwars_wp_page_menu2' ) );
					?>
				</div>
			</nav>
			
			
			<div class="search-container easing">
				<a class="search-toggle toggle-link"></a>
				
				<div class="search-box">
					<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<span class="screen-reader-text"><?php echo __( 'Search for:', 'read' ); ?></span>
							
							<input type="search" name="s" id="search-field" placeholder="<?php echo __( 'type and hit enter', 'read' ); ?> &#8230;">
						</label>
						
						<input type="submit" class="search-submit" value="<?php echo __( 'Search', 'read' ); ?>">
					</form>
				</div>
			</div>
			
			
			<div class="social-container">
				<a class="social-toggle toggle-link"></a>
				
				<?php
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pixelwars_header_sidebar' ) ) :
					endif;
				?>
			</div>
        </header>