<?php 
include "config.php";
include "session.php";

if (isset($_GET['log_id'])) {
	$log_id = $_GET['log_id'];

echo $log_id;
$sql="UPDATE `login` SET `statuss`=0 WHERE `log_id`='$log_id'";
$s="SELECT renter_id FROM renter WHERE log_ig='$log_id";
$s1=$conn->query($s);

$sql1="UPDATE `car` SET `c_stat`=0 WHERE `car_id`='$car_id'";

	
	

	

	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('renter deleted succesfully '))
		{
			window.location.href='rent.php';
		};
		</script>
		<?php
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?> 