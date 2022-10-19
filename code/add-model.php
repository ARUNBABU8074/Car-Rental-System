<?php  

include "config.php";
include 'session.php';


if(isset($_POST['submit'])){

		

 $model= $_POST["model"];

	$sql2 = "INSERT INTO `model`( `model`) VALUES ('$model')";
	
	if($conn->query($sql2) === TRUE){
		?>
		<script>
			if(window.confirm('model added'))
			{
				window.location.href='admin-home.php';
			};</script>
		<?php
	}
	else{
		?>
		<script>
			if(window.confirm('Oops!!!!!    failed '))
			{
				window.location.href='admin-home.php';
			};</script>
		<?php
	} 
	} 
	
	else{
		echo "no";
		echo '<button type="button" onclick="history.back();">Back</button>';
	}
	
	



	

?>