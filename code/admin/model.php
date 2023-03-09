<?php
include '../session.php';
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

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
            <li class="active has-sub">
              <a class="js-arrow" href="customers.php">
                <i class="fas fa-users"></i>Customers</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="rent.php">
                <i class="fas fa-users"></i>RENTER</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="car.php">
                <i class="fas fa-users"></i>CARS</a>
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
                  <h2 class="title-1">Car Modals</h2>
                </div>
              </div>
            </div>
            <form action="" method="post" name="modelform" class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validatemodel()">
				
				<div  class="col-md-8 col-sm-3"  style="width: 60%;">
					
					
				
                
                        <input type="text" class="form-control" placeholder="Model" name="model" id="m" onkeyup="return validate()"  required pattern="[A-Za-z_]+" title ="only alphabets"required><br>
						<span class="message text-danger" id="ms"></span><br>
						<input type="submit" class="form-control" value="submit" name="submit" id="submit">
				</div>
			</form>
            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Model</th>
                                               
                                            </tr>
                                        </thead>
                                        <?php
                                            $cust = "SELECT * FROM `model`";
                                            $cust_run = mysqli_query($conn,$cust);
                                            $i = 1;
                                            while($row=mysqli_fetch_array($cust_run)){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                               
                                                <td><?php echo $row['model']; ?></td>
                                        
                                            </tr>
                                        </tbody>
                     <?php    
                     $i++;                       
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
  if(isset($_POST['submit'])){
    $model= $_POST["model"];
       $sql2 = "INSERT INTO `model`( `model`) VALUES ('$model')";
       
       if($conn->query($sql2) === TRUE){
           ?>
           <script>
               if(window.confirm('model added'))
               {
                   window.location.href='model.php';
               };</script>
           <?php
       }
       else{
           ?>
           <script>
               if(window.confirm('Oops!!!!!    failed '))
               {
                   window.location.href='model.php';
               };</script>
           <?php
       } 
       } 
  
  ?>
  <script type="text/javascript">
                function validate()
				
                {
					var l=document.getElementById("m").value;
					
					var s=/^[a-zA-Z]+$/;
					if(l!="" && s.test(l)==false){
						
						document.getElementById('ms').style.display = "block";
						document.getElementById('ms').innerHTML = "Invalid Model Name . It must be alphabet";
						return false;
					}

				
					else{
						jQuery.ajax({
					url: "ajaxad.php",
					type: "POST",
					
					data:'model='+$("#m").val(),
					success:function(response){
					
						$("#ms").html(response);
					},
					error:function (){}
					}); 
					
				}
				}
				</script>
s
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
<!-- end document-->