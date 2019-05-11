<?php
//include file which will make mysqli connection, this functionality will likely need improvements
include_once('/php/db.php');
//$sql = get_mysqli_connection();

$ref=@$_SERVER[HTTP_REFERER];
$agent=@$_SERVER[HTTP_USER_AGENT];
$ip=@$_SERVER['REMOTE_ADDR'];
$tracking_page_name2 = $_SERVER["SCRIPT_NAME"];
//$orderNumberr = $_POST['orderNumber'];
$orderNumber = $_SERVER["REQUEST_TIME"];

//if(strlen($ref) > 2 and !(stristr($ref,"localhost"))){  // exclude referrer from your own site. 
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
///////////// inserted details 
//}

?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Offguard | ESFNA 19</title>
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
    <a class="navbar-brand" href="index.php">OFFGUARD PICTURES</a>
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
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <h1 class="sectionHeader">Step 1</h1>
    <h2 class="sectionHeader">Order number <?php echo $orderNumber;?></h2>
</header>
<!-- Page Content -->
<section class="py-5">
<section class="py-5">
  <div class="container">
    <p class="lead">Click 'Get Started' below and follow the instructions to place your order to create a life time memory of this historical event.</a>!</p>
        
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
