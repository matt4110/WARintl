<?php
/*
Plugin Name: Custom Posts and Functions
Description: Custom Post Types and Functions for WAR Int'l website.
Author: Pj Finger
*/

// Default fallback image for Jetpack Sharing
function jeherve_custom_image( $media, $post_id, $args ) {
    if ( $media ) {
        return $media;
    } else {
        $permalink = get_permalink( $post_id );
        $url = 'http://warinternational.org/wp-content/uploads/2014/08/WAR-seal-gold-transparent.png';
     
        return array( array(
            'type'  => 'image',
            'from'  => 'custom_fallback',
            'src'   => esc_url( $url ),
            'href'  => $permalink,
        ) );
    }
}
add_filter( 'jetpack_images_get_images', 'jeherve_custom_image', 10, 3 );

// START of Gravity Forms SagePay Integration for DONATIONS PAGE
/* add_action('gform_after_submission', 'post_to_third_party', 10, 2);

function post_to_third_party($entry, $form) {
	echo '<li>' . $entry[1] . '</li>'; 
	echo '<li>' . $entry[3] . '</li>';
	echo '<li>' . $entry[4] . '</li>';
	echo '<li>' . $entry[7] . '</li>';
	echo '<li>' . $entry[6] . '</li>';
} */ // END of Gravity Forms SagePay Integration


function register_my_menu() {
	//register_nav_menu( 'story-gallery-menu', __( 'story gallery menu' ) );
}

// Function to remove sharing buttons from Excerpts
add_action( 'init', 'jptweak_remove_share' );

function jptweak_remove_share() {
    remove_filter( 'the_excerpt', 'sharing_display',19 );
}

add_action( 'init', 'hostess_testimonial_cpt' );

