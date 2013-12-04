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
<div data-role="page" id="Send_SMS">
    <div id="header" data-theme="d" data-role="header" class="header">
        <a id="home" data-role="button" href="./index.php" data-icon="arrow-l" data-iconpos="left"
        class="ui-btn-left header">Back</a>
        <h3 id="compose" class="header">Compose SMS</h3>
    </div>
    <div data-role="content">
        <form id="send_sms" action="./send_sms.php" method="POST" class="send_sms">
            <div data-role="fieldcontain" class="send_sms">
                <label for="to">Send SMS To:</label>
                <input name="to" id="to" placeholder="" value="" type="text">
            </div>
            <div data-role="fieldcontain" class="send_sms">
                <label for="from">Send SMS From:</label>
                <input name="from" id="from" placeholder="" value="+14152555613" type="text">
            </div>
            <div data-role="fieldcontain" class="send_sms">
                <label for="sms_body">Message</label>
                <textarea name="message" id="sms_body" placeholder=""></textarea>
            </div>
            <input id="submit" type="submit" value="Send" class="submit">
        </form>
    </div>
</div>
</body>
</html>
