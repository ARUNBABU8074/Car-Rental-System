<?php 
include "config.php";
include "session.php";

if (isset($_GET['log_id'])) {
	$log_id = $_GET['log_id'];

echo $log_id;
$sql="UPDATE `login` SET `statuss`=0 WHERE `log_id`='$log_id'";


	
	

	

	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('customer deleted succesfully '))
		{
			window.location.href='customer.php';
		};
		</script>
		<?php
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?> 