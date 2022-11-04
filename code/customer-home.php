
<?php
include 'session.php';

// error_reporting(E_ERROR | E_PARSE);
include("config.php");

$sql = "SELECT * FROM car";
$result = $conn->query($sql);

$rid=$_SESSION['log_id'];

$sql3="SELECT * FROM `message` WHERE `receiver_id`=$rid";
$result3=$conn->query($sql3);
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
			
			document.getElementById("txtcar").innerHTML()=cid;
		}
		</script>


	
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
                <li><a href="#renter" class="smoothScroll"></a></li>
				<li><a href="update-cus.php" class="smoothScroll">profile</a></li>
				<li><a href="#message" class="smoothScroll">message</a></li>
				<li><a href="#team" class="smoothScroll">cars</a></li>
				<li><a href="#portfolio" class="smoothScroll"></a></li>
				<li><a href="#plan" class="smoothScroll"></a></li>
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
                <img src="images/slider/car2.jpg" alt="slider image 2">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2></h2>
                        <p class="color-white"></p>
                    </div>
                </div>
            </li>
           
    </div> <!-- /.site-slider -->
</div>

<!-- team section
================================================== -->
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">

			

			<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
                    if($row['c_stat']==1){
		?>
                            

			<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="images/<?php echo $row['image']; ?>" style="width: 400px; height: 400px;" class="img-responsive" alt="team img">
						<div class="team-des">
							<h1><?php echo strtoupper($row['name']); ?></h1>
							<h2><?php echo $row['price']; ?>Rs</h2>
							<!-- <ul class="social-icon">
							<b>	<li>Model: <?php
							// $mid=$row['model'];
							// $m = "SELECT * FROM model WHERE model_id= $mid";
							// $result34 = $conn->query($m);
							// $row34 = $result34->fetch_assoc();
							
							//echo strtoupper($row34['model']); ?></li>
								<li>Year: <?php //echo $row['year']; ?></li>		
					</ul>	Register number: <?php //echo strtoupper($row['reg_no']); ?></b><br>
                    Mileage : <?php //echo $row['mileage']; ?><br> -->

						<!-- Input field to accept user input -->
	 
					
                    <a href="" class="tm-product-delete-link">
                        <button>BOOK HERE</button>
                      </a>
					  <a href="message.php?receiver_id=<?php echo $row['renter_id'];?>">
                        <button>message</button>
                      </a>
					  
					  <button type="button" value="<?php echo $row['car_id'];?>" onclick="getId(<?php echo $row['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    VIEW
  </button>

  
					
						</div>
				</div>
			</div>


			<?php	
            	}

			}
        }
		?>

			
		</div>
	</div>
</section>

<!-- Work section
================================================== -->
<!-- <section id="message" class="parallax-section">
<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> message </h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">from</th>
									<th scope="col">message</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
			//if ($result3->num_rows > 0) {

				//output data of each row
		// 		while ($row = $result3->fetch_assoc()) {
        //                 $sid=$row['sender_id'];
        //                 $sql="SELECT `fname` FROM `renter` WHERE `log_id`=$sid;";
        //                 $result=$conn->query($sql);
        //                 $r=$result->fetch_assoc();
        //                 $fname=$r['fname'];
		?>
                                <tr>
                                 <td><b>
									//<?php //echo $fname; ?>
								</b></td> 
                                <td><b>
									<?php //echo $row['message']; ?>
								</b></td>
                                    
                                   <td>  <a href="reply.php?sender_id=<?php// echo $row['sender_id'];?>" >
                        <button>REPLAY</button>
                      </a> 
                    </td>

                            </tbody>
										 <?php	//	}
				//}
			
		?>
                        </table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section> -->


<div class="container mt-3">
  
  <!-- Button to Open the Modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> -->

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
			<form>
				<input type="hidden" id="txtcar" name="txtcar"/>
		<?php
		
		
		$sql1 = "SELECT * FROM car where car_id=5";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row0 = $result1->fetch_assoc()) {
                    if($row0['c_stat']==1){
		?>
                            

			<!-- <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="team-wrapper"> -->
					<img src="images/<?php echo $row0['image']; ?>" style="width: 400px; height: 400px;" class="img-responsive" alt="team img">
					<h1><?php echo strtoupper($row0['company']); ?></h1>
							<h1><?php echo strtoupper($row0['name']); ?></h1>
							<h2><?php echo $row0['price']; ?>Rs</h2>
							 <ul class="social-icon">
							<b>	<li>Model: <?php
							$mid0=$row0['model'];
							$m0 = "SELECT * FROM model WHERE model_id= $mid0";
							$result01 = $conn->query($m0);
							$row01 = $result01->fetch_assoc();
							
							echo strtoupper($row01['model']); ?></li>
								<li>Year: <?php echo $row0['year']; ?></li>		
					</ul>	Register number: <?php echo strtoupper($row0['reg_no']); ?></b><br>
                    Mileage : <?php echo $row0['mileage']; ?><br> 
                  
						
				<!-- </div>
			</div> -->


			<?php	
            	}
			}
        }
		?>
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