
<?php
include 'session.php';
include("config.php");

$rid=$_SESSION['log_id'];


$sql3="SELECT * FROM `message` WHERE `receiver_id`=$rid;";
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
				<li><a href="update-rent.php" class="smoothScroll">profile</a></li>
				<li><a href="#message" class="smoothScroll">message</a></li>
				<li><a href="#team" class="smoothScroll"></a></li>
				<li><a href="#car" class="smoothScroll">ADD CAR</a></li>
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
                <img src="images/slider/car1.jpg" alt="slider image 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-caption">
                                <h2>Plan your trip</h2>
                                <p class="color-white"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
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


<!-- Work section
================================================== -->
<section id="car" class="parallax-section">
	<div class="container">
		<div class="row">

        <center><h1 class="heading color-white">ADD CAR</h1></center><br>
			<form action="add-car.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s" enctype="multipart/form-data">
				
				<div  class="col-md-8 col-sm-3"  style="width: 60%;">
					
					
					    
                
                        <input type="text" class="form-control" placeholder="Name" name="cname" required><br>
						<input type="int" class="form-control" placeholder="Reg Number" name="reg" required><br>
			            <lablel>Choose image...</label>
						<input type="file" class="form-control" placeholder="Image" name="image" required><br>
                        <input type="int" class="form-control" placeholder="mileage" name="mileage" required><br>
						<input type="int" class="form-control" placeholder="Price" name="price" required><br>
						<input type="int" class="form-control" placeholder="Year" name="year" required><br>
						<select id="car" class="form-control" name="model" required>
							<?php
							$model="SELECT * FROM `model`";
							$model_result=$conn->query($model);
							if($model_result->num_rows > 0){
								while($m= $model_result->fetch_assoc()){
									?>
									 <option value="<?php echo $m['model_id'];?>"><?php echo $m['model'];?></option>
                        
                        

						<?php
								}
							}
                       
?>
	</select><br>

	
						
					
					
					
						<input type="submit" class="form-control" value="submit" name="submit">
				</div>
			</form>
     

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
                    $sql="SELECT `fname` FROM `customer` WHERE `log_id`=$sid;";
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