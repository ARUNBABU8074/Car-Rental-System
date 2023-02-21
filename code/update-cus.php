<?php
include 'session.php';

// error_reporting(E_ERROR | E_PARSE);
include("config.php");


$log_id= $_SESSION['log_id'];
$sql = "SELECT * FROM `customer` WHERE log_id='$log_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql1 = "SELECT * FROM `login` WHERE log_id='$log_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$usertype=$row1['usertype'];


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

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50" style="background-color:aquamarine;">

<!-- Navigation section
================================================== -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background-color:black;">
	<div class="container">

		<div class="navbar-header" >
		
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>

			<a href="#home" class="smoothScroll navbar-brand">CAR RENTAL SYSTEM</a>
		</div>
		<nav class="navbar navbar-dark bg-dark">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right" >
            
				<!-- <li><a href="#home" class="smoothScroll">HOME</a></li> -->
                <li><a href="#renter" class="smoothScroll"></a></li>
				<li><a href="update-cus.php" class="smoothScroll">Profile</a></li>
				<!-- <li><a href="#message" class="smoothScroll">message</a></li> -->
				<li><a href="customer-home.php" class="smoothScroll">Cars</a></li>
				<li><a href="view-book.php" class="smoothScroll">My Bookings</a></li>
				<li><a href="#plan" class="smoothScroll"></a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
				<li></li>
			
			</ul>
		</div>
	</nav>
	</div>
</section>

<!-- Preloader section
================================================== -->
<section  class="preloader">

	<div class="sk-rotating-plane"></div>

</section>

<section id="portfolio" class="parallax-section">
	<div class="container">
		<div class="row">
			

			<!-- Section title
			================================================== -->
			<center><h1 class="heading color-black">profile</h1></center>

			<script>
                function validate()
                {
					var f=document.getElementById("fname").value;
					var l=document.getElementById("lname").value;
					var s=/^[a-zA-Z]+$/;
					if(f!="" && s.test(f)==false){
						
						document.getElementById('ms').style.display = "block";
						document.getElementById('ms').innerHTML = "Invalid Fname";
						return false;
					}
					else{
						document.getElementById('ms').style.display = "none";
					}
					if(l!="" && s.test(l)==false){
						
						document.getElementById('ms1').style.display = "block";
						document.getElementById('ms1').innerHTML = "Invalid Lname";
						return false;
					}
					else{
						document.getElementById('ms1').style.display = "none";
					}
						
					var a=document.getElementById("email").value;
					var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
					if(a!="" && st.test(a)==false){
						
						document.getElementById('message').style.display = "block";
						document.getElementById('message').innerHTML = "Invalid Email id";
						return false;
					}
					else{
						document.getElementById('message').style.display = "none";
					}

					var ph = document.getElementById("phn").value;
					var expr = /^[6-9]\d{9}$/;
					if(ph!="" && expr.test(ph)==false){
						document.getElementById('msg2').style.display = "block";
						document.getElementById('msg2').innerHTML = "Invalid Phone number";
						return false;
								}
								else{
						document.getElementById('msg2').style.display = "none";
					}
							}
                </script>
			<form action="update-conn.php" method="POST" name="cusform" class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validate()">
				
				<div class="col-md-8 col-sm-6">
					
				


			  <input type="text" class="form-control" placeholder="fName" name="fname"  id="fname" onblur="return validate()" onKeyUp="return validate()" required pattern="[A-Za-z_]+" value="<?php echo $row['fname']; ?>"><br>
			  <label class="message text-danger" id="ms" style="font-size: 16px"></label>
			<input type="text" class="form-control" placeholder="lName" name="lname"  id="lname" onblur="return validate()" onKeyUp="return validate()"  required pattern="[A-Za-z_]+" value="<?php echo $row['lname']; ?>"><br>
			<label class="message text-danger" id="ms1"  ></label>
			<input type="email" class="form-control" placeholder="Email" name="email" id="email" onblur="return validate()" onKeyUp="return validate()" value="<?php echo $row['email']; ?>"  disabled><br>
			<label class="message text-danger" id="message"></label>
			<input type="int" class="form-control" placeholder="Phone number" name="phone" id="phn" onblur="return validate()" onKeyUp="return validate()" required minlength="10" maxlength="10" value="<?php echo $row['phone']; ?>" required><br>
			<label class="message text-danger" id="msg2"></label>
			<input type="text area" class="form-control" placeholder="Address" name="addresss" value="<?php echo $row['addresss']; ?>" required><br> 
			<input type="text" class="form-control" placeholder="place" name="place" value="<?php echo $row['place']; ?>" required><br> 
			<input type="text" class="form-control" placeholder="User id" name="username" value="<?php echo $row1['username']; ?>" disabled><br>
			<input type="password" class="form-control" placeholder="password" name="passwd" value="<?php echo $row1['passwd']; ?>" required><br> 
			<input type="submit" class="form-control" value="change" name="submit">
				</div>
			</form>


			<!-- Work Owl Carousel section
			================================================== -->
			

			

			<br><br><br><br><br><br><br><br>

		</div>
	</div>
</section>	

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

