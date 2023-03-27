<script>
				
               function check(){
			var pdate=document.getElementById("pdate").value;
			// document.getElementById("ms").innerHTML = pdate;
			var c=	document.getElementById("c").value;
            var ddate=document.getElementById("ddate").value;
			var data = "pdate="+ pdate + "&c=" + c+"&ddate="+ ddate;
			
jQuery.ajax({
  url: "ajax.php",
  type: "POST",
  
  data:data,
  success:function(response){
	
	$("#ms").html(response);
  },
  error:function (){}
}); 

}

function check1(){
			var pdate=document.getElementById("pdate").value;
			// document.getElementById("ms").innerHTML = pdate;
			var c=	document.getElementById("c").value;
		
			var ddate=document.getElementById("ddate").value;
			var data1 = "ddate="+ ddate + "&c=" + c + "&pdate=" + pdate +"&ch=0";
// jQuery.ajax({
//   url: "ajax.php",
//   type: "POST",
  
//   data:data,
//   success:function(response){
	
// 	$("#ms").html(response);
//   },
//   error:function (){}
// }); 
jQuery.ajax({
  url: "ajax.php",
  type: "POST",
  
  data:data1,
  success:function(response){
	
	$("#ms1").html(response);
  },
  error:function (){}
}); 
}
		  </script>


<?php

include 'config.php';



//email checking

if(!empty($_POST['em'])){
    $em= $_POST['em'];
    
    $check = "SELECT r.email,c.email,d.email FROM renter as r,customer as c, driver as d WHERE r.email='$em' or c.email='$em' or d.email='$em'";
    
    $rslt = mysqli_query($conn, $check);

    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck > 0){
        echo "<span style='color:red;'>email already exit</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        
        echo "<script>$('#submit').prop('disabled',false);</script>";

    } 
}


//username checking
 
if(!empty($_POST['uname'])){
    $uname= $_POST['uname'];
    $check = "SELECT passwd FROM `login` WHERE `username`='$uname'";
    
    $rslt = mysqli_query($conn, $check);

    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck > 0){
        echo "<span style='color:red;'>username already exist</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<span style='color:green;'>username available</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";

    } 
}

//registration number checking
 
if(!empty($_POST['reg'])){
    $reg= $_POST['reg'];
    $check = "SELECT car_id FROM `car` WHERE `reg_no`='$reg'";
    
    $rslt = mysqli_query($conn, $check);

    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck > 0){
        echo "<span style='color:red;'>Vechile number already exist</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
       
        echo "<script>$('#submit').prop('disabled',false);</script>";

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

//image checking
 
if(isset($_FILES['file']['name'])){

    /* Getting file name */
    $filename = $_FILES['file']['name'];
 
    /* Location */
    $location = "images/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png");
 
    $response = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            // $response = $location;
            // echo "<span style='color:red;'>".$response."</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
        }
 }
 else{
    echo "<span style='color:red;'>only images with extension jpg,jpeg,png are allowed</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
 }
}


//booking accept section driver

if(!empty($_POST['dbook-id'])){
    $book_id= $_POST['dbook-id'];
    $sql="UPDATE `dbook` SET `stat`=1 WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

    $sql1="SELECT `driver_id` FROM `dbook` WHERE `book_id`='$book_id'";
    $result = $conn->query($sql1);
$car=$result->fetch_assoc();
$d_id=$car['driver_id'];
$sql3="UPDATE `dbook` SET `stat`=0 WHERE `book_id`!='$book_id' AND `driver_id`='$d_id';";
$result3 = $conn->query($sql3);
// $sql2="UPDATE `car` SET `c_stat`=3 WHERE `car_id`='$car_id'";

// 	$result2 = $conn->query($sql2);

}


//booking reject section driver

if(!empty($_POST['dbook'])){
    $book_id= $_POST['dbook'];
    $sql="UPDATE `dbook` SET `stat`=0 WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

 

}

//booking accept section

if(!empty($_POST['book-id'])){
    $book_id= $_POST['book-id'];
    $sql="UPDATE `tbl_booking` SET `stat`=1 WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

    $sql1="SELECT `car_id` FROM `tbl_booking` WHERE `book_id`='$book_id'";
    $result = $conn->query($sql1);
$car=$result->fetch_assoc();
$car_id=$car['car_id'];
$sql3="UPDATE `tbl_booking` SET `stat`=0 WHERE `book_id`!='$book_id' AND `car_id`='$car_id';";
$result3 = $conn->query($sql3);
// $sql2="UPDATE `car` SET `c_stat`=3 WHERE `car_id`='$car_id'";

// 	$result2 = $conn->query($sql2);

}


