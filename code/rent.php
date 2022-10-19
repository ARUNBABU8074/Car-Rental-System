
<?php
include 'session.php';
error_reporting(E_ERROR | E_PARSE);
include("config.php");





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

<!-- approve section
================================================== -->
<section id="approve" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> RENTER APPROVAL</h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">FNAME</th>
									<th scope="col">LNAME</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PLACE</th>
                                    <th scope="col">APPROVE</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


$sql2 = "SELECT * FROM `renter`";
$result2 = $conn->query($sql2);
	

			if ($result2->num_rows > 0) {

				
				while ($row1 = $result2->fetch_assoc()) {
					$log_id=$row1['log_id'];

					$approve = "SELECT * FROM `login` WHERE log_id='$log_id'";
					$approve_result = mysqli_query($conn, $approve);
					$rsltcheck1 = mysqli_num_rows($approve_result);
					$rowA = mysqli_fetch_array($approve_result);
					if($rsltcheck1 == 1){
					
				
						if($rowA['statuss'] == 2){
					
                    
		?>
                                <tr>
                                   
                                    <td><b><?php echo $row1['fname']; ?></b></td>
									<td><b><?php echo $row1['lname']; ?></b></td>
                                    <td><b><?php echo $row1['phone']; ?></b></td>
                                    <td><b><?php echo $row1['email']; ?></b></td>
                                    <td><b><?php echo $row1['addresss']; ?></b></td>
                                    <td><b><?php echo $row1['place']; ?></b></td>
									<td>
                                    <a href="approve-r.php?log_id=<?php echo $row1['log_id'];?>" >
                        <button>approve</button>
                      </a>
                    </td>

                            </tbody>
											<?php		}

						}}
			}
		?>
                        </table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section> 



<!-- renter section
================================================== -->
<section id="remove" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> RENTER REMOVE</h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">FNAME</th>
									<th scope="col">LNAME</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PLACE</th>
                                    <th scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


				

$result3 = $conn->query($sql2);

			if ($result3->num_rows > 0) {

				
				while ($row = $result3->fetch_assoc()) {
					$log_id=$row['log_id'];

					$login_check = "SELECT * FROM `login` WHERE log_id='$log_id'";
					$login_check_result = mysqli_query($conn, $login_check);
					$rsltcheck = mysqli_num_rows($login_check_result);
					$row2 = mysqli_fetch_array($login_check_result);
					if($rsltcheck == 1){
					
				
						if($row2['statuss'] == 1){
					
                    
		?>
                                <tr>
                                   
                                    <td><b><?php echo $row['fname']; ?></b></td>
									<td><b><?php echo $row['lname']; ?></b></td>
                                    <td><b><?php echo $row['phone']; ?></b></td>
                                    <td><b><?php echo $row['email']; ?></b></td>
                                    <td><b><?php echo $row['addresss']; ?></b></td>
                                    <td><b><?php echo $row['place']; ?></b></td>
									<td>
                                    <a href="delete-r.php?log_id=<?php echo $row['log_id'];?>" >
                        <button>REMOVE</button>
                      </a>
                    </td>

                            </tbody>
											<?php		}

						}}
			}
		?>
                        </table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>


<!-- re-add section
================================================== -->
<section id="re-add" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> RENTER RE-ADD</h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">FNAME</th>
									<th scope="col">LNAME</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PLACE</th>
                                    <th scope="col">RE-ADD</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php



$result3 = $conn->query($sql2);
	

			if ($result3->num_rows > 0) {

				
				while ($row3 = $result3->fetch_assoc()) {
					$log_id=$row3['log_id'];

					$add = "SELECT * FROM `login` WHERE log_id='$log_id'";
					$add_result = mysqli_query($conn, $add);
					$rsltcheck3 = mysqli_num_rows($add_result);
					$row4 = mysqli_fetch_array($add_result);
					if($rsltcheck3 == 1){
					
				
						if($row4['statuss'] == 0){
					
                    
		?>
                                <tr>
                                   
                                    <td><b><?php echo $row3['fname']; ?></b></td>
									<td><b><?php echo $row3['lname']; ?></b></td>
                                    <td><b><?php echo $row3['phone']; ?></b></td>
                                    <td><b><?php echo $row3['email']; ?></b></td>
                                    <td><b><?php echo $row3['addresss']; ?></b></td>
                                    <td><b><?php echo $row3['place']; ?></b></td>
									<td>
                                    <a href="approve-r.php?log_id=<?php echo $row3['log_id'];?>" >
                        <button>re-add</button>
                      </a>
                    </td>

                            </tbody>
											<?php		}

						}}
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