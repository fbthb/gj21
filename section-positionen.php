<?php
$positionen_title = get_theme_mod('positionen_title');
$positionen_text = get_theme_mod('positionen_text');
$positionen_button = get_theme_mod('positionen_button');
?>
	<section id="positionen" class="homesection">
		<h2><?php if($positionen_title!="") echo $positionen_title; else echo "Positionen"?></h2>	
		<?php if (!isset($positionenstartseite)) { ?>
		<div class="textcontent">
				<p><strong><?php if($positionen_text!="") echo $positionen_text; else echo ""?></strong></p>
		</div>
		<?php } ?>
	
	<?php if ( has_nav_menu( 'positions' ) ) : ?>
			<nav id="positions-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Positionen Menü', 'gj21' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'positions',
						'container'			=> '',
						'items_wrap'		=> '<ul id="positionengrid">%3$s</ul>',
						'fallback_cb'		=> false,
						'walker'			=>  new Positions_Menu_Walker()
					)
				);
				?>
			</nav><!-- #positions-navigation -->
		<?php endif; ?>	

	<?php if(get_theme_mod('pos_page') != "" && !isset($positionenstartseite)) { 
		$plink = get_permalink(get_theme_mod('pos_page'));
	?>	
	<a href="<?=$plink?>" class="more"><?php if($positionen_button!="") echo $positionen_button; else echo "Mehr Positionen"?> →</a>
	<?php } ?>
	
	</section>