//booking reject section

if(!empty($_POST['book'])){
    $book_id= $_POST['book'];
    $sql="UPDATE `tbl_booking` SET `stat`=0 WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

 

}

//booking view delete section

if(!empty($_POST['book1'])){
    $book_id= $_POST['book1'];
    $sql="UPDATE `tbl_booking` SET `stat`=3 WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

 

}

//car delete by renter section

if(!empty($_POST['car-id'])){
    $car_id= $_POST['car-id'];
    $sql="UPDATE `car` SET `c_stat`=3 WHERE `car_id`='$car_id'";

	$result = $conn->query($sql);
}

//set-not available section

if(!empty($_POST['car3'])){
    $car_id= $_POST['car3'];
    $sql="UPDATE `car` SET `availability`=0 WHERE `car_id`='$car_id'";

	$result = $conn->query($sql);

 

}

//set available section

if(!empty($_POST['car4'])){
    $car_id= $_POST['car4'];
    $sql="UPDATE `car` SET `availability`=1 WHERE `car_id`='$car_id'";

	$result = $conn->query($sql);

 

}


//car view modal section

if(!empty($_POST['carc-id'])){
    $car_id= $_POST['carc-id'];
   
		$sql1 = "SELECT * FROM car where car_id='$car_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row0 = $result1->fetch_assoc()) {
                    if($row0['c_stat']==1){
                       
                            
                  
                            echo '<h3><span>Company : ',strtoupper($row0['company']),'</span>';
                            echo '<span><br>Name: ',strtoupper($row0['name']),'</span>';
                            $mid0=$row0['model'];
                           $m0 = "SELECT * FROM model WHERE model_id= $mid0";
                           $result01 = $conn->query($m0);
                           $row01 = $result01->fetch_assoc();
                            echo '<span><br>Model: ',strtoupper($row01['model']),'</span>';
                            echo '<span><br>Year : ',($row0['year']),'</span>';
                            echo '<span><br>Register No: ',strtoupper($row0['reg_no']),'</span>';
                            echo '<span><br>Price for first ',strtoupper($row0['km']),' km : ',strtoupper($row0['price']),'RS','</span>';
                            
                            echo '<span><br>Excess price for each KM after ',strtoupper($row0['km']),': ',strtoupper($row0['excess']),'RS','</span>';
                            echo '<span><br>Mileage: ',strtoupper($row0['mileage']),'</span></h3>';

$renter_id=$row0['renter_id'];
                            $sql2 = "SELECT * FROM renter where renter_id='$renter_id'";
		$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
				//output data of each row
				while ($row = $result2->fetch_assoc()) {
                            echo '<h1><span><br>Contact Details</span></h1>';
                            echo '<h4><span><br>Name: ',strtoupper($row['fname']),' ',strtoupper($row['lname']),'</span><br>';
                            echo '<span><br>Number: ',strtoupper($row['phone']),'</span><br>';
                            echo '<span><br>Address: ',strtoupper($row['addresss']),' (h) ,<br> ',strtoupper($row['place']),'</span></h4>';
                }
                }      
            	}
			}
        }
		
}

//car book modal section

if(!empty($_POST['carc-idb'])){
    $car_id= $_POST['carc-idb'];
   echo $car_id;
		$sql1 = "SELECT * FROM car where car_id='$car_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row0 = $result1->fetch_assoc()) {
                    if($row0['c_stat']==1){
                       
                        ?>
<form action="" method="POST"  class="wow fadeInUp" data-wow-delay="0.6s" onsubmit="return validate()">
				
				<div class="col-md-8 col-sm-6">
					<?php
					$day=date("Y-m-d");
					
					?>
				<?php echo '<input type="hidden" value="<?php echo $car_id;?>" name="car-id" id="c">' ?>
				
            <span>pick up date<span>
			  <input type="date" class="form-control" name="pdate"  id="pdate"  onchange="check()" required ><br>
			  <span class="message text-danger" id="ms" style="font-size: 16px"></span><br>
              <span>drop-off date<span>
			<input type="date" class="form-control"  name="ddate"  id="ddate" onchange="check1()" required ><br>
			<span class="message text-danger" id="ms1"  ></span>
			
			<input type="submit" class="form-control" value="Book" name="sub" id="sub" >
				</div>
			</form>


<?php
                  
                             
            	}
			}
        }
		
}

//car view modal section

if(!empty($_POST['car123'])){
    $car_id= $_POST['car123'];
    echo '<span>hi</span>';
}






