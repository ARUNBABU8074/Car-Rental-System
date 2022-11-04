
<?php
include 'session.php';
error_reporting(E_ERROR | E_PARSE);
include("config.php");
$sql = "SELECT * FROM `login`";
$result = $conn->query($sql);


$sql2 = "SELECT * FROM `renter`";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM car";
$result3 = $conn->query($sql3);

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
                <li><a href="#approve" class="smoothScroll">APPROVE</a></li>
				<li><a href="#remove" class="smoothScroll">REMOVE</a></li>
				<li><a href="#re-add" class="smoothScroll">RE-ADD</a></li>
				<li><a href="#cars" class="smoothScroll">CARS</a></li>
				<li><a href="#message" class="smoothScroll">MESSAGE</a></li>
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

    </div> 
</div> 


<!-- APPROVE section
================================================== -->
<section id="approve" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> car </h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">NO.</th>
									<th scope="col">RENTER Name</th>
                                    <th scope="col">COMPANY</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">REGISTER N0</th>
                                    <th scope="col">YEAR</th>
                                    <th scope="col">MODEL</th>
                                    <th scope="col">MILEAGE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
                                $n=1;
			if ($result3->num_rows > 0) {

				//output data of each row
				while ($row = $result3->fetch_assoc()) {

                    if($row['c_stat']==2){
		?>
                                <tr>
                                <td><b><?php echo $n; ?></b></td>
                                <td><b><?php
							$rid=$row['renter_id'];
							$name1 = "SELECT * FROM renter WHERE renter_id= $rid";
							$result36 = $conn->query($name1);
							$row36 = $result36->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row36['fname']); ?></b></td>
                                    <td><b><?php echo strtoupper($row['company']); ?></b></td>
                                    <td><b><?php echo strtoupper($row['name']); ?></b></td>
                                    <td><b><?php echo strtoupper($row['reg_no']); ?></b></td>
									<td><b><?php echo $row['year']; ?></b></td>
                                    <td><b><?php
							$mid1=$row['model'];
							$m1 = "SELECT * FROM model WHERE model_id= $mid1";
							$result37 = $conn->query($m1);
							$row37 = $result37->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row37['model']); ?></b></td>
                                    <td><b><?php echo $row['mileage']; ?></b></td>
                                    <td><b><?php echo $row['price']; ?></b></td>
                                    <td><b><img src="images/<?php echo $row['image']; ?>" style="width: 200px; height: 200px;" class="img-responsive" alt=""></b></td>
									<td>
                                    <a href="approve-car.php?car_id=<?php echo $row['car_id'];?>" >
                        <button>APPROVE</button>
                      </a>
                    </td>

                            </tbody>
											<?php	
                                            $n=$n+1;	}
                                            
                                            
				}
			}
		?>
                        </table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>



<!-- APPROVE section
================================================== -->
<section id="remove" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> remove car </h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">NO.</th>
									<th scope="col">RENTER Name</th>
                                    <th scope="col">COMPANY</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">REGISTER N0</th>
                                    <th scope="col">YEAR</th>
                                    <th scope="col">MODEL</th>
                                    <th scope="col">MILEAGE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
                                $s=1;
                                $result4 = $conn->query($sql3);
			if ($result4->num_rows > 0) {

               
				while ($row1 = $result4->fetch_assoc()){
                    
                    if($row1['c_stat']==1){
		?>
                                <tr>
                                <td><b><?php echo $s ?></b></td>

                                <td><b><?php
							$rid=$row1['renter_id'];
							$name = "SELECT * FROM renter WHERE renter_id= $rid";
							$result35 = $conn->query($name);
							$row35 = $result35->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row35['fname']); ?></b></td>
                                    
                                    <td><b><?php echo strtoupper($row1['company']); ?></b></td>
                                    <td><b><?php echo strtoupper($row1['name']); ?></b></td>
                                    <td><b><?php echo strtoupper($row1['reg_no']); ?></b></td>
									<td><b><?php echo $row1['year']; ?></b></td>
                                    <td><b><?php
							$mid=$row1['model'];
							$m = "SELECT * FROM model WHERE model_id= $mid";
							$result34 = $conn->query($m);
							$row34 = $result34->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row34['model']); ?></b></td>
                                    <td><b><?php echo $row1['mileage']; ?></b></td>
                                    <td><b><?php echo $row1['price']; ?></b></td>
                                    <td><b><img src="images/<?php echo $row1['image']; ?>" style="width: 200px; height: 200px;" class="img-responsive" alt=""></b></td>
									<td>
                                    <a href="remove-car.php?car_id=<?php echo $row1['car_id'];?>" >
                        <button>REMOVE</button>
                      </a>
                    </td>

                            </tbody>
											<?php	
                                            $s=$s+1;	}
                                            
				}
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