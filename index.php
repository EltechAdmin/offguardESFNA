<?php
//include file which will make mysqli connection, this functionality will likely need improvements
//include_once('/php/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ethimoX/php/db.php');
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
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>ethimoX</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' type='text/css' href='css/sections.css'/>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <style id="compiled-css" type="text/css">
      .carousel-item {

  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    /*  background-repeat: no-repeat;
    background-size: 100% 120%;*/
    min-height: 100%
}

  </style>


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
          <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Store (Closed)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <h1 class="sectionHeader">Any Design you want!!</h1>
  <h3 class="sectionHeader2">Have it in 20 Minutes or less.</h3>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="banner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://s3.us-east-2.amazonaws.com/offguard/s1.png')">
        <div class="bannerinfo">
          <h2 class="display-4">Share and Create an Everlasting Memory With Us </h2>
          <p class="lead">Creating a custom printed memory using an everyday itmes of your choice </p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://s3.us-east-2.amazonaws.com/offguard/s2.png')">
        <div class="bannerinfo">
          <h2 class="display-4">Finding Creative Ways To Make You Smile</h2>
          <p class="lead"> Get your photos taken in-front of a Green screen background </p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below   -->
      <div class="carousel-item" style="background-image: url('https://s3.us-east-2.amazonaws.com/offguard/sr2.jpg')">
        <div class="bannerinfo">
          <h2 class="display-4"> With a Multiple Backgrounds </h2>
          <p class="lead">Including any prefered background of your choice.</p>
        </div>
      </div>
  <!-- Slide four - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://s3.us-east-2.amazonaws.com/offguard/sr3.png')">
        <div class="bannerinfo">
          <h2 class="display-4">Various Items</h2>
          <p class="lead">Select one of our items to print your face on.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>
    <div class="centerDiv" >
    <img src="https://ethimox.s3.us-east-2.amazonaws.com/ethimoX-03+(1).png" alt="logo" class="exlogo" >
     </div>
<!-- Page Content -->s
<section class="py-5">
  <div class="container">
    <h1 class="section1">Start  your order now</h1>
    <p class="lead">Click 'Get Started' below and follow the instructions to place your order to create a life time memory of this historical event.</a>!</p>
          <button disabled="disabled" onclick="location.href ='order.php'" class="brk-btn">Online store currently closed</button>
  </div>

</section>


<section class="py-5">
  <div class="container">
    <h1 class="section1">How it works</h1>
    <p class="lead">Get your picture taken with our professional photographers, select a background/filter and choose an item you would like to see your face on. follow our easy 3 step process to make your selection and place an order</a>!</p>
  </div>
</section>

<div class="howitworks">
<div class="col-sm-12 col-md-4 col-lg-4 re-mt-30">
<div class="iq-Work-box text-center">
<div class="Work-icon">
<i aria-hidden="true" class="step2"></i>
<div class="line"></div>
</div>
<h4 class="iq-tw-6 iq-mt-20 iq-mb-15">Customize Your Order</h4>
<p> Pick from our pre-selected backgrounds or email us a background you would like us to use at extra cost.<br> You Can Have Your Order Custom Made On a Photo Paper, Shirt,Hat and More. </p>
</div>
</div>  
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="iq-Work-box text-center">
<div class="Work-icon">
<i aria-hidden="true" class="step1"></i>
<div class="line"></div>
</div>
<h4 class="iq-tw-6 iq-mt-20 iq-mb-15">Say Cheese</h4>
<p> Gather Your Loved Ones and Get Your Photos Taken In-Front Of Our Lighted Green Screen and Share The Moment Through Our Lense. </p>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4 re-mt-30">
<div class="iq-Work-box text-center">
<div class="Work-icon">
<i aria-hidden="true" class="step3"></i>
</div>
<h4 class="iq-tw-6 iq-mt-20 iq-mb-15">Pick Up Your Memory</h4>
<p> You don't want to stand around and wait? well, you don't have to. You Can Recieve a Text Notification When Your ORDER is ready.</p>
</div>
</div>
</div>
<section class="py-5">
  <div class="container">
    <h2 class="boothlocation">Example</h2>
     <div class="centerDiv" >
    <img src="https://ethimox.s3.us-east-2.amazonaws.com/design/Webp.net-gifmaker.gif" alt="logo" class="exSample" >
     </div>
  </div>
</section>
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
          Get any design you want on any one of products. Good for any occasion. 
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
