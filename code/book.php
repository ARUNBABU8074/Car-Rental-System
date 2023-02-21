<?php  

include "config.php";
include 'session.php';

$log_id= $_SESSION['log_id'];

$sql = "SELECT * FROM `customer` WHERE log_id='$log_id'";
	$sql_result = mysqli_query($conn, $sql);
	
    $row = mysqli_fetch_array($sql_result);
    $cus_id=$row['cus_id'];
	$licence=$row['licence'];
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
				<li><a href="#plan" class="smoothScroll"></a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
				<li></li>
			
			</ul>
		</div>
	</nav>
	</div>
</section>

<!-- Preloader section
================================================== -->
<section  class="preloader">

	<div class="sk-rotating-plane"></div>

</section>

<section id="portfolio" class="parallax-section">
	<div class="container">
		<div class="row">
			

			<!-- Section title
			================================================== -->
			<center><h1 class="heading color-black">booking</h1></center>

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
  error:function (){}
}); 

}

function check1(){
			var pdate=document.getElementById("pdate").value;
			// document.getElementById("ms").innerHTML = pdate;
			var c=	document.getElementById("c").value;
		
			var ddate=document.getElementById("ddate").value;
			var data1 = "ddate="+ ddate + "&c=" + c + "&pdate=" + pdate +"&ch=0";
// jQuery.ajax({
//   url: "ajax.php",
//   type: "POST",
  
//   data:data,
//   success:function(response){
	
// 	$("#ms").html(response);
//   },
//   error:function (){}
// }); 
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
			<form action="" method="POST"  class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validate()">
				
				<div class="col-md-8 col-sm-6">
					<?php
					$day=date("Y-m-d");
					
					?>
				<input type="hidden" value="<?php echo $_POST['c'];?>" name="car-id" id="c">
				
            <span>pick up date<span>
			  <input type="date" class="form-control" name="pdate"  id="pdate"  onchange="check()" required ><br>
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
              <span>drop-off date<span>
			<input type="date" class="form-control"  name="ddate"  id="ddate" onchange="check1()" required ><br>
			<span class="message text-danger" id="ms1"  ></span>
			
			<input type="submit" class="form-control" value="Book" name="sub" id="sub" >
				</div>
			</form>


			<!-- Work Owl Carousel section
			================================================== -->
			

		

			<br><br><br><br><br><br><br><br>

		</div>
	</div>
</section>	

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