<?php

$to = $_GET['to'];
// Clean up to and make it suitable for Twilio.
$to = str_replace('%20','+',$to);
$to = str_replace(' ','+',$to);

$from = $_GET['from'];
//$message_thread = $_GET['thread'];
//$lastmessage = $_GET['lastmessage'];
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
<div data-role="page" id="reply_sms">
    <div id="header" data-theme="d" data-role="header" class="header">
        <a id="cancel" data-role="button" href="./index.php" data-icon="arrow-l" data-iconpos="left"
        class="ui-btn-left header">
            Cancel
        </a>
        <h3 id="reply_number" class="header">
            <?php echo $to;?>
        </h3>
    </div>
    <div data-role="content">
        <form id="reply_message" action="./send_sms.php" method="POST"
        class="reply_message">
            <div data-role="fieldcontain" class="reply_message">
            <input name="to" id="to" value="<?php echo $to;?>" type="hidden">
            <input name="from" id="from" value="<?php echo $from;?>" type="hidden">
			<label for="message">Message:</label><textarea name="message" id="message" ></textarea>
			</div>
            <input id="submit" type="submit" value="Send SMS" class="reply_message">
        </form>
    </div>
</div>
</body>
</html>
