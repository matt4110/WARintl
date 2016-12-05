<?php


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