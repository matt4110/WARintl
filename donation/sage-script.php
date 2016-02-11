<?php

//**********VALIDATION START***************

//First Name Validation
if (!isset($_POST['C_first_name']) OR trim($_POST['C_first_name']) == '') {
	LogError('Please enter a first name.  Press [Back] in your browser and try again.');
}
$c_name = trim($_POST['C_first_name']);

//Middle Name Validation
if (isset($_POST['C_middle_initial']) AND trim($_POST['C_middle_initial']) != '') {
	$c_name = $c_name . " " . trim($_POST['C_middle_initial']);
}

//Last Name Validation
if (!isset($_POST['C_last_name']) OR trim($_POST['C_last_name']) == '') {
	LogError('Please enter a last name.  Press [Back] in your browser and try again.');
}
$c_name = $c_name . " " . trim($_POST['C_last_name']) ;
$c_name = filter_var($c_name, FILTER_SANITIZE_STRING);

//Billing Address Validation
if (!isset($_POST['C_address']) OR trim($_POST['C_address']) == '') {
	LogError('Please enter a billing address.  Press [Back] in your browser and try again.');
}
$billing_address = filter_var(trim($_POST['C_address']), FILTER_SANITIZE_STRING);

if (!isset($_POST['C_city']) OR trim($_POST['C_city']) == '') {
	LogError('Please enter a billing city.  Press [Back] in your browser and try again.');
}
$billing_city = filter_var(trim($_POST['C_city']), FILTER_SANITIZE_STRING);

if (!isset($_POST['C_state']) OR trim($_POST['C_state']) == '') {
	LogError('Please enter a billing state.  Press [Back] in your browser and try again.');
}
$billing_state = filter_var(trim($_POST['C_state']), FILTER_SANITIZE_STRING);

if (!isset($_POST['C_zip']) OR trim($_POST['C_zip']) == '') {
	LogError('Please enter a zip code.  Press [Back] in your browser and try again.');
}
$czip = filter_var(trim($_POST['C_zip']), FILTER_SANITIZE_STRING);
$billing_country = $_POST['C_country'];
if ($billing_country == 'AL-Albania') {
	exit('');
}
$phone_no = filter_var(trim($_POST['C_telephone']), FILTER_SANITIZE_STRING);
$email_addr = filter_var(trim($_POST['C_email']), FILTER_SANITIZE_STRING);


if (isset($_POST['C_mailing_list'])) {
	$mailing_list = TRUE;
}else{
	$mailing_list = FALSE;
}

if (!isset($_POST['C_cardnumber']) OR trim($_POST['C_cardnumber']) == '') {
	LogError('Please enter a credit card number.  Press [Back] in your browser and try again.');
}
$cardnumber = filter_var(trim($_POST['C_cardnumber']), FILTER_SANITIZE_STRING);

if ($_POST['T_amt'] == '' OR $_POST['T_amt'] == 'other') {
	$amount = filter_var(trim($_POST['T_amt_other']), FILTER_SANITIZE_STRING);
}else{
	$amount = $_POST['T_amt'];
}

$tamt = number_format($amount, 2, '.', '');

if ($tamt == 0) {
	LogError('Please enter a dollar amount greater than zero.  Press [Back] in your browser and try again.');
}

if (isset($_POST['Recurring_Payment'])) {
	$Recurring_Payment = TRUE;
	$Recurring_Frequency = $_POST['Recurring_Frequency'];
}else{
	$Recurring_Payment = FALSE;
	$Recurring_Frequency = '';
}

$designation = filter_var(trim($_POST['T_designation']), FILTER_SANITIZE_STRING);
$note = filter_var(trim($_POST['T_memo']), FILTER_SANITIZE_STRING);

//block SPAM ips

$bad_ips = array("96.47.224.218",
"96.47.224.42",
"96.47.224.50",
"96.47.224.58",
"96.47.225.162",
"96.47.225.170",
"96.47.225.178",
"96.47.225.186",
"96.47.225.66",
"96.47.225.74",
"96.47.225.82",
"173.44.37.226",
"173.44.37.234",
"173.44.37.242",
"173.44.37.250");

if (in_array($_SERVER['REMOTE_ADDR'], $bad_ips)) {
    exit('Please try again.');
    $_POST["recaptcha_response_field"] = 'try again';
}


//Recaptcha Stuff
/*
require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Lf4R-ASAAAAAHswDqOTUXFPkpUoDRZ1FZKR_WOO";
$privatekey = "6Lf4R-ASAAAAAN_ZeYXyPBcb_ew_qEA1FQorXVGf";

// the response from reCAPTCHA
$resp = null;
// the error code from reCAPTCHA, if any
$error = null;

// was there a reCAPTCHA response?
if (!isset($_POST["recaptcha_response_field"])) {
	LogError('There was an error with the ReCaptcha.  Press [Back] in your browser and try again.');   
}

$resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
	LogError('The ReCaptcha Words you entered appear incorrect.  Please press [Back] in your browser and try again.');
}
*/
//**********VALIDATION END***************

