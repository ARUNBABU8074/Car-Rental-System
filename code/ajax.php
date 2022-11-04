<?php

include 'config.php';

//email checking

if(!empty($_POST['em'])){
    $em= $_POST['em'];
    
    $check = "SELECT r.email,c.email FROM renter as r,customer as c WHERE r.email='$em' or c.email='$em'";
    
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
   ?>