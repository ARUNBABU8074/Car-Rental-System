<?php
include "config.php";
include "session.php";


/* $sql="SELECT * FROM 'login'";
$result=$conn->query($sql); */
if(isset($_POST['submit'])){
if (isset($_GET['sender_id'])) {
	$receiver_id = $_GET['sender_id'];
    $usertype = $_SESSION['usertype'];
    if($usertype==1){
    $sql2="SELECT `log_id` FROM `renter` WHERE `renter_id`=$receiver_id";
    $result=$conn->query($sql2);
    $row = $result->fetch_assoc();
    $receiver = $row['log_id']; 
    }
    if($usertype==2){
        $sql22="SELECT `log_id` FROM `customer` WHERE `cus_id`=$sender_id";
        $result22=$conn->query($sql22);
        $row22 = $result22->fetch_assoc();
        $receiver = $row22['log_id']; 
        }
   


$sender= $_SESSION['log_id'];
$message=$_POST['mess'];
$insert="INSERT INTO `message`( `sender_id`, `receiver_id`, `message`) VALUES ('$sender','$receiver','$message')";
$ins=$conn->query($insert);
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Adventure Bootstrap Template</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--

Template 2078 Adventure

http://www.tooplate.com/view/2078-adventure

-->
	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.min.css">

	<!-- Font Icons
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-font.css">

	<!-- Nivo Lightbox CSS
   ================================================== -->
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">

	<!-- Owl Carousel CSS
   ================================================== -->
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

	<!-- BxSlider CSS
   ================================================== -->
   	<link rel="stylesheet" href="css/bxslider.css">

   	<!-- Main CSS
   	================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font
   ================================================== -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
	
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Preloader section
================================================== -->
<section  class="preloader">

	<div class="sk-rotating-plane"></div>

</section>


<!-- Navigation section
================================================== -->



<!-- Homepage section
================================================== -->

<form action="" method="post">
            <input type="text-area" name="mess">
            <input type ="submit" name="submit" value="submit">
</form>
</body>

<!-- renter section
================================================== -->
<!-- Javascript 
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/jquery.easing-1.3.js"></script>
<script src="js/plugins.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>