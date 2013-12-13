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
<div data-role="page" id="inbox">
    <div id="header" data-theme="d" data-role="header" class="header">
        <a id="back" data-role="button" data-theme="d" href="./inbox.php?number=<?php echo $_GET["number"] ?>" data-icon="arrow-l" data-iconpos="left" class="ui-btn-left back">Back</a>
        <h4 id="header" class="header">Recent Messages</h4>
    </div>
    <div data-role="content">
        <h4 id="phone_number" class="body">From: <?php echo $_GET["from"] ?></h4>
        <a id="new_message" data-role="button" data-transition="slide" data-theme="d" href="./reply_message.php?to=<?php echo $_GET["from"] ?>&from=+14152555613" data-icon="plus" data-iconpos="right" class="body">Reply</a>

        <ul data-role="listview" data-divider-theme="b" data-inset="true">
            
            <?php
            $number = "%" . preg_replace('/\s+/', '', $_GET["from"]) . "%"; 

require './db.php';

// Querying the DB for the messages for a specfic incoming number
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $incoming_query = ("SELECT *  FROM `messages` WHERE `sender_number` LIKE '%" . $number . "%' OR `receiving_number` LIKE '%" . $number . "%' ORDER BY `timestamp` DESC");
  
//$incoming_query = ("SELECT *  FROM `messages` WHERE `sender_number` LIKE '" . $number . "' ORDER BY `db_id` DESC");
$result = mysqli_query($con,$incoming_query);


while($row = mysqli_fetch_array($result))
  {
  echo "<li data-theme=\"c\">". $row['body'] . "<span class=\"ui-li-count\">" . $row['direction'] . "</span></li>";
  }

mysqli_close($con);

//echo "<li data-theme=\"c\"><a href=\"#page1\" data-transition=\"slide\">+44 20 3322 3250<span class=\"ui-li-count\">UK</span></a></li>";

   // <a href="#page1" data-transition="slide">FROM_number</a>
?>
        </ul>
<a id="new_message" data-role="button" data-transition="slide" data-theme="d" href="./reply_message.php?to=<?php echo $_GET["from"] ?>&from=<?php echo $_GET["number"] ?>" data-icon="plus" data-iconpos="right" class="body">Reply</a>

    </div>
</div>
</body>
</html>
