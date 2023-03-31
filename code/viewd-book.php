<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];
$sql34 = "SELECT * FROM customer where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
  </head>
<script>
		function getId(did)
		{
            var did=did;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'license='+did,
        success:function(response){
			$(".modal-body #sd").html(response);
            
			$('#myModal').modal('show');
          
        },
		error:function (){}
      });
		}
		</script>

<body>
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
     <div class="position-relative px-lg-6" style="z-index: 9;">
         <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
             <a href="" class="navbar-brand">
                 <h1 class="text-uppercase text-primary mb-1">Car Rental</h1>
             </a>
             <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                 <div class="navbar-nav ml-auto py-0">
                     <a href="c-h.php" class="nav-item nav-link active">Home</a>
                     <a href="c-h.php" class="nav-item nav-link">Cars</a>
                     <a href="cus-driv.php" class="nav-item nav-link">Drivers</a>
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                         <div class="dropdown-menu rounded-0 m-0">
                             <a href="view-book.php" class="dropdown-item">Car Bookings</a>
                             <a href="viewd-book.php" class="dropdown-item">Drivers Bookings</a>
                             <!-- <a href="booking.html" class="dropdown-item">Car Booking</a> -->
                         </div>
                     </div>
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($row34['fname']); ?> </a>
                         <div class="dropdown-menu rounded-0 m-0">
                             <a href="update-cus.php" class="dropdown-item">My profile</a>
                             <a href="logout.php" class="dropdown-item">Logout</a>
                         </div>
                     <!-- </div>
                     <a href="contact.html" class="nav-item nav-link">Contact</a>
                 </div> -->
             </div>
         </nav>
     </div>
 </div>



<!-- Preloader section
================================================== -->
<section id="preloader" class="parallax-section">
	<div class="container">
		<div class="row">
            <br><br><br><br>
		<center><h1 class="heading color-black"> Booking details</h1></center>
			
        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Driver</th>

									<th scope="col"></th>
                                    
                                    
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">license</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


$sql = "SELECT * FROM `customer` WHERE log_id='$log_id'";
$sql_result = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_array($sql_result);
$cus_id=$row1['cus_id'];

// $sql1 = "SELECT * FROM `car` WHERE renter_id='$renter_id'";
// $sql_result1 = mysqli_query($conn, $sql1);
// if ($sql_result1->num_rows > 0) {
// while ($row2 = $sql_result1->fetch_assoc()) {
// $car_id=$row2['car_id'];
$sql2 = "SELECT * FROM `dbook` WHERE cus_id='$cus_id'";


$result3 = $conn->query($sql2);

			if ($result3->num_rows > 0) {

				
				while ($row = $result3->fetch_assoc()) {
					
					
				
						if($row['stat'] != 3 && $row['stat'] != 5){
					$d_id=$row['driver_id'];
                    $sql1 = "SELECT * FROM `driver` WHERE driver_id='$d_id'";
$result = mysqli_query($conn, $sql1);

$row2 = mysqli_fetch_array($result);
// $renter_id=$row2['renter_id'];
//                             $sql4 = "SELECT * FROM `renter` WHERE renter_id='$renter_id'";
//                             $result4 = mysqli_query($conn, $sql4);
                            
//                             $row4 = mysqli_fetch_array($result4);
                            
                            
		?>
                                <tr>
                                   
                                    <td><b><img src="images/<?php echo $row2['dim']; ?>" style="width: 200px; height: 200px;"></b></td>
									<td><b><?php echo strtoupper($row2['fname'])," ",strtoupper($row2['lname']);  ?></b></td>
                                    
                                    <td><b><?php echo $row2['addresss'],"(h)<br>",$row2['place'],"<br>Phone: ",$row2['phone']; ?></b></td>
                                    <td><b><button type="button" value="" onclick="getId(<?php echo $row['driver_id'];?>)" name="d_id" id="d_id" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
                                    <td><b><?php echo "From: ",$row['book_date'],"<br>To: ",$row['drop_date']; ?></b></td>
                                    <td><b><?php if($row['stat']==0){
                                        echo "<font color='red'>Rejected</font>";
                                    } 
                                    else if($row['stat']==1){
                                        echo "<font color='green'>Accepted</font>";
                                    }
                                    else if($row['stat']==2){
                                        echo "<font color='blue'>Pending</font>";
                                    }
                                    else if($row['stat']==4){
                                        echo "<font color='blue'>Waiting for payment</font>";
                                    }
                                    ?></b></td>
									<td>
                                   
                        <!-- <button id="bt2"  onclick="getid2(<?php echo $row['book_id']; ?>);">Delete</button>
                      </a><br> -->
                    </td>

                    <?php 
                    if($row['amount']>0){ ?>
                    <td>
                        <?php
                    echo "Starting KM: ".$row['start_km']."Km <br>";
                        echo "Ending KM: ".$row['end_km']."Km <br>";
                        echo "Total KM travelled : ".$row['end_km']-$row['start_km']."Km";    
                        ?>
                    <input type="button" class="btn btn-primary" name="Pay" id ="rzp-button1" value="pay now" onclick="pay_now()">
                           <input type="hidden" value="<?php echo  $row['amount'];?>" id="amt" name="amt">    
                           <input type="hidden" value="<?php echo  $row['book_id'];?>" id="bid" name="bid">   
                           <input type="hidden" value="<?php echo  $row2['fname'];?>" id="dname" name="dname">
                               </td>
                            </tbody>
											<?php	
                    	}
                    	}

						}}
		?>
                        </table>
                     
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>

<script>
		

        function getid2(book1)
		{
            var book1 = book1;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'book1='+book1,
        success:function(response){
            
          location.reload();
        },
		error:function (){}
      });
        }
        </script>
<script>
    function pay_now(){

    // var name=jQuery('#name').val();
    var amt=document.getElementById('amt').value;
    var bid=document.getElementById('bid').value;
    var name=document.getElementById('dname').value;
    var options = {
    "key": "rzp_test_sTxnog5fKY3bok",
    "amount": amt*100, 
    "currency": "INR",
    "name": name,
    "description": "Test Transaction",
    // "image": "https://drive.google.com/file/d/1FJCNPPMhML96z3s4IrR8-yGU4A6HLm2X/view?usp=share_link",
    "handler":function(response){
        console.log(response);
        jQuery.ajax({
            type:'POST',
            url:'driverpay.php',
            data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&bid="+bid,
            success:function(result){
                alert("payment success");
                window.location.href="viewd-book.php";
            }

        })
        // if(response){
        //     window.location.href="/adsol/index.php";
        // }
       

    }
};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

}
</script>
<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
        <!-- <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p> -->
    </div>
    <!-- Footer End -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="js1/jquery.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/jquery.waypoints.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>
  <script src="js1/jquery.animateNumber.min.js"></script>
  <script src="js1/bootstrap-datepicker.js"></script>
  <script src="js1/jquery.timepicker.min.js"></script>
  <script src="js1/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js1/google-map.js"></script>
  <script src="js1/main.js"></script>
    
  </body>
</html>