//booking date
if(!empty($_POST['pdate'])){
    $pdate= $_POST['pdate'];
    
    $car_id= $_POST['c'];
    $day=date("Y-m-d");
    if($pdate<$day){
        echo '<spana>please check the date once again!!!!!</span>';
        echo "<script>$('#sub').prop('disabled',true);</script>";
    }
    else{
        echo "<script>$('#sub').prop('disabled',false);</script>";
    $sql="SELECT * FROM `tbl_booking` WHERE `car_id`='$car_id' AND `stat`=1;";
    $result2 = $conn->query($sql);
			if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()) {
                    $pd=$row['book_date'];
                    $dd=$row['drop_date'];
                    if($pdate>=$pd && $pdate<=$dd){
                        echo '<span> car not available in this date</span>';
                        echo "<script>$('#sub').prop('disabled',true);</script>";
                    }
                    else{
                        echo "<script>$('#sub').prop('disabled',false);</script>";
                    }
                    if(isset($_POST['ddate'])){
                        $ddate=$_POST['ddate'];
                        if($pdate<=$pd && $ddate>=$dd){
                            echo '<span> car not available in this date</span>';
                            echo "<script>$('#sub').prop('disabled',true);</script>";
                        }
                        else{
                            echo "<script>$('#sub').prop('disabled',false);</script>";
                        }
                    }
                    
                }

            }
            
        }
    
}

//drop-off date
if(!empty($_POST['dd'])){
    $ddate= $_POST['dd'];
    $pdate= $_POST['pd'];
    $car_id= $_POST['c'];
    $day=date("Y-m-d");

    if($ddate<$day || $ddate<$pdate){
        echo '<span>please check the date once again!!!!!</span>';
        echo "<script>$('#sub').prop('disabled',true);</script>";
    }
    else{
        
    $sql="SELECT * FROM `tbl_booking` WHERE `car_id`='$car_id' AND `stat`=1;";
    $result2 = $conn->query($sql);
			if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()) {
                    $pd=$row['book_date'];
                    $dd=$row['drop_date'];
                    



                    
                    if($ddate>=$pd && $ddate<=$dd){
                        echo '<span> car not available in this date</span>';
                        echo "<script>$('#sub').prop('disabled',true);</script>";
                    }
                   else if($pdate<=$pd && $ddate>=$dd){
                        echo '<span> car not available in this date</span>';
                        echo "<script>$('#sub').prop('disabled',true);</script>";
                    }
                    else if($ddate==$pd){
                        echo '<span> car not available in this date</span>';
                        echo "<script>$('#sub').prop('disabled',true);</script>";
                    }
                    else{
                        echo "<script>$('#sub').prop('disabled',false);</script>";
                    }
                }

            }
            
        }
    
}


//car paper view modal section

if(!empty($_POST['paper'])){
    $car_id= $_POST['paper'];
   
		$sql1 = "SELECT * FROM car where car_id='$car_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row10 = $result1->fetch_assoc()) {
                   
                       
                            
                  
                            echo '<iframe src="papers/'.$row10['papers'].'" style="width: 500px; height: 500px;"></iframe>';
                      
            	}
			}
        }

//driver license modal section

if(!empty($_POST['license'])){
    $d_id= $_POST['license'];
   
		$sql1 = "SELECT * FROM driver where driver_id='$d_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				
				while ($row10 = $result1->fetch_assoc()) {
                   
                       
                            
                  
                            echo '<iframe src="images/'.$row10['license'].'" style="width: 500px; height: 500px;"></iframe>';
                      
            	}
			}
        }
		
		
//license checking
 
if(isset($_FILES['file1']['name'])){

    /* Getting file name */
    $filename = $_FILES['file1']['name'];
 
    /* Location */
    $location = "images/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("pdf");
 
    $response = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['file1']['tmp_name'],$location)){
            // $response = $location;
            // echo "<span style='color:red;'>".$response."</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
        }
 }
 else{
    echo "<span style='color:red;'>only pdf are allowed</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
 }
}

//license view modal section

if(!empty($_POST['license'])){
    $cus_id= $_POST['license'];
   
		$sql1 = "SELECT * FROM customer where cus_id='$cus_id'";
		$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				//output data of each row
				while ($row10 = $result1->fetch_assoc()) {
                   
                       
                            
                  
                            echo '<iframe src="images/'.$row10['license'].'" style="width: 500px; height: 500px;"></iframe>';
                      
            	}
			}
        }

 // driver amount added section

if(!empty($_POST['amtd'])){
    $amt= $_POST['amtd'];
    $book_id= $_POST['bo_id'];
    echo $book_id;
    echo $amt;
    $sql="UPDATE `dbook` SET `amount`='$amt' WHERE `book_id`='$book_id'";

	$result = $conn->query($sql);

 

}
   ?>
   
   