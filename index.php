<?php
//include file which will make mysqli connection, this functionality will likely need improvements
//include_once('/php/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ethimox/php/db.php');
//include_once($_SERVER['DOCUMENT_ROOT'].'/php/db.php');

//$sql = get_mysqli_connection();

$ref=@$_SERVER[HTTP_REFERER];
$agent=@$_SERVER[HTTP_USER_AGENT];
$ip=@$_SERVER['REMOTE_ADDR'];
$tracking_page_name2 = $_SERVER["SCRIPT_NAME"];
$orderNumber = $_SERVER["REQUEST_TIME"];

//if(strlen($ref) > 2 and !(stristr($ref,"localhost"))){  // exclude referrer from your own site. 
$strSQL = "INSERT INTO track( ref, agent, ip, tracking_page_name) VALUES (:ref,:agent,:ip,:tracking_page_name)";

$sql=$dbo->prepare($strSQL);

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
///////////// inserted details 
//}

?>


<!DOCTYPE html>
<html>
<head>

  <title>ethimoX</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://ethimox.s3.us-east-2.amazonaws.com/ethimoX-03+(1).png">
  <link rel='stylesheet' type='text/css' href='css/store.css'/>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
  <!-- TODO: Missing CoffeeScript 2 -->

  <script type="text/javascript">

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
window.onhashchange = function() {hidebanner();};

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


function hidebanner() {
        if (window.location.href == window.location.protocol+"//"+window.location.hostname+"/ethimoX/") {
            document.getElementById("banner").style.display = "block";

      } else {
           document.getElementById("banner").style.display = "none";

      }
}


</script>
</head>

<header class="header">
  <a href="index.php" class="logo">ethimoX</a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

  <ul class="menu">
    <li><a href="">Home</a></li>
    <li><a href="designs.php">Designs</a></li>
    <li><a href="events.php">Events</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</header>


<body>    <!-- Navigation -->

<div class="store">


<div data-layout="BIG_ICON_DETAILS_SUBTOTAL" class="ec-cart-widget"></div>
<div><script data-cfasync="false" type="text/javascript"
src="https://app.ecwid.com/script.js?17537199&data_platform=code" 
charset="utf-8"></script><script>Ecwid.init();</script></div>



<div class="search" id="my-search-17537199"></div>
<div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?17537199&data_platform=code&data_date=2019-08-09" charset="utf-8"></script>
<script type="text/javascript"> xSearch("id=my-search-17537199"); </script>
</div>
<!--
<div id="my-categories-17537199"> </div> <div> <script type="text/javascript" src="https://app.ecwid.com/script.js?17537199&data_platform=code" charset="utf-8"></script> <script type="text/javascript"> xCategoriesV2("id=my-categories-17537199");</script> </div>
-->

<div class="banner" id="banner">
<script src="https://cdn.onlymega.com/cjzqglwit00165mpdndakv5u3/embed.js?responsive=1&bnTag=" async></script>
</div>


<div id="my-store-17537199"></div>
<div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?17537199&data_platform=code&data_date=2019-08-08" charset="utf-8"></script><script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","id=my-store-17537199");</script>
</div>


</div>



<br>
<br>
<!--
<section class="py-5">
  <div class="container">
    <h1 class="section1">New designs coming soon</h1>
    <p class="lead">We do not own the rights to some of the designs! They belong to independent artists that are not affiliated with ethimoX</a>!</p>
  </div>
</section>-->
 <footer class="footer-distributed">
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="footer-left">

  <div class="logoDiv">
        <img src="https://ethimox.s3.us-east-2.amazonaws.com/ethimoX-03+(1).png" width="65px" height="50px">
    </div>
        <p class="footer-links">
          <a href="#">Home</a>
          ·
         <!-- <a href="#">Products</a>
          ·
          <a href="#">Services</a>
          ·-->
          <a href="#">Contact</a>
          

        </p>

        <p class="footer-company-name">ethimoX &copy; 2019</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>PO BOX 55035</span> Atlanta, Ga 30308</p>
        </div>


        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@ethimox.com">support@ethimox.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Get any design you want on any one of our products. Good for any occasion. 
        </p>

        <div class="footer-icons">

          <a href="https://www.facebook.com/ethimox"><i class="fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/ethimox/"><i class="fa fa-instagram"></i></a>
         <!-- <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-pinterest"></i></a>-->
          

        </div>

      </div>

    </footer>
</body>
</html>
