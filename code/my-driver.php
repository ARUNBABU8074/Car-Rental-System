<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];
$f=0;
$u=$_SESSION['username'];
// if(isset($_POST['submit'])){
    
// }
$sql = "SELECT * FROM `renter` WHERE log_id='$log_id'";
$sql_result = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_array($sql_result);
$renter_id=$row1['renter_id'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#pincode').on('input', function(){
				var pincode = $(this).val();
        
				$.ajax({
					url: 'get.php',
					method: 'POST',
					dataType: 'json',
					data: {pincode: pincode},
					success: function(data){
						$('#post-office').empty();
            $.each(data, function(index, value){
    if(index !== 'dis') {
        $('#post-office').append($('<option>', {
            value: value,
            text: value
        }));
    } else {
        $('#district').val(value);
    }
});
					}
				});
			});
		});
	</script>
 
  </head>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CAR DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal"></button>
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
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'li='+cid,
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
                        <a href="renter-home.php" class="nav-item nav-link">Home</a>
						<a href="my-cars.php" class="nav-item nav-link ">My Cars</a>
                        <a href="my-driver.php" class="nav-item nav-link active">My Drivers</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="book-accept.php" class="dropdown-item">Requests</a>
                                <a href="#" class="dropdown-item">Upcoming</a>
                                <!-- <a href="" class="dropdown-item">Paid</a> -->
                                
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Payments</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="received.php" class="dropdown-item">Received</a>
                                <a href="paid.php" class="dropdown-item">Pending Driver Payment</a>
                                <a href="paiddone.php" class="dropdown-item"> Driver Paid</a>

                                
                            </div>
                        </div>
                      
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo strtoupper($u); ?> </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="update-rent.php" class="dropdown-item">My profile</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        
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

<!-- Preloader section
================================================== -->


<section id="remove" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> Driver details</h1></center>
       <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
        &nbsp; +Add Car
</button> -->

<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal12">
        &nbsp; +Add Driver
</button>

<div class="modal" id="myModal12">
	<div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Terms And Conditions</h4>    
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
<b>*</b>Age requirement: The driver must be at least 21 years old and have a valid driver's license.<br>

<b>*</b>Driving history: The driver must have a clean driving record with no recent accidents or violations.<br>

<b>*</b>Additional driver fee: A fee will be charged for adding an additional driver to the rental agreement.It will be 50₹ per driver.<br>

<b>*</b>Authorized use: The driver is only authorized to use the rental vehicle for the purposes specified in the rental agreement.<br>

<b>*</b>Prohibited use: The driver is not allowed to use the rental vehicle for illegal purposes or in a manner that violates any laws or regulations.<br>

<b>*</b>Both the renter and the driver share equal responsibility for any issues that may arise from the customer during the rental period.<br>
 
<b>*</b>The person who is driving a rental vehicle is responsible for any accidents or violations that occur while they are driving the vehicle.
 However, in some cases, the rental company may also share some responsibility if they were negligent in renting the vehicle to an unsuitable driver or if they failed to properly maintain the vehicle.<br>

<b>*</b>The payment system for the drivers is fixed at Rs. 800 per day for up to 150 km, and for every kilometer beyond 150 km, an additional Rs. 5 is provided.<br>

<b>*</b>Violation of terms and conditions: Violation of any of the terms and conditions may result in additional fees or termination of the rental agreement.<br>

<input type="checkbox" id="myCheckbox">
<label for="myCheckbox">I agree to the terms and conditions.</label>
        </div>
        <div class="modal-footer">
        <button type="button" id="myButton" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter" disabled>
        &nbsp; +Add Driver
