<?php
/**
 * The Footer.
 *
 * This is the template that displays all of the <footer> section.
 */
?>	
	
	<footer id="sitefooter">
	<div id="sitefooter_inner">
		
		<div class="textcontent">
			<p>
				<?=nl2br(wp_kses_post(get_theme_mod('footer_text')))?>
			</p>
		</div>
		
		<?php if ( has_nav_menu( 'footer' ) ) { ?>
		<nav id="footernavi">
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'footer',
					'container'			=> '',
					'items_wrap'		=> '<ul>%3$s</ul>',
					'fallback_cb'		=> false,
				)
			);
			?>
		</nav>	
		<?php } ?>
		
		<?php if ( has_nav_menu( 'partners' ) ) { ?>
		<nav id="gjnavi">
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'partners',
					'container'			=> '',
					'items_wrap'		=> '<ul>%3$s</ul>',
					'fallback_cb'		=> false,
				)
			);
			?>
		</nav>		
		<?php } ?>
		
		<div id="footercredits">
			<p><a href="https://gjtheme.gredax.de" target="_blank">Grüne Jugend Theme</a> von <a href="https://www.andreasgregor.de" target="_blank">Andreas Gregor</a></p>
		</div>
	</div>																
	</footer>
	

<?php wp_footer(); ?>

</body>
</html>