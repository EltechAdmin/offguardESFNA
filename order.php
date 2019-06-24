<?php
//include file which will make mysqli connection, this functionality will likely need improvements
include_once('/php/db.php');
//include_once($_SERVER['DOCUMENT_ROOT'].'/offguard/php/db.php');

$ref=@$_SERVER[HTTP_REFERER];
$agent=@$_SERVER[HTTP_USER_AGENT];
$ip=@$_SERVER['REMOTE_ADDR'];
$tracking_page_name2 = $_SERVER["SCRIPT_NAME"];
//$orderNumberr = $_POST['orderNumber'];
$orderNumber = $_SERVER["REQUEST_TIME"];

$strSQL = "INSERT INTO new_order( orderNumber, ref, agent, ip, tracking_page_name) VALUES (:orderNumber,:ref,:agent,:ip,:tracking_page_name)";

$sql=$dbo->prepare($strSQL);
$sql->bindParam(':orderNumber',$orderNumber);
$sql->bindParam(':ref',$ref);
$sql->bindParam(':agent',$agent);
$sql->bindParam(':ip',$ip);
$sql->bindParam(':tracking_page_name',$tracking_page_name2);

if($sql->execute()){
// Part of the code to execute after successful execution of query

//echo " Success ";
}
else{ 
// Part of the code to execute if query fails ///
//echo print_r($sql->errorInfo()); 
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>ethimoX</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' type='text/css' href='css/orders.css'/>
  <link rel='stylesheet' type='text/css' href='css/sections.css'/>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


  <!-- TODO: Missing CoffeeScript 2 -->

  <script type="text/javascript">


    window.onload=function(){
      


    }

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">ethimoX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class="orderDiv">
  <h1 class="sectionHeader">Customize Your Order Below</h1>
  <!--  <h2 class="sectionHeader">Order number <?php echo $orderNumber;?></h2> -->
</div>
</header>

<!-- Page Content -->

<section class="textdivOrders">
  <div class="container">
    <iframe
      id="JotFormIFrame-91310466825153"
      title="Uniform Order Form"
      onload="window.parent.scrollTo(0,0)"
      allowtransparency="true"
      allowfullscreen="true"
      allow="geolocation; microphone; camera"
      src="https://form.jotform.com/91310466825153"
      frameborder="0"
      style="width: 1px;
      min-width: 100%;
      height:539px;
      border:none;
      margin-top: 6px;"
      scrolling="no"
    >
    </iframe>
    <script type="text/javascript">
      var ifr = document.getElementById("JotFormIFrame-91310466825153");
      if(window.location.href && window.location.href.indexOf("?") > -1) {
        var get = window.location.href.substr(window.location.href.indexOf("?") + 1);
        if(ifr && get.length > 0) {
          var src = ifr.src;
          src = src.indexOf("?") > -1 ? src + "&" + get : src  + "?" + get;
          ifr.src = src;
        }
      }
      window.handleIFrameMessage = function(e) {
        if (typeof e.data === 'object') { return; }
        var args = e.data.split(":");
        if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
        if (!iframe) { return; }
        switch (args[0]) {
          case "scrollIntoView":
            iframe.scrollIntoView();
            break;
          case "setHeight":
            iframe.style.height = args[1] + "px";
            break;
          case "collapseErrorPage":
            if (iframe.clientHeight > window.innerHeight) {
              iframe.style.height = window.innerHeight + "px";
            }
            break;
          case "reloadPage":
            window.location.reload();
            break;
          case "loadScript":
            var src = args[1];
            if (args.length > 3) {
                src = args[1] + ':' + args[2];
            }
            var script = document.createElement('script');
            script.src = src;
            script.type = 'text/javascript';
            document.body.appendChild(script);
            break;
          case "exitFullscreen":
            if      (window.document.exitFullscreen)        window.document.exitFullscreen();
            else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
            else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
            else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
            else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
            break;
        }
        var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
        if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
          var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
          iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
        }
      };
      if (window.addEventListener) {
        window.addEventListener("message", handleIFrameMessage, false);
      } else if (window.attachEvent) {
        window.attachEvent("onmessage", handleIFrameMessage);
      }
      </script>
        
  </div>

</section>


    <footer class="footer-distributed">
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="footer-left">

        <h3>Company<span>logo</span></h3>

        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Products</a>
          ·
          <a href="#">Services</a>
          ·
          <a href="#">Contact</a>
          

        </p>

        <p class="footer-company-name">Company Name &copy; 2019</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>PO BOX 55035</span> Atlanta, Ga 30308</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>404-901-0484</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@inlivery.com">support@offguadpics.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-pinterest"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>

        </div>

      </div>

    </footer>
</body>
</html>
