<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include "config.php";
session_start();
$emailerror=false;
$usrerr=false;
$showAlert = false; 
$showError = false; 
$exists=false;


    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
      
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$addresss = $_POST["addresss"];
	$place = $_POST["place"];
    $username = $_POST["username"];
	$passwd = $_POST["passwd"];
    $usertype = $_POST['type'];

   

            
   $check1 = "SELECT * FROM `renter` WHERE `email`='$email'";
    
    $rslt1 = mysqli_query($conn, $check1);
    $rsltcheck1 = mysqli_num_rows($rslt1);
    $check2 = "SELECT * FROM `customer` WHERE `email`='$email'";
    
    $rslt2 = mysqli_query($conn, $check2);
    $rsltcheck2 = mysqli_num_rows($rslt2);

    $token=rand(100, 550000);

    if($rsltcheck1 == 0 && $rsltcheck2 == 0 ) {

        $check = "SELECT * FROM `login` WHERE `username`='$username'";
    
        $rslt = mysqli_query($conn, $check);
        $rsltcheck = mysqli_num_rows($rslt);

        if($rsltcheck == 0){
            $_SESSION['fname'] = $fname;
            $_SESSION['lname']= $lname;
            $_SESSION['phone']= $phone;
            $_SESSION['email']= $email;
            $_SESSION['addresss']= $addresss;
            $_SESSION['username']= $username;
            $_SESSION['passwd']=$passwd;
            $_SESSION['type']=$usertype;
			$_SESSION['place']=$place;

            

            
            $tokdel = "DELETE from temp";
            $ptl = mysqli_query($conn, $tokdel);
            $po = "INSERT INTO `temp`(`email`, `token`) VALUES ('$email','$token')";
            $p2o = mysqli_query($conn, $po);
            $mail = new PHPMailer(true);

    
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'arunbabu2023a@mca.ajce.in';                     //SMTP username
            $mail->Password   = 'rmca2021#';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('arunbabu2023a@mca.ajce.in', 'car rental system');
            $mail->addAddress($email);     //Add a recipient
           //
        
            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Hi '.$username.' This is your computer generated token';
            $mail->Body    = '<h1> '.$token.'<h1> <br> <strong>Copy this token</strong>';
           // $mail->AltBody = 'copy this token ';
        
            $mail->send();
                $_SESSION['mailsend']="Check Your mail!!!";
                header('location:demo.php'); 
            }
        
        
    
    else{
        echo'<script> alert ("username  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
    }
    
  }         
    else
    {
        echo'<script> alert ("email  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
    } 
   
 //  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
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
                
				<li><a href="#work" class="smoothScroll">LOGIN</a></li>
				<li><a href="#about" class="smoothScroll">ABOUT</a></li>
				
				<li><a href="#portfolio" class="smoothScroll">REGISTRATION</a></li>
				
				<li><a href="#contact" class="smoothScroll">CONTACT</a></li>
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
                                <h2>Plan your trip</h2>
                                <p class="color-white">Get an amazing car for your wonderfull trip.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/slider/car2.jpg" alt="slider image 2">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2>Mileage </h2>
                        <p class="color-white">Get your car with high Mileage</p>
                    </div>
                </div>
            </li>
          <!--   <li>
                <img src="images/slider/car3.jpg" alt="slider image 3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2>Mobile Ready</h2>
                                <p class="color-white">You may modify any content section as you wish.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li> -->
            <!-- <li>
                <img src="images/slider/slide4.jpg" alt="slider image 4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2>Responsive Theme</h2>
                                <p class="color-white">search your nearest rentor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/slider/slide5.jpg" alt="slider image 5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2>Rentor</h2>
                               <p class="color-white">Rent your car through this website.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li> -->
        </ul> <!-- /.bxslider -->
      <!--   <div class="bx-thumbnail-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bx-pager">
                            <a data-slide-index="0" href=""><img src="images/slider/car11.jpg" alt="thumbnail 1" /></a>
                            <a data-slide-index="1" href=""><img src="images/slider/thumb2.jpg" alt="thumbnail 2" /></a>
                            <a data-slide-index="2" href=""><img src="images/slider/thumb3.jpg" alt="thumbnail 3" /></a>
                            <a data-slide-index="3" href=""><img src="images/slider/thumb4.jpg" alt="thumbnail 4" /></a>
                            <a data-slide-index="4" href=""><img src="images/slider/thumb5.jpg" alt="thumbnail 5" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div> 
</div>


