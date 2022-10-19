<?php

include 'config.php';

if(isset($_POST['submit'])){
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$addresss = $_POST["addresss"];
	$place = $_POST["place"];
   
    $username = $_POST["username"];
	$passwd = $_POST["passwd"];
   
    
    $statuss=1;

    $usertype = $_POST['type'];
    $check1 = "SELECT * FROM `renter` WHERE `email`='$email'";
    
    $rslt1 = mysqli_query($conn, $check1);
    $rsltcheck1 = mysqli_num_rows($rslt1);
    $check2 = "SELECT * FROM `customer` WHERE `email`='$email'";
    
    $rslt2 = mysqli_query($conn, $check2);
    $rsltcheck2 = mysqli_num_rows($rslt2);

    if($rsltcheck1 == 0 && $rsltcheck2 == 0 ){

    $check = "SELECT * FROM `login` WHERE `username`='$username'";
    
    $rslt = mysqli_query($conn, $check);
    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck == 0){
      
       
      
        if($usertype == 1){
            
        $sql = "INSERT INTO `login`(`username`, `passwd`, `usertype`, `statuss`) VALUES ('$username','$passwd','$usertype','$statuss');";
        }
        if($usertype == 2){
            $sql = "INSERT INTO `login`(`username`, `passwd`, `usertype`, `statuss`) VALUES ('$username','$passwd','$usertype',2);";
            }
        
        $reg_query = mysqli_query($conn,$sql);
        $logid = mysqli_insert_id($conn);
        if($reg_query){

            if($usertype == 1){
             $user_reg = "INSERT INTO `customer`(`log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`) VALUES ('$logid','$fname','$lname','$email','$phone','$addresss', '$place')";
            $user_reg_query = mysqli_query($conn,$user_reg);
            echo'<script> alert ("Account created");</script>';
            echo'<script>window.location.href="index.html";</script>';  }
            if($usertype == 2){
            
                $user_reg = "INSERT INTO `renter`(`log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`) VALUES ('$logid','$fname','$lname','$email','$phone','$addresss', '$place')";
               $user_reg_query = mysqli_query($conn,$user_reg);
               echo'<script> alert ("Account created");</script>';
               echo'<script>window.location.href="index.html";</script>';  }


     
    
        }
    }
    else{
        echo'<script> alert ("username  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
        
    } 

    }
    else{
        echo'<script> alert ("email  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
        
    } 
}

?>