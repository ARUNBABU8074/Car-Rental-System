
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
					<img src="<?php echo $row['image']; ?>" width="100%" height="200" class="img-responsive" alt="team img">
						<div class="team-des">
							<h1><?php echo $row['name']; ?></h1>
							<h2><?php echo $row['price']; ?>Rs</h2>
							<ul class="social-icon">
							<b>	<li>Model:<?php echo $row['model']; ?></li>
								<li>Year:<?php echo $row['year']; ?></li>		
					</ul>	Register number: <?php echo $row['reg_no']; ?></b><br>
                    Mileage :	<?php echo $row['mileage']; ?><br>
                    <a href="" class="tm-product-delete-link">
                        <button>BOOK HERE</button>
                      </a>
					  <a href="message.php?receiver_id=<?php echo $row['renter_id'];?>">
                        <button>message</button>
                      </a>
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
<section id="message" class="parallax-section">
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
			if ($result3->num_rows > 0) {

				//output data of each row
				while ($row = $result3->fetch_assoc()) {
                        $sid=$row['sender_id'];
                        $sql="SELECT `fname` FROM `renter` WHERE `log_id`=$sid;";
                        $result=$conn->query($sql);
                        $r=$result->fetch_assoc();
                        $fname=$r['fname'];
		?>
                                <tr>
                                 <td><b><?php echo $fname; ?></b></td> 
                                <td><b><?php echo $row['message']; ?></b></td>
                                    
                                   <td>  <a href="reply.php?sender_id=<?php echo $row['sender_id'];?>" >
                        <button>REPLAY</button>
                      </a> 
                    </td>

                            </tbody>
											<?php		}
				}
			
		?>
                        </table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>




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