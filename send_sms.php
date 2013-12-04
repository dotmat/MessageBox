<?php
$timenow = time();
 
// Call the resources to allow the page to SMS
require './php/Services/Twilio.php';
require './db.php';
   
// Receive the POSTed data and generate appropriate variables where needed.
$to = $_POST['to'];

// Remove the white spaces and brackets to leave only the +NNNNNNNN
$to = str_replace(' ', '', $to);
$to = str_replace('(', '', $to);
$to = str_replace(')', '', $to);
$to = str_replace('-', '', $to);

if (strpos($to,'+') !== false) {
}
else
{
$to = '+' . $to;
}

$from = $_POST['from'];
$body = $_POST['message'];

// Call the Twilio SMS client and send the needed data as an SMS message.

$client = new Services_Twilio($AccountSid, $AuthToken);
 
$sms = $client->account->sms_messages->create($from, $to, $body);

$messagesid = "{$sms->sid}";

// Injecting the data into the MySQL DB

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect input into MySQL: " . mysqli_connect_error();
}

$outGoingMessage = "INSERT INTO `$chosen_database`.`messages` (`db_id`, `SID`, `timestamp`, `sender_number`, `receiving_number`, `body`, `direction`, `threaded_id`) VALUES (NULL, '$messagesid', '$timenow', '$from', '$to', '$body', 'Outgoing', '0')";
//mysqli_query($con, $outGoingMessage);


if (mysqli_query($con, $outGoingMessage))
  {
  // echo "Well that worked";
  }
else
  {
  // echo "Doh: " . mysqli_error($con);
  }


// echo $messagesid;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title></title>
  
  
  
  <link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="codiqa.ext.css">
  
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
  <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

  <!-- Extra Codiqa features -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/codiqa.ext.js"></script>
   
</head>
<body>
<!-- Home -->
<div data-role="page" id="home">
    <div id="header" data-theme="d" data-role="header" class="header">
        <h3 id="header" class="header">Messages</h3>
    </div>
    <div data-role="content">
    	<h3>Message was Sent!</h3>
        <h3>Chicken and Bee</h3>
        <h5>Mobile Messaging For Mathew Jenkinson</h5>
        <ul id="messageList" data-role="listview" data-divider-theme="d" data-inset="true"
        class="body">
            <li data-role="list-divider" role="heading">SMS Numbers</li>

<?php
// Querying the DB for the unique incoming numbers

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$incoming_query = ("SELECT DISTINCT `receiving_number` FROM `messages` WHERE `direction` = 'incoming'");
$result = mysqli_query($con,$incoming_query);


while($row = mysqli_fetch_array($result))
  {
  echo "<li data-theme=\"c\"><a href=\"./inbox.php?number=" . $row['receiving_number'] . "\" data-transition=\"slide\">" . $row['receiving_number'] ."<span class=\"ui-li-count\">Incoming</span></a></li>";
  }

mysqli_close($con);

//echo "<li data-theme=\"c\"><a href=\"#page1\" data-transition=\"slide\">+44 20 3322 3250<span class=\"ui-li-count\">UK</span></a></li>";
?>
        
        </ul>
    <a id="new_message" data-role="button" data-transition="slide" data-theme="d" href="./compose_sms.php" data-icon="plus" data-iconpos="right" class="body">New Message</a>
    </div>
</div>
</body>
</html>
