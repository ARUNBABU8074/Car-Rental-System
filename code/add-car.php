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

		

 $cname= $_POST["cname"];
$year = $_POST["year"];
$model = $_POST["model"];

$reg_no = $_POST["reg"];
$price = $_POST["price"];
$mileage = $_POST["mileage"];
$c_stat = 2;  

$img_name=$_FILES['image']['name'];
$target_dir="images/";
$target_file=$target_dir.basename($_FILES['image']['name']);
$img_type=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extension_array=array("jpg","jpeg","png");
if(in_array($img_type,$extension_array)){
	
	$img_bases64= base64_encode(file_get_contents($_FILES['image']['tmp_name']));
	$image='data:image/'.$img_type.';base64,'.$img_bases64;
	$sql2 = "INSERT INTO car (renter_id,name,year,model,image,reg_no,price,mileage,c_stat) 
	VALUES ('$renter_id','$cname', '$year', '$model', '$image','$reg_no','$price','$mileage','$c_stat')";
	move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$img_name);
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
	
	else{
		echo "no";
		echo '<button type="button" onclick="history.back();">Back</button>';
	}
	
	
}


	

?>