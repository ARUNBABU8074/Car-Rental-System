<?php
include("config.php");
include("session.php");
$sql = "SELECT * FROM car";
$result = $conn->query($sql);
$log_id=$_SESSION['log_id'];
$sql34 = "SELECT * FROM customer where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();
$cus_id=$row34['cus_id'];
	$licence=$row34['license'];
    if(isset($_POST['sub'])){

		
		$car_id=$_POST['car-id'];
	 $pdate=$_POST['pdate'];
         $ddate=$_POST['ddate']; 
        $stat=2;
        $sql1 = "INSERT INTO `tbl_booking`(`cus_id`, `car_id`, `book_date`, `drop_date`, `stat`) VALUES('$cus_id','$car_id','$pdate','$ddate','$stat')";
        	
	if($conn->query($sql1) === TRUE){
		?>
		<script>
			if(window.confirm('your booking will confirm after checking'))
			{
				window.location.href='customer-home.php';
			};</script>
		<?php
	}
	else{
		?>
		<script>
			if(window.confirm('Oops!!!!!    failed '))
			{
				window.location.href='customer-home.php';
			};</script>
		<?php
	} 
    }
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
    <script>
		window.onload = function() {
			// Get the input field
			var input = document.getElementById("pdate");

			// Get the current date
			var currentDate = new Date();

			// Set the minimum date of the input field to the current date
			input.setAttribute("min", currentDate.toISOString().slice(0,10));

      // Add an onchange event to the input field
			input.onchange = function() {
				// Call another function
				doSomething();
			};
		}

		function doSomething() {
			// Perform additional actions here
     
      var input1 = document.getElementById("ddate");
			var userDate = document.getElementById("pdate");

			// Get the user-defined date
			var userDateValue = new Date(userDate.value);

			// Set the minimum date of the input field to the user-defined date
			input1.setAttribute("min", userDateValue.toISOString().slice(0,10));
		}
		

    function check(){
					alert("pdate");
			 var pdate=document.getElementById("pdate").value;
			 // document.getElementById("ms").innerHTML = pdate;
			 var c=	document.getElementById("c").value;
			 var ddate=document.getElementById("ddate").value;
			 var data = "pdate="+ pdate + "&c=" + c+"&ddate="+ ddate;
			 
			 
//  jQuery.ajax({
//    url: "ajax.php",
//    type: "POST",
   
//    data:data,
//    success:function(response){
	 
// 	 $("#ms").html(response);
//    },
//    error:function (){}
//  }); 
 
 }
	</script>
  </head>
  <script>
	

			
 
 function check1(){
			 var pdate=document.getElementById("pdate").value;
			 // document.getElementById("ms").innerHTML = pdate;
			 alert(pdate);
			 var c=	document.getElementById("c").value;
		 
			 var ddate=document.getElementById("ddate").value;
			 var data1 = "ddate="+ ddate + "&c=" + c + "&pdate=" + pdate +"&ch=0";

 jQuery.ajax({
   url: "ajax.php",
   type: "POST",
   
   data:data1,
   success:function(response){
	 
	 $("#ms1").html(response);
   },
   error:function (){}
 }); 
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
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">Cars</a>
                        <a href="service.html" class="nav-item nav-link">Drivers</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.html" class="dropdown-item">Car Bookings</a>
                                <a href="detail.html" class="dropdown-item">Drivers Bookings</a>
                                <!-- <a href="booking.html" class="dropdown-item">Car Booking</a> -->
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($row34['fname']); ?> </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="team.html" class="dropdown-item">My profile</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        <!-- </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
  
    
	<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <!-- <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a> -->
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form action="" class="request-form ftco-animate bg-primary" method="post">
		          		<h2>Make your trip</h2>
			    				<!-- <div class="form-group">
			    					<label for="" class="label">Pick-up location</label>
			    					<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div> -->
								<input type="hidden" value="<?php echo $_POST['cid'];?>" name="car-id" id="c">
			    				<div class="form-group">
			    					<label for="" class="label">Destination</label>
			    					<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group">
			                <label for="" class="label">Pick-up date</label>
			                <input type="date" class="form-control" placeholder="Date" name="pdate" id="pdate"  required>
							<span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
			              </div>
			              <div class="form-group">
			                <label for="" class="label">Drop-off date</label>
							<input type="date" class="form-control"  placeholder="Date" id="ddate" name="ddate" onchange="check1()">
							<span class="message text-danger" id="ms1"  ></span>
			              </div>
						  
		              </div>
                  <!-- <input type="date" id="myDate" name="myDate" min="<?php echo $minDate; ?>" onclick> -->


		              <!-- <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div> -->
			            <div class="form-group">
			              <input type="submit" value="Rent A Car Now" name="sub" id="sub" class="btn btn-secondary py-3 px-4">
			            </div>
			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Upcoming Bookings</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				                   
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	     
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				                 
					          </div>
					       
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

<script>
	function check(){
					
			 var pdate=document.getElementById("pdate").value;
			
			 // document.getElementById("ms").innerHTML = pdate;
			 var c=	document.getElementById("c").value;
			
			 var ddate=document.getElementById("ddate").value;
			 var data = "pdate="+ pdate + "&c=" + c+"&ddate="+ ddate;
			 
			 
 jQuery.ajax({
   url: "ajax.php",
   type: "POST",
   
   data:data,
   success:function(response){
	 
	 $("#ms").html(response);
   },
   error:function (){ $("#ms").html("hu");}
 }); 
 
 }

 function check1(){
			 var pdate=document.getElementById("pdate").value;
			 
			 
			 var c=	document.getElementById("c").value;
		 
			 var ddate=document.getElementById("ddate").value;
			 var data1 = "dd="+ ddate + "&c=" + c + "&pd=" + pdate +"&ch=0";

 jQuery.ajax({
   url: "ajax.php",
   type: "POST",
   
   data:data1,
   success:function(response){
	 
	 $("#ms1").html(response);
   },
   error:function (){}
 }); 
 }
</script>
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