//variables
$mid = '259952865372';
$mkey = 'K9I5U8Q8G2H2';

$c_exp = $_POST['C_exp_month'] . $_POST['C_exp_year'];

 //set the URL that will be posted to. 
 $eftsecure_url = "https://gateway.sagepayments.net/cgi-bin/eftbankcard.dll?transaction"; 
 //make your query. 
 $data = "m_id=" . $mid; //your eftsecure merchant id. 
 $data .= "&m_key=" . $mkey; // your eftsecure merchant key; 
 $data .= "&T_amt=" . urlencode($tamt); // The amount to be charged.  Always encode 
                                         // any data given to you over the web.  it is more 
                                         // secure and reliable. 
 $data .= "&C_name=" . urlencode($c_name); 
 $data .= "&C_address=" . urlencode($billing_address); 
 $data .= "&C_state=" . urlencode($billing_state); 
 $data .= "&C_city=" . urlencode($billing_city); 
 $data .= "&C_cardnumber=" . urlencode($cardnumber); 
 $data .= "&C_exp=" . urlencode($c_exp); 
 $data .= "&C_zip=" . urlencode($czip); 
 $data .= "&C_email=" . urlencode($email_addr); 
 $data .= "&T_code=01"; // transaction type indicator 
      
      
 //now we will make the transaction.  the first method is the preferred internal method 
 //using the built in CURL functions. 
       
       
 $ch = curl_init();  //initialize the CURL library. 
 curl_setopt($ch, CURLOPT_URL, $eftsecure_url); // set the URL to post to. 
 curl_setopt($ch, CURLOPT_POST, 1); // tell it to POST not GET (you can GET but POST is 
                                    //preferred) 
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // set the data to be posted. 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // this tells the library to return the 
                                                   // data to you instead of writing it to 
                                                   // a file 
 $res = curl_exec($ch); // make the post. 
 curl_close($ch);  // shut down the curl library. 
         
  if (ereg("^5[1-5][0-9]{14}$", $cardnumber))
                $cctype = "Mastercard";
 
        if (ereg("^4[0-9]{12}([0-9]{3})?$", $cardnumber))
                $cctype = "Visa";
 
        if (ereg("^3[47][0-9]{13}$", $cardnumber))
                $cctype = "American Express";
 
        if (ereg("^3(0[0-5]|[68][0-9])[0-9]{11}$", $cardnumber))
                $cctype = "Diners Club";
 
        if (ereg("^6011[0-9]{12}$", $cardnumber))
                $cctype = "Discover";
 
        if (ereg("^(3[0-9]{4}|2131|1800)[0-9]{11}$", $cardnumber))
                $cctype = "JCB";


$message = substr($res, 8, 32);

//send to appropriate page based on response code

if ($res[1] == 'A') {
        LogMessage('SUCCESS!');
	header('Location: https://www.warinternational.org/donate/thank-you/');
}
else {
	LogError($res . 'The credit card information you entered could not be processed.  Please press [Back] in your browser, verify that all of the information is correct, and try submitting again.');
}


function LogError($logstring){
    LogMessage($logstring);
    exit($logstring);
}

function LogMessage($logstring) {
    global $c_name, $billing_address, $billing_city, $billing_state, $czip, $billing_country, $tamt, $note, $designation, $cctype, $message, $email_addr, $mailing_list, $phone_no;
    
    $sql = "INSERT INTO `db1997927893`.`donate` (`id`, `Name`, `Address`, `City`, `State`, `Zip Code`, `Country`, `Amount`, `RecurringPayment`, `RecurringFrequency`, `Notes`, `Designation`, `Type`, `Message`, `Email`, `MailingList`, `PhoneNo`, `Remote_Addr`, `HTTP_User_Agent`, `LogMessage`) 
    VALUES (NULL,'"
    . $c_name ."', '"
    . $billing_address ."', '"
    . $billing_city ."', '"
    . $billing_state ."', '"
    . $czip ."', '"
    . $billing_country ."', '"
    . $tamt ."', '"
    . $Recurring_Payment ."', '"
    . $Recurring_Frequency ."', '"
    . $note ."', '"
    . $designation ."', '"
    . $cctype ."', '"
    . $message ."', '"
    . $email_addr ."', '"
    . $mailing_list ."', '"
    . $phone_no ."', '"
    . $_SERVER['REMOTE_ADDR'] ."', '"
    . $_SERVER['HTTP_USER_AGENT'] ."', '"
    . $logstring ."')";

    //Write to database for reporting
    $link = mysql_connect('127.0.0.1', 'fw3100844153', 'xutqj6tG744okAsH6Z4J8uijMFV9Xt');
    if (!$link) {
        EXIT('Could not connect: ' . mysql_error());
    }

    //$sql = filter_var($sql, FILTER_SANITIZE_STRING); //Formats input query so sql injection is nullified. -ald 5/12/13

    $result = mysql_query($sql);
    if (!$result) {
            exit('Invalid query: ' . mysql_error());
    }
}
?>
