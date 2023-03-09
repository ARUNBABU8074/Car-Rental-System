<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];

$u= $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
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
				
				
             <span id ="sd"></span>
        </form>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
<script>
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'license='+cid,
        success:function(response){
			$(".modal-body #sd").html(response);
            
			$('#myModal').modal('show');
          
        },
		error:function (){}
      });
		}
		</script>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
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
    <div style="background-image: url('images/slider/im.jpeg');">
			<ul class="nav navbar-nav navbar-right" style="background-image: url('images/slider/im.jpg');">
            
				<!-- <li><a href="#home" class="smoothScroll">HOME</a></li> -->
                <li><a href="updateprofile.php" class="smoothScroll">profile</a></li>
				<!-- <li><a href="#message" class="smoothScroll"></a></li>
				<li><a href="" class="smoothScroll"></a></li> -->
				<li><a href="dacp-view.php" class="smoothScroll">My Bookings</a></li>
				<li><a href="dbook-acp.php" class="smoothScroll">Requests</a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
        <li><a href="" class="smoothScroll "><i class="glyphicon glyphicon-user"> <?php echo strtoupper($u);?></i></a></li>
			</ul>
      <div>
		</div>

	</div>
</section>

<!-- <p>Some Bootstrap icons:</p>
<i class="glyphicon glyphicon-cloud"></i>
<i class="glyphicon glyphicon-remove"></i>
<i class="glyphicon glyphicon-user"></i>
<i class="glyphicon glyphicon-envelope"></i>
<i class="glyphicon glyphicon-thumbs-up"></i>
<br><br> -->

<!-- Preloader section
================================================== -->
<div id="home">
	<div class="site-slider">
        <ul class="bxslider">
			<li>
                <img src="images/slider/im.jpeg" alt="slider image 1">
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
          

    </div> 
</div>
<section id="remove" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> Booking details</h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <!-- <th scope="col">Car</th> -->

									<th scope="col">Customer</th>
                                    
                                    
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">Driving Licence </th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Location of car</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


$sql = "SELECT * FROM `driver` WHERE log_id='$log_id'";
$sql_result = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_array($sql_result);
$driver_id=$row1['driver_id'];

$sql1 = "SELECT * FROM `dbook` WHERE driver_id='$driver_id'";
$sql_result1 = mysqli_query($conn, $sql1);
if ($sql_result1->num_rows > 0) {
while ($row2 = $sql_result1->fetch_assoc()) {
// $car_id=$row2['car_id'];
// $sql2 = "SELECT * FROM `tbl_booking` WHERE car_id='$car_id'";


// $result3 = $conn->query($sql2);

			// if ($result3->num_rows > 0) {

				
				// while ($row = $result3->fetch_assoc()) {
					
					
		
                    
						if($row2['stat'] == 1){
					$cus_id=$row2['cus_id'];
                            $sql4 = "SELECT * FROM `customer` WHERE cus_id='$cus_id'";
                            $result4 = mysqli_query($conn, $sql4);
                            
                            $row4 = mysqli_fetch_array($result4);
                            
                            
		?>
                                <tr>
                                   
                                    <!-- <td><b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"><?php echo "<br>",strtoupper($row2['company']),"<br>",strtoupper($row2['name']); ?></b></td> -->
									<td><b><?php echo strtoupper($row4['fname'])," ",strtoupper($row4['lname']);  ?></b></td>
                                    
                                    <td><b><?php echo $row4['addresss'],"(h)<br>",$row4['place'],"<br>Phone: ",$row4['phone']; ?></b></td>
                                    <td><b><button type="button" value="" onclick="getId(<?php echo $row4['cus_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
                                    <td><b><?php echo "From: ",$row2['book_date'],"<br>To: ",$row2['drop_date']; ?></b></td>
									<td>
                                    <b><?php echo $row2['location']; ?></b>
                    </td>
                    <td>
                                    <b><?php echo $row2['destination']; ?></b>
                    </td>
                    <td><?php 
                    if($row2['amount'] == 0){
                    ?>
                      <input type="text" name="amt" id="amt" placeholder="Enter the amount after booking closed"><br><br>
                    <button type="button" value="Add" onclick="amt(<?php echo $row2['book_id'];?>)" name="b" id="b" class="btn btn-primary">ADD</button>
                            <!-- </tbody> -->
											<?php		}
                      else{ echo" waiting for payment";

                      }

		// 				}
  }
			}
         }
		?> </td></tbody>
                        </table>
                     
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>

<script>
		function getid(bookid)
		{
            var bookid = bookid;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'dbook-id='+bookid,
        success:function(response){
            alert("Booking Accepted");
          location.reload();
        },
		error:function (){}
      });
        }

        function getid2(book)
		{
            var book = book;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'dbook='+book,
        success:function(response){
            alert("Booking Rejected");
          location.reload();
        },
		error:function (){}
      });
        }

        
        function amt(bo)
		{
      var bo = bo;
            var amt =document.getElementById('amt').value;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:{"amtd": amt, "bo_id": bo},
        success:function(response){
         
            alert("Rate added");
          location.reload();
        },
		error:function (){}
      });
        }
        </script>

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