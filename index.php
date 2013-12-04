<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-icon" href="http://trekstorecincinnati.com/merchant/863/images/site/envelope_icon.png">
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
        <h3>Chicken and Bee</h3>
        <h5>Mobile Messaging For Mathew Jenkinson</h5>
        <ul id="messageList" data-role="listview" data-divider-theme="d" data-inset="true"
        class="body">
            <li data-role="list-divider" role="heading">SMS Numbers</li>

<?php
require './db.php';

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
