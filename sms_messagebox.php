<?php

// Twilio SMS Inbox Service
// This PHP script will recieve the incoming SMS messages inject them into the DB and then send out the Prowl Alert so the registered Prowl Device.
include('./ProwlPHP.php');
require './db.php';

// Data From Twilio
$messagesid = $_REQUEST['MessageSid'];
$sender_number = $_REQUEST['From'];
$receiving_number = $_REQUEST['To'];
$body = $_REQUEST['Body'];
$direction = 'Incoming';

// TimeStamp
$timestamp = time();

// SQL Connection Details
// Inject the message into the DB

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect input into MySQL: " . mysqli_connect_error();
}

// Forming the injection query

$message_query = "INSERT INTO `$chosen_database`.`messages` (`db_id`, `SID`, `timestamp`, `sender_number`, `receiving_number`, `body`, `direction`, `threaded_id`) VALUES (NULL, '$messagesid', '$timestamp', '$sender_number', '$receiving_number', '$body', '$direction', '0');";

// Injecting the data into the DB

mysqli_query($con,$message_query);

//echo 'Data inserted';
// Make the Prowl Alert

$prowl->push(array('application'=>'Message Box', 'event'=>'Incoming SMS', 'description'=>'Incoming SMS from ' . $sender_number, 'priority'=>0,),true);

?>