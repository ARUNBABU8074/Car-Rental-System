<?php
include("config.php");
include("session.php");
$sql = "SELECT * FROM car";
$result = $conn->query($sql);
$log_id=$_SESSION['log_id'];
$sql34 = "SELECT * FROM customer where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();

$day=date("Y-m-d");
$sqlup = "UPDATE `tbl_booking` SET `stat`='3' WHERE `drop_date`<'$day' and `stat`='1';";
$resultup = $conn->query($sqlup);
$sqlup2 = "UPDATE `tbl_booking` SET `stat`='0' WHERE `book_date`>='$day' and `stat`='2';";
$resultup2 = $conn->query($sqlup2);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css2/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css2/animate.css">
    
    <link rel="stylesheet" href="css2/owl.carousel.min.css">
    <link rel="stylesheet" href="css2/owl.theme.default.min.css">
    <link rel="stylesheet" href="css2/magnific-popup.css">

    <link rel="stylesheet" href="css2/aos.css">

    <link rel="stylesheet" href="css2/ionicons.min.css">

    <link rel="stylesheet" href="css2/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css2/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css2/flaticon.css">
    <link rel="stylesheet" href="css2/icomoon.css">
    <link rel="stylesheet" href="css2/style.css">
  </head>
  <script>
      function show_confirm(transaction_id) 
    { 
        var r = confirm("Do You Really want to Refund money! Press ok to Continue "); 
        if (r == true)   
        {   
            alert("You pressed OK!");  
            location.href = "refund.php?transaction_id="+transaction_id; 
            return true;   
        } 
        else   
        {   
            alert("You pressed Cancel!");   
        } 
    } 
    </script>
  <body>

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
        <div class="position-relative px-lg-6" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Car Rental</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Cars</a>
                        <a href="cus-driv.php" class="nav-item nav-link">Drivers</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="view-book.php" class="dropdown-item">Car Bookings</a>
                                <a href="viewd-book.php" class="dropdown-item">Drivers Bookings</a>
                                <!-- <a href="booking.html" class="dropdown-item">Car Booking</a> -->
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($row34['fname']); ?> </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="update-cus.php" class="dropdown-item">My profile</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        <!-- </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
  
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">

            <?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
                    if($row['c_stat']==1 && $row['availability']==1){
						$day=date("Y-m-d");
						
						$car=$row['car_id'];
						$book="SELECT * FROM `tbl_booking` WHERE `car_id`=$car";
						$br=$conn->query($book);
						if ($br->num_rows > 0) {
						$booked = $br->fetch_assoc();
						if($booked['stat']==1){
							
						if(($day < $booked['book_date'] ) || ($day > $booked['drop_date'])){
							// echo $booked['book_date'];
							// echo $booked['drop_date'];
		?>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/<?php echo $row['image']; ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?php echo strtoupper($row['name']); ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo strtoupper($row['company']); ?></span>
	    						<p class="price ml-auto"><?php echo $row['price']; ?>Rs <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block">
                <a href="cardetails.php" class="btn btn-primary py-2 mr-1">Book now</a><form method="post"action="cardetails.php"><input type="submit" value="Details" class="btn btn-secondary py-2 ml-1" name="submit">
                <input type="hidden" name="cid" value="<?php echo $row['car_id']?>"></form></p>
                        </form>
                            <!-- <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p> -->
                        </div>
    				</div>
                    </div>



                    <?php	
						}
			}
			else{
				?>

<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/<?php echo $row['image']; ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?php echo strtoupper($row['name']); ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo strtoupper($row['company']); ?></span>
	    						<p class="price ml-auto"><?php echo $row['price']; ?>Rs <span>/day</span></p>
                              
    						</div>
    						<p class="d-flex mb-0 d-block"><form method="post" action="cardetails.php">
                  <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                <input type="hidden" name="cid" value="<?php echo $row['car_id']?>"></form></p>
              <p class="d-flex mb-0 d-block">  <form method="post" action="cardetails.php"><input type="submit" class="btn btn-secondary py-2 ml-1" name="submit"  value="Details">
                <input type="hidden" name="cid" value="<?php echo $row['car_id']?>"></form>
              </p>
               
              
              </div>
    				</div>
                    </div>

                    <?php	
			}

					}
					else{
						?>

<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/<?php echo $row['image']; ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?php echo strtoupper($row['name']); ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo strtoupper($row['company']); ?></span>
	    						<p class="price ml-auto"><?php echo $row['price']; ?>Rs <span>/day</span></p>
                                <!-- <?php echo $row['car_id']?> -->
    						</div>
    		<p class="d-flex mb-0 d-block">
        <form method="post" action="booking.php"><input type="submit" class="btn btn-secondary py-2 ml-1" name="submit"  value="Book">
                <input type="hidden" name="cid" value="<?php echo $row['car_id']?>"></form>
        <form method="post" action="cardetails.php"><input type="submit" class="btn btn-secondary py-2 ml-1" name="submit"  value="Details">
                <input type="hidden" name="cid" value="<?php echo $row['car_id']?>"></form></p>
               
              
              </div>
    				</div>
                    </div>


<?php
					}
            	}

			}
        }
		?>



    			</div>
    	
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
    

    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
        <!-- <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p> -->
    </div>
    <!-- Footer End -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js1/jquery.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/jquery.waypoints.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>
  <script src="js1/jquery.animateNumber.min.js"></script>
  <script src="js1/bootstrap-datepicker.js"></script>
  <script src="js1/jquery.timepicker.min.js"></script>
  <script src="js1/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js1/google-map.js"></script>
  <script src="js1/main.js"></script>
    
  </body>
</html>