<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];
$sql34 = "SELECT * FROM customer where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();

if(isset($_POST['submit'])){
 $feedback= $_POST["feed"];
  $car= $_POST["car_id"];
  $cus= $_POST["cus_id"];
  $bs= $_POST["book_id"];

  // $feedback = "This is a great product! I love it!";
  $feedback_escaped = escapeshellarg($feedback);
  $command = "python get_sentiment_score.py $feedback_escaped";
  $sentiment_score = shell_exec($command);
  // echo "oke:".$sentiment_score;
// if ($sentiment_score > 0.5) {
//     echo "Positive feedback!";
// } elseif ($sentiment_score < -0.5) {

//     echo "Negative feedback!";
// } else {
//     echo "Neutral feedback.";
// }

 
   $sql2 = "INSERT INTO `tbl_feedback`(`cus_id`, `car_id` , `book_id` , `feedback`, `score`) VALUES ('$cus','$car','$bs','$feedback','$sentiment_score')";
  
   if($conn->query($sql2) === TRUE){
   
     ?>
     <script>
       if(window.confirm('feedback added'))
       {
         window.location.href='view-book.php';
       };</script>
     <?php
   }
   else{
     ?>
      <script>
       if(window.confirm('Oops!!!!!    failed '))
       {
         window.location.href='view-book.php';
       };</script>
      <?php
   } 
   } 
   


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
                        <a href="c-h.php" class="nav-item nav-link active">Home</a>
                        <a href="c-h.php" class="nav-item nav-link">Cars</a>
                        <!-- <a href="cus-driv.php" class="nav-item nav-link">Drivers</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                            <div class="dropdown-menu rounded-0 m-0">
                              
                                <a href="view-book.php" class="dropdown-item">My Bookings</a>
                                <a href="currentcbook.php" class="dropdown-item">Ongoing booking</a>
                                <a href="carpaid.php" class="dropdown-item">Payment Done</a>
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
                                    
                                    <th scope="col">Car</th>

									<th scope="col">Renter</th>
                                    
                                    
                                    <!-- <th scope="col">ADDRESS</th> -->
                                    <th scope="col">Car Papers</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Km details</th>
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
$sql2 = "SELECT * FROM `tbl_booking` WHERE cus_id='$cus_id' ORDER BY book_id DESC";


$result3 = $conn->query($sql2);

			if ($result3->num_rows > 0) {

				
				while ($row = $result3->fetch_assoc()) {
					
					
				
						if($row['stat'] != 3 && $row['stat'] != 5 && $row['start_km']>0){
					$car_id=$row['car_id'];
                    $sql1 = "SELECT * FROM `car` WHERE car_id='$car_id'";
$result = mysqli_query($conn, $sql1);

$row2 = mysqli_fetch_array($result);
$renter_id=$row2['renter_id'];
                            $sql4 = "SELECT * FROM `renter` WHERE renter_id='$renter_id'";
                            $result4 = mysqli_query($conn, $sql4);
                            
                            $row4 = mysqli_fetch_array($result4);
                            
                            
		?>
                                <tr>
                                   
                                    <td><b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"><?php echo "<br>",strtoupper($row2['company']),"<br>",strtoupper($row2['name']); ?></b>
                                <br>
                                <?php
$bid=$row['book_id'];
$sqlo = "SELECT * FROM `tbl_feedback` WHERE book_id='$bid'";
$resulto = mysqli_query($conn, $sqlo);


if($resulto->num_rows ==0 && $row['stat']==4){
  ?>
<div id="feedback-form-wrapper">
  <div id="floating-icon">
    <button type="button" class="btn btn-primary btn-sm rounded-0" onclick="go('<?php echo $row['car_id']; ?>','<?php echo $row['cus_id']; ?>','<?php echo $row['book_id']; ?>')">
      Feedback
    </button>

  </div>
  <?php
}
?>
</td>
									<td><b><?php echo strtoupper($row4['fname'])," ",strtoupper($row4['lname']);  ?><br>
                                    
                                    <?php echo $row4['addresss'],"(h)<br>",$row4['place'],"<br>Phone: ",$row4['phone']; ?></b></td>
                                    <td><b><button type="button" value="" onclick="getId(<?php echo $row['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
                                    <td><b><?php echo "From: ",$row['book_date'],"<br>To: ",$row['drop_date']; ?></b></td>
                                   
                    <td>
                        <?php
                        if($row['start_km']>0){
                    echo "Starting KM: ".$row['start_km']."Km <br>";
                        }
                        if($row['end_km']>0){
                        echo "Ending KM: ".$row['end_km']."Km <br>";
                        echo "Total KM travelled : ".$row['end_km']-$row['start_km']."Km";
                        }
                        if($row['amount']>0){   
                        ?>
                    <input type="button" class="btn btn-primary" name="Pay" id ="rzp-button1" value="pay now" onclick="pay_now()">
                           <input type="hidden" value="<?php echo  $row['amount']+$row['damount'];?>" id="amt" name="amt">    
                           <input type="hidden" value="<?php echo  $row['book_id'];?>" id="bid" name="bid">   
                           <input type="hidden" value="<?php echo  $row4['fname'];?>" id="dname" name="dname">
                               </td>
                            </tbody>
											<?php	
                        }
                        ?>
<td>
  <div id="feedback-form-modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="">
         
              <div class="form-group">
                <label for="input-two">Would you like to say something?</label>
                <textarea class="form-control" id="input-two" rows="3" name="feed"></textarea>
                <input type="hidden" id="ws" name="car_id" value="#">
            <input type="hidden" id="cs" name="cus_id" value="#">
            <input type="hidden" id="bs" name="book_id" value="#">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
                                  </td>
                            </tbody>
											<?php		}

						}}
		?>
                        </table>
                     
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>

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
    function go(ws,cs,bs){

$('.modal-body #ws').val(ws);
$('.modal-body #cs').val(cs);
$('.modal-body #bs').val(bs);

			$('#exampleModal').modal('show');
    }
    </script>

  <script>
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'paper='+cid,
        success:function(response){
			$(".modal-body #sd").html(response);
            
			$('#myModal').modal('show');
          
        },
		error:function (){}
      });
		}
		</script>

<script>
		

        function getid2(book1)
		{
            var book1 = book1;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'book1v='+book1,
        success:function(response){
            
          location.reload();
        },
		error:function (){}
      });
        }
        </script>

<script>
    function pay_now(){
// alert("k");
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
            url:'carpay.php',
            data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&bid="+bid,
            success:function(result){
                alert("payment success");
                window.location.reload;
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