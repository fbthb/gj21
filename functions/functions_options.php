<?php

/*
* Create Logo Setting and Upload Control
*/

function your_theme_new_customizer_settings($wp_customize) {
	


	// Gliederungs-Name unter dem Logo
	
	$wp_customize->add_setting( 'gliederung_text', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'gliederung_text_id',
		    array(
		        'label'    => __( 'Gliederung', 'gj21' ),
		        'section'  => 'title_tagline',
		        'settings' => 'gliederung_text',
		        'type'     => 'text'
		    )
	    )
	);
	
	
	// Theme Options Panel
	$wp_customize->add_panel( 'gj21_theme_options', 
	    array(
	        //'priority'       => 100,
	        'title'            => __( 'Theme-Einstellungen', 'gj21' ),
	        'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'gj21' ),
	    ) 
	);	
	
	
	
	// =========================================================================================
	
	// Mach mit
	$wp_customize->add_section( 'machmit_options', 
	    array(
	        'title'         => __( '"Mach Mit"-Sektion', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);
	
	
	$wp_customize->add_setting( 'show_machmit', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_machmit',
		    array(
		        'label'    => __( '"Mach mit"-Sektion auf Startseite anzeigen', 'gj21' ),
		        'section'  => 'machmit_options',
		        'type'     => 'checkbox'
		    )
	    )
	);	
	
	
	$wp_customize->add_setting( 'show_machmit_page', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_machmit_page',
		    array(
		        'label'    => __( '"Mach mit"-Sektion auf Seiten anzeigen', 'gj21' ),
		        'section'  => 'machmit_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
	
	
	
	// =========================================================================================
	
	// News
	
	$wp_customize->add_section( 'news_options', 
	    array(
	        'title'         => __( 'News-Sektion', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);	
		
	// News anzeigen? 
	
	$wp_customize->add_setting( 'show_news', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_news',
		    array(
		        'label'    => __( 'News auf Startseite anzeigen', 'gj21' ),
		        'section'  => 'news_options',
		        'type'     => 'checkbox'
		    )
	    )
	);


	// News anzeigen? 
	
	$wp_customize->add_setting( 'show_news_page', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_news_page',
		    array(
		        'label'    => __( 'News auf Seiten anzeigen', 'gj21' ),
		        'section'  => 'news_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
	
		
	// News-Titel
	
	$wp_customize->add_setting( 'news_title', array(
		 'default'           => __( 'News', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'news_title',
		    array(
		        'label'    => __( 'News-Überschrift', 'gj21' ),
		        'section'  => 'news_options',
		        'type'     => 'text'
		    )
	    )
	);
	
	
	// News Kategorie 
	
	$args = array(
    	'hide_empty'      => false,
	);
	$categories = get_categories($args);
	
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	    if($i==0){
	        $default_cat = $category->term_id;
	        $i++;
	    }
	    $cats[$category->term_id] = $category->name;
	}
	
	$wp_customize->add_setting('news_cat', array(
	    'default'        => $default_cat
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'news_cat', array(
	    'label' => 'News-Kategorie',
	    'section' => 'news_options',
	    'settings' => 'news_cat',
	    'type'    => 'select',
	    'choices' => $cats
	)));

	
	
	
	
	
	
	
	
	
	// =========================================================================================
	// Positionen
	
	$wp_customize->add_section( 'positionen_options', 
	    array(
	        'title'         => __( 'Positionen-Sektion', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);	
	
	
	// Positionen anzeigen? 
	
	$wp_customize->add_setting( 'show_positionen', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_positionen',
		    array(
		        'label'    => __( 'Positionen-Sektion auf Startseite anzeigen', 'gj21' ),
		        'section'  => 'positionen_options',
		        'type'     => 'checkbox'
		    )
	    )
	);	
	
	
	// Positionen anzeigen? 
	
	$wp_customize->add_setting( 'show_positionen_page', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_positionen_page',
		    array(
		        'label'    => __( 'Positionen-Sektion auf Seiten anzeigen', 'gj21' ),
		        'section'  => 'positionen_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
	

	// Positionen-Titel
	
	$wp_customize->add_setting( 'positionen_title', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'positionen_title',
		    array(
		        'label'    => __( 'Positionen-Überschrift', 'gj21' ),
		        'section'  => 'positionen_options',
		        'type'     => 'text'
		    )
	    )
	);


	// Positionen-Text
	
	$wp_customize->add_setting( 'positionen_text', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'positionen_text',
		    array(
		        'label'    => __( 'Positionen-Text', 'gj21' ),
		        'section'  => 'positionen_options',
		        'type'     => 'textarea'
		    )
	    )
	);	
	
	
	// Positionen-Button-Text
	
	$wp_customize->add_setting( 'positionen_button', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'positionen_button',
		    array(
		        'label'    => __( 'Positionen-Button-Text', 'gj21' ),
		        'section'  => 'positionen_options',
		        'type'     => 'text'
		    )
	    )
	);
	
	
	//Pages with Positionen-Template
	
	function get_page_by_template($template = '') {
	  $args = array(
	    'meta_key' => '_wp_page_template',
	    'meta_value' => $template
	  );
	  return get_pages($args); 
	}

	$pos_pages = get_page_by_template('page-position_start.php');	
	$i = 0;
	foreach($pos_pages as $pos_page){
	    $pos_p[$pos_page->ID] = $pos_page->post_title;
	}
	
	$wp_customize->add_setting('pos_page', array(
	    'default'        => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pos_page', array(
	    'label' => 'Positionen-Startseite',
	    'section' => 'positionen_options',
	    'settings' => 'pos_page',
	    'type'    => 'select',
	    'description' => 'Hier erscheinen alle Seiten, die das Template "Positionen-Startseite" zugewiesen haben.',
	    'choices' => $pos_p
	)));
	


	// Positionen Kategorie 
	
	$wp_customize->add_setting('pos_cat', array(
	    'default'        => $default_cat
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pos_cat', array(
	    'label' => 'Positionen-Überkategorie',
	    'section' => 'positionen_options',
	    'settings' => 'pos_cat',
	    'type'    => 'select',
	    'choices' => $cats
	)));

	
	
	
	
	
	
	
	

	// =========================================================================================
	
	// Vor Ort
	
	$wp_customize->add_section( 'map_options', 
	    array(
	        'title'         => __( '"Vor Ort"-Sektion', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);	
	
		
	// Vor Ort anzeigen? 
	
	$wp_customize->add_setting( 'show_map', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_map',
		    array(
		        'label'    => __( '"Vor Ort"-Sektion auf Startseite anzeigen', 'gj21' ),
		        'section'  => 'map_options',
		        'type'     => 'checkbox'
		    )
	    )
	);	
	
	
	// Vor Ort anzeigen? 
	
	$wp_customize->add_setting( 'show_map_page', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_map_page',
		    array(
		        'label'    => __( '"Vor Ort"-Sektion auf Seiten anzeigen', 'gj21' ),
		        'section'  => 'map_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
	
	
	
	// Vor Ort Head
	
	$wp_customize->add_setting( 'vorort_head', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'vorort_head',
		    array(
		        'label'    => __( 'Vor Ort-Überschrift', 'gj21' ),
		        'section'  => 'map_options',
		        'type'     => 'text'
		    )
	    )
	);
	
	
	// Vor Ort-Text
	
	$wp_customize->add_setting( 'vorort_text', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'vorort_text',
		    array(
		        'label'    => __( 'Vor Ort-Text', 'gj21' ),
		        'section'  => 'map_options',
		        'type'     => 'textarea'
		    )
	    )
	);	
	
	
	
		
	
	
	// =========================================================================================
		
	// Spenden
	
	$wp_customize->add_section( 'spenden_options', 
	    array(
	        'title'         => __( 'Spenden-Sektion', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);	
		
	// Spenden anzeigen? 
	
	$wp_customize->add_setting( 'show_spenden', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_spenden',
		    array(
		        'label'    => __( 'Spenden-Sektion auf Startseite anzeigen', 'gj21' ),
		        'section'  => 'spenden_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
	
	
	// Spenden anzeigen? 
	
	$wp_customize->add_setting( 'show_spenden_page', array(
		 'default'           => false,
		 'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'show_spenden_page',
		    array(
		        'label'    => __( 'Spenden-Sektion auf Seiten anzeigen', 'gj21' ),
		        'section'  => 'spenden_options',
		        'type'     => 'checkbox'
		    )
	    )
	);
		
		
	// Spenden-Text
	
	$wp_customize->add_setting( 'spenden_text', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_text',
		    array(
		        'label'    => __( 'Spenden-Text', 'gj21' ),
		        'section'  => 'spenden_options',
		        'type'     => 'textarea'
		    )
	    )
	);	

	// Spenden-Text2
	
	$wp_customize->add_setting( 'spenden_text2', array(
		 'default'           => __( '', 'gj21' ),
		 //'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_text2',
		    array(
		        'label'    => __( 'Spenden-Text klein', 'gj21' ),
		        'section'  => 'spenden_options',
		        'type'     => 'textarea'
		    )
	    )
	);	
	
	
	// Paypal-Account
	
	$wp_customize->add_setting( 'spenden_paypal', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_paypal',
		    array(
		        'label'    => __( 'PayPal-Account', 'gj21' ),
		        'section'  => 'spenden_options',
		        'description' => 'Wenn ein PayPal-Account angegeben ist, erscheint das Spendenformular. Trage die zugehörige Mail-Adresse ein.',
		        'type'     => 'text'
		    )
	    )
	);	
	// IBAN
	$wp_customize->add_setting( 'spenden_iban', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_iban',
		    array(
		        'label'    => __( 'Spenden-IBAN', 'gj21' ),
		        'section'  => 'spenden_options',
				'description' => 'Gib hier die IBAN deiner Gliederung an. Lass dieses Feld leer, wenn du PayPal angibst.',
		        'type'     => 'text'
		    )
	    )
	);	
	$wp_customize->add_setting( 'spenden_bic', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_bic',
		    array(
		        'label'    => __( 'Spenden-BIC', 'gj21' ),
		        'section'  => 'spenden_options',
				'description' => 'Gib hier die BIC deiner Gliederung an. Lass dieses Feld leer, wenn du PayPal angibst.',
		        'type'     => 'text'
		    )
	    )
	);
	$wp_customize->add_setting( 'spenden_bank', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_bank',
		    array(
		        'label'    => __( 'Spenden-Bank', 'gj21' ),
		        'section'  => 'spenden_options',
				'description' => 'Gib hier den Namen der Bank deiner Gliederung an. Lass dieses Feld leer, wenn du PayPal angibst.',
		        'type'     => 'text'
		    )
	    )
	);	
	$wp_customize->add_setting( 'spenden_verwendungszweck', array(
		 'default'           => __( '', 'gj21' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'spenden_verwendungszweck',
		    array(
		        'label'    => __( 'Spenden-Verwendungszweck', 'gj21' ),
		        'section'  => 'spenden_options',
				'description' => 'Gib hier den gewünschten Verwendungszweck an. Hinweis: Gliederungen, die Teilorganisation der Partei sind, müssen Namen und Anschriften aller Spender*innen kennen. Lass dieses Feld leer, wenn du PayPal angibst.',
		        'type'     => 'text'
		    )
	    )
	);	
	
	
	
	
	
	// Footer
	
	$wp_customize->add_section( 'footer_options', 
	    array(
	        'title'         => __( 'Footer', 'gj21' ),
	        'description'	=> '',
	        'panel'         => 'gj21_theme_options'
	    ) 
	);	
	
	// Footer-Text
	
	$wp_customize->add_setting( 'footer_text', array(
		 'default'           => __( '', 'gj21' ),
		 //'sanitize_callback' => 'sanitize_text'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_text',
		    array(
		        'label'    => __( 'Footer-Text', 'gj21' ),
		        'section'  => 'footer_options',
		        'type'     => 'textarea'
		    )
	    )
	);	
		
	
	
	
	
	
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}
add_action('customize_register', 'your_theme_new_customizer_settings');


?>