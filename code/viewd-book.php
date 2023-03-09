<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];


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
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
					
					
				
						if($row['stat'] != 3){
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
                                    else{
                                        echo "<font color='blue'>Pending</font>";
                                    }?></b></td>
									<td>
                                   
                        <button id="bt2"  onclick="getid2(<?php echo $row['book_id']; ?>);">Delete</button>
                      </a>
                    </td>

                    <?php 
                    if($row['amount']>0){ ?>
                    <td>
                                   
                    <input type="button" class="btn" name="Pay" id ="rzp-button1" value="pay now" onclick="pay_now()">
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