<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];
$f=0;
$u=$_SESSION['username'];
// if(isset($_POST['submit'])){
    
// }
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
        
        data:'paper='+cid,
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
						<a href="my-cars.php" class="nav-item nav-link active">My Cars</a>
            <a href="my-driver.php" class="nav-item nav-link">My Drivers</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Bookings</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="book-accept.php" class="dropdown-item">Requests</a>
                                <a href="upcoming.php" class="dropdown-item">Upcoming</a>
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
		<center><h1 class="heading color-black"> Car details</h1></center>
       <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="carmodal">
        <i class="fa fa-plus"></i>&nbsp; Add Car
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Car details please</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
        <form  action="add-car.php" method="post" enctype="multipart/form-data">
        <div  class="col-md-8 col-sm-3"  style="width: 60%;">
					
                    <input type="text" class="form-control" placeholder="Company Name" name="company" id="company" onkeyup="return validate()"  required><br>
                    <span id="cms" style='color:red;'></span>
                    <input type="text" class="form-control" placeholder="Car Name" name="cname" id="cname"required><br>
                    <span id="cms1" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Reg Number" name="reg" id="reg" onkeyup="return validate()" required><br>
                    <span id="regval" style='color:red;'></span>
                    <lablel>Choose image...</label>
                    <input type="file" class="form-control" placeholder="Image" name="cimage" accept="image/png, image/gif, image/jpeg"  id="cimage" onchange="return validateimage()" required><br>
                     <span id="im1" style='color:red;'></span>
                     <!-- <img src="images/noimg.jpg" id="img"> -->
                     <lablel>Choose Car papers in pdf(polution,book,insurance)...</label>
                     <input type="file" class="form-control" placeholder="Car papers in pdf(polution,book,insurance)" name="papers"  id="papers" onchange="return validateimage()" required><br>
                     <span id="im2" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Mileage per Liter" name="mileage" id="mil" onkeyup="return validate()" required><br>
                    <span id="msg2" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Price" name="price" id="price" onkeyup="return validate()" required><br>
                    <span id="msg3" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Above mentioned price is for how many KM" name="km" id="km" onkeyup="return validate()" required><br>
                    <span id="msg-km" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Excess Price for each KM" name="excess" id="excess" onkeyup="return validate()" required><br>
                    <span id="msg-ex" style='color:red;'></span>
                    <input type="int" class="form-control" placeholder="Year of Purchase" name="year" id="year" onkeyup="return validate()" required><br>
                    <span id="msg4" style='color:red;'></span>
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
</select> <br>       
                    <input type="submit" class="form-control" value="submit" name="submit" id="submit">
            </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        <table class="table" >
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Car</th>

									<th scope="col">Reg-Number</th>
                                    
                                    
                                    <th scope="col">Company & Model</th>
                                    <th scope="col">Papers</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


$sql = "SELECT * FROM `renter` WHERE log_id='$log_id'";
$sql_result = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_array($sql_result);
$renter_id=$row1['renter_id'];

