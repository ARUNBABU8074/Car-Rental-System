<?php
include("../config.php");
include("../session.php");
if(isset($_POST['view'])){
$car_id=$_POST['cid'];
// echo $car_id;
// exit;
$log_id=$_SESSION['log_id'];
$sql34 = "SELECT * FROM tbl_checker where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();
$sql = "SELECT * FROM car where car_id='$car_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$rid=$row['renter_id'];
$sql1 = "SELECT * FROM renter where renter_id='$rid'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$lid=$row1['log_id'];
$sqll = "SELECT * FROM tbl_location where log_id='$lid'";
$resultl = $conn->query($sqll);
$rowl = $resultl->fetch_assoc();
$mid=$row['model'];
$sqlm = "SELECT * FROM model where model_id='$mid'";
$resultm = $conn->query($sqlm);
$rowm = $resultm->fetch_assoc();
$model=$rowm['model'];
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

	<style>
		/* body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
} */

.radio {
	background: #454857;
	padding: 4px;
	border-radius: 3px;
	box-shadow: inset 0 0 0 3px rgba(35, 33, 45, 0.3),
		0 0 0 3px rgba(185, 185, 185, 0.3);
	position: relative;
}

.radio input {
	width: auto;
	height: 100%;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	outline: none;
	cursor: pointer;
	border-radius: 2px;
	padding: 4px 8px;
	background: #454857;
	color: #bdbdbdbd;
	font-size: 14px;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
		"Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
		"Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
	transition: all 100ms linear;
}

.radio input:checked {
	background-image: linear-gradient(180deg, #95d891, #74bbad);
	color: #fff;
	box-shadow: 0 1px 1px #0000002e;
	text-shadow: 0 1px 0px #79485f7a;
}

.radio input:before {
	content: attr(label);
	display: inline-block;
	text-align: center;
	width: 100%;
}
</style>
  </head>
  <body>
  <script>
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajaxcheck.php",
        type: "POST",
        
        data:'carc-id='+cid,
        success:function(response){
			$(".modal-body #sd").html(response);
            
			$('#modalContactForm').modal('show');
          
        },
		error:function (){}
      });
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
        <div class="position-relative px-lg-9" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase  mb-1">Car Rental</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="check-home.php" class="nav-item nav-link active">Home</a>
                        <!-- <a href="about.html" class="nav-item nav-link">Cars</a>
                        <a href="service.html" class="nav-item nav-link">Drivers</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Requests</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car-req.php" class="dropdown-item">Pending Requests</a>
                                <a href="" class="dropdown-item">Completed Requests</a>
                                <!-- <a href="booking.html" class="dropdown-item">Car Booking</a> -->
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($row34['fname']); ?> </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="profile.php" class="dropdown-item">My profile</a>
                                <a href="../logout.php" class="dropdown-item">Logout</a>
                            </div>
                        <!-- </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>







   
	<div class="modal right fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-bottom-right  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add your Findigs</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" action="opinion.php">
      <div class="modal-body mx-3">
	  <span id="sd"></span>
        <div class="md-form mb-5">
		
  <div class="radio">
  <label=" ">All papers clear?   :
	<input label="  Yes" type="radio" id="yes" name="vehicle1" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle1" value="0"><br><br>
<!-- </div>
<div class="radio"> -->
  <label=" ">Vehicle is in running condition?   :
	<input label="  Yes" type="radio" id="yes" name="vehicle2" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle2" value="0"><br><br>
<!-- </div>
<div class="radio"> -->
  <label=" ">Over damage in car?   :
	<input label="  Yes" type="radio" id="yes" name="vehicle3" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle3" value="0"><br><br>
<!-- </div>
<div class="radio"> -->
  <label=" ">Details about the car is true  :
	<input label="  Yes" type="radio" id="yes" name="vehicle4" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle4" value="0"><br>
