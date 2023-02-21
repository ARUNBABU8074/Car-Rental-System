<?php  

include "config.php";
include 'session.php';


$log_id= $_SESSION['log_id'];
$f=0;
// if(isset($_POST['submit'])){
    
// }
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

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- <form action="" method="post">
<input type="checkbox" id="f" name="id1" value="1">
<label for="id1">Rejected</label>
<input type="checkbox" id="f" name="id2" value="2">
<label for="id2">Available</label>
<input type="checkbox" id="f" name="id3" value="3">
<label for="id3">Pending</label>
<input type="submit" id="submit" value="search">
</form> -->
<!-- <script>
    
 
        </script> -->


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
                <li><a href="#renter" class="smoothScroll"></a></li>
				<li><a href="update-rent.php" class="smoothScroll">profile</a></li>
				<!-- <li><a href="#message" class="smoothScroll"></a><?php echo $_SESSION['username'] ?></li> -->
				<li><a href="my-cars.php" class="smoothScroll">My Cars</a></li>
				
				<li><a href="book-accept.php" class="smoothScroll">My Bookings</a></li>
				<li><a href="logout.php" class="smoothScroll">LOGOUT</a></li>
        &nbsp; 
        <li><a href="" class="smoothScroll">   &ensp;    &ensp;    &ensp; <?php echo $_SESSION['username'] ?></a></li>
       
			</ul>
      
      <div>
		</div>

	</div>
</section>

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
            <li>
                <img src="images/slider/2.jpg" alt="slider image 2">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2></h2>
                        <p class="color-white"></p>
                    </div>
                </div>
            </li>

    </div> 
</div>

<!-- Preloader section
================================================== -->


<section id="remove" class="parallax-section">
	<div class="container">
		<div class="row">
		<center><h1 class="heading color-black"> Car details</h1></center>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
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
									<td><b><?php echo strtoupper($row2['reg_no']);  ?></b></td>
                                    
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
                                                <td><b><?php echo strtoupper($row2['reg_no']);  ?></b></td>
                                                
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
                                                            <td><b><?php echo strtoupper($row2['reg_no']);  ?></b></td>
                                                            
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
					if(can!="" && sn.test(can)==false){
						
						document.getElementById('cms1').style.display = "block";
						document.getElementById('cms1').innerHTML = "Invalid Lname. It must be alphabet";
						return false;
					}
					else{

						document.getElementById('cms1').style.display = "none";
					}


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