<?php
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


/**
* Better Pre-submission Confirmation
* http://gravitywiz.com/2012/08/04/better-pre-submission-confirmation/
*/
 
class GWPreviewConfirmation {
 
    private static $lead;
 
    function init() {
 
        add_filter('gform_pre_render', array('GWPreviewConfirmation', 'replace_merge_tags'));
        add_filter('gform_replace_merge_tags', array('GWPreviewConfirmation', 'product_summary_merge_tag'), 10, 3);
 
    }
 
    public static function replace_merge_tags($form) {
 
        $current_page = isset(GFFormDisplay::$submission[$form['id']]) ? GFFormDisplay::$submission[$form['id']]['page_number'] : 1;
        $fields = array();
 
        // get all HTML fields on the current page
        foreach($form['fields'] as &$field) {
 
            // skip all fields on the first page
            if(rgar($field, 'pageNumber') <= 1)
                continue;
 
            $default_value = rgar($field, 'defaultValue');
            preg_match_all('/{.+}/', $default_value, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                // if default value needs to be replaced but is not on current page, wait until on the current page to replace it
                if(rgar($field, 'pageNumber') != $current_page) {
                    $field['defaultValue'] = '';
                } else {
                    $field['defaultValue'] = self::preview_replace_variables($default_value, $form);
                }
            }
 
            // only run 'content' filter for fields on the current page
            if(rgar($field, 'pageNumber') != $current_page)
                continue;
 
            $html_content = rgar($field, 'content');
            preg_match_all('/{.+}/', $html_content, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                $field['content'] = self::preview_replace_variables($html_content, $form);
            }
 
        }
 
        return $form;
    }
 
    /**
    * Adds special support for file upload, post image and multi input merge tags.
    */
    public static function preview_special_merge_tags($value, $input_id, $merge_tag, $field) {
        
        // added to prevent overriding :noadmin filter (and other filters that remove fields)
        if( !$value )
            return $value;
        
        $input_type = RGFormsModel::get_input_type($field);
        
        $is_upload_field = in_array( $input_type, array('post_image', 'fileupload') );
        $is_multi_input = is_array( rgar($field, 'inputs') );
        $is_input = intval( $input_id ) != $input_id;
        
        if( !$is_upload_field && !$is_multi_input )
            return $value;
 
        // if is individual input of multi-input field, return just that input value
        if( $is_input )
            return $value;
            
        $form = RGFormsModel::get_form_meta($field['formId']);
        $lead = self::create_lead($form);
        $currency = GFCommon::get_currency();
 
        if(is_array(rgar($field, 'inputs'))) {
            $value = RGFormsModel::get_lead_field_value($lead, $field);
            return GFCommon::get_lead_field_display($field, $value, $currency);
        }
 
        switch($input_type) {
        case 'fileupload':
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = self::preview_image_display($field, $form, $value);
            break;
        default:
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = GFCommon::get_lead_field_display($field, $value, $currency);
            break;
        }
 
        return $value;
    }
 
    public static function preview_image_value($input_name, $field, $form, $lead) {
 
        $field_id = $field['id'];
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);
        $source = RGFormsModel::get_upload_url($form['id']) . "/tmp/" . $file_info["temp_filename"];
 
        if(!$file_info)
            return '';
 
        switch(RGFormsModel::get_input_type($field)){
 
            case "post_image":
                list(,$image_title, $image_caption, $image_description) = explode("|:|", $lead[$field['id']]);
                $value = !empty($source) ? $source . "|:|" . $image_title . "|:|" . $image_caption . "|:|" . $image_description : "";
                break;
 
            case "fileupload" :
                $value = $source;
                break;
 
        }
 
        return $value;
    }
 
    public static function preview_image_display($field, $form, $value) {
 
        // need to get the tmp $file_info to retrieve real uploaded filename, otherwise will display ugly tmp name
        $input_name = "input_" . str_replace('.', '_', $field['id']);
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);
 
        $file_path = $value;
        if(!empty($file_path)){
            $file_path = esc_attr(str_replace(" ", "%20", $file_path));
            $value = "<a href='$file_path' target='_blank' title='" . __("Click to view", "gravityforms") . "'>" . $file_info['uploaded_filename'] . "</a>";
        }
        return $value;
 
    }
 
    /**
    * Retrieves $lead object from class if it has already been created; otherwise creates a new $lead object.
    */
    public static function create_lead( $form ) {
        
        if( empty( self::$lead ) ) {
            self::$lead = RGFormsModel::create_lead( $form );
            self::clear_field_value_cache( $form );
        }
        
        return self::$lead;
    }
 
    public static function preview_replace_variables($content, $form) {
 
        $lead = self::create_lead($form);
 
        // add filter that will handle getting temporary URLs for file uploads and post image fields (removed below)
        // beware, the RGFormsModel::create_lead() function also triggers the gform_merge_tag_filter at some point and will
        // result in an infinite loop if not called first above
        add_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'), 10, 4);
 
        $content = GFCommon::replace_variables($content, $form, $lead, false, false, false);
 
        // remove filter so this function is not applied after preview functionality is complete
        remove_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'));
 
        return $content;
    }
 
    public static function product_summary_merge_tag($text, $form, $lead) {
 
        if(empty($lead))
            $lead = self::create_lead($form);
 
        $remove = array("<tr bgcolor=\"#EAF2FA\">\n                            <td colspan=\"2\">\n                                <font style=\"font-family: sans-serif; font-size:12px;\"><strong>Order</strong></font>\n                            </td>\n                       </tr>\n                       <tr bgcolor=\"#FFFFFF\">\n                            <td width=\"20\">&nbsp;</td>\n                            <td>\n                                ", "\n                            </td>\n                        </tr>");
        $product_summary = str_replace($remove, '', GFCommon::get_submitted_pricing_fields($form, $lead, 'html'));
 
        return str_replace('{product_summary}', $product_summary, $text);
    }
    
    public static function clear_field_value_cache( $form ) {
        
        if( ! class_exists( 'GFCache' ) )
            return;
            
        foreach( $form['fields'] as &$field ) {
            if( GFFormsModel::get_input_type( $field ) == 'total' )
                GFCache::delete( 'GFFormsModel::get_lead_field_value__' . $field['id'] );
        }
        
    }
 
}
 
GWPreviewConfirmation::init();


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
	else if($_POST["input_14"] == "missionary") {
        $designation = "Missionary-" . filter_var(trim($_POST["input_16"]), FILTER_SANITIZE_STRING); //Use Missionary Field if missionary is selected
    }
	else if($_POST["input_14"] == "circle-tour") {
        $designation = "Circle Tour-" . filter_var(trim($_POST["input_23_3"]), FILTER_SANITIZE_STRING) . ' ' . filter_var(trim($_POST["input_23_6"]), FILTER_SANITIZE_STRING); //Use Participant Name if Circle Tour is selected
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