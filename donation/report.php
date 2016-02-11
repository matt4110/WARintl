<!DOCTYPE html>
<html>
<body>

<h1>Women At Risk, International Donation Look-Up</h1><hr>

<?php
error_reporting(E_ALL);
//include ('admin.php');

$link = mysql_connect('127.0.0.1', 'fw3100844153', 'xutqj6tG744okAsH6Z4J8uijMFV9Xt');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('db1997927893', $link);
if (!$db_selected) {
    die ('Can\'t use db1997927893 : ' . mysql_error());
}



if (!$_POST['date1']) {
	$date1 = date("Y-m-d");
?>	
	<h2>Select Your Date Range:</h2>
	<form name="input" action="<? echo $_SERVER[PHP_SELF]; ?>" method="post">
	
	<select id="monthdropdown" name="month">
	<option disabled>SELECT MONTH</option>
	<!--
	<option value="2012-09">September 2012</option>
	<option value="2012-10">October 2012</option>
	<option value="2012-11">November 2012</option>
	<option value="2012-12">December 2012</option>

	<option value="">2013</option>
	-->
	<option value="2014-07">July 2014</option>
	<option value="2014-08">August 2014</option>
	<option value="2014-09">September 2014</option>
	<option value="2014-10">October 2014</option>
	<option value="2014-11">November 2014</option>
	<option value="2014-12">December 2014</option>
	<option value="2015-01">January 2015</option>
	<option value="2015-02">February 2015</option>
	<option value="2015-03">March 2015</option>
	<option value="2015-04">April 2015</option>
	<option value="2015-05">May 2015</option>
	<option value="2015-06">June2015</option>
	<option value="2015-07">July 2015</option>
		
	</select>
		<select name="date1">
	<option value="">SELECT Begin Day</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
	</select>
		<select name="date2">
	<option value="">SELECT End Day</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="29">28</option>
	<option value="30">29</option>
	<option value="31">30</option>
	<option value="32">31</option>
	</select>
	<input type="submit" />
	<br /><br />
	<label><input type="checkbox" name="show_only_success" checked />Show Only Successful Transactions</label>
	</form>	
	
	<script>
		var d = new Date();
		/*var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];*/
		var year = new String(d.getFullYear());
		var month = new String(d.getMonth()+1);
		if (month.length == 1) {
			month = '0'+ month;
		}
		var obj = document.getElementById('monthdropdown')
		obj.value=year+'-'+month;
	</script>
<?	
} else {
	$date1= $_POST['month'] . '-' . $_POST['date1'];
	$date2= $_POST['month'] . '-' . $_POST['date2'];


	//Find Manager Group ID
	$query = 'Select `id`, DATE_SUB( `date`, INTERVAL 4 HOUR ) `date`, `Name`, `Email`, IF(MailingList,\'Yes\',\'&nbsp;\') `MailingList`, `Address`, `City`, `State`, `Zip Code`, `Country`, `Amount`, IF(RecurringPayment,\'Yes\',\'&nbsp;\'), RecurringFrequency, `Designation`, `Notes`, `Type`, `Message`, `LogMessage` FROM donate WHERE date >="'. $date1 .'" AND date <="'. $date2 .'"';
	if ($_POST['show_only_success']=='on') {
		$query = $query . " AND LogMessage = 'SUCCESS!'";
	}
	$query = $query . " ORDER BY ID ASC";
	$result = mysql_query($query);
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}


echo "<table border='1'>";
echo "<tr><td></td><td> Date-Time </td><td> Name </td><td> Email </td><td> Mailing List </td><td> Address </td><td> City </td><td> State </td><td> Zip Code </td><td> Country </td><td> Amount </td><td> Recurring Payment</td><td> Recurring Frequency</td><td> Designation </td><td> Notes </td><td> Card Type </td><td> Bank Message </td><td> Log Message </td></tr>";
while ($row = mysql_fetch_array($result)) {
	
    printf("<tr><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td></tr>", $row['id'], $row['date'], $row['Name'], $row['Email'], $row['MailingList'], $row['Address'], $row['City'],  $row['State'], $row['Zip Code'], $row['Country'], $row['Amount'], $row['RecurringPayment'], $row['RecurringFrequency'], $row['Designation'], $row['Notes'], $row['Type'], $row['Message'], $row['LogMessage']);  
	
}
echo "</table>";



}

mysql_close($link);


?>
