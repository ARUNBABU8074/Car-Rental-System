<?php
include("../config.php");
include("../session.php");
$log_id = $_SESSION['log_id'];
// echo $log_id;
// exit;
$sql34 = "SELECT * FROM tbl_checker where log_id='$log_id'";
$result34 = $conn->query($sql34);
$row34 = $result34->fetch_assoc();
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
	<style>
		body {
			margin-top: 20px;
		}


		/* USER LIST TABLE */
		.user-list tbody td>img {
			position: relative;
			max-width: 50px;
			float: left;
			margin-right: 15px;
		}

		.user-list tbody td .user-link {
			display: block;
			font-size: 1.25em;
			padding-top: 3px;
			margin-left: 60px;
		}

		.user-list tbody td .user-subhead {
			font-size: 0.875em;
			font-style: italic;
		}

		/* TABLES */
		.table {
			border-collapse: separate;
		}

		.table-hover>tbody>tr:hover>td,
		.table-hover>tbody>tr:hover>th {
			background-color: #eee;
		}

		.table thead>tr>th {
			border-bottom: 1px solid #C2C2C2;
			padding-bottom: 0;
		}

		.table tbody>tr>td {
			font-size: 0.875em;
			background: #f5f5f5;
			border-top: 10px solid #fff;
			vertical-align: middle;
			padding: 12px 8px;
		}

		.table tbody>tr>td:first-child,
		.table thead>tr>th:first-child {
			padding-left: 20px;
		}

		.table thead>tr>th span {
			border-bottom: 2px solid #C2C2C2;
			display: inline-block;
			padding: 0 5px;
			padding-bottom: 5px;
			font-weight: normal;
		}

		.table thead>tr>th>a span {
			color: #344644;
		}

		.table thead>tr>th>a span:after {
			content: "\f0dc";
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-decoration: inherit;
			margin-left: 5px;
			font-size: 0.75em;
		}

		.table thead>tr>th>a.asc span:after {
			content: "\f0dd";
		}

		.table thead>tr>th>a.desc span:after {
			content: "\f0de";
		}

		.table thead>tr>th>a:hover span {
			text-decoration: none;
			color: #2bb6a3;
			border-color: #2bb6a3;
		}

		.table.table-hover tbody>tr>td {
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
		}

		.table tbody tr td .call-type {
			display: block;
			font-size: 0.75em;
			text-align: center;
		}

		.table tbody tr td .first-line {
			line-height: 1.5;
			font-weight: 400;
			font-size: 1.125em;
		}

		.table tbody tr td .first-line span {
			font-size: 0.875em;
			color: #969696;
			font-weight: 300;
		}

		.table tbody tr td .second-line {
			font-size: 0.875em;
			line-height: 1.2;
		}

		.table a.table-link {
			margin: 0 5px;
			font-size: 1.125em;
		}

		.table button.table-link {
			margin: 0 5px;
			font-size: 1.125em;
			color: #fe635f;
		}

		.table a.table-link:hover {
			text-decoration: none;
			color: #2aa493;
		}

		.table button.table-link:hover {
			text-decoration: none;
			color: #2aa493;
		}

		.table a.table-link.danger {
			color: #fe635f;
		}

		.table a.table-link.danger:hover {
			color: #dd504c;
		}

		.table-products tbody>tr>td {
			background: none;
			border: none;
			border-bottom: 1px solid #ebebeb;
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
			position: relative;
		}

		.table-products tbody>tr:hover>td {
			text-decoration: none;
			background-color: #f6f6f6;
		}

		.table-products .name {
			display: block;
			font-weight: 600;
			padding-bottom: 7px;
		}

		.table-products .price {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .price>i {
			color: #8dc859;
		}

		.table-products .warranty {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .warranty>i {
			color: #f1c40f;
		}

		.table tbody>tr.table-line-fb>td {
			background-color: #9daccb;
			color: #262525;
		}

		.table tbody>tr.table-line-twitter>td {
			background-color: #9fccff;
			color: #262525;
		}

		.table tbody>tr.table-line-plus>td {
			background-color: #eea59c;
			color: #262525;
		}

		.table-stats .status-social-icon {
			font-size: 1.9em;
			vertical-align: bottom;
		}

		.table-stats .table-line-fb .status-social-icon {
			color: #556484;
		}

		.table-stats .table-line-twitter .status-social-icon {
			color: #5885b8;
		}

		.table-stats .table-line-plus .status-social-icon {
			color: #a75d54;
		}
	</style>
</head>
<script>

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
		<div class="position-relative px-lg-9" style="z-index: 9;">
			<nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
				<a href="" class="navbar-brand">
					<h1 class="text-uppercase  mb-1">Car Rental</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
					<div class="navbar-nav ml-auto py-0">
						<a href="check-home.php" class="nav-item nav-link active">Home</a>
						<!-- <a href="about.html" class="nav-item nav-link">Cars</a>
                        <a href="service.html" class="nav-item nav-link">Drivers</a> -->
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Requests</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="car-req.php" class="dropdown-item">Pending Requests</a>
								<a href="" class="dropdown-item">Completed Requests</a>
								<!-- <a href="booking.html" class="dropdown-item">Car Booking</a> -->
							</div>
						</div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
								</svg> <?php echo strtoupper($row34['fname']); ?> </a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="profile.php" class="dropdown-item">My profile</a>
								<a href="../logout.php" class="dropdown-item">Logout</a>
							</div>
						
						</div>
			</nav>
		</div>
	</div>





	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">

				<?php

				?>



				<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="main-box clearfix">
								<div class="table-responsive">
									<table class="table user-list">
										<thead>
											<tr>
												<th><span>User</span></th>
												<th><span>Car</span></th>
												<th class="text-center"><span>Address</span></th>
												<th><span>Contact</span></th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$chid = $row34['checker_id'];
											$sql0 = "SELECT * FROM tbl_check where checker_id='$chid' and stat='1'";
											$result0 = $conn->query($sql0);
											while ($row0 = $result0->fetch_assoc()) {

												if ($result0->num_rows > 0) {

													$car_id = $row0['car_id'];
													$sql1 = "SELECT * FROM car where car_id='$car_id'";
													$result1 = $conn->query($sql1);
													$row1 = $result1->fetch_assoc();
													$r_id = $row1['renter_id'];
													$sql10 = "SELECT * FROM renter where renter_id='$r_id'";
													$result10 = $conn->query($sql10);
													$row10 = $result10->fetch_assoc();
											?>
													<tr>
														<td>

															<img src="../images/<?php echo $row1['image']; ?>" alt="">
															<a href="" class="user-link"><?php echo $row10['fname'], ' ', $row10['lname']; ?></a>
															<span class="user-subhead"><?php echo $row1['name']; ?></span>
														</td>
														<td>
															<?php echo $row1['company'], ' ', $row1['name'], '<br> Registration : ', $row1['reg_no'] ?>
														</td>
														<td class="text-center">
															<span class="label label-default"><?php echo $row10['addresss'], '(h) <br>', $row10['place'], '<br>', $row10['district'], '<br>Pincode: ', $row10['pincode']; ?></span>
														</td>
														<td>
															<a href=""><?php echo $row10['email'], '<br>', $row10['phone'] ?></a>

														</td>

														<td style="width: 20%;">
															<form method="post" action="checker-view.php">
																<input type="hidden" name="cid" id="cid" value="<?php echo $car_id; ?>">

																<button class="table-link" type="submit" name="view">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
																	</span>
																</button>
																<a href="#" class="table-link danger">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
															</form>
														</td>
													</tr>



										</tbody>
								<?php
												}
											}
								?>
									</table>
								</div>




								<ul class="pagination pull-right">
									<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>








			</div>

		</div>

		</div>
	</section>


	<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
		<p class="mb-2 text-center text-body">&copy; <a href="#">CAR RENTAL SYSTEM</a></p>
		<!-- <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p> -->
	</div>
	<!-- Footer End -->



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>