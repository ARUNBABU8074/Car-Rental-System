<?php
include 'session.php';

// error_reporting(E_ERROR | E_PARSE);
include("config.php");


$log_id= $_SESSION['log_id'];
$sql = "SELECT * FROM `customer` WHERE log_id='$log_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql1 = "SELECT * FROM `login` WHERE log_id='$log_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$usertype=$row1['usertype'];


if(isset($_POST['submit'])){


    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$phone = $_POST["phone"];
	// $email = $_POST["email"];
	$addresss = $_POST["addresss"];
	$place = $_POST["place"];
    // $username = $_POST["username"];
	$passwd = $_POST["passwd"];
   

        if($usertype == 1){
        
        $up = "UPDATE `login` SET `passwd`='$passwd' WHERE `log_id`='$log_id'";
        $up_result = $conn->query($up);
        $user_reg = "UPDATE `customer` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`addresss`='$addresss',`place`='$place' WHERE `log_id`='$log_id'";
            $user_reg_query = $conn->query($user_reg);
            header("location: customer-home.php");

        
        }
        if($usertype == 2){
            $up = "UPDATE `login` SET `passwd`='$passwd' where 'log_id'='$log_id'";
            $up_result = $conn->query($up);
            $user_reg = "UPDATE `renter` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`addresss`='$addresss',`place`='$place' WHERE `log_id`='$log_id'";
            $user_reg_query = $conn->query($user_reg);
            header("location: renter-home.php");
            }
            if($usertype == 3){
                $up = "UPDATE `login` SET `passwd`='$passwd' where 'log_id'='$log_id'";
                $up_result = $conn->query($up);
                $user_reg = "UPDATE `driver` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`addresss`='$addresss',`place`='$place' WHERE `log_id`='$log_id'";
                $user_reg_query = $conn->query($user_reg);
                header("location: driver-home.php");
                }
        
        
   /*      
        if($reg_query){

            if($usertype == 1){
             $user_reg = "UPDATE `customer` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`addresss`='$addresss',`place`='$place' WHERE `log_id`='$log_id'";
            $user_reg_query = mysqli_query($conn,$user_reg);
            header("location: customer-home.php");
              }
           
            if($usertype == 2){
            
                $user_reg = "UPDATE `renter` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`addresss`='$addresss',`place`='$place' WHERE `log_id`='$log_id'";
               $user_reg_query = mysqli_query($conn,$user_reg);
                 }


     
    
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
        
    }    */
}
    
?>