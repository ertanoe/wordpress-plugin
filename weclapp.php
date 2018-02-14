<?php
/*
Plugin Name: weclapp
Plugin URI: https://de.wordpress.org/plugins/weclapp/
Version: 1.4
Author: <a href="http://www.weclapp.com"> weclapp GmbH </a>
Text Domain: weclapp
Domain Path: /languages
Description: This plugin integrates weclapp functionality into wordpress CMS
*/

//weclapp REST API integration
include( "includes/wc-send.php" );

add_action( 'admin_menu', 'add_plugin_page'  );
add_action( 'admin_init', 'page_init' );

function weclapp_load_plugin_textdomain() {
    load_plugin_textdomain( 'weclapp', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'weclapp_load_plugin_textdomain' );

/**
*Add options page
*/
function add_plugin_page()
{
	add_options_page(
	'weclapp Settings',
		'weclapp',
		'manage_options',
		'weclapp-settings',
		'create_admin_page'
	);
}

/**
*Options page callback
*/
function create_admin_page()
{
	// Set class property
	weclapp_get_option("api_token");
	weclapp_get_option("domain_name");
	weclapp_get_option("contact_placement");
	weclapp_get_option("success_message");
	weclapp_get_option("nowebinars");
  weclapp_get_option("display_alignment");
  weclapp_get_option("success_message2");
	weclapp_get_option("display_sort");

			// This prints out all hidden setting fields
      if( isset( $_GET[ 'tab' ] ) ) {
               $active_tab = $_GET[ 'tab' ];
           } else {
               $active_tab = 'header-tab';
           }
           ?>
        	<div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
        		<h2><?php esc_html_e("weclapp Einstellungen","weclapp");?></h2>

            <form method="post" action="options.php">
                    <h2> <div class="nav-tab-wrapper">
                        <!--  when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active-->
                        <a href="?page=weclapp-settings&tab=header-tab" class="nav-tab <?php echo $active_tab == 'header-tab' ? 'nav-tab-active' : ''; ?>">Allgemein</a>
                        <a href="?page=weclapp-settings&tab=second-tab" class="nav-tab <?php echo $active_tab == 'second-tab' ? 'nav-tab-active' : ''; ?>">Kampagne</a>
                        <a href="?page=weclapp-settings&tab=third-tab" class="nav-tab <?php echo $active_tab == 'third-tab' ? 'nav-tab-active' : ''; ?>">Display</a>
                        <a href="?page=weclapp-settings&tab=fourth-tab" class="nav-tab <?php echo $active_tab == 'fourth-tab' ? 'nav-tab-active' : ''; ?>">Ticket</a>
                    </h2>



                        <?php
                        if( $active_tab == 'header-tab' )
                        {
                                       settings_fields( 'weclapp_option-1' );
                                       do_settings_sections( 'weclapp-settings-1' );
                                       submit_button();
                                     } elseif( $active_tab == 'second-tab' ) {
                                       settings_fields( 'weclapp_option-2' );
                                       do_settings_sections( 'weclapp-settings-2' );
                                       submit_button();
                                     } elseif ($active_tab == 'third-tab') {
                                       settings_fields( 'weclapp_option-3');
                                       do_settings_sections( 'weclapp-settings-3');
                                       submit_button();
                                     } elseif ($active_tab == 'fourth-tab') {
                                       settings_fields( 'weclapp_option-4');
                                       do_settings_sections( 'weclapp-settings-4');
                                       submit_button();
                                     }
                        }


/**
*Register and add settings
*/
function page_init()
{
	register_setting(
		'weclapp_option-1', // Option group
		'api_token', // Option name
		'sanitize_input'  // Sanitize
	);

	register_setting(
		'weclapp_option-1', // Option group
		'domain_name', // Option name
		'sanitize_input'  // Sanitize
	);

	register_setting(
		'weclapp_option-2', // Option group
		'contact_placement', // Option name
		'sanitize_input' // Sanitize
	);

	register_setting(
		'weclapp_option-2', // Option group
		'success_message', // Option name
		'sanitize_input'  // Sanitize
	);

	register_setting(
		'weclapp_option-2', // Option group
		'nowebinars', // Option name
		'sanitize_input'  // Sanitize
	);

  register_setting(
    'weclapp_option-3', // Option group
    'display_alignment', // Option name
    'sanitize_input'  // Sanitize
  );

  register_setting(
		'weclapp_option-3', // Option group
		'display_sort', // Option name
		'sanitize_input'  // Sanitize
	);

  register_setting(
    'weclapp_option-4', // Option group
    'success_message2', // Option name
    'sanitize_input' // Sanitize
  );

	add_settings_section(
		'general_section', // ID
		__('Allgemeine Einstellungen','weclapp'), // Title
		'print_general_info', // Callback
		'weclapp-settings-1' // Page
	);

	add_settings_section(
		'campaign_section', // ID
		__('Kampagnen Einstellungen','weclapp'), // Title
		'print_campaign_section_info' , // Callback
		'weclapp-settings-2' // Page
	);

  add_settings_section(
    'display_section', // ID
		__('Display Einstellungen','weclapp'), // Title
		'print_display_section_info' , // Callback
		'weclapp-settings-3' // Page
  );

  add_settings_section(
    'ticket_section', // ID
		__('Ticket Einstellungen','weclapp'), // Title
		'print_ticket_section_info' , // Callback
		'weclapp-settings-4' // Page
  );

	add_settings_field(
		'api_token', // ID
		__('API Token *','weclapp'), // Title
		'api_token_callback', // Callback
		'weclapp-settings-1', // Page
		'general_section' // Section
	);

	add_settings_field(
		'domain_name', // ID
		__('Domain Name *','weclapp'), // Title
		'domain_name_callback' , // Callback
		'weclapp-settings-1', // Page
		'general_section' // Section
	);
	add_settings_field(
		'contact_placement', // ID
		__('Neue Benutzer anlegen als','weclapp'), // Title
		'contact_placement_callback', // Callback
		'weclapp-settings-2', // Page
		'campaign_section' // Section
	);
	add_settings_field(
		'success_message', // ID
		__('Benutzerdefinierte Erfolgsmeldung','weclapp'), // Title
		'success_message_callback', // Callback
		'weclapp-settings-2', // Page
		'campaign_section' // Section
	);
	add_settings_field(
		'nowebinars_message', // ID
		__('Benutzerdefinierte Mitteilung, falls keine Kampagne ansteht (%s ist der Platzhalter für den Kampagnentyp)','weclapp'), // Title
		'nowebinars_callback', // Callback
		'weclapp-settings-2', // Page
		'campaign_section' // Section
	);
  add_settings_field(
		'display_alignment', // ID
		__('Ausrichtung','weclapp'), // Title
		'display_alignment_callback', // Callback
		'weclapp-settings-3', // Page
		'display_section' // Section
  );
  add_settings_field(
		'display_sort', // ID
		__('Sortierung der Anzeige','weclapp'), // Title
		'display_sort_callback', // Callback
		'weclapp-settings-3', // Page
		'display_section' // Section
	);  
  add_settings_field(
		'success_message2', // ID
		__('Benutzerdefinierte Erfolgsmeldung','weclapp'), // Title
		'success_message2_callback', // Callback
		'weclapp-settings-4', // Page
		'ticket_section' // Section
  );
}

/**
*sanitize settings
**/
function sanitize_input( $input ) {
	$input = strip_tags( stripslashes( $input ) );
	$input = sanitize_text_field( $input );
	return $input;
}

/**
*Print the section text
**/
function print_general_info()
{
	_e('Bitte geben Sie Ihren weclapp API Token sowie Ihren Domain-Namen ein.', 'weclapp');
}

/**
*callback function for section require, even if no text should be displayed
**/
function print_campaign_section_info()
{
}

function print_display_section_info()
{
}

function print_ticket_section_info()
{
}

/**
*callback functions for options
*/
function api_token_callback()
{
	$setting = esc_attr( get_option( 'api_token' ) );
	echo "<input type='text' name='api_token' value='$setting' />";
}
function domain_name_callback()
{
	$setting = esc_attr( get_option( 'domain_name' ) );
	echo "<input type='text' name='domain_name' value='$setting' />.weclapp.com";
}
function success_message_callback()
{
	$setting = esc_attr( get_option( 'success_message' ) );
	echo "<textarea name='success_message' rows='5' cols ='100'>$setting</textarea>";
}
function nowebinars_callback()
{
	$setting = esc_attr( get_option( 'nowebinars' ) );
	echo "<textarea name='nowebinars' rows='5' cols ='100'>$setting</textarea>";
}
function contact_placement_callback()
{
  $setting = esc_attr( get_option( 'contact_placement' ) );
	echo '<fieldset>
			<input type="radio" id="contact" name="contact_placement" value="contact" ' . ( ( 'contact' == weclapp_get_option( 'contact_placement' )) ? 'checked' : '' ). '><label for="contact">' . __( "Kontakt", "weclapp" ) . '</label><br>
			<input type="radio" id="lead" name="contact_placement" value="lead" ' . ( ( 'lead' == weclapp_get_option( 'contact_placement' )) ? 'checked' : ''). '><label for="lead">'  . __( "Interessent", "weclapp" ) . '</label><br>
			<input type="radio" id="customer" name="contact_placement" value="customer" ' . ( ( 'customer' == weclapp_get_option( 'contact_placement' )) ? 'checked' : '' ). '><label for="customer">'  . __( "Kunde", "weclapp" ) . '</label>
		</fieldset>';
}
function display_alignment_callback()
{
  $setting = esc_attr( get_option( 'display_alignment' ) );
	echo '<fieldset>
			<input type="radio" id="vertical" name="display_alignment" value="vertical" ' . ( ( 'vertical' == weclapp_get_option( 'display_alignment' )) ? 'checked' : '' ). '><label for="vertical">' . __( "Vertikal", "weclapp" ) . '</label><br>
			<input type="radio" id="horizontal" name="display_alignment" value="horizontal" ' . ( ( 'horizontal' == weclapp_get_option( 'display_alignment' )) ? 'checked' : ''). '><label for="horizontal">'  . __( "Horizontal", "weclapp" ) . '</label><br>
		</fieldset>';
}
function display_sort_callback()
{
	echo '<fieldset>
			<input type="radio" id="none" name="display_sort" value="none" ' . ( ( 'none' == weclapp_get_option( 'display_sort' )) ? 'checked' : '' ). '><label for="none">' . __( "Keine", "weclapp" ) . '</label><br>
			<input type="radio" id="dateasc" name="display_sort" value="dateasc" ' . ( ( 'dateasc' == weclapp_get_option( 'display_sort' )) ? 'checked' : '' ). '><label for="dateasc">' . __( "Datum - aufsteigend", "weclapp" ) . '</label><br>
			<input type="radio" id="datedesc" name="display_sort" value="datedesc" ' . ( ( 'datedesc' == weclapp_get_option( 'display_sort' )) ? 'checked' : ''). '><label for="datedesc">'  . __( "Datum - absteigend", "weclapp" ) . '</label><br>
			<input type="radio" id="alpha" name="display_sort" value="alpha" ' . ( ( 'alpha' == weclapp_get_option( 'display_sort' )) ? 'checked' : ''). '><label for="alpha">'  . __( "Alphabetisch", "weclapp" ) . '</label><br>
		</fieldset>';
}
function success_message2_callback()
{
	$setting = esc_attr( get_option( 'success_message2' ) );
	echo "<textarea name='success_message2' rows='5' cols ='100'>$setting</textarea>";
}

/**
* add settings link on plugin page
**/
function weclapp_settings_link( $links ) {
  $settings_link = '<a href="options-general.php?page=weclapp-settings">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'weclapp_settings_link' );

/*
**used to reduce the number of displayed webinars to the number of upcoming webinars with one hour postponement
*/
function weclapp_display_campaign_til()
{
	$currentTime = ( time() * 1000 );
	//offset in milliseconds
	$timeOffset = 3600000;
	$displayTil = $currentTime + $timeOffset;
	return $displayTil;
}

/**
*api call to display upcoming webinars as well as a formular
**/
function weclapp_display_campaign_formular( $atts )
{
	//extract shortcode parameters and set default values
	extract( shortcode_atts( array(
		'type' => "WEBINAR",
		'displayformular' => 1
	), $atts));
	//get uppercase campaign type for API.
	$uCampaignType = strtoupper($type);
	//readout campaign type for translation
	$type = trim($type);
	switch ( $type) {
		case "Event":
		case "event":
			$campaignType = __( "Veranstaltung", "weclapp" );
			break;
		case "Webinar":
		case "webinar":
			$campaignType = __( "Webinar", "weclapp" );
			break;
		case "Expostion":
		case "exposition":
			$campaignType = __( "Ausstellung", "weclapp" );
			break;
		case "Publicrelation":
		case "publicrelation":
			$campaignType = __( "Öffentlichkeitsarbeit", "weclapp" );
			break;
		case "Advertisement":
		case "advertisement":
			$campaignType = __( "Anzeige", "weclapp" );
			break;
		case "Bulkmail":
		case "bulkmail":
			$campaignType = __( "Postwurfsendung", "weclapp" );
			break;
		case "Email":
		case "email":
			$campaignType = __( "E-Mail", "weclapp" );
			break;
		case "Telemarketing":
		case "telemarketing":
			$campaignType = __( "Telemarketing", "weclapp" );
			break;
		case "Other":
		case "other":
			$campaignType = __( "Andere", "weclapp" );
			break;
		default:
			$campaignType = __( "Webinar", "weclapp" );
	}
	date_default_timezone_set( 'Europe/Berlin' );
	$args = array(
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( "*" . ':' . weclapp_get_option("api_token") )
		)
	);
	//get all upcoming webinars
	$result = wp_remote_retrieve_body( wp_remote_get( 'https://'.weclapp_get_option("domain_name").'.weclapp.com/webapp/api/v1/campaign/?campaignType-eq=' . $uCampaignType . '&campaignStartDate-gt=' . number_format(weclapp_display_campaign_til(), 0, '', ''), $args ));
	$content = weclapp_display_campaign_til();
	$result = json_decode( $result, true );
	$result = $result['result'];
  
  // sort webinars if option is set
  function sortNumeric( $a2, $a1 ) {
    if ($a1["campaignStartDate"] == $a2["campaignStartDate"]) return 0;
    
    if (weclapp_get_option( "display_sort" ) == 'datedesc')    
    return ($a1["campaignStartDate"] < $a2["campaignStartDate"]) ? -1 : 1;
    else
    return ($a1["campaignStartDate"] > $a2["campaignStartDate"]) ? -1 : 1;
  }
  
  if (weclapp_get_option( "display_sort" ) != 'none' && weclapp_get_option( "display_sort" ) != 'alpha')
  usort($result, "sortNumeric");


  function sortAlpha($a1, $a2) {
    return strcmp($a1['campaignName'], $a2['campaignName']);
  }

  if (weclapp_get_option( "display_sort" ) == 'alpha')
  uasort($result, "sortAlpha");

	//if there are no upcoming webinars, display a custom webinar message or the default one, respectively
	if ( empty( $result )) {
	    //placeholder for campaigntype in nowebinar-string
		$content = sprintf(weclapp_get_option( "nowebinars" ),  $campaignType);
	} else {
		$content = '<div class="webinar-container">';
		//display a webinar box for each upcoming webinar
		foreach ( $result as &$val ) {
			$content .= '<div class=webinar-box>';
				$content .= '<div class="webinar-head" >';

					$content .= '<div class="webinar-checkbox"'. ( ( true == $displayformular) ? '' : 'style="display: none"' ) . '><input type="hidden" name="checkbox_' . $type . '" data-weclapp-campaign-id="' . $val['id'] . '" /></div>';

					$content .= '<div class="webinar-headline">';
						$content .= '<h3 style="margin: 0px;padding: 0px;">' . $val['campaignName'] . '</h3>';
						$duration = ( $val['campaignEndDate']/1000 - $val['campaignStartDate']/1000 ) / 60;
						$content .= '<p>' . sprintf(__( 'Dauer ca. %1$s Min. | Nächster Termin: %2$s Uhr', 'weclapp' ), $duration, date("d. m. Y, H.i", $val['campaignStartDate']/1000)) . '</p>';
					$content .= '</div>';

					$content .= '<div class="webinar-arrow"></div>';

				$content .= '</div>';
				$content .= '<div class="webinar-content"><h3>' . __("Inhalt",  "weclapp") . '</h3>'.$val['description'].'</div>';
			$content .= '</div>';
		}
		$content .= '</div>';
		//input formular, submit buttons calls registerUser in weclapp.js (AJAX-call)
		if ( true == $displayformular) {
			$content .= '<table>
			<form>
			  	<label for="weclapp-name">*' . __("Name", "weclapp") . '</label>
				<input id="weclapp-name" name="wc_name_' . $type . '" type="text" class="form-control" />
			  	<label for="weclapp-email">*' . __("E-Mail", "weclapp") . '</label>
				<input id="weclapp-email" name="wc_email_' . $type . '" type="text" class="form-control" />
			    <label for="weclapp-phone">' . __("Telefonnummer", "weclapp") . '</label>
				<input id="weclapp-phone" name="wc_phone_' . $type . '" type="text" class="form-control" />
			</form>
			<p>&nbsp;</p>
			<input type="submit" name="submit" id="submitbutton" value="'. __("Anmelden","weclapp") . '" onclick="registerCampaignUser(\'' . $type . '\')" />';
			$content .='<div style="padding-top: 20px;padding-bottom: 20px;">';
			$content .='<div id="loader_' . $type . '" style="display: none;"> <img src="' . plugin_dir_url(  __FILE__  ) . 'assets/icons/ajax-loader.gif"> </div>';
			$content .='<div id="errorbox_' . $type . '" class="weclapp-error-message" style="display: none;"><span></span></div>';
			$content .='<div id="successbox_' . $type . '" class="weclapp-success-message" style="display: none;"><span></span></div>';
		}
	}
	//$content = "Test";
	return $content;
}
/**
*display a user ticket formular and send the ticket to the weclapp account
**/

function weclapp_display_ticket_formular( $atts )
{
	//extract shortcode parameters
	extract( shortcode_atts( array(
		'phone_number' => 0,
		'additional_recipients' => 0,
		'category' => 0
	), $atts));
	//parameters needed for api call
	$args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( "*" . ':' . weclapp_get_option("api_token") )
			)
		);
	//display name and email fields
	$ticketing_content = '
	<form>
		<label for="wc_ticket_name">' . __("*Name", "weclapp") . '</label>
		<input id="wc_ticket_name" name="wc_ticket_name" type="text" class="form-control" />
		<label for="wc_ticket_email"> *E-Mail </label>
		<input id="wc_ticket_email" name="wc_ticket_email" type="text" class="form-control" />';
	//if requested, display additional recipients, phone number and category fields
	if( true == $additional_recipients) {
		$ticketing_content .= '
		<label for="wc_ticket_additional_email">' . __("Weitere Empfänger", "weclapp") . '</label>
		<input id="wc_ticket_additional_email" name="wc_ticket_additional_email" type="text" class="form-control" />';
	}
	if( true == $phone_number ) {
		$ticketing_content .= '
		<label for="wc_ticket_phone">' . __("Telefonnummer", "weclapp") . '</label>
		<input id="wc_ticket_phone" name="wc_ticket_phone" type="text"  class="form-control" />';
	}
	if( true == $category ) {
		//api request to determine the user created categories
		$ticketCategory = wp_remote_retrieve_body( wp_remote_get( 'https://'.weclapp_get_option("domain_name").'.weclapp.com/webapp/api/v1/ticketCategory', $args ));
		$ticketCategory = json_decode( $ticketCategory, true );
		$ticketCategory = $ticketCategory['result'];
		$ticketing_content .= '
		<label for="wc_ticket_category">' . __("Kategorie", "weclapp") . '</label>
		<select id="wc_ticket_category" name="wc_ticket_priority" type="text" value="Test" class="form-control">
			<option value="">'. __("Bitte auswählen", "weclapp") . '</option>';
		foreach ( $ticketCategory as &$val ) {
			$ticketing_content .= '
			<option value=' . $val['id']  . '>' . $val['name'] .'</option>';
		}
		$ticketing_content .= '
		</select>';
		//$ticketing_content .= $result . 'sadadasd';
		//error_log($result, 0);
	}
	//api request to determine the user created priorities
	$ticketPriority = wp_remote_retrieve_body( wp_remote_get( 'https://'.weclapp_get_option("domain_name").'.weclapp.com/webapp/api/v1/ticketPriority', $args ));
	$ticketPriority = json_decode( $ticketPriority, true );
	$ticketPriority = $ticketPriority['result'];
	$ticketing_content .= '
		  	<label for="wc_ticket_priority">' . __("*Priorität", "weclapp") . '</label>
			<select id="wc_ticket_priority" name="wc_ticket_priority" type="text" class="form-control">';
	foreach ( $ticketPriority as &$val ) {
		$ticketing_content .= '
				<option value=' . $val['id']  . '>' . $val['name'] .'</option>';
	}
	$ticketing_content .= '
	  	</select>
	    <label for="wc_ticket_subject">' . __("*Betreff", "weclapp") . '</label>
		<input id="wc_ticket_subject" name="wc_ticket_subject" type="text" class="form-control" />
	    <label for="wc_ticket_description">' . __("Beschreibung", "weclapp") . '</label>
		<textarea id="wc_ticket_description" rows="10" cols ="40" name="wc_ticket_description" class="form-control" /></textarea>
	</form>
	<input type="submit" name="submit" id="submitbutton" value="'. __("Senden","weclapp") . '" onclick="sendTicket( )" />';

	$ticketing_content .='<div style="padding-top: 20px;padding-bottom: 20px;">';
	$ticketing_content .='<div id="ticket_loader" style="display: none;"> <img src="' . plugin_dir_url(  __FILE__  ) . 'assets/icons/ajax-loader.gif"> </div>';
	$ticketing_content .='<div id="ticket_errorbox" class="weclapp-error-message" style="display: none;"><span></span></div>';
	$ticketing_content .='<div id="ticket_successbox" class="weclapp-success-message" style="display: none;"><span></span></div>';
	return $ticketing_content;
}