</button>
<script>
    const checkbox = document.querySelector('#myCheckbox');
    const button = document.querySelector('#myButton');

    function checkCheckbox() {
      if (checkbox.checked) {
        button.disabled = false;
      } else {
        button.disabled = true;
      }
    }

    checkbox.addEventListener('click', checkCheckbox);
  </script>
          <a href="#" data-dismiss="modal" class="btn btn-outline-danger">Close</a>
        </div>
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details please</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
        <form  action="regdriv.php" method="post" enctype="multipart/form-data">
        <div  class="col-md-8 col-sm-3"  style="width: 60%;">
					
        <input type="text" class="form-control" placeholder="First Name" name="dfname"  id="dfname" onKeyUp="return validate()" required pattern="[A-Za-z_]+">
			  <span class="message text-danger" id="dms" style="font-size: 16px"></span><br>
			<input type="text" class="form-control" placeholder="Last Name" name="dlname"  id="dlname"  onKeyUp="return validate()"  required pattern="[A-Za-z_]+">
			<span class="message text-danger" id="dms1"  ></span><br>
			<input type="email" class="form-control" placeholder="Email" name="demail" id="dem" onblur="return validate()" onKeyUp="return validate()" required>
			<span class="message text-danger" id="dmessage"></span><br>
			<input type="int" class="form-control" placeholder="Phone number" name="dphone" id="dphn"  onblur="return validate()" onKeyUp="return validate()" required minlength="10" maxlength="10" required>
			<span class="message text-danger" id="dmsg2"></span><br>
			<input type="text area" class="form-control" placeholder="Address" name="daddresss" required><br> 
      <input type="text" class="form-control" placeholder="Pincode" name="pincode" id="pincode"   required><br>
			<!-- <input type="text" class="form-control" placeholder="place" name="dplace" id="place" required><br>  -->
      <select id="post-office" name="post-office" class="form-control">
		<option value="">Select Post Office</option>
	</select>
      <br><input type="text" class="form-control" placeholder="district" name="district" id="district" required><br>
			<span style="color:blue">upload licence...</span>
            <input type="file" class="form-control" placeholder="License" name="dvimage"   id="dlimage" onchange="return dvalidateimage()" required><br>
                     <span id="dim1" style='color:red;'></span>
			<input type="text" class="form-control checking_uname" placeholder="User name" name="dusername" id="dun" onInput="dcheckuser()" required>
			<span class="derror_uname"></span><br>
			<input type="password" class="form-control" placeholder="password" name="dpasswd" required><br> 
            <!-- <span style="color:blue">upload your image...</span>
            <input type="file" class="form-control" placeholder="Image" name="dimg"   id="dlim" onchange="return dvalidateimage2()" required><br>
                     <span id="dim2" style='color:red;'></span> -->
                     <input type="hidden" name="rnid" value="<?php echo $renter_id ;?>">
			<br>       
                    
            </div>

      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-outline-primary" value="submit" name="submit" id="submit">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="color:blue">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
        <table class="table" >
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Driver</th>

									<th scope="col">Contact</th>
                                    
                                    
                                    <th scope="col">Address</Address></th>
                                    <th scope="col">License</th>
                                    <!-- <th scope="col">Price</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php




