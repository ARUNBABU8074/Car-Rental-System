<?php  

include "config.php";
include 'session.php';

$log_id= $_SESSION['log_id'];
$c=$_POST['cid'];

$sql = "SELECT * FROM `customer` WHERE log_id='$log_id'";
	$sql_result = mysqli_query($conn, $sql);
	
    $row = mysqli_fetch_array($sql_result);
    $cus_id=$row['cus_id'];
	
    if(isset($_POST['bkd'])){

		
		$d_id=$_POST['d-id'];
        $pdate=$_POST['pdate'];
        $ddate=$_POST['ddate'];
        $location=$_POST['location'];
        $destination=$_POST['destination'];
        $stat=2;
        $sql1 = "INSERT INTO `dbook`(`cus_id`, `driver_id`, `book_date`, `drop_date`, `location`, `destination`, `stat`) VALUES ('$cus_id','$d_id','$pdate','$ddate','$location','$destination','$stat')";
        	
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
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<script>
				
                function check(){
             var pdate=document.getElementById("pdate").value;
           
             
             var d=	document.getElementById("d").value;
             
             var ddate=document.getElementById("ddate").value;
             
           
             
 jQuery.ajax({
   url: "trial.php",
   type: "POST",
   
   
   data:{"pdate": pdate, "d": d},
   success:function(response){
     
     $("#ms").html(response);
   },
   error:function (){}
 }); 
 
 }

 function check1(){
			var pdate=document.getElementById("pdate").value;
			// document.getElementById("ms").innerHTML = pdate;
			var d=	document.getElementById("d").value;
		
			var ddate=document.getElementById("ddate").value;
			var data1 = "ddate="+ ddate + "&d=" + d + "&pdate=" + pdate +"&ch=0";

jQuery.ajax({
  url: "trial.php",
  type: "POST",
  
  data:data1,
  success:function(response){
	
	$("#ms1").html(response);
  },
  error:function (){}
}); 
}
 </script>


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
	<style>
body {
  font-family: Arial;
  color: black;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: white;
}

.right {
  right: 0;
  background-color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 250px;
  
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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
<div class="split left">
  <div class="centered">
<div class="login-form-container active">

<!-- <div class="col-md-8 col-sm-6"> -->
<form action="" method="POST"  class="wow fadeInUp" data-wow-delay="0.6s">
				
				<!-- <div class="col-md-8 col-sm-6"> -->
          <br><br>
        <h3>BOOK DRIVER</h3>
        
        <input type="hidden" value="<?php echo $_POST['cid'];?>" name="d-id" id="d">
        <span>pick up date<span>
			  <input type="date" class="form-control" name="pdate"  id="pdate"  onchange="return check()" required ><br>
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
              <span>drop-off date<span>
			<input type="date" class="form-control"  name="ddate"  id="ddate" onchange="return check1()" required ><br>
			<span class="message text-danger" id="ms1"></span><br>
            <span>Location of car<span>
			<input type="text" class="form-control"  name="location"  id="location" onchange="check1()" required ><br>
      <span>Destination<span>
      <input type="text" class="form-control"  name="destination"  id="destination" onchange="check1()" required ><br>
       <input type="submit" class="btn" name="bkd" id ="bkd" value="BOOK NOW" >
</form>

<!-- </div> -->
<!-- </div> -->
</div>
</div>
<div class="split right">
  <div class="centered">
   
    <h2>
    
    <?php 
    $sql12 = "SELECT * FROM `driver` WHERE driver_id='$c'";
	$sql_result12 = mysqli_query($conn, $sql12);
	
    $row12 = mysqli_fetch_array($sql_result12);?>
    <img src="images/<?php echo $row12['dim'];?>"><br>
    <?php
    echo $row12['fname']," ",$row12['lname'];
    $sql11 = "SELECT * FROM `dbook` WHERE driver_id='$c' and stat='1'";
    $sql_result11 = mysqli_query($conn, $sql11);
    echo "<br>Upcomings bookings:";
    echo "<table>
    <tr>
      <th>From</th>
      <th>To</th>
      
    </tr>
   
   
";
      while($row11 = mysqli_fetch_array($sql_result11)){
echo " <tr>
<td>".$row11['book_date']."</td>
<td>".$row11['drop_date']."</td>

</tr>";
      };
      ?></table></h2>
  </div>
</div>
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