$sql1 = "SELECT * FROM `car` WHERE renter_id='$renter_id'";
$sql_result1 = mysqli_query($conn, $sql1);
if ($sql_result1->num_rows > 0) {
while ($row2 = $sql_result1->fetch_assoc()) {

					if($f==0){

                    
					
				
				if($row2['c_stat']!=3){
                            
                            
		?>
                                <tr>
                                   
                                    <td><b><img src="images/<?php echo $row2['image']; ?>" style="width: 200px; height: 200px;"></b></td>
									<td><b><?php echo strtoupper($row2['reg_no']);  ?></b>
                  <form action="viewfeed.php" method="post">
                                                  <input type="hidden" value="<?php echo $row2['car_id']; ?>" name="carid">
                                                  <button name="feedview" type="submit">view feedback</button>
                            </form></td>
                                    <td><b><?php echo strtoupper($row2['company']),"<br>",strtoupper($row2['name']); ?></b></td>
                                   
                                    <td><b><button type="button" value="" onclick="getId(<?php echo $row2['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
                                    <td><b> <?php echo "First ",$row2['km'],"KM: Rs ",$row2['price'],"<br>Excess for each km: Rs ",$row2['excess']; ?></b></td>
                                    <td><b><?php if($row2['c_stat']==0){
                                        echo "<font color='red'>Rejected</font>";
                                    } 
                                    else if($row2['c_stat']==1){
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
if($row2['c_stat']==1){

                      ?>  
                  
                        <!-- <button id="bt2" value="" onclick="getid2(<?php echo $row2['car_id']; ?>);" data-toggle="modal" class="btn btn-primary">Edit</button> -->

                 
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

                        if($f==1){

                    
					
				
                            if($row2['c_stat']!=3 && $row2['c_stat']==0){
                                        
                                        
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
                                                <td><b><?php if($row2['c_stat']==0){
                                                    echo "<font color='red'>Rejected</font>";
                                                } 
                                                else if($row2['c_stat']==1){
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
            if($row2['c_stat']==1){
            
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

                    
					
				
                                        if($row2['c_stat']!=3 && $row2['c_stat']==1){
                                                    
                                                    
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
                                                            <td><b><?php if($row2['c_stat']==0){
                                                                echo "<font color='red'>Rejected</font>";
                                                            } 
                                                            else if($row2['c_stat']==1){
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
                        if($row2['c_stat']==1){
                        
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
					var cn=document.getElementById("company").value;
					var can=document.getElementById("cname").value;
					var sn=/^[a-zA-Z]+$/;
					if(cn!="" && sn.test(cn)==false){
						
						document.getElementById('cms').style.display = "block";
						document.getElementById('cms').innerHTML = "Invalid Company name . It must be alphabet";
						return false;
					}
					else{
						document.getElementById('cms').style.display = "none";
					}
					// if(can!="" && sn.test(can)==false){
						
					// 	document.getElementById('cms1').style.display = "block";
					// 	document.getElementById('cms1').innerHTML = "Invalid Lname. It must be alphabet";
					// 	return false;
					// }
					// else{

					// 	document.getElementById('cms1').style.display = "none";
					// }


					var f=document.getElementById("reg").value;
					
					var s=/^[A-Z]{2}\s?[0-9]{1,2}\s?[A-Z]{0,3}\s?[0-9]{4}$/;
					if(f!="" && s.test(f)==false){
						
						document.getElementById('regval').style.display = "block";
						document.getElementById('regval').innerHTML = "Invalid Register number";
						return false;
					}
					else{
						jQuery.ajax({
					url: "ajax.php",
					type: "POST",
					
					data:'reg='+$("#reg").val(),
					success:function(response){
						
						$("#regval").html(response);
					},
					error:function (){}
					}); 
					}
					var ph = document.getElementById("mil").value;
					var expr = /^[0-9]{1,2}$/;
					if(ph!="" && expr.test(ph)==false){
						document.getElementById('msg2').style.display = "block";
						document.getElementById('msg2').innerHTML = "Invalid mileage";
						return false;
								}
								else{
						document.getElementById('msg2').style.display = "none";
					}
					var pr = document.getElementById("price").value;
					var exp = /^[0-9]{3,4}$/;
					if(pr!="" && exp.test(pr)==false){
						document.getElementById('msg3').style.display = "block";
						document.getElementById('msg3').innerHTML = "Invalid Price";
						return false;
								}
								else{
						document.getElementById('msg3').style.display = "none";
					}
					var km = document.getElementById("km").value;
					var expk = /^[0-9]{3}$/;
					if(km!="" && expk.test(km)==false){
						document.getElementById('msg-km').style.display = "block";
						document.getElementById('msg-km').innerHTML = "Invalid KM";
						return false;
								}
								else{
						document.getElementById('msg-km').style.display = "none";
					}
					var excess = document.getElementById("excess").value;
					var expex = /^[0-9]{1,2}$/;
					if(excess!="" && expex.test(excess)==false){
						document.getElementById('msg-ex').style.display = "block";
						document.getElementById('msg-ex').innerHTML = "Invalid Excess Price";
						return false;
								}
								else{
						document.getElementById('msg-ex').style.display = "none";
					}
					var y = document.getElementById("year").value;
					var yr = /^[0-9]+$/;
					var current_year=new Date().getFullYear();
					if(y!="" && yr.test(y)==false){
						
						document.getElementById('msg4').style.display = "block";
						document.getElementById('msg4').innerHTML = "Invalid year";
						return false;
								}
								else{ 
									if(y!="" && ((y < 1990) || (y > current_year)))
									{
									document.getElementById('msg4').style.display = "block";
						document.getElementById('msg4').innerHTML = "Invalid year";
						return false;
					}
					else{
						document.getElementById('msg4').style.display = "none";
					}
					
				}
				
					
				}

					
				function validateimage()
                {
					
					var fd = new FormData();
        var files = $('#cimage')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'ajax.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                // if(response != 0){
                //     $("#img").attr("src",response); 
                //     $("#img").show(); // Display image element
				// }
				// else{
					$("#im1").html(response);
				//}
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