<!-- </div>
<div class="radio"> -->
  <br><label=" ">Is price given is apt??   :
	<input label="  Yes" type="radio" id="yes" name="vehicle5" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle5" value="0"><br><br>
<!-- </div>
<div class="radio"> -->
  <label=" ">It is apt for our website?   :
	<input label="  Yes" type="radio" id="yes" name="vehicle6" value="1" checked>
	<input label="No" type="radio" id="no" name="vehicle6" value="0">
</div>
        </div>

        <div class="md-form">
          <i class="fas fa-pencil prefix grey-text"></i>
          <textarea type="text" id="form8" class="md-textarea form-control" rows="4" name="details" required></textarea>
		  <input type="hidden" value="<?php echo $car_id;?>" name="chid">
          <label data-error="wrong" data-success="right" for="form8">Your Suggestion</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
</form>
    </div>
  </div>
</div>


		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(../images/<?php echo $row['image'];?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo $row['company'];?></span>
      					<h2><?php echo $row['name'];?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  class="bi bi-speedometer" viewBox="0 0 16 16">
  <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
  <path fill="#0000CD" fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
</svg></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage
		                	<span><?php echo $row['mileage'];?>km/l</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path fill="#0000CD" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Model
		                	<span><?php echo $model ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Year
		                	<span><?php echo $row['year'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
				  <button type="button" class="icon d-flex align-items-center justify-content-center" onclick="getId(<?php echo $row['car_id'];?>)" data-toggle="modal" data-target="#modalContactForm"><span class="flaticon-backpack"></span>

</button>
	              	<!-- <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div> -->
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
						Add your Findings about car
		                	<span></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <!-- <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Excess Price per KM
		                	<span><?php echo $row['excess'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>-->
      	</div> 
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							  <li class="nav-item">
							      <a class="nav-link active" id="pills-car-tab" data-toggle="pill" href="#pills-car" role="tab" aria-controls="pills-car" aria-expanded="true">Car</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Price</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Renter</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Location</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">

						  <div class="tab-pane fade show active" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
										<li class="check"><span class="ion-ios-checkmark"></span>Registration Number: <?php echo $row['reg_no'];?></li>
										<li class="check"><span class="ion-ios-checkmark"></span>Papers: </li>
										<iframe src="../papers/<?php $row['papers']?>" style="width: 1000px; height: 500px;"></iframe>
						    			</ul>
						    		</div>
						    	
						    	</div>
						    </div>


						    <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class=""></span>Price for First <?php echo $row['km'];?>km : <?php echo $row['price'];?>.RS</li>
						    				<li class="check"><span class=""></span>After <?php echo $row['km'];?>km there will be an excess amount.</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>The excess amount is <?php echo $row['excess'];?>.RS for each km.</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>This price section is only for one day.</li>
						    				<!-- <li class="check"><span class="ion-ios-checkmark"></span>Music</li> -->
						    			</ul>
						    		</div>
						    		
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
							<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Name: <?php echo $row1['fname'];?></li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Email: <?php echo $row1['email'];?></li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Phone: <?php echo $row1['phone'];?></li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Address: <?php echo $row1['addresss'],'(h)<br>',$row1['place'],'<br>',$row1['district'],'<br>Pincode: ',$row1['pincode'];?></li>
						    				<!-- <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li> -->
											
						    			</ul>
						    		</div>
						    </div>
<?php
}
?>
						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
									   <iframe width="1000" height="500" src="https://maps.google.com/maps?q=<?php echo $row1['place']; ?>&output=embed"></iframe>
							   			<div class="review d-flex">
									   		<!-- <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div> -->
									   	<!-- <div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div> -->
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<!-- <h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						    </div>
						  </div> -->
						</div>
		      </div>
				</div>
      </div>
    </section>

   



<!-- Modal -->
<div class="modal right fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
  <div class="modal-dialog modal-side modal-top-right  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">...</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
















    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
        <!-- <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p> -->
    </div>
    <!-- Footer End -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>