<?php  

include "config.php";
include 'session.php';

$log_id= $_SESSION['log_id'];
$sql = "SELECT * FROM `renter` WHERE log_id='$log_id'";
	$sql_result = mysqli_query($conn, $sql);
	
    $row = mysqli_fetch_array($sql_result);

    

        $renter_id=$row['renter_id'];
       

	if(isset($_POST['submit'])){

		
		$company= $_POST["company"];
 $cname= $_POST["cname"];
$year = $_POST["year"];
$model = $_POST["model"];

$reg_no = $_POST["reg"];
$price = $_POST["price"];
$km = $_POST["km"];
$excess = $_POST["excess"];
$mileage = $_POST["mileage"];
$c_stat = 2;  

$img=$_FILES['cimage']['name'];
$papers=$_FILES['papers']['name'];

move_uploaded_file($_FILES["cimage"]["tmp_name"],"images/".$_FILES["cimage"]["name"]);
move_uploaded_file($_FILES["papers"]["tmp_name"],"papers/".$_FILES["papers"]["name"]);
	
	$sql2 = "INSERT INTO car (renter_id,company,name,year,model,image,papers,reg_no,price,km,excess,mileage,c_stat,availability) 
	VALUES ('$renter_id','$company','$cname', '$year', '$model', '$img','$papers','$reg_no','$price','$km','$excess','$mileage','$c_stat',1)";
	
	if($conn->query($sql2) === TRUE){
		?>
		<script>
			if(window.confirm('your car will confirm after checking'))
			{
				window.location.href='my-cars.php';
			};</script>
		<?php
	}
	else{
		?>
		<script>
			if(window.confirm('Oops!!!!!    failed '))
			{
				window.location.href='my-cars.php';
			};</script>
		<?php
	} 
	} 
	
	
	
	



	

?>