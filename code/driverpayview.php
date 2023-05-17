<?php
include 'session.php';
include("config.php");

$log_id = $_SESSION['log_id'];
$sql34 = "SELECT * FROM driver where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();

$day = date("Y-m-d");



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
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg> <?php echo strtoupper($row34['fname']); ?> </a>
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

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">

        <?php
        $sql = "SELECT * FROM `driver` WHERE log_id='$log_id'";
        $sql_result = mysqli_query($conn, $sql);

        $row1 = mysqli_fetch_array($sql_result);
        $driver_id = $row1['driver_id'];

        $sql1 = "SELECT * FROM `dbook` WHERE driver_id='$driver_id' and stat=5 ";
        $sql_result1 = mysqli_query($conn, $sql1);
        if ($sql_result1->num_rows > 0) {
          while ($row2 = $sql_result1->fetch_assoc()) {
            $ren_id = $row1['renter_id'];
            $cb_id = $row2['carbook_id'];
            $dbid = $row2['book_id'];


            $sqlcb = "SELECT * FROM `tbl_booking` WHERE book_id='$cb_id'";
            $resultcb = mysqli_query($conn, $sqlcb);

            $rowcb = mysqli_fetch_array($resultcb);
            $cus_id = $rowcb['cus_id'];

            $sqlc = "SELECT * FROM `customer` WHERE cus_id='$cus_id'";
            $resultc = mysqli_query($conn, $sqlc);

            $rowc = mysqli_fetch_array($resultc);


            $sql4 = "SELECT * FROM `renter` WHERE renter_id='$ren_id'";
            $result4 = mysqli_query($conn, $sql4);

            $row4 = mysqli_fetch_array($result4);
            $sql45 = "SELECT * FROM `driverpay` WHERE dbook_id='$dbid'";
            $result45 = mysqli_query($conn, $sql45);

            $row45 = mysqli_fetch_array($result45);
        ?>
            <div class="col-md-4">
              <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Payment Details</div>
                <div class="card-body">
                  <h5 class="card-title">Customer :
                  <?php echo strtoupper($rowc['fname']), " ", strtoupper($rowc['lname']);  ?>
                  </h5>
                  <p class="card-text">You got a payment of ₹<?php echo $row45['amount']; ?> from <?php echo strtoupper($row4['fname']), " ", strtoupper($row4['lname']);  ?> with the paymentID: <?php echo $row45['payment_id']; ?>.</p>
                  <form action="pdf.php" method="POST">
                    <input type="hidden" name="dbid" value="<?php echo $row2['book_id']; ?>">
                    <input type="hidden" name="cusfn" value="<?php echo $rowc['fname']; ?>">
                    <input type="hidden" name="cusln" value="<?php echo $rowc['lname']; ?>">
                    <button type="submit" class="btn btn-primary hidden-print" name="payid"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                      </svg></button>
                  </form>
                </div>
              </div>
            </div>

        <?php
          }
        }
        ?>


      </div>
    </div>
  </section>







  <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
    <p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>

  </div>
  <!-- Footer End -->



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>
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
            <h4>About Payment</h4>
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