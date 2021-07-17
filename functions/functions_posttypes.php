<?php
	
//************ Adressen Post Type ************//

add_action( 'init', 'create_addresses' );
function create_addresses() {
  $labels = array(
    'name' => _x('Adressen', 'post type general name'),
    'singular_name' => _x('Adresse', 'post type singular name'),
    'add_new' => _x('Neue hinzufügen', 'Adressen'),
    'add_new_item' => __('Neue Adresse hinzufügen'),
    'edit_item' => __('Adresse bearbeiten'),
    'new_item' => __('Neue Adresse'),
    'view_item' => __('Adresse anschauen'),
    'search_items' => __('Adresse suchen'),
    'not_found' =>  __('Keine Adresse gefunden'),
    'not_found_in_trash' => __('Keine Adresse im Papierkorb gefunden'),
    'parent_item_colon' => ''
  );
 
  $supports = array('title', 'revisions', 'thumbnail');
 
  register_post_type( 'address',
    array(
      'labels' => $labels,
      'public' => true,
      'menu_icon' => 'dashicons-id-alt',
      'supports' => $supports
    )
  );
}





//************ Adressen Meta Box ************//

add_action( 'add_meta_boxes', 'ag_add' );
function ag_add()
{	
	global $post;
	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    add_meta_box( 'ag_adr_contact', 'Kontaktdaten', 'ag_adr_contact_callback', 'address', 'normal', 'high' );
}










//************************//

function ag_adr_contact_callback($post)
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );

    $vorname = isset( $values['ag_adr_contact_1name'] ) ? esc_attr( $values['ag_adr_contact_1name'][0] ) : '';    
    $nachname = isset( $values['ag_adr_contact_2name'] ) ? esc_attr( $values['ag_adr_contact_2name'][0] ) : '';        
    $funktion = isset( $values['ag_adr_contact_funktion'] ) ? esc_attr( $values['ag_adr_contact_funktion'][0] ) : '';            
    $strasse = isset( $values['ag_adr_contact_strasse'] ) ? esc_attr( $values['ag_adr_contact_strasse'][0] ) : '';
    $nr = isset( $values['ag_adr_contact_nr'] ) ? esc_attr( $values['ag_adr_contact_nr'][0] ) : '';    
	$plz = isset( $values['ag_adr_contact_plz'] ) ? esc_attr( $values['ag_adr_contact_plz'][0] ) : '';
	$ort = isset( $values['ag_adr_contact_ort'] ) ? esc_attr( $values['ag_adr_contact_ort'][0] ) : '';
	$telefon = isset( $values['ag_adr_contact_telefon'] ) ? esc_html( $values['ag_adr_contact_telefon'][0] ) : '';
    $email = isset( $values['ag_adr_contact_email'] ) ? esc_attr( $values['ag_adr_contact_email'][0] ) : '';
    $web = isset( $values['ag_adr_contact_web'] ) ? esc_attr( $values['ag_adr_contact_web'][0] ) : '';    	

	$lat = isset( $values['ag_adr_contact_lat'] ) ? esc_html( $values['ag_adr_contact_lat'][0] ) : '';    
	$long = isset( $values['ag_adr_contact_long'] ) ? esc_html( $values['ag_adr_contact_long'][0] ) : '';    
     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <style>
	    input { width: 100%; margin-bottom: 20px;}
    </style>
    
    <div style="display: flex; flex-wrap: wrap;">
		<div style="width: 49%; margin-right: 1%;">
		    <label for="ag_adr_contact_1name">Vorname</label> 
	        <input type="text" name="ag_adr_contact_1name" id="ag_adr_contact_1name" value="<?php echo $vorname; ?>" />
		</div>
		<div style="width: 50%">
	        <label for="ag_adr_contact_2name">Nachname</label>
	        <input type="text" name="ag_adr_contact_2name" id="ag_adr_contact_2name" value="<?php echo $nachname; ?>" />
		</div>
		
		
		<div style="width: 100%;">
			<label for="ag_adr_contact_funktion">Funktion</label>
	        <input type="text" name="ag_adr_contact_funktion" id="ag_adr_contact_funktion" value="<?php echo $funktion; ?>" />
		</div>
				     
		     
		<div style="width: 69%; margin-right: 1%;">
		    <label for="ag_adr_contact_strasse">Straße</label>
	        <input type="text" name="ag_adr_contact_strasse" id="ag_adr_contact_strasse" value="<?php echo $strasse; ?>" />
		</div>
		<div style="width: 30%">	 
			<label for="ag_adr_contact_nr">Hausnummer</label>       
   			<input type="text" name="ag_adr_contact_nr" id="ag_adr_contact_nr" value="<?php echo $nr; ?>" />
		</div>
		      
		      
		<div style="width: 29%; margin-right: 1%;">  
			<label for="ag_adr_contact_plz">Postleitzahl (benötigt)</label>
	        <input type="text" name="ag_adr_contact_plz" id="ag_adr_contact_plz" value="<?php echo $plz; ?>" />
		</div>
		<div style="width: 70%">
			<label for="ag_adr_contact_ort">Ort (benötigt)</label><br>
	        <input type="text" name="ag_adr_contact_ort" id="ag_adr_contact_ort" value="<?php echo $ort; ?>" />
		</div>
		
		
		<div style="width: 100%;">
			<label for="ag_adr_contact_telefon">Telefon (inkl. +49, ohne Vorwahl-0)</label>
	        <input type="text" name="ag_adr_contact_telefon" id="ag_adr_contact_telefon" value="<?php echo $telefon; ?>" />
		</div>
		
		
		<div style="width: 100%;">
		    <label for="ag_adr_contact_email">E-Mail</label>
	        <input type="text" name="ag_adr_contact_email" id="ag_adr_contact_email" value="<?php echo $email; ?>" />
		</div> 
		
		
		<div style="width: 100%;">
		    <label for="ag_adr_contact_web">Website (inkl. https://)</label>
	        <input type="text" name="ag_adr_contact_web" id="ag_adr_contact_web" value="<?php echo $web; ?>" />
		</div> 		
		
		
		<div style="width: 49%; margin-right: 1%;">
		    <label for="ag_adr_contact_lat">Latitude <?php if($lat=="") echo'(wird automatisch ausgefüllt)'?></label>
	        <input type="text" name="ag_adr_contact_lat" id="ag_adr_contact_lat" value="<?php echo $lat; ?>" <?php if($lat=="") echo'disabled="disabled"'?> />
		</div>
		<div style="width: 50%">
			<label for="ag_adr_contact_long">Longitude</label>
	        <input type="text" name="ag_adr_contact_long" id="ag_adr_contact_long" value="<?php echo $long; ?>" <?php if($lat=="") echo'disabled="disabled"'?> />
		</div>
    </div> 
    <?php    
}




