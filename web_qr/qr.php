<!DOCTYPE html>
<html>

<head>
  <title>Express</title>
  <link rel="stylesheet" href="stylesheets/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
  <script src="javascripts/html5_qrcode.min.js"></script>
  <script src="javascripts/main.js"></script>
</head>

<body>
  <h1>Camera Test</h1>
  <div id="main_content_wrap" class="outer"></div>
  <section id="main_content" class="inner center">
    <h3 class="center">QR code Reader Demo</h3>
    <div id="reader" style="width:300px;height:250px;" class="center"></div>
    <h6 class="center">Result</h6><span id="read" class="center"></span>
    <br>
    <h6 class="center">Read Error (Debug only)</h6><span class="center">Will constantly show a message, can be ignored</span><span id="read_error" class="center"></span>
    <br>
    <h6 class="center">Video Error</h6><span id="vid_error" class="center"></span>
    <br>
    <br>
    <br>
   <?php echo $_SESSION["code"]; ?>
  </section>
</body>

</html>
