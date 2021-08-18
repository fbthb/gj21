<?php
define('GEO_DIR', get_bloginfo('stylesheet_directory')."/lib/libs/geoaddress/");
?>
<section id="vorort" class="homesection">
		
	<link rel="stylesheet" href="<?=GEO_DIR?>leaflet/leaflet.css" media='all' />
	<script src="<?=GEO_DIR?>leaflet/leaflet.js"></script>
	 
    <link rel="stylesheet" href="<?=GEO_DIR?>leaflet/locatecontrol/L.Control.Locate.min.css" />
    <script src="<?=GEO_DIR?>leaflet/locatecontrol/L.Control.Locate.min.js" ></script>
    
    
		
		<div id="mapid"></div>

		<div id="vorort_inner">	
	
	
<?php
$my_query = new WP_Query(
			    array(
			        'posts_per_page' => 99,
			        'post_type' => 'address',
			        'post_status' => 'publish'
			    )
			);
			
if ( $my_query->have_posts() ) {
	
	$i=1;
	$fl_list = "\t";
	$fl_popup = "";
	
	while ($my_query->have_posts()) : $my_query->the_post();

		$postid = get_the_ID();

		$title = get_the_title();
		$thumb = get_the_post_thumbnail_url($postid, 'medium');
		
		$vorname	= get_post_meta( $postid, 'ag_adr_contact_1name', true );
		$nachname	= get_post_meta( $postid, 'ag_adr_contact_2name', true );
		$funktion	= get_post_meta( $postid, 'ag_adr_contact_funktion', true );
		$strasse	= get_post_meta( $postid, 'ag_adr_contact_strasse', true );
		$nr			= get_post_meta( $postid, 'ag_adr_contact_nr', true );
		$plz		= get_post_meta( $postid, 'ag_adr_contact_plz', true );
		$ort		= get_post_meta( $postid, 'ag_adr_contact_ort', true );
		$telefon	= get_post_meta( $postid, 'ag_adr_contact_telefon', true );
		$tellink	= "+".preg_replace("/[^0-9]/", "", $telefon);
		$email		= get_post_meta( $postid, 'ag_adr_contact_email', true );
		$web		= get_post_meta( $postid, 'ag_adr_contact_web', true );
		$hideaddress= get_post_meta( $postid, 'ag_adr_contact_hideaddress', true );
		$lat		= get_post_meta( $postid, 'ag_adr_contact_lat', true );
		$long		= get_post_meta( $postid, 'ag_adr_contact_long', true );
		
		
		if ($lat!="" && $long!="") {
			$fl_list .= "\t".'<li class="fl-item" id="fl_'.$i.'" style="display: none;"><span>'.$plz.'</span> '.$ort.' | '.$title.'</li>'."\n";
	
			$fl_popup .= "<div class=\"fl-popup\" id=\"flp_$i\"><button class=\"fl-popup_close\"><i class=\"fas fa-times-circle\"></i></button>";
			if ($title!="") 							$fl_popup .= "<strong>$title</strong>";
			if ($title!="" && $vorname!="")				$fl_popup .= "<br>";
			if ($vorname!="") 							$fl_popup .= $vorname." ";
			if ($nachname!="") 							$fl_popup .= $nachname;
			if ($funktion!="") 							$fl_popup .= "<br>".$funktion;
			if ($strasse!="" && $hideaddress!="on") 	$fl_popup .= "<br>".$strasse." ";
			if ($nr!="" && $hideaddress!="on") 			$fl_popup .= $nr." ";
			if ($plz!="" && $hideaddress!="on") 		$fl_popup .= "<br>".$plz." ";
			if ($ort!="" && $hideaddress!="on") 		$fl_popup .= $ort;
			if ($telefon!="") 							$fl_popup .= "<br><a href=\"tel:$tellink\">$telefon</a>";
			if ($email!="") 							$fl_popup .= "<br><a href=\"mailto:$email\">$email</a>";
			if ($web!="") 								$fl_popup .= "<br><a href=\"$web\" target=\"_blank\">$web</a>";
			$fl_popup .= "</div>";
	
	
	
			$markers .= "L.marker([$lat, $long]).addTo(fg).bindPopup(\"";
			if ($thumb!="") 								$markers .= "<img src='$thumb' width='100px' />";
															$markers .= "<p>";
			if ($title!="") 								$markers .= "<strong>$title</strong>";
			if ($title!="" && $vorname!="")					$markers .= "<br>";
			if ($vorname!="") 								$markers .= $vorname." ";
			if ($nachname!="") 								$markers .= $nachname;
			if ($funktion!="") 								$markers .= "<br>".$funktion;
			if ($strasse!="" && $hideaddress!="on") 		$markers .= "<br>".$strasse." ";
			if ($nr!="" && $hideaddress!="on") 				$markers .= $nr." ";
			if ($plz!="" && $hideaddress!="on") 			$markers .= "<br>".$plz." ";
			if ($ort!="" && $hideaddress!="on") 			$markers .= $ort;
			if ($telefon!="") 								$markers .= "<br><a href='tel:$tellink'>$telefon</a>";
			if ($email!="") 								$markers .= "<br><a href='mailto:$email'>$email</a>";
			if ($web!="") 									$markers .= "<br><a href='$web' target='_blank'>$web</a>";
															$markers .= "</p>";
			$markers .= "\");\n";
			
			
			$i++;
		}
		
	endwhile;
}			
			
			
			
$vorort_head = get_theme_mod('vorort_head');			
$vorort_text = get_theme_mod('vorort_text');			
?>	
			<h2><?php if($vorort_head!="") echo $vorort_head; else echo "Grüne Jugend<br>vor Ort"?></h2>
			<p><?php if($vorort_text!="") echo $vorort_text; else echo "Wir sind in zahlreichen Kreis- und Ortsverbänden organisiert. Bestimmt auch einer in deiner Nähe!"?></p>
			
			<p><strong>Kreis-/Ortsverband finden:</strong></p>
			<form>
				<input type="text" placeholder="Deine Stadt/Kreis/PLZ" onkeyup="filter(this)">
				<ul id="fl_list">
				<?=$fl_list?>	
				</ul>
				<div id="fl_notfound">Leider kein Ergebnis. Versuche eine allgemeinere Suche.</div>
				<?=$fl_popup?>
			</form>

		
		</div><!--vorort_inner-->  
	</section>
	
	
	
	
<script>
			
	var mymap = L.map('mapid').setView([50.830333, 10.285741], 7);
	
	L.tileLayer('https://{s}.tile.openstreetmap.de/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(mymap);
	
	
	L.control.locate({
	    strings: {
	        title: "Kuckuck, wo bin ich?"
	    }
	}).addTo(mymap);
	
	
	
	var fg = L.featureGroup().addTo(mymap);
	
	<?=$markers?>
		
	setTimeout(function () {
		mymap.fitBounds(fg.getBounds());
	}, 500);	

</script>