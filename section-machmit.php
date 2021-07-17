<?php
?>
	<section id="machmit" class="homesection">
		<h2>Mach mit!</h2>
		<nav>
		<?php
		wp_nav_menu(
			array(
				'theme_location'	=> 'join',
				'container'			=> '',
				'items_wrap'		=> '<ul>%3$s</ul>',
				'fallback_cb'		=> false,
			)
		);
		?>
		</nav>			
	</section>
	