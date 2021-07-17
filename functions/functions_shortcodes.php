<?php
	
function beitraege( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
			"kategorie" => '',
		), $atts));

		global $posts_kat;
		$posts_kat = $kategorie;
		
		return;

}
add_shortcode( 'beitraege', 'beitraege' );


?>