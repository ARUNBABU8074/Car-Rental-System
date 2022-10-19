<?php 
include "config.php";
include "session.php";

if (isset($_GET['car_id'])) {
	$car_id = $_GET['car_id'];


$sql="UPDATE `car` SET `c_stat`=0 WHERE `car_id`='$car_id'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('car added succesfully '))
		{
			window.location.href='admin-home.php';
		};
		</script>
		<?php
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?> 