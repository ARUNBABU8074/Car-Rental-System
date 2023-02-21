
<?php

error_reporting(E_ERROR | E_PARSE);
include("config.php");
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);


$sql2 = "SELECT * FROM renter";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM car";
$result3 = $conn->query($sql3);
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
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#home" class="smoothScroll navbar-brand">CAR RENTAL SYSTEM</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
            
				<!-- <li><a href="#home" class="smoothScroll">HOME</a></li> -->
                <li><a href="rent.php" class="smoothScroll">RENTERS</a></li>
				<li><a href="customer.php" class="smoothScroll">CUSTOMERS</a></li>
				<!-- <li><a href="#message" class="smoothScroll">MESSAGE</a></li> -->
				<li><a href="car.php" class="smoothScroll">CARS</a></li>
				<!-- <li><a href="#portfolio" class="smoothScroll">BOOKING</a></li> -->
				<li><a href="#model" class="smoothScroll">MODEL</a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
			</ul>
		</div>

	</div>
</section>


<!-- Homepage section
================================================== -->
<div id="home">
	<div class="site-slider">
        <ul class="bxslider">
			<li>
                <img src="images/slider/car1.jpg" alt="slider image 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2></h2>
                                <p class="color-white"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
           
          
    </div> 
</div> 


<!-- renter section
================================================== -->

<!-- Work section
================================================== -->
<section id="model" class="parallax-section">
	<div class="container">
		<div class="row">
		<h2 >ADD MODEL</h2><br>
		
		
			<form action="add-model.php" method="post" name="modelform" class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validatemodel()">
				
				<div  class="col-md-8 col-sm-3"  style="width: 60%;">
					
					
				
                
                        <input type="text" class="form-control" placeholder="Model" name="model" id="m" onkeyup="return validate()"  required pattern="[A-Za-z_]+" title ="only alphabets"required><br>
						<span class="message text-danger" id="ms"></span><br>
						<input type="submit" class="form-control" value="submit" name="submit" id="submit">
				</div>
			</form>
     

		</div>
	</div>
</section>

<script type="text/javascript">
                function validate()
				
                {
					var l=document.getElementById("m").value;
					
					var s=/^[a-zA-Z]+$/;
					if(l!="" && s.test(l)==false){
						
						document.getElementById('ms').style.display = "block";
						document.getElementById('ms').innerHTML = "Invalid Model Name . It must be alphabet";
						return false;
					}

				
					else{
						jQuery.ajax({
					url: "ajax.php",
					type: "POST",
					
					data:'model='+$("#m").val(),
					success:function(response){
						
						$("#ms").html(response);
					},
					error:function (){}
					}); 
					
				}
				}
				</script>











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