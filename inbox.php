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
        <a id="back" data-role="button" data-theme="d" href="./index.php" data-icon="arrow-l" data-iconpos="left" class="ui-btn-left back">Back</a>
        <h4 id="header" class="header">Inbox</h4>
    </div>
    <div data-role="content">
        <h4 id="phone_number" class="body">Phone Number: <?php echo $_GET["number"] ?></h4>
        <h5 id="phone_number" class="body">Numbers that have sent you SMS Messages</h4>
        <ul data-role="listview" data-divider-theme="b" data-inset="true">
            
            <?php
            require './db.php';
            $raw_number =  $_GET["number"];
            $number = "%" . preg_replace('/\s+/', '', $_GET["number"]) . "%"; 
// Querying the DB for the messages for a specfic incoming number

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$incoming_query = ("SELECT DISTINCT `sender_number` FROM `messages` WHERE `receiving_number` LIKE '" . $number . "' ORDER BY `db_id` DESC");

//$incoming_query = ("SELECT DISTINCT * FROM `messages` WHERE `receiving_number` LIKE '" . $number . "' ORDER BY `messages`.`db_id` DESC");
$result = mysqli_query($con,$incoming_query);



while($row = mysqli_fetch_assoc($result))
{
	echo "<li data-theme=\"c\"><a href=\"./message.php?from=". $row['sender_number'] . "&number=" . $raw_number .  "\" data-transition=\"slide\">". $row['sender_number'] . "</a></li>";
}

mysqli_close($con);

//echo "<li data-theme=\"c\"><a href=\"#page1\" data-transition=\"slide\">+44 20 3322 3250<span class=\"ui-li-count\">UK</span></a></li>";

   // <a href="#page1" data-transition="slide">FROM_number</a>
?>
            

        </ul>
    </div>
</div>
</body>
</html>