function weclapp_register_shortcodes()
{
    add_shortcode( 'weclappCampaigns', 'weclapp_display_campaign_formular' );
	add_shortcode( 'weclappTicketing', 'weclapp_display_ticket_formular' );
}

/**
*add weclapp.js (for AJAX-call) and weclapp.css
**/
function weclapp_add_scripts()
{
	wp_enqueue_style( 'weclapp-style', plugin_dir_url( __FILE__ ) . 'css/weclapp.css' );
    wp_enqueue_script( 'ajax_custom_script', plugin_dir_url( __FILE__ ) . 'js/weclapp.js', array('jquery') );
    wp_localize_script( 'ajax_custom_script', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action( 'wp_enqueue_scripts', 'weclapp_add_scripts' );

//AJAX-call in weclapp.js, associated functions in wcsend.php
add_action( 'wp_ajax_nopriv_weclapp_campaign_register', 'weclapp_campaign_register' );
add_action( 'wp_ajax_weclapp_campaign_register', 'weclapp_campaign_register' );
add_action( 'wp_ajax_nopriv_weclapp_send_ticket', 'weclapp_send_ticket');
add_action( 'wp_ajax_weclapp_send_ticket', 'weclapp_send_ticket');
add_action( 'init', 'weclapp_register_shortcodes');

/**
*retrieves the value of a particular option and possibly sets a default value, if the option hasn´t been defined yet
**/
function weclapp_get_option( $name )
{
	$optionValue = esc_attr( get_option( $name ) );
	if ( null == $optionValue ){
		$optionValue = null;
		switch ( $name )
		{
			case "api_token":
				$optionValue = "12346789";
				update_option( "api_token", $optionValue );
				break;
			case "domain_name":
				$optionValue = "your_domain_name";
				update_option( "domain_name", $optionValue );
				break;
			case "success_message":
				$optionValue = __("Sie wurden erfolgreich an der Kampagne angemeldet.","weclapp");
				update_option( "success_message", $optionValue );
				break;
			case "contact_placement":
				$optionValue = "contact";
				update_option( "contact_placement", $optionValue );
				break;
			case "nowebinars":
				$optionValue = __("In der nächsten Zeit sind noch keine Kampagnen vom Typ %s angesetzt. Schauen Sie später nochmal vorbei.", "weclapp");
				update_option( "nowebinars", $optionValue );
        break;
      case "display_alignment":
  			$optionValue = "vertical";
  			update_option( "display_alignment", $optionValue );
        break;
			case "display_sort":
				$optionValue = "dateasc";
				update_option( "display_sort", $optionValue );
				break;
      case "success_message2":
        $optionValue = __("Ticket wurde erfolgreich abgeschickt!","weclapp");
        update_option( "success_message2", $optionValue );
		}
	}
	return $optionValue;
}

?>