<!-- Work section
================================================== -->
<section id="work" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<center><h1 class="heading color-black" >LOGIN HERE</h1></center>
			<form action="login.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
				
				<div class="col-md-4 col-sm-6">
					<input type="text" class="form-control" placeholder="User name" name="username" required>
			<br>
					<input type="password" class="form-control" placeholder="password" name="passwd" required>


					<br>
				
				
				
					<input type="submit" class="form-control" value="login" name="login">
				</div>
			</form>


			<!-- Work Owl Carousel section
			================================================== -->
			

				

			</div>

		</div>
	</div>
</section>


<!-- About section
================================================== -->
<section id="about" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h5 class="wow bounceIn">ACTIVE PEOPLE</h5>
					<h1 class="heading color-white">WHO WE ARE</h1>
					<hr>
					<p class="color-white"></p>
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<h3 class="color-white">OUR STORY</h3>
				<h2>CAR RENTAL</h2>
				<p class="color-white">This is a website for CAR RENTAL. Here we can book cars for rental purpose and it is only available near by kanjirapally and munadakayam areas.</p>
				<p class="color-white"></p>
			</div>

			
		

		</div>
	</div>
</section>











<!-- customer section
================================================== -->
<section id="portfolio" class="parallax-section">
	<div class="container">
		<div class="row">
			

			<!-- Section title
			================================================== -->
			<center><h1 class="heading color-black">REGISTER HERE</h1></center>

			<script type="text/javascript">
                function validate()
                {
					
					var f=document.getElementById("fname").value;
					var l=document.getElementById("lname").value;
					var s=/^[a-zA-Z]+$/;
					if(f!="" && s.test(f)==false){
						
						document.getElementById('ms').style.display = "block";
						document.getElementById('ms').innerHTML = "Invalid Fname . It must be alphabet";
						return false;
					}
					else{
						document.getElementById('ms').style.display = "none";
					}
					if(l!="" && s.test(l)==false){
						
						document.getElementById('ms1').style.display = "block";
						document.getElementById('ms1').innerHTML = "Invalid Lname. It must be alphabet";
						return false;
					}
					else{

						document.getElementById('ms1').style.display = "none";
					}
						
					var a=document.getElementById("em").value;
					var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
					if(a!="" && st.test(a)==false){
						
						document.getElementById('message').style.display = "block";
						document.getElementById('message').innerHTML = "Invalid Email id";
						return false;
					}
					else{
						jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'em='+$("#em").val(),
        success:function(response){
          
          $("#message").html(response);
        },
		error:function (){}
      }); 
						//document.getElementById('message').style.display = "none";
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
function checkuser(){

	
	  
	  
      jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'uname='+$("#un").val(),
        success:function(response){
          
          $(".error_uname").html(response);
        },
		error:function (){}
      }); 
    }
                </script>
			<form action="index.php" method="POST" name="cusform" class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validate()">
				
				<div class="col-md-8 col-sm-6">
					
				<label >Please select your user type :
					<select name="type">
						<option value="2">renter</option>
						<option value="1">customer</option>
						
					  </select></label><br><br>

					<div style="width: 60%;">
			  <input type="text" class="form-control" placeholder="First Name" name="fname"  id="fname"  onKeyUp="return validate()" required pattern="[A-Za-z_]+">
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
			<input type="text" class="form-control" placeholder="Last Name" name="lname"  id="lname"  onKeyUp="return validate()"  required pattern="[A-Za-z_]+">
			<span class="message text-danger" id="ms1"  ></span><br>
			<input type="email" class="form-control" placeholder="Email" name="email" id="em" onblur="return validate()" onKeyUp="return validate()" required>
			<span class="message text-danger" id="message"></span><br>
			<input type="int" class="form-control" placeholder="Phone number" name="phone" id="phn"  onblur="return validate()" onKeyUp="return validate()" required minlength="10" maxlength="10" required>
			<span class="message text-danger" id="msg2"></span><br>
			<input type="text area" class="form-control" placeholder="Address" name="addresss" required><br> 
			<input type="text" class="form-control" placeholder="place" name="place" required><br> 
			<input type="text" class="form-control checking_uname" placeholder="User name" name="username" id="un" onInput="checkuser()" required>
			<span class="error_uname"></span><br>
			<input type="password" class="form-control" placeholder="password" name="passwd" required><br> 
			<input type="submit" class="form-control" value="submit" name="reg" id="submit" style="background-color: cyan;">
				</div></div>
			</form>


			<!-- Work Owl Carousel section
			================================================== -->
			

				

			<br><br><br><br><br><br><br><br>

		</div>
	</div>
</section>		











<!-- Javascript 
================================================== -->
<script src="js/email.js"></script>
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