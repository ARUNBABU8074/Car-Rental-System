<?php
include '../session.php';
include '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$emailerror=false;
$usrerr=false;
$showAlert = false; 
$showError = false; 
$exists=false;

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
        
        data:'license='+cid,
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
            <li class="active has-sub">
              <a class="js-arrow" href="#">
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
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas bi-car-front-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
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
                                                <th>Sl.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                               <th>license</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $cust = "SELECT * FROM `driver` ORDER BY log_id DESC";
                                            $cust_run = mysqli_query($conn,$cust);
                                            $i = 1;
                                            while($row=mysqli_fetch_array($cust_run)){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['addresss']."<br>".$row['place']; ?></td>
                                                <td><b><button type="button" value="" onclick="getId(<?php echo $row['driver_id'];?>)" name="v" id="v" class="btn btn-primary" data-toggle="modal">
    VIEW
  </button></b></td>
                                                <td><?php
                                                $r=$row['log_id'];
                                                $s="SELECT statuss from login WHERE log_id='$r'"; 
                                                $s_run = mysqli_query($conn,$s);
                                                $row18=mysqli_fetch_array($s_run);
                                                if($row18['statuss']==0){
                                                  echo "blocked";
                                                } 
                                                else if($row18['statuss']==1){
                                                  echo "unblocked";
                                                }
                                                else{
                                                    echo "pending";
                                                }
                                                ?> 
                                          </td>
                                                <td>
                                                  <?php
                                                  if($row18['statuss']==1){?>
                                                  <form action="" method="post">
                                                    <input type="hidden" id="cus" name="cus" value="<?php echo $row['driver_id'];?>">
                                                    <button class="btn btn-outline-danger btn-sm" name="block">Block</button><br><br>
                                                  </form>
                                                    <?php
                                                  }
                                                  else if($row18['statuss']==0){?>
                                                    <form action="" method="post">
                                                    <input type="hidden" id="cus2" name="cus2" value="<?php echo $row['driver_id']; ?>">
                                                    <button class="btn btn-outline-success btn-sm" name="unblock">Unblock</button><br><br>
                                                  </form>
                                                    <?php }
                                                    else{?>
                                                        <form action="" method="post">
                                                        <input type="hidden" id="rnt" name="rnt" value="<?php echo $row['driver_id']; ?>">
                                                        <button class="btn btn-outline-success btn-sm" name="acpt">Accept</button><br><br>
                                                        <button class="btn btn-outline-danger btn-sm" name="rjt">Reject</button>
                                                        <br><br>
                                                      </form>
                                                        <?php  
                                                    }
                                                    ?>
                                                </td>
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
  if(isset($_POST['block'])){
    $id = $_POST['cus'];
    $select_user = "SELECT `log_id` FROM `driver` WHERE `driver_id` = '$id'";
    $select_user_result = mysqli_query($conn,$select_user);
    $user = mysqli_fetch_array($select_user_result);
    $logid = $user['log_id'];
    $block = "UPDATE `login` SET `statuss`='0' WHERE `log_id` = '$logid'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Account blocked");</script>';
    echo'<script>window.location.href="driverAD.php";</script>';
  }
  if(isset($_POST['unblock'])){
    $id = $_POST['cus2'];
    $select_user = "SELECT `log_id` FROM `driver` WHERE `driver_id` = '$id'";
    $select_user_result = mysqli_query($conn,$select_user);
    $user = mysqli_fetch_array($select_user_result);
    $logid = $user['log_id'];
    $block = "UPDATE `login` SET `statuss`='1' WHERE `log_id` = '$logid'";
    $block_run = mysqli_query($conn,$block);
    echo '<script> alert ("Account unblocked");</script>';
    echo'<script>window.location.href="driverAD.php";</script>';
  }
  if(isset($_POST['acpt'])){
    $id = $_POST['rnt'];
    $select_user = "SELECT * FROM `driver` WHERE `driver_id` = '$id'";
    $select_user_result = mysqli_query($conn,$select_user);
    $user = mysqli_fetch_array($select_user_result);
    $logid = $user['log_id'];
    $fname = $user['fname'];
    $lname = $user['lname'];
    $email = $user['email'];
    $block = "UPDATE `login` SET `statuss`='1' WHERE `log_id` = '$logid'";
    $block_run = mysqli_query($conn,$block);

    $g_user = "SELECT * FROM `login` WHERE `log_id` = '$logid'";
    $g_user_result = mysqli_query($conn,$g_user);
    $userg = mysqli_fetch_array($g_user_result);
    $username = $userg['username'];
    $passwd = $userg['passwd'];

    $mail = new PHPMailer(true);

    
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arunbabu2023a@mca.ajce.in';                     //SMTP username
    $mail->Password   = 'rmca2021#';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('arunbabu2023a@mca.ajce.in', 'car rental system');
    $mail->addAddress($email);     //Add a recipient
   //

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hi '.$fname.' '.$lname.' This is your User Name and Password for your Login.';
    $mail->Body    = ' Your driver registration is completed. Please login to our site and enjoy the ride.<br> <h1> User Name: '.$username.'<br> Password: '.$passwd.'<h1> <br> <strong>Use this for Login.</strong>';
   // $mail->AltBody = 'copy this token ';

    $mail->send();

    echo '<script> alert ("Account accepted");</script>';
    echo'<script>window.location.href="driverAD.php";</script>';
  }
  if(isset($_POST['rjt'])){
    $id = $_POST['rnt'];
    $select_user = "SELECT * FROM `driver` WHERE `driver_id` = '$id'";
    $select_user_result = mysqli_query($conn,$select_user);
    $user = mysqli_fetch_array($select_user_result);
    $logid = $user['log_id'];
    $fname = $user['fname'];
    $lname = $user['lname'];
    $email = $user['email'];
    $block = "UPDATE `login` SET `statuss`='0' WHERE `log_id` = '$logid'";
    $block_run = mysqli_query($conn,$block);
    

    $mail = new PHPMailer(true);

    
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arunbabu2023a@mca.ajce.in';                     //SMTP username
    $mail->Password   = 'rmca2021#';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('arunbabu2023a@mca.ajce.in', 'car rental system');
    $mail->addAddress($email);     //Add a recipient
   //

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hi '.$fname.' '.$lname.' ';
    $mail->Body    = ' Your driver registration is incompleted. It is due to some incorrect informations you provided.';
   // $mail->AltBody = 'copy this token ';

    $mail->send();

    echo '<script> alert ("Account Rejected");</script>';
    echo'<script>window.location.href="driverAD.php";</script>';
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
<!-- end document-->