<?php

// You can sign up for a Twilio account at: https://www.twilio.com/try-twilio
// Set the AccountSid and AuthToken from twilio.com/user/account
    $AccountSid = "ACxxxxxxxxx";
    $AuthToken = "xzabc123";

// Your Prowl API key
// If you dont have a Prowl key, go to: 
// https://www.prowlapp.com/register.php

$prowl = new Prowl('abc123456xyz');

// Your database details

$host = ""; // Usually Localhost
$db_username = ""; // Database Username
$db_password = ""; // Database Password
$chosen_database = ""; // The database where messages table is stored

$con=mysqli_connect($host,$db_username,$db_password,$chosen_database); // MySQL connection details.

?>
