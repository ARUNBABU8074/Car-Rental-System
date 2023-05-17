<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include "config.php";
session_unset();
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
$license=$_POST['cimage'];
   

            
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
			$_SESSION['license']=$license;

            

            
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
   
 
}
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img1/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib1/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib1/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css10/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css10/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <style>
       
        .btn-round {
            border-radius: 3rem;
        }

        
    </style>
   
</head>


<body>
<script type="text/javascript">
             

           
             
             
                             function validate()
                             {
                                 
            //  alert('hi');
             
                                //  var df=document.getElementById("dfname").value;
                                //  var dl=document.getElementById("dlname").value;
                                //  var f=document.getElementById("fname").value;
                                //  var l=document.getElementById("lname").value;
                                 var s=/^[a-zA-Z]+$/;
                                //  if(f!="" && s.test(f)==false){
                                     
                                //      document.getElementById('ms').style.display = "block";
                                //      document.getElementById('ms').innerHTML = "Invalid First Name . It must be alphabet";
                                //      return false;
                                //  }
                                //  else{
                                //      document.getElementById('ms').style.display = "none";
                                //  }
                                //  if(df!="" && s.test(df)==false){
                                     
                                //      document.getElementById('dms').style.display = "block";
                                //      document.getElementById('dms').innerHTML = "Invalid First Name . It must be alphabet";
                                //      document.getElementById('dsubmit').disabled=true;
                                //      return false;
                                //  }
                                //  else{
                                //      document.getElementById('dms').style.display = "none";
                                //      document.getElementById('dsubmit').disabled=false;
                                //  }
                                //  if(l!="" && s.test(l)==false){
                                     
                                //      document.getElementById('ms1').style.display = "block";
                                //      document.getElementById('ms1').innerHTML = "Invalid Lname. It must be alphabet";
                                //      return false;
                                //  }
                                //  else{
             
                                //      document.getElementById('ms1').style.display = "none";
                                //  }
                                //  if(dl!="" && s.test(dl)==false){
                                     
                                //      document.getElementById('dms1').style.display = "block";
                                //      document.getElementById('dms1').innerHTML = "Invalid Lname. It must be alphabet";
                                //      document.getElementById('dsubmit').disabled=true;
                                //      return false;
                                //  }
                                //  else{
             
                                //      document.getElementById('dms1').style.display = "none";
                                //      document.getElementById('dsubmit').disabled=false;
                                //  }
                                     
                                 var da=document.getElementById("dem").value;
                                 var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
                                 if(da!="" && st.test(da)==false){
                                     
                                     document.getElementById('dmessage').style.display = "block";
                                     document.getElementById('dmessage').innerHTML = "Invalid Email id";
                                     document.getElementById('dsubmit').disabled=true;
                                     return false;
                                 }
                                 else{
                                     document.getElementById('dsubmit').disabled=false;
                                     jQuery.ajax({
                     url: "ajax.php",
                     type: "POST",
                     
                     data:'em='+$("#dem").val(),
                     success:function(response){
                       
                       $("#dmessage").html(response);
                     },
                     error:function (){}
                   }); 
                                     
                                 }
             
                //                  var a=document.getElementById("em").value;
                //                  var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
                //                  if(a!="" && st.test(a)==false){
                                     
                //                      document.getElementById('message').style.display = "block";
                //                      document.getElementById('message').innerHTML = "Invalid Email id";
                //                      return false;
                //                  }
                //                  else{
                //                      jQuery.ajax({
                //      url: "ajax.php",
                //      type: "POST",
                     
                //      data:'em='+$("#em").val(),
                //      success:function(response){
                       
                //        $("#message").html(response);
                //      },
                //      error:function (){}
                //    }); 
                                     
                //                  }
             
             
                                 var dph = document.getElementById("dphn").value;
                                 var expr = /^[6-9]\d{9}$/;
                                 if(dph!="" && expr.test(dph)==false){
                                     document.getElementById('dmsg2').style.display = "block";
                                     document.getElementById('dmsg2').innerHTML = "Invalid Phone number";
                                     document.getElementById('dsubmit').disabled=true;
                                     return false;
                                             }
                                             else{
                                     document.getElementById('dmsg2').style.display = "none";
                                     document.getElementById('dsubmit').disabled=false;
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
             
                                         function dcheckuser(){
             
                   
             jQuery.ajax({
               url: "ajax.php",
               type: "POST",
               
               data:'uname='+$("#dun").val(),
               success:function(response){
                 
                 $(".derror_uname").html(response);
               },
               error:function (){}
             }); 
             }
             
             function dcheckuser(){
             
                   
             jQuery.ajax({
               url: "ajax.php",
               type: "POST",
               
               data:'uname='+$("#dun").val(),
               success:function(response){
                 
                 $(".error_unamed").html(response);
               },
               error:function (){}
             }); 
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
             
             
                 function dvalidateimage()
                             {
                                 
                                 var fdd = new FormData();
                     var files = $('#dlimage')[0].files;
                     
                     // Check file selected or not
                     if(files.length > 0 ){
                        fdd.append('file1',files[0]);
             
                        $.ajax({
                           url: 'ajax.php',
                           type: 'post',
                           data: fdd,
                           contentType: false,
                           processData: false,
                           success: function(response){
                            
                                 $("#dim1").html(response);
                             //}
                           },
                        });
                     }else{
                        alert("Please select a file.");
                     }
             
                             }
                             
                             function dvalidateimage2()
                             {
                                 
                                 var fdl = new FormData();
                     var files= $('#dlim')[0].files;
                     
                     // Check file selected or not
                     if(files.length > 0 ){
                        fdl.append('file',files[0]);
             
                        $.ajax({
                           url: 'ajax.php',
                           type: 'post',
                           data: fdl,
                           contentType: false,
                           processData: false,
                           success: function(response){
                            
                                 $("#dim2").html(response);
                             
                           },
                        });
                     }else{
                        alert("Please select a file.");
                     }
             
                             }
             
             
                 function validateimage()
                             {
                                 
                                 var fd = new FormData();
                     var files = $('#limage')[0].files;
                     
                     // Check file selected or not
                     if(files.length > 0 ){
                        fd.append('file1',files[0]);
             
                        $.ajax({
                           url: 'ajax.php',
                           type: 'post',
                           data: fd,
                           contentType: false,
                           processData: false,
                           success: function(response){
                            
                                 $("#im1").html(response);
                             
                           },
                        });
                     }else{
                        alert("Please select a file.");
                     }
             
                             }
                             </script>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">

            </div>

        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Car Rental</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.html" class="dropdown-item">Car Listing</a>
                                <a href="detail.html" class="dropdown-item">Car Detail</a>
                                <a href="booking.html" class="dropdown-item">Car Booking</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="team.html" class="dropdown-item">The Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <div class="container">
                            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal" id="modalo">
                                Login
                            </button>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->




    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="images/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Best Rental Cars In Your Location</h1>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="images/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Quality Cars with Unlimited Miles</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->




    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">01</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Welcome To <span class="text-primary">Royal Cars</span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="images/about.png" alt="">
                    <p>Justo et eos et ut takimata sed sadipscing dolore lorem, et elitr labore labore voluptua no rebum sed, stet voluptua amet sed elitr ea dolor dolores no clita. Dolores diam magna clita ea eos amet, amet rebum voluptua vero vero sed clita accusam takimata. Nonumy labore ipsum sea voluptua sea eos sit justo, no ipsum sanctus sanctus no et no ipsum amet, tempor labore est labore no. Eos diam eirmod lorem ut eirmod, ipsum diam sadipscing stet dolores elitr elitr eirmod dolore. Magna elitr accusam takimata labore, et at erat eirmod consetetur tempor eirmod invidunt est, ipsum nonumy at et.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-headset text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">24/7 Car Rental Support</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-car text-secondary"></i>
                        </div>
                        <h4 class="text-light text-uppercase m-0">Car Reservation Anytime</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Lots Of Pickup Locations</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">02</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-taxi text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">01</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Rental</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item active d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-money-check-alt text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">02</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Financing</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-car text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">03</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Inspection</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">04</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Auto Repairing</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Services End -->


  
    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0">
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-secondary d-flex align-items-center justify-content-between" style="height: 350px;">
                        <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="images/banner-left.png" alt="">
                        <div class="text-right">
                            <h3 class="text-uppercase text-light mb-3">Want to be driver?</h3>
                            <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p>
                            <!-- <a class="btn btn-primary py-2 px-4" href="">Start Now</a> -->
                            <button type="button" class="btn btn-primary py-2 px-4" data-toggle="modal" data-target="#exampleModal">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                    
                        <div class="text-left">
                            <h3 class="text-uppercase text-light mb-3">Looking for a car?</h3>
                            <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p>
                            
                            <button type="button" class="btn btn-primary py-2 px-4" data-toggle="modal" data-target="#start">
                            Start Now
                            </button>
                        </div>
                        <img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="images/banner-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="d-flex flex-column text-center">
                        <form method="post" action="login.php">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Your User Name...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password1" name="passwd" placeholder="Your password...">
                            </div>
                            <input type="submit" class="btn btn-info btn-block btn-round" name="login" id="submit" value="login">
                        </form>


                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
                </div>
            </div>

        </div>
    </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Enter your details</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                         
                        <form method="post" action="">
                            <input type="text" class="form-control" placeholder="First Name" name="fname"  id="fname"  onKeyUp="return validate()" required pattern="[A-Za-z_]+">
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
			<input type="text" class="form-control" placeholder="Last Name" name="lname"  id="lname"  onKeyUp="return validate()"  required pattern="[A-Za-z_]+">
			<span class="message text-danger" id="ms1"></span><br>
			<input type="email" class="form-control" placeholder="Email" name="email" id="em" onblur="return validate()" onKeyUp="return validate()" required>
			<span class="message text-danger" id="message"></span><br>
			<input type="int" class="form-control" placeholder="Phone number" name="phone" id="phn"  onblur="return validate()" onKeyUp="return validate()" required minlength="10" maxlength="10" required>
			<span class="message text-danger" id="msg2"></span><br>
			<input type="text area" class="form-control" placeholder="Address" name="addresss" required><br> 
			<input type="text" class="form-control" placeholder="place" name="place" required><br> 
			upload licence...
            <input type="file" class="form-control" placeholder="Image" name="cimage" accept="image/png, image/gif, image/jpeg"  id="limage" onchange="return validateimage()" required><br>
                     <span id="im1" style='color:red;'></span>
			<input type="text" class="form-control checking_uname" placeholder="User name" name="uname" id="un" onInput="checkuser()" required>
			<span class="error_uname"></span><br>
			<input type="password" class="form-control" placeholder="password" name="passwd1" required><br> 
			<input type="submit" class="form-control" value="submit" name="reg" id="submit" style="background-color: cyan;">
				</div></div>
			</form>

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <!-- <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div> -->
                    </div>
                </div>
            </div>
        </div>

<!-- start modal -->
        <div class="modal fade" id="start" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                        <form method="post" action="">
                            <input type="text" class="form-control" placeholder="First Name" name="dfname"  id="dfname"  onKeyUp="return validate()" required pattern="[A-Za-z_]+">
			  <span class="message text-danger" id="dms" style="font-size: 16px"></span><br>
			<input type="text" class="form-control" placeholder="Last Name" name="dlname"  id="dlname"  onKeyUp="return validate()"  required pattern="[A-Za-z_]+">
			<span class="message text-danger" id="dms1"  ></span><br>
			<input type="email" class="form-control" placeholder="Email" name="demail" id="dem" onblur="return validate()" onKeyUp="return validate()" required>
			<span class="message text-danger" id="dmessage"></span><br>
			<input type="int" class="form-control" placeholder="Phone number" name="dphone" id="dphn"  onblur="return validate()" onKeyUp="return validate()" required minlength="10" maxlength="10" required>
			<span class="message text-danger" id="dmsg2"></span><br>
			<input type="text area" class="form-control" placeholder="Address" name="daddresss" required><br> 
			<input type="text" class="form-control" placeholder="place" name="dplace" required><br> 
			upload licence...
            <input type="file" class="form-control" placeholder="Image" name="dimage" accept="image/png, image/gif, image/jpeg"  id="dlimage" onchange="return validateimage()" required><br>
                     <span id="im1" style='color:red;'></span>
			<input type="text" class="form-control checking_uname" placeholder="User name" name="duname" id="dun" onkeyup="return dcheckuser()" required>
			<span class="error_unamed"></span><br>
			<input type="password" class="form-control" placeholder="password" name="passwd" required><br> 
			<input type="submit" class="form-control" value="submit" name="reg" id="dsubmit" style="background-color: cyan;">
				</div></div>
			</form>


                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
                    </div>
                </div>
            </div>
        </div>
          
            <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
                <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
                <!-- <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p> -->
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>







            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib1/easing/easing.min.js"></script>
            <script src="lib1/waypoints/waypoints.min.js"></script>
            <script src="lib1/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib1/tempusdominus/js/moment.min.js"></script>
            <script src="lib1/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib1/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src="js1/main.js"></script>
            
</body>

</html>