add_action( 'save_post', 'ag_adr_contact_save' );
function ag_adr_contact_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
	if( isset( $_POST['ag_adr_contact_1name'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_1name', wp_kses( $_POST['ag_adr_contact_1name'], $allowed ) );
	if( isset( $_POST['ag_adr_contact_2name'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_2name', wp_kses( $_POST['ag_adr_contact_2name'], $allowed ) );    
	if( isset( $_POST['ag_adr_contact_funktion'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_funktion', wp_kses( $_POST['ag_adr_contact_funktion'], $allowed ) );                
	if( isset( $_POST['ag_adr_contact_strasse'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_strasse', wp_kses( $_POST['ag_adr_contact_strasse'], $allowed ) );
	if( isset( $_POST['ag_adr_contact_nr'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_nr', wp_kses( $_POST['ag_adr_contact_nr'], $allowed ) );        
	if( isset( $_POST['ag_adr_contact_plz'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_plz', wp_kses( $_POST['ag_adr_contact_plz'], $allowed ) );
	if( isset( $_POST['ag_adr_contact_ort'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_ort', wp_kses( $_POST['ag_adr_contact_ort'], $allowed ) );        
    if( isset( $_POST['ag_adr_contact_telefon'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_telefon', wp_kses( $_POST['ag_adr_contact_telefon'], $allowed ) );  
	if( isset( $_POST['ag_adr_contact_email'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_email', wp_kses( $_POST['ag_adr_contact_email'], $allowed ) );
	if( isset( $_POST['ag_adr_contact_web'] ) )
        update_post_meta( $post_id, 'ag_adr_contact_web', wp_kses( $_POST['ag_adr_contact_web'], $allowed ) );                
        

	if( isset( $_POST['ag_adr_contact_strasse']) && isset( $_POST['ag_adr_contact_plz']) && isset( $_POST['ag_adr_contact_ort']) ) {
		$address = $_POST['ag_adr_contact_nr']." ".$_POST['ag_adr_contact_strasse'].", ".$_POST['ag_adr_contact_plz'].", ".$_POST['ag_adr_contact_ort'].", Deutschland";
		$latlong = geocode($address);
		
		$lat = 		$latlong[0];
		$long =		$latlong[1];                 
		
		update_post_meta( $post_id, 'ag_adr_contact_lat', wp_kses( $lat, $allowed ) );
		update_post_meta( $post_id, 'ag_adr_contact_long', wp_kses( $long, $allowed ) );
	}	
}

function geocode($address){
	
	// url encode the address
	$address = urlencode($address);
	$adminemail = get_option('admin_email');
	
	$url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$address}&format=json&limit=1&email={$adminemail}";
	
	// get the json response
	$resp_json = file_get_contents($url);
		
	// decode the json
	$resp = json_decode($resp_json, true);
	
	return array($resp[0]['lat'], $resp[0]['lon']);

}



//************ Populate Title with Name & Vorname fields ************//
/*
function ag_adr_contact_title_save( $data , $postarr ) {


    if( $data[ 'post_type' ] === 'address' ) {

        // get the customer name from _POST or from post_meta
        $vorname = ( ! empty( $_POST[ 'ag_adr_contact_1name' ] ) ) ? $_POST[ 'ag_adr_contact_1name' ] : get_post_meta( $postarr[ 'ID' ], 'ag_adr_contact_1name', true );
        $nachname = ( ! empty( $_POST[ 'ag_adr_contact_2name' ] ) ) ? $_POST[ 'ag_adr_contact_2name' ] : get_post_meta( $postarr[ 'ID' ], 'ag_adr_contact_2name', true );
        $person_title = $vorname . ' ' . $nachname;
        
        // if the name is not empty, we want to set the title
        if( $person_title !== '' ) {

            // sanitize name for title
            $data[ 'post_title' ] = $person_title;
            // sanitize the name for the slug
            $data[ 'post_name' ]  = sanitize_title( sanitize_title_with_dashes( $person_title, '', 'save' ) );
        }
    }
    return $data;
}
add_filter( 'wp_insert_post_data' , 'ag_adr_contact_title_save' , '99', 2 );

*/
?>