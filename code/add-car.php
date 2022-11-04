<?php  

include "config.php";
include 'session.php';

$log_id= $_SESSION['log_id'];
$sql = "SELECT * FROM `renter` WHERE log_id='$log_id'";
	$sql_result = mysqli_query($conn, $sql);
	
    $row = mysqli_fetch_array($sql_result);

    

        $renter_id=$row['renter_id'];
        echo $renter_id;

	if(isset($_POST['submit'])){

		
		$company= $_POST["company"];
 $cname= $_POST["cname"];
$year = $_POST["year"];
$model = $_POST["model"];

$reg_no = $_POST["reg"];
$price = $_POST["price"];
$mileage = $_POST["mileage"];
$c_stat = 2;  

$img=$_FILES['image']['name'];

move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);

	
	$sql2 = "INSERT INTO car (renter_id,company,name,year,model,image,reg_no,price,mileage,c_stat) 
	VALUES ('$renter_id','$company','$cname', '$year', '$model', '$img','$reg_no','$price','$mileage','$c_stat')";
	
	if($conn->query($sql2) === TRUE){
		?>
		<script>
			if(window.confirm('your car will confirm after checking'))
			{
				window.location.href='renter-home.php';
			};</script>
		<?php
	}
	else{
		?>
		<script>
			if(window.confirm('Oops!!!!!    failed '))
			{
				window.location.href='renter-home.php';
			};</script>
		<?php
	} 
	} 
	
	
	
	



	

?>