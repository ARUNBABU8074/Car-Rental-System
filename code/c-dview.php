
<?php
include 'session.php';

// error_reporting(E_ERROR | E_PARSE);
include("config.php");

$sql = "SELECT * FROM driver";
$result = $conn->query($sql);

 $cid=$_SESSION['log_id'];


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
	

	<script>
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'carc-id='+cid,
        success:function(response){
			$(".modal-body #sd").html(response);
            
			$('#myModal').modal('show');
          
        },
		error:function (){}
      });
		}


		function getIdb(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'carc-idb='+cid,
        success:function(response){
			$(".modal-body #cd").html(response);
            
			$('#bModal').modal('show');
          
        },
		error:function (){}
      });
		}
		</script>


	
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50" style="background-color:aquamarine;">


<!-- Preloader section
================================================== -->
<section  class="preloader">

	<div class="sk-rotating-plane"></div>

</section>


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
				<li><a href="" class="smoothScroll">Drivers</a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
				<li></li>
			
			</ul>
		</div>
	</nav>
	</div>
</section>


<!-- Homepage section
================================================== -->
<div id="home">
	<div class="site-slider">
        <ul class="bxslider">
			
            <li>
                <!-- <img src="images/slider/car2.jpg" alt="slider image 2"> -->
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2></h2>
                        <p class="color-white"></p>
                    </div>
                </div>
            </li>
           
    </div> 
</div>

<!-- team section
================================================== -->
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">

			

			<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$did=$row['log_id'];
					$sql3="SELECT * FROM `login` WHERE `log_id`=$did";
$result3=$conn->query($sql3);
					$row1 = $result3->fetch_assoc();
					if($row1['statuss']==1){
				//output data of each row
				/* while ($row = $result->fetch_assoc()) {
                    if($row['c_stat']==1 && $row['availability']==1){
						$day=date("Y-m-d");
						
						$car=$row['car_id'];
						$book="SELECT * FROM `tbl_booking` WHERE `car_id`=$car";
						$br=$conn->query($book);
						if ($br->num_rows > 0) {
						$booked = $br->fetch_assoc();
						if($booked['stat']==1){
							
						if(($day < $booked['book_date'] ) || ($day > $booked['drop_date'])){
						 */
		?>
                            

			<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="images/<?php echo $row['dim']; ?>" style="width: 400px; height: 400px;" class="img-responsive" alt="team img">
						<div class="team-des">
							<h1>Name: <?php echo strtoupper($row['fname']),"  ",strtoupper($row['lname']); ?></h1>
							<h4>Phone: <?php echo $row['phone']; ?></h4>
                            <h4>Email: <?php echo $row['email']; ?></h4>
                            <h4>Location: <?php echo $row['place']; ?></h4>
							
	 <form action="book.php" method="post">
					<input type="hidden" value="<?php echo $row['driver_id'];?>" name="c">

					
                        <button name="submit"  class="btn btn-primary">BOOK HERE</button>
						</form>
                      <!-- </a> -->
					  <!-- <a href="message.php?receiver_id=<?php echo $row['renter_id'];?>">
                        <button>message</button>
                      </a> -->
					  <?php
					// echo $row['car_id'];
					   ?> 
					  <button type="button" value="" onclick="getId(<?php echo $row['driver_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button>

  
					
						</div>
				</div>
			</div>


			<?php	
						}}
			 } 
			else{
				?>
                            

				<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
					<div class="team-wrapper">
						<img src="images/<?php echo $row['image']; ?>" style="width: 400px; height: 400px;" class="img-responsive" alt="team img">
							<div class="team-des">
								<h1><?php echo strtoupper($row['name']); ?></h1>
								<h2><?php echo $row['price']; ?>Rs</h2>
								
		 
						
								<form action="book.php" method="post">
					<input type="hidden" value="<?php echo $row['car_id'];?>" name="c">

					
                        <button name="submit"  class="btn btn-primary">BOOK HERE</button>
			</form>
						  <!-- <a href="message.php?receiver_id=<?php echo $row['renter_id'];?>">
							<button>message</button>
						  </a> -->
						  <?php
						   // echo $row['car_id'];
						   ?> 
						  <button type="button" value="" onclick="getId(<?php echo $row['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
		VIEW
	  </button>

	  <button type="button" value="" onclick="getIdb(<?php echo $row['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
		B
	  </button>
	
	  
						
							</div>
					</div>
				</div>
	
	
				<?php	
			}

					/* } */
					/* else{
						?>
                            

			<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="images/<?php echo $row['image']; ?>" style="width: 400px; height: 400px;" class="img-responsive" alt="team img">
						<div class="team-des">
							<h1><?php echo strtoupper($row['name']); ?></h1>
							<h2><?php echo $row['price']; ?>Rs</h2>
							
	 
					
							<form action="book.php" method="post">
					<input type="hidden" value="<?php echo $row['car_id'];?>" name="c">
					
					
					<input type="submit" class="btn btn-primary" value="BOOK HERE" name="submit" id="submit">
					</form>
					  <!-- <a href="message.php?receiver_id=<?php echo $row['renter_id'];?>">
                        <button>message</button>
                      </a> -->
					 
					  <button type="button" value="" onclick="getId(<?php echo $row['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button>

  
					
						</div>
				</div>
			</div>


			<?php
					}
            	}

			}
        } */
		?>

			
		</div>
	</div>
</section>



<div class="container mt-3">
  
 
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CAR DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form >
				
				<span id="sd"></span>
             
        </form>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>




 <!-- The Modal -->
 <div class="modal fade" id="bModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CAR DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
		<form>
			<!-- <span  id="cd"></span> -->
				<input type="text" name="cd" id="myTextInput"> 
				
            <span>pick up date<span>
			  <input type="date" class="form-control" name="pdate"  id="pdate"  onchange="check()" required ><br>
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
              <span>drop-off date<span>
			<input type="date" class="form-control"  name="ddate"  id="ddate" onchange="check1()" required ><br>
			<span class="message text-danger" id="ms1"  ></span>
			
			<input type="submit" class="form-control" value="Book" name="sub" id="sub" >
				</div>
			</form>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>






  
</div>








	





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