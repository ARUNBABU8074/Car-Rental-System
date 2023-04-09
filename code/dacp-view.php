<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];

$u= $_SESSION['username'];
$day=date("Y-m-d");

if(isset($_POST['substart'])){
   $skm= $_POST["skm"];
   $bid= $_POST["bid"];
 
   $sql2 = "UPDATE `dbook` SET `start_km`='$skm' WHERE `book_id`='$bid'";
  
   if($conn->query($sql2) === TRUE){
  
   

   }
  }
  if(isset($_POST['subend'])){
    
    $ekm= $_POST["ekm"];
    $bid= $_POST["bd"];
  
    $sql3 = "UPDATE `dbook` SET `end_km`='$ekm',`stat`='4' WHERE `book_id`='$bid'";
   
    if($conn->query($sql3) === TRUE){
      $sqlb = "SELECT * FROM `dbook`  WHERE `book_id`='$bid'";
    $r1=$conn->query($sqlb);
    $r = $r1->fetch_assoc();
    $km=$r['end_km']-$r['start_km'];
    
    $date1 = new DateTime($r['book_date']);
$date2 = new DateTime($r['drop_date']);
$diff = $date1->diff($date2);
$days = $diff->days;
$d=$days+1;
    $max=$d*150;
$total=$km-$max;
if($total<=0){
  $amount=$d*800;
}
else{
  $amount=($d*800)+($total*5);
}
$sqlamt = "UPDATE `dbook` SET `amount`='$amount' WHERE `book_id`='$bid'";
$ramt=$conn->query($sqlamt);
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
 
  <head>
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
  <style>


</style>
<script>
  function go(bid){

$('.modal-body #bid').val(bid);
$('#exampleModal').modal('show');
    }

    function go1(bid){

$('.modal-body #bd').val(bid);
$('#endModal').modal('show');
    }

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

<body>

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
                     <a href="driver-home.php" class="nav-item nav-link active">Home</a>
                     <!-- <a href="#" class="nav-item nav-link">Cars</a>
                     <a href="cus-driv.php" class="nav-item nav-link">Drivers</a> -->
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                         <div class="dropdown-menu rounded-0 m-0">
                             <a href="dbook-acp.php" class="dropdown-item">Requests</a>
                             <a href="dacp-view.php" class="dropdown-item">Accepted Bookings</a>
                            
                         </div>
                     </div>
                     <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Payments</a>
                            <div class="dropdown-menu rounded-0 m-0">
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#loginModal">
                            About Payment
  </button> 
                                <a href="driverpayview.php" class="dropdown-item">My Payments</a>
                                
                            </div>
                        </div>
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($u); ?> </a>
                         <div class="dropdown-menu rounded-0 m-0">
                             <a href="updateprofile.php" class="dropdown-item">My profile</a>
                             <a href="logout.php" class="dropdown-item">Logout</a>
                         </div>
                     <!-- </div>
                     <a href="contact.html" class="nav-item nav-link">Contact</a>
                 </div> -->
             </div>
         </nav>
     </div>
 </div>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/slider/im.JPEG');" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <divclass="col-md-9 ftco-animate pb-5">
     
     </div>
   </div>
 </section>


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
                                    <th scope="col">KM details</th>
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
                    if($row2['start_km'] == 0 && $row2['end_km'] == 0 && $row2['book_date']==$day){
                     ?>
                     <!-- <input type="text" name="amt" id="amt" placeholder="Enter the amount after booking closed"><br><br>
                     <button type="button" value="Add" onclick="amt(<?php echo $row2['book_id'];?>)" name="b" id="b" class="btn btn-primary">ADD</button> -->
                     <!-- Button trigger modal -->
                     Starting KM:
<button type="button" class="btn" onclick="go('<?php echo $row2['book_id']; ?>')" >
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
  <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
</button>


										 	<?php	
                    	}
                     else if($row2['start_km'] != 0 && $row2['end_km'] == 0){
                     echo "Starting KM: ".$row2['start_km']."KM";
                     if($row2['drop_date']==$day){
                      ?>
                    <br>  KM Afeter drive:
<button type="button" class="btn" onclick="go1('<?php echo $row2['book_id']; ?>')" >
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
  <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
</button>
<?php
                     }
                      }
                      else if($row2['start_km'] != 0 && $row2['end_km'] != 0){
                        echo "Starting KM: ".$row2['start_km']."Km <br>";
                        echo "Ending KM: ".$row2['end_km']."Km <br>";
                        echo "Total KM travelled : ".$row2['end_km']-$row2['start_km']."Km";
                      }

                      else { echo "Enter the details in the booking start date";

                      }

		// 				}
  }



  if($row2['stat'] == 4){
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
                    echo "Waiting for payment <br>";
                    echo "Starting KM: ".$row2['start_km']."Km <br>";
                    echo "Ending KM: ".$row2['end_km']."Km <br>";
                    echo "Total KM travelled : ".$row2['end_km']-$row2['start_km']."Km <br>";
                    echo "Total Amount : ₹".$row2['amount'];
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter the correct KM as in the Meter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="bid" value="#" id="bid">
          <input type="number" name="skm" id="skm" placeholder="enter the starting km" required>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="sub" name="substart">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="endModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter the correct KM as in the Meter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="bd" value="#" id="bd">
          <input type="number" name="ekm" id="ekm" placeholder="enter the Ending km" required>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="subend" name="subend">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>

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

<script>
    
    </script>
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

<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
       
    </div>
    <!-- Footer End -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Payment Details</h4>
        </div>
        <div class="d-flex flex-column text-center">
        The payment system for the drivers is fixed at Rs. 800 per day for up to 150 km, and for every kilometer beyond 150 km, an additional Rs. 5 is provided.
          
        
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <!-- <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div> -->
      </div>
  </div>
</div>
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