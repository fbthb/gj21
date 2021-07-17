<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="icon" type="image/svg+xml" href="<?=IMAGE_DIR?>icons/favicon.svg">
	<link rel="alternate icon" type="image/png" sizes="32x32" href="<?=IMAGE_DIR?>icons/favicon-32x32.png">
	<link rel="alternate icon" type="image/png" sizes="16x16" href="<?=IMAGE_DIR?>icons/favicon-16x16.png">
	<link rel="alternate icon" href="<?=IMAGE_DIR?>icons/favicon.ico">
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?=IMAGE_DIR?>icons/apple-touch-icon.png">
	<link rel="mask-icon" href="<?=IMAGE_DIR?>icons/safari-pinned-tab.svg" color="#5bbad5">
	
	<meta name="theme-color" content="#ffffff">	
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
<header id="siteheader">

	<div id="logo">
		<a href="<?php echo get_bloginfo('url'); ?>" title="Zur Startseite"><img src="<?=IMAGE_DIR?>gjlogo.svg" alt="<?php echo get_bloginfo('name'); ?>" /></a>
		<span><?php echo get_theme_mod( 'gliederung_text'); ?></span>
	</div>
	
	
	<button id="mobilenav">Menü</button>
	
	<div id="headernavs">
		
		<button id="mobilenav_close"></button>





<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Hauptmenü', 'gj21' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location'	=> 'primary',
				'container'			=> '',
				'items_wrap'		=> '<ul>%3$s</ul>',
				'fallback_cb'		=> false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>



		<div id="metanav">
			
			
		<?php if ( has_nav_menu( 'meta' ) ) : ?>
			<nav id="meta-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Meta Menü', 'gj21' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'meta',
						'container'			=> '',
						'items_wrap'		=> '<ul>%3$s</ul>',
						'fallback_cb'		=> false,
					)
				);
				?>
			</nav><!-- #meta-navigation -->
		<?php endif; ?>
		
			
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Sozialmenü', 'gj21' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'social',
						'container'			=> '',
						'items_wrap'		=> '<ul>%3$s</ul>',
						'fallback_cb'		=> false,
					)
				);
				?>
			</nav><!-- #meta-navigation -->
		<?php endif; ?>	
			

			
			
		</div>

		<form role="search" method="get" class="searchform" action="<?php echo site_url(); ?>">
			<input type="text" name="s" class="seachphrase" id="searchinput" placeholder="Suchbegriff eingeben ...">
		</form>
	
	</div><!-- headernavs -->	
	
</header><!-- siteheader -->


