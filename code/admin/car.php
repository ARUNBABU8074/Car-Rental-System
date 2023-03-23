<?php
include '../session.php';
include '../config.php';
$sql = "SELECT * FROM `login`";
$result = $conn->query($sql);


$sql2 = "SELECT * FROM `renter`";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM car";
$result3 = $conn->query($sql3);
?>
<!DOCTYPE html>
<html lang="en">
<script>
		function getId(cid)
		{
            var cid=cid;
          
			jQuery.ajax({
		    url: "ajaxad.php",
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
<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Customers</title>
  <link rel="icon" type="image/png" href="../admin/images/icon/logo.png" />

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">


  
</head>


<body class="animsition">
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
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="index.html">
              <img src="images/icon/logo.png" alt="FUELMAN" />
            </a>
            <button class="hamburger hamburger--slider" type="button">  
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-user-alt"></i>Customers</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="rent.php">
                <i class="fas fa-users"></i>RENTERS</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="driverAD.php">
                <i class="fas fa-users"></i>Driver</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <!-- <a href="#">
          <img src="images/icon/logo.png" alt="Cool Admin" />
        </a> -->
        <img src="../images/logo.png" alt="" width="100px" height="100px">&ensp;
        <h1>
        RENTAL
        </h1>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="has-sub">
              <a class="js-arrow" href="ad.php">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="customer.php">
                <i class="fas fa-users"></i>Customers</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="rent.php">
                <i class="fas fa-users"></i>renter</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="driverAD.php">
                <i class="fas fa-users"></i>Driver</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="model.php">
                <i class="fas fa-users"></i>Model</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="checker.php">
                <i class="fas fa-users"></i>checker</a>
            </li>
            <li class="active has-sub">
              <a class="js-arrow" href="#">
                <i class="bi bi-car-front-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></i>Cars</a>
              <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                  <a href="assign.php">Assign Car</a>
                </li>
                <li>
                  <a href="review.php">Review of Car</a>
                </li>
                <li>
                  <a href="car.php">Approved Cars</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="content" style="margin-left: 1050px;">
                      <a class="js-acc-btn" href="#">ADMIN</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="account-dropdown__footer">
                        <a href="../logout.php">
                          <i class="zmdi zmdi-power"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->
      
      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">Renters</h2>
                </div>
              </div>
            </div>
            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                       
                                            <thead>
                                <tr>
                                    
                                    <!-- <th scope="col">NO.</th> -->
									<th scope="col">RENTER Name</th>
                                    <th scope="col">COMPANY & CAR</th>
                                     
                                    <th scope="col">REGISTER N0</th>
                                   
                                    <th scope="col">Papers</th>
                                    <th scope="col">MILEAGE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
                                $s=1;
                                $result4 = $conn->query($sql3);
			if ($result4->num_rows > 0) {

               
				while ($row1 = $result4->fetch_assoc()){
                    
                    
		?>
                                <tr>
                                <!-- <td><b><?php echo $s ?></b></td> -->

                                <td><b><?php
							$rid=$row1['renter_id'];
							$name = "SELECT * FROM renter WHERE renter_id= $rid";
							$result35 = $conn->query($name);
							$row35 = $result35->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row35['fname'])." ".strtoupper($row35['lname']); ?></b></td>
                                    
                                    <td><b><?php echo strtoupper($row1['company'])."<br>".strtoupper($row1['name'])."<br>Year: ".$row1['year'];?></b></td>
                                    
                                    <td><b><?php echo strtoupper($row1['reg_no']); ?></b>
									
                                    <b><?php
							$mid=$row1['model'];
							$m = "SELECT * FROM model WHERE model_id= $mid";
							$result34 = $conn->query($m);
							$row34 = $result34->fetch_assoc();
							// echo toupper.$row34['model'];
							echo strtoupper($row34['model']); ?></b></td>
              
                            <td><b><button type="button" value="" onclick="getId(<?php echo $row1['car_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
   	
                                    <td><b><?php echo $row1['mileage']; ?></b></td>
                                    <td><b><?php echo "First ".$row1['km']."km : ".$row1['price']."₹<br> Excess for each km : ".$row1['excess']."₹"; ?></b></td>
                                    <td><b><img src="../images/<?php echo $row1['image']; ?>" style="width: 200px; height: 200px;" class="img-responsive" alt=""></b></td>
									<td>
                                    <?php
                                                  if($row1['c_stat']==1){?>
                                                  <form action="" method="post">
                                                    <input type="hidden" id="cus" name="cus" value="<?php echo $row1['car_id'];?>">
                                                    <button class="btn btn-outline-danger btn-sm" name="block">Block</button><br><br>
                                                  </form>
                                                    <?php
                                                  }
                                                  else if($row1['c_stat']==0){?>
                                                    <form action="" method="post">
                                                    <input type="hidden" id="cus2" name="cus2" value="<?php echo $row1['car_id']; ?>">
                                                    <button class="btn btn-outline-success btn-sm" name="unblock">Unblock</button><br><br>
                                                  </form>
                                                    <?php }
                                                    // else{?>
                                                     <!-- //     <form action="" method="post">
                                                    //     <input type="hidden" id="rnt" name="rnt" value="<?php echo $row1['car_id']; ?>">
                                                    //     <button class="btn btn-outline-success btn-sm" name="acpt">Accept</button><br><br>
                                                    //     <button class="btn btn-outline-danger btn-sm" name="rjt">Reject</button>
                                                    //     <br><br>
                                                    //   </form>
                                                    //       --> <?php
                                                    // }
                                                    ?>
                    </td>

                            </tbody>
                     <?php    
                    //  $s++;                       
    }
}
    ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                               
                            </div>
                        </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>

  </div>

  <?php
  if(isset($_POST['block'])){
    $id = $_POST['cus'];
   
    $block = "UPDATE `car` SET `c_stat`='0' WHERE `car_id` = '$id'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Car blocked");</script>';
	  echo'<script>window.location.href="car.php";</script>';
  }
  if(isset($_POST['unblock'])){
    $id = $_POST['cus2'];
    $block = "UPDATE `car` SET `c_stat`='1' WHERE `car_id` = '$id'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Car Unblocked");</script>';
	  echo'<script>window.location.href="car.php";</script>';
  }
  if(isset($_POST['acpt'])){
    $id = $_POST['rnt'];
   
    $block = "UPDATE `car` SET `c_stat`='1' WHERE `car_id` = '$id'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Car Accepted");</script>';
	  echo'<script>window.location.href="car.php";</script>';
  }
  if(isset($_POST['rjt'])){
    $id = $_POST['rnt'];
    $block = "UPDATE `car` SET `c_stat`='0' WHERE `car_id` = '$id'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Car Rejected");</script>';
	  echo'<script>window.location.href="car.php";</script>';
  }
  ?>
  
  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>

</html>