$sql1 = "SELECT * FROM `driver` WHERE renter_id='$renter_id'";
$sql_result1 = mysqli_query($conn, $sql1);
if ($sql_result1->num_rows > 0) {
while ($row2 = $sql_result1->fetch_assoc()) {

					if($f==0){
            $logid=$row2['log_id'];
            $g_user = "SELECT * FROM `login` WHERE `log_id` = '$logid'";
            $g_user_result = mysqli_query($conn,$g_user);
            $userg = mysqli_fetch_array($g_user_result);
                    
					
				
				if($userg['statuss']!=3){
                            
                            
		?>
                                <tr>
                                   
                                    <td>
                                      <!-- <b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"></b> -->
                                   <b> <?php echo strtoupper($row2['fname']),"<br>",strtoupper($row2['lname']); ?></td><b>
									<td><b><?php echo "Email: ",$row2['email'],"<br>Phone: ",$row2['phone'];  ?></b>
                  
                                    <td><b> <?php echo $row2['addresss'],"(h) <br>",$row2['place'],"<br>",$row2['district'],"<br> Pincode: ",$row2['pincode']; ?></b></td>
                                   
                                    <td><b><button type="button" value="" onclick="getId(<?php echo $row2['driver_id'];?>)" name="v" id="v" class="btn btn-outline-success" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>
  </button></b></td>
                                    <!-- <td></td> -->
                                    <td><b><?php 
                                   
                                    
                                    if($userg['statuss']==0){
                                        echo "<font color='red'>Rejected</font>";
                                    } 
                                    else if($userg['statuss']==1){
                                        echo "<font color='green'>Accepted</font>";
                                    }
                                    else{
                                        echo "<font color='blue'>Pending</font>";
                                    }?></b></td>
                                    <td><b><?php if($row2['availability']==0){
                                        echo "<font color='red'>Not available</font>";
                                    } 
                                    if($row2['availability']==1){
                                        echo "<font color='green'>Available</font>";
                                    }
                                    ?></b></td>
									<td><button id="bt1"  onclick="getid(<?php echo $row2['driver_id']; ?>);" class="btn btn-outline-danger">Delete</button> 
                                    <?php
if($userg['statuss']==1){

                      ?>  
                  
                        <!-- <button id="bt2" value="" onclick="getid2(<?php echo $row2['car_id']; ?>);" data-toggle="modal" class="btn btn-primary">Edit</button> -->

                 
                      <!-- <?php
if($row2['availability']==1){

                      ?>
                      <br><br>
                      <button id="bt2"  onclick="getid3(<?php echo $row2['driver_id']; ?>);">set-not available</button>
    
                      <?php
}
else{?>
<br><br>
    <button id="bt2"  onclick="getid4(<?php echo $row2['driver_id']; ?>);">available</button>
<?php
}}
                ?> -->
                    </td>

                            </tbody>
											<?php		}

						}

                        if($f==1){

                    
					
				
                            if($userg['statuss']!=3 && $userg['statuss']==0){
                                        
                                        
                    ?>
                                            <tr>
                                               
                                                <td><b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"></b></td>
                                                <td><b><?php echo strtoupper($row2['reg_no']);  ?></b><br>
                                                <form action="viewfeed.php" method="post">
                                                  <input type="hidden" value="<?php echo $row2['car_id']; ?>" name="carid">
                                                  <button name="feedview" type="submit">view feedback</button>
                            </form>
                                                </td>
                                                
                                                <td><b><?php echo strtoupper($row2['company']),"<br>",strtoupper($row2['name']); ?></b></td>
                                                <td><b><?php echo "First: "?></b></td>
                                                <td><b> <?php echo "First ",$row2['km'],"KM: Rs ",$row2['price'],"<br>Excess for each km: Rs ",$row2['excess']; ?></b></td>
                                                <td><b><?php if($userg['statuss']==0){
                                                    echo "<font color='red'>Rejected</font>";
                                                } 
                                                else if($userg['statuss']==1){
                                                    echo "<font color='green'>Accepted</font>";
                                                }
                                                else{
                                                    echo "<font color='blue'>Pending</font>";
                                                }?></b></td>
                                                <td><b><?php if($row2['availability']==0){
                                                    echo "<font color='red'>Not available</font>";
                                                } 
                                                if($row2['availability']==1){
                                                    echo "<font color='green'>Available</font>";
                                                }
                                                ?></b></td>
                                                <td><button id="bt1"  onclick="getid(<?php echo $row2['car_id']; ?>);">Delete</button> 
                                                <?php
            if($userg['statuss']==1){
            
                                  ?>  
                                                
                                    <button id="bt2"  onclick="getid2(<?php echo $row2['car_id']; ?>);">Edit</button>
                                  <?php
            if($row2['availability']==1){
            
                                  ?>
                                  <br><br>
                                  <button id="bt2"  onclick="getid3(<?php echo $row2['car_id']; ?>);">set-not available</button>
                                  <?php
            }
            else{?>
            <br><br>
                <button id="bt2"  onclick="getid4(<?php echo $row2['car_id']; ?>);">available</button>
            <?php
            }}
                            ?>
                                </td>
            
                                        </tbody>
                                                        <?php		}
            
                                    }

                                    if($f==2){

                    
					
				
                                        if($userg['statuss']!=3 && $userg['statuss']==1){
                                                    
                                                    
                                ?>
                                                        <tr>
                                                           
                                                            <td><b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"></b></td>
                                                            <td><b><?php echo strtoupper($row2['reg_no']);  ?></b>
                                                            <form action="viewfeed.php" method="post">
                                                  <input type="hidden" value="<?php echo $row2['car_id']; ?>" name="carid">
                                                  <button name="feedview" type="submit">view feedback</button>
                            </form>
                                       
                                                            </td>
                                                            
                                                            <td><b><?php echo strtoupper($row2['company']),"<br>",strtoupper($row2['name']); ?></b></td>
                                                            <td><b><?php echo "First: "?></b></td>
                                                            <td><b> <?php echo "First ",$row2['km'],"KM: Rs ",$row2['price'],"<br>Excess for each km: Rs ",$row2['excess']; ?></b></td>
                                                            <td><b><?php if($userg['statuss']==0){
                                                                echo "<font color='red'>Rejected</font>";
                                                            } 
                                                            else if($userg['statuss']==1){
                                                                echo "<font color='green'>Accepted</font>";
                                                            }
                                                            else{
                                                                echo "<font color='blue'>Pending</font>";
                                                            }?></b></td>
                                                            <td><b><?php if($row2['availability']==0){
                                                                echo "<font color='red'>Not available</font>";
                                                            } 
                                                            if($row2['availability']==1){
                                                                echo "<font color='green'>Available</font>";
                                                            }
                                                            ?></b></td>
                                                            <td><button id="bt1"  onclick="getid(<?php echo $row2['car_id']; ?>);">Delete</button> 
                                                            <?php
                        if($userg['statuss']==1){
                        
                                              ?>  
                                                            
                                                <button id="bt2"  onclick="getid2(<?php echo $row2['car_id']; ?>);">Edit</button>
                                              <?php
                        if($row2['availability']==1){
                        
                                              ?>
                                              <br><br>
                                              <button id="bt2"  onclick="getid3(<?php echo $row2['car_id']; ?>);">set-not available</button>
                                              <?php
                        }
                        else{?>
                        <br><br>
                            <button id="bt2"  onclick="getid4(<?php echo $row2['car_id']; ?>);">available</button>
                        <?php
                        }}
                                        ?>
                                            </td>
                        
                                                    </tbody>
                                                                    <?php		}
                        
                                                }
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
				
				<span id="sd"></span>
             
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


		function getid(carid)
		{
            var carid = carid;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'car-id='+carid,
        success:function(response){
            
          location.reload();
        },
		error:function (){}
      });
        }

        function getid2(car123)
		{
            var car123 = car123;
            aler("hi");
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'car123='+car123,
        success:function(response){
            $(".modal-content #sd").html(response);
            
			$('.bd-example-modal-lg').modal('show');
          location.reload();
        },
		error:function (){}
      });
        }

        function getid3(car3)
		{
            var car3 = car3;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'car3='+car3,
        success:function(response){
            
          location.reload();
        },
		error:function (){}
      });
        }
        function getid4(car4)
		{
            var car4 = car4;
            
            jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'car4='+car4,
        success:function(response){
            
          location.reload();
        },
		error:function (){}
      });
        }
        </script>
        <script type="text/javascript">
                
        function validate()
                {

                    var df=document.getElementById("dfname").value;
                    var dl=document.getElementById("dlname").value;
                    var dph = document.getElementById("dphn").value;
                    var da=document.getElementById("dem").value;
					var s=/^[a-zA-Z]+$/;
					// if(df=="" || dl=="" || da=="" || dph==""){
          //   document.getElementById('submit').disabled=true; 
          // }
          // else{
          //   document.getElementById('submit').disabled=false;
          // }
                    if(df!="" && s.test(df)==false){
						
						document.getElementById('dms').style.display = "block";
						document.getElementById('dms').innerHTML = "Invalid First Name . It must be alphabet";
                        document.getElementById('submit').disabled=true;
						return false;
					}
					else{
						document.getElementById('dms').style.display = "none";
                        document.getElementById('submit').disabled=false;
					}
					
                    if(dl!="" && s.test(dl)==false){
						
						document.getElementById('dms1').style.display = "block";
						document.getElementById('dms1').innerHTML = "Invalid Lname. It must be alphabet";
                        document.getElementById('submit').disabled=true;
						return false;
					}
					else{

						document.getElementById('dms1').style.display = "none";
                        document.getElementById('submit').disabled=false;
					}
						
                    
					var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
					if(da!="" && st.test(da)==false){
						
						document.getElementById('dmessage').style.display = "block";
						document.getElementById('dmessage').innerHTML = "Invalid Email id";
                        document.getElementById('submit').disabled=true;
						return false;
					}
					else{
                        document.getElementById('submit').disabled=false;
						jQuery.ajax({
		url: "ajax.php",
        type: "POST",
        
        data:'em='+$("#dem").val(),
        success:function(response){
          
          $("#dmessage").html(response);
        },
		error:function (){}
      }); 
						
					}

				


                    
					var expr = /^[6-9]\d{9}$/;
					if(dph!="" && expr.test(dph)==false){
						document.getElementById('dmsg2').style.display = "block";
						document.getElementById('dmsg2').innerHTML = "Invalid Phone number";
                        document.getElementById('submit').disabled=true;
						return false;
								}
								else{
						document.getElementById('dmsg2').style.display = "none";
                        document.getElementById('submit').disabled=false;
					}

				
					
							}

