<?php
include '../session.php';
include '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$emailerror=false;
$usrerr=false;
$showAlert = false; 
$showError = false; 
$exists=false;


    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
   
      
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$addresss = $_POST["add"];
	$place = $_POST["city"];
    $username = $_POST["uname"];
	$passwd = $_POST["pass"];
    $usertype = 4;
$pin=$_POST['pin'];
$dis = $_POST["district"];
   

            
   $check1 = "SELECT * FROM `renter` WHERE `email`='$email'";
    
    $rslt1 = mysqli_query($conn, $check1);
    $rsltcheck1 = mysqli_num_rows($rslt1);
    $check2 = "SELECT * FROM `customer` WHERE `email`='$email'";
    
    $rslt2 = mysqli_query($conn, $check2);
    $rsltcheck2 = mysqli_num_rows($rslt2);

   

    if($rsltcheck1 == 0 && $rsltcheck2 == 0 ) {

        $check = "SELECT * FROM `login` WHERE `username`='$username'";
    
        $rslt = mysqli_query($conn, $check);
        $rsltcheck = mysqli_num_rows($rslt);

        if($rsltcheck == 0){
            $sql = "INSERT INTO `login`(`username`, `passwd`, `usertype`, `statuss`) VALUES ('$username','$passwd','$usertype',1);";
            
        
            $reg_query = mysqli_query($conn,$sql);
            $logid = mysqli_insert_id($conn);
            if($reg_query){
    
           
                
                
                    $user_reg = "INSERT INTO `tbl_checker`(`log_id`, `fname`, `lname`, `email`, `phone`, `home`, `district`, `city`, `pincode`) VALUES ('$logid','$fname','$lname','$email','$phone','$addresss', '$dis', '$place','$pin')";
                   $user_reg_query = mysqli_query($conn,$user_reg);
                   echo'<script> alert ("Account created");</script>';
                   echo'<script>window.location.href="checker.php";</script>'; 
            }
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
            $mail->Subject = 'Hi '.$fname.' '.$lname.' This is your User Name and Password for your Login.';
            $mail->Body    = '<h1> User Name: '.$username.'<br> Password: '.$passwd.'<h1> <br> <strong>Use this for Login.</strong>';
           // $mail->AltBody = 'copy this token ';
        
            $mail->send();
                $_SESSION['mailsend']="Check Your mail!!!";
                header('location:checker.php'); 
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
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Customers</title>
  <link rel="icon" type="image/png" href="../admin/images/icon/logo.png" />

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

</head>



<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="index.php">
              <img src="images/icon/logo.png" alt="FUEL" />
            </a>
            <button class="hamburger hamburger--slider" type="button">  
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-user-alt"></i>Customers</a>
            </li>
            
          </ul>
        </div>
      </nav>
      
    </header>
    <!-- END HEADER MOBILE-->

  <!-- MENU SIDEBAR-->
  <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <!-- <a href="#">
          <img src="images/icon/logo.png" alt="Cool Admin" />
        </a> -->
        <img src="../images/logo.png" alt="" width="100px" height="100px">&ensp;
        <h1>
         RENTAL
        </h1>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="has-sub">
              <a class="js-arrow" href="ad.php">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="customer.php">
                <i class="fas fa-users"></i>Customers</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="rent.php">
                <i class="fas fa-users"></i>renter</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="driverAD.php">
                <i class="fas fa-users"></i>Driver</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="model.php">
                <i class="fas fa-users"></i>Model</a>
            </li>
            <li class="active has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-users"></i>checker</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas bi-car-front-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></i>Cars</a>
              <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                  <a href="assign.php">Assign Car</a>
                </li>
                <li>
                  <a href="review.php">Review of Car</a>
                </li>
                <li>
                  <a href="car.php">Approved Cars</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="content" style="margin-left: 1050px;">
                      <a class="js-acc-btn" href="#">ADMIN</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="account-dropdown__footer">
                        <a href="../logout.php">
                          <i class="zmdi zmdi-power"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
        

          <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
function validate()
                {
					


                    var df=document.getElementById("fname").value;
                    var dl=document.getElementById("lname").value;
					
					var s=/^[a-zA-Z]+$/;
				
                    if(df!="" && s.test(df)==false){
						
						document.getElementById('dms').style.display = "block";
						document.getElementById('dms').innerHTML = "Invalid First Name . It must be alphabet";
                        document.getElementById('dsubmit').disabled=true;
						return false;
					}
					else{
						document.getElementById('dms').style.display = "none";
                        document.getElementById('dsubmit').disabled=false;
					}
				
                    if(dl!="" && s.test(dl)==false){
						
						document.getElementById('dms1').style.display = "block";
						document.getElementById('dms1').innerHTML = "Invalid Lname. It must be alphabet";
                        document.getElementById('dsubmit').disabled=true;
						return false;
					}
					else{

						document.getElementById('dms1').style.display = "none";
                        document.getElementById('dsubmit').disabled=false;
					}
						
                    var pin=document.getElementById("pin").value;
                    
                    var regex = /^[6]{1}[0-9]{5}$/;
                    if(pin!="" && regex.test(pin)==false){
						
						document.getElementById('pinc').style.display = "block";
						document.getElementById('pinc').innerHTML = "Invalid Pincode";
                        document.getElementById('dsubmit').disabled=true;
						return false;
					}
					else{
                        document.getElementById('pinc').style.display = "none";
                        document.getElementById('dsubmit').disabled=false;
					}

                    var da=document.getElementById("email").value;
					var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
					if(da!="" && st.test(da)==false){
						
						document.getElementById('dmessage').style.display = "block";
						document.getElementById('dmessage').innerHTML = "Invalid Email id";
                        document.getElementById('dsubmit').disabled=true;
						return false;
					}
					else{
                        // document.getElementById('dmessage').style.display = "none";
                        document.getElementById('dsubmit').disabled=false;
						jQuery.ajax({
		url: "ajaxad.php",
        type: "POST",
        
        data:'em='+$("#email").val(),
        success:function(response){
         
          $("#dmessage").html(response);
        },
		error:function (){}
      }); 
						
					}

				


                    var dph = document.getElementById("phone").value;
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

					

					
							}

function checkuser(){

	  
jQuery.ajax({
  url: "ajaxad.php",
  type: "POST",
  
  data:'uname='+$("#uname").val(),
  success:function(response){
    
    $(".derror_uname").html(response);
  },
  error:function (){}
}); 
}

</script>
<div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control" name="fname" id="fname" onKeyUp="return validate()" >
                                <span class="message text-danger" id="dms"></span>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="lname" id="lname" onKeyUp="return validate()">
                                <span class="message text-danger" id="dms1"></span>
							</div>
						</div>					
						<div class="form-group">
							<label>House Name/No</label>
							<input type="text" placeholder="Enter Address Here.." rows="3" class="form-control" name="add" id="add">

						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." class="form-control" name="city" id="city">
							</div>	
							<div class="col-sm-4 form-group">
								<label>District</label>
								<select  id="inputState" name="district" class="form-control h-50" required>
                                <option value="" hidden>-Select your district-</option>
                        <option value="Alappuzha">Alappuzha</option>
                        <option value="Ernakulam">Ernakulam</option>
                        <option value="Idukki">Idukki</option>
                        <option value="Kannur">Kannur</option>
                        <option value="Kasaragod">Kasaragod</option>
                        <option value="Kollam">Kollam</option>
                        <option value="Kottayam">Kottayam</option>
                        <option value="Kozhikode">Kozhikode</option>
                        <option value="Malappuram">Malappuram</option>
                        <option value="Palakkad">Palakkad</option>
                        <option value="Pathanamthitta">Pathanamthitta</option>
                        <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                        <option value="Thrissur">Thrissur</option>
                        <option value="Wayanad">Wayanad</option>
                       
                      </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Pincode</label>
								<input type="text" placeholder="Enter Zip Code Here.." class="form-control" name="pin" id="pin" onKeyUp="return validate()">
                                <span class="message text-danger" id="pinc"></span>
							</div>		
						</div>
											
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." class="form-control" name="phone" id="phone" onKeyUp="return validate()">
                        <span class="message text-danger" id="dmsg2"></span>
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." class="form-control" name="email" id="email" onKeyUp="return validate()">
                        <span class="message text-danger" id="dmessage"></span>
					</div>	
                    <div class="row">
							<div class="col-sm-6 form-group">
								<label>User Name</label>
								<input type="text" placeholder="Enter User Name Here.." class="form-control" name="uname" id="uname" onKeyUp="return checkuser()">
                                <span class="derror_uname"></span>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="text" placeholder="Enter Password Here.." class="form-control" name="pass" id="pass">
                                
							</div>	
						</div>	
					
					<input type="submit" name="sub" id="dsubmit" class="btn btn-lg btn-info">					
					</div>
				</form> 
				</div>
	</div>
	</div>




            </div>
            

   <!-- Jquery JS-->
   <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>

</html>

