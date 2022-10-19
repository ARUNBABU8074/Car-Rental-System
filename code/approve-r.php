<?php 
include "config.php";
include "session.php";

if (isset($_GET['log_id'])) {
	$log_id = $_GET['log_id'];

echo $log_id;
$sql="UPDATE `login` SET `statuss`=1 WHERE `log_id`='$log_id'";


	
	

	

	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('renter added succesfully '))
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