function hostess_testimonial_cpt() {

register_post_type( 'hostess_testimonial', array(
  'labels' => array(
    'name' => 'Hostess Testimonials',
    'singular_name' => 'Hostess Testimonial',
   ),
  'description' => 'Hostess Testimonial custom content types.',
  'public' => true,
  'menu_position' => 14,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'region_cpt' );

function region_cpt() {

register_post_type( 'region', array(
  'labels' => array(
    'name' => 'Regions',
    'singular_name' => 'Region',
   ),
  'description' => 'Region custom content types.',
  'public' => true,
  'menu_position' => 25,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'story_cpt' );

function story_cpt() {

register_post_type( 'story', array(
  'labels' => array(
    'name' => 'Stories',
    'singular_name' => 'Story',
   ),
  'description' => 'Story custom content types.',
  'public' => true,
  'menu_position' => 15,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'country_cpt' );

function country_cpt() {

register_post_type( 'country', array(
  'labels' => array(
    'name' => 'Countries',
    'singular_name' => 'Country',
   ),
  'description' => 'Country custom content types.',
  'public' => true,
  'menu_position' => 16,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'program_cpt' );

function program_cpt() {

register_post_type( 'program', array(
  'labels' => array(
    'name' => 'Programs',
    'singular_name' => 'Program',
   ),
  'description' => 'Program custom content types.',
  'public' => true,
  'menu_position' => 17,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'risk_cpt' );

function risk_cpt() {

register_post_type( 'risk', array(
  'labels' => array(
    'name' => 'Risks',
    'singular_name' => 'Risk',
   ),
  'description' => 'Risk custom content types.',
  'public' => true,
  'menu_position' => 22,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'risk_story_cpt' );

function risk_story_cpt() {

register_post_type( 'risk_story', array(
  'labels' => array(
    'name' => 'Risk Stories',
    'singular_name' => 'Risk Story',
   ),
  'description' => 'Risk Story custom content types.',
  'public' => true,
  'menu_position' => 23,
  'supports' => array( 'title', 'editor' )
));
}

add_action( 'init', 'risk_cat_cpt' );

function risk_cat_cpt() {

register_post_type( 'risk_cat', array(
  'labels' => array(
    'name' => 'Risk Categories',
    'singular_name' => 'Risk Category',
   ),
  'description' => 'Risk Category custom content types.',
  'public' => true,
  'menu_position' => 21,
  'supports' => array( 'title' )
));
}

add_action( 'init', 'sweetie_blog_cpt' );

function sweetie_blog_cpt() {

register_post_type( 'sweetie', array(
  'labels' => array(
    'name' => 'Sweetie Blogs',
    'singular_name' => 'Sweetie Blog',
   ),
  'description' => 'Sweetie Blog custom content types.',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'thumbnail' ),
  'rewrite' => array('slug' => 'sweetie')
));
}

add_action( 'init', 'resource_cpt' );

function resource_cpt() {

register_post_type( 'resource', array(
  'labels' => array(
    'name' => 'Resources',
    'singular_name' => 'Resource',
   ),
  'description' => 'Resources',
  'public' => true,
  'menu_position' => 42,
  'supports' => array( 'title' )
));
}

if ( ! function_exists( 'warblog_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function warblog_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep"></span>', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

function custom_menu_order($menu_ord) {  
	if (!$menu_ord) return true;    
		return array(  
		          'index.php', // Dashboard  
            	'separator1', // First separator  
		          'edit.php?post_type=page', // Pages 
            	'edit.php', // Posts  
	    	      'upload.php', // Media  
            	'link-manager.php', // Links   
            	'edit-comments.php', // Comments  
            	'separator2', // Second separator  
            	'themes.php', // Appearance  
            	'plugins.php', // Plugins  
            	'users.php', // Users  
            	'tools.php', // Tools  
            	'options-general.php', // Settings  
            	'separator-last', // Last separator  
        	);  
}  
    add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
    add_filter('menu_order', 'custom_menu_order');  



add_action("gform_pre_submission_filter_25", "pre_submission_handler");
function pre_submission_handler($form){
    
	//Retrieve form variables
    $c_name = filter_input(INPUT_POST, input_4_5);
    $billing_address = filter_input(INPUT_POST, input_21_1);
    $billing_state = filter_input(INPUT_POST, input_21_4);
    $billing_city = filter_input(INPUT_POST, input_21_3);
    $cardnumber = filter_input(INPUT_POST, input_4_1);
    $c_exp = $_POST["input_4_2"][0] . substr($_POST["input_4_2"][1],2,2);
	
	if (strlen($c_exp) < 4) {
		$c_exp = '0' . $c_exp;	// Prepend a 0 if c_exp has less than 4 digits
	}
    $czip = filter_input(INPUT_POST, input_21_5);
	$ccountry = "United States, US, 840";
    $email_addr = filter_input(INPUT_POST, input_3);
    
    //Determine Donation Amount
    if($_POST["input_7"] == "") {
        $tamt = filter_var(trim($_POST["input_6"]), FILTER_SANITIZE_STRING); //When custom amount is blank use radio button value
		$donationAmtType = 0; //Preset Values
    }
    else {
        $tamt = filter_var(trim($_POST["input_7"]), FILTER_SANITIZE_STRING); //Use Custom Amount Field
		$donationAmtType = 1; //Custom Value 
    }
    
    //Determine Donation Amount
    if($_POST["input_14"] == "program") {
        $designation = "Program-" . filter_var(trim($_POST["input_12"]), FILTER_SANITIZE_STRING); //Use Program Field if program is selected
    }
	else if($_POST["input_14"] == "current") {
        $designation = "Current-" . filter_var(trim($_POST["input_22"]), FILTER_SANITIZE_STRING); //Use Missionary Field if missionary is selected
    }
	else if($_POST["input_14"] == "missionary") {
        $designation = "Missionary-" . filter_var(trim($_POST["input_16"]), FILTER_SANITIZE_STRING); //Use Missionary Field if missionary is selected
    }
	else if($_POST["input_14"] == "circle") {
        $designation = "Circle Tour-" . filter_var(trim($_POST["input_23_3"]), FILTER_SANITIZE_STRING) . ' ' . filter_var(trim($_POST["input_23_6"]), FILTER_SANITIZE_STRING); //Use Missionary Field if missionary is selected
    }
	else if($_POST["input_14"] == "most-needed") {
        $designation = "Where Most Needed";
    }
    else {
        $designation = "Other-". filter_var(trim($_POST["input_14_other"]), FILTER_SANITIZE_STRING); //Use Other Field if selected
    }
	
	// Determine Recurring status of donation.
	if (filter_input(INPUT_POST, input_18_1) == "on") {
		$t_recurring = 1; 
	}
	else {
		$t_recurring = 0;
	}
	$t_recurring_amount = $tamt;
	$t_recurring_type = 1; //1 = Monthly, 2 = Daily
	$t_recurring_interval = filter_input(INPUT_POST, input_20);
	$t_recurring_non_business_days = 0;
	$t_recurring_indefinite = 1;
	$t_recurring_times_to_process = 0;
	$t_recurring_group = 39102; //Change to group for actual donations for launch
	
	//LIVE
    $mid = '259952865372';
    $mkey = 'K9I5U8Q8G2H2';
	//TEST
    //$mid = '934945455231';
    //$mkey = 'B3N8Q6B5Z5V2';

     //set the URL that will be posted to. 
     $eftsecure_url = "https://gateway.sagepayments.net/cgi-bin/eftbankcard.dll?transaction"; 
     //make your query. 
     $data = "m_id=" . $mid; //your eftsecure merchant id. 
     $data .= "&m_key=" . $mkey; // your eftsecure merchant key; 
     $data .= "&T_amt=" . urlencode($tamt); 	// The amount to be charged.  Always encode 
																	// any data given to you over the web.  it is more 
																	// secure and reliable. 
     $data .= "&C_name=" . urlencode($c_name); 
     $data .= "&C_address=" . urlencode($billing_address);
     $data .= "&C_state=" . urlencode($billing_state); 
     $data .= "&C_city=" . urlencode($billing_city); 
     $data .= "&C_cardnumber=" . urlencode($cardnumber); 
     $data .= "&C_exp=" . urlencode($c_exp); 
     $data .= "&C_zip=" . urlencode($czip);
	 $data .= "&C_country=" . urlencode($ccountry);
     $data .= "&C_email=" . urlencode($email_addr);
     $data .= "&T_code=01"; // transaction type indicator
	 $data .= "&T_memo=Designation: ". urlencode($designation);
	 $data .= "&T_recurring=". urlencode($t_recurring); 
	 $data .= "&T_recurring_amount=". urlencode($t_recurring_amount);
	 $data .= "&T_recurring_type=". urlencode($t_recurring_type); 
	 $data .= "&T_recurring_interval=". urlencode($t_recurring_interval);
	 $data .= "&T_recurring_non_business_days=". urlencode($t_recurring_non_business_days);
	 $data .= "&T_recurring_indefinite=". urlencode($t_recurring_indefinite);
	 $data .= "&T_recurring_times_to_process=". urlencode($t_recurring_times_to_process);
	 $data .= "&T_recurring_group=". urlencode($t_recurring_group);

     //now we will make the transaction.  the first method is the preferred internal method 
     //using the built in CURL functions. 
     $ch = curl_init();  //initialize the CURL library. 
     curl_setopt($ch, CURLOPT_URL, $eftsecure_url); // set the URL to post to. 
     curl_setopt($ch, CURLOPT_POST, 1); // tell it to POST not GET (you can GET but POST is 
                                        //preferred) 
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 		// set the data to be posted.
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 	// this tells the library to return the 
																					// data to you instead of writing it to 
																					// a file 
     $res = curl_exec($ch); // make the post.
	 
	 //var_dump($res); // Debug code for finding Gravity Form field names
     
	 curl_close($ch);  // shut down the curl library. 

    //send to appropriate page based on response code
    if ($res[1] == 'A') {
            header('Location: https://www.warinternational.org/donate/thank-you/');
			
			// Build custom donation amount string
			if ($donationAmtType == 1) {  //Custom Value Field
				$m = '${Amount:7}';
			}
			else {  //Preset Donation Values
				$m = "{Donation Amount:6}";
			}
			
			// If donation is recurring display extra info in Notification Email
			if ($t_recurring == 1) {
				$m .= ' every ' . $t_recurring_interval . ' month(s).';
			}
			
			// Replace REPLACE ME with proper Amount string
			$msg = $form["notifications"]["55032d3d60d77"]["message"];
			$msg = str_replace("REPLACE ME", $m, $msg);
			
			// Update Message with proper donation amount
			$form["notifications"]["55032d3d60d77"]["message"] = $msg;
    }
    else {
			$form["notifications"]["5182aff9455b3"]["isActive"] = false;
			$form["notifications"]["55032d3d60d77"]["isActive"] = false;
			//$form["notifications"]["5548fddd45503"]["isActive"] = false;
            //header('Location: http://localhost/wordpress/resources/');	
    }
	return $form;
}
?>