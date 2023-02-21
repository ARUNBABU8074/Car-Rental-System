<?php
include '../config.php';
if(!empty($_POST['paper'])){
    $car_id= $_POST['paper'];
   
		$sql1 = "SELECT * FROM car where car_id='$car_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row10 = $result1->fetch_assoc()) {
                   
                       
                            
                  
                            echo '<iframe src="../papers/'.$row10['papers'].'" style="width: 500px; height: 500px;"></iframe>';
                      
            	}
			}
        }


//model checking
 
if(!empty($_POST['model'])){
    $model= $_POST['model'];
    $check = "SELECT `model` FROM `model` WHERE `model`='$model'";
    
    $rslt = mysqli_query($conn, $check);

    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck > 0){
        echo "<span style='color:red;'>Model already exist</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<script>$('#submit').prop('disabled',false);</script>"; 
    }
    
}
		?>