function dcheckuser(){

	  
jQuery.ajax({
  url: "ajax.php",
  type: "POST",
  
  data:'uname='+$("#dun").val(),
  success:function(response){
    
    $(".derror_uname").html(response);
  },
  error:function (){}
}); 
}
					
function dvalidateimage()
                {
					
					var fdd = new FormData();
        var files = $('#dlimage')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fdd.append('file1',files[0]);

           $.ajax({
              url: 'ajax.php',
              type: 'post',
              data: fdd,
              contentType: false,
              processData: false,
              success: function(response){
               
					$("#dim1").html(response);
				//}
              },
           });
        }else{
           alert("Please select a file.");
        }

				}
                
                function dvalidateimage2()
                {
					
					var fdl = new FormData();
        var files= $('#dlim')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fdl.append('file',files[0]);

           $.ajax({
              url: 'ajax.php',
              type: 'post',
              data: fdl,
              contentType: false,
              processData: false,
              success: function(response){
               
					$("#dim2").html(response);
				
              },
           });
        }else{
           alert("Please select a file.");
        }

				}
	  
	  function sub(){
        var formData = new FormData(this);
      formData.append("", true);

      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#studentAddModal').modal('hide');
          $('#saveStudent')[0].reset();
          $('#myTable').load(location.href + " #myTable");
        }
      });
      }
				
					
		  </script>

<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
       
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