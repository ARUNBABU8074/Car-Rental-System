<?php
session_start();
if(session_destroy()){
	header("location:index.php");
}
?>
  <!-- <a href="booking.php?car_id=<?php echo $row['car_id'];?>" class="tm-product-delete-link"> -->