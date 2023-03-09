<?php
include("config.php");
session_start();
$fname = $_SESSION['dfname'];
   $lname = $_SESSION['dlname'];
   $phone = $_SESSION['dphone'];
    $email = $_SESSION["demail"];
   $addresss = $_SESSION["daddresss"];
   $place = $_SESSION["dplace"];
   $usertype = 3;
   $username = $_SESSION["dusername"];
   $passwd = $_SESSION["dpasswd"];
   $license=$_SESSION['dlicense'];
   $dlim=$_SESSION['dlim'];
if(isset($_POST['payment_id']))
{
    $payment_id=$_POST['payment_id'];
    
    $name=$_POST['name'];
    // $payment_status="1";
   
   
    
    mysqli_query($conn,"INSERT INTO `regpay`(`name`, `email`, `pay_id`, `amount`) VALUES ('$username','$email','$payment_id','50')");

    $check1 = "SELECT * FROM `renter` WHERE `email`='$email'";
    
    $rslt1 = mysqli_query($conn, $check1);
    $rsltcheck1 = mysqli_num_rows($rslt1);
    $check2 = "SELECT * FROM `customer` WHERE `email`='$email'";
    
    $rslt2 = mysqli_query($conn, $check2);
    $rsltcheck2 = mysqli_num_rows($rslt2);

    $check3 = "SELECT * FROM `driver` WHERE `email`='$email'";
    
    $rslt3 = mysqli_query($conn, $check3);
    $rsltcheck3 = mysqli_num_rows($rslt3);

    if($rsltcheck1 == 0 && $rsltcheck2 == 0 && $rsltcheck2 == 0){

    $check = "SELECT * FROM `login` WHERE `username`='$username'";
    
    $rslt = mysqli_query($conn, $check);
    $rsltcheck = mysqli_num_rows($rslt);
    if($rsltcheck == 0){
      
        
       
            $sql = "INSERT INTO `login`(`username`, `passwd`, `usertype`, `statuss`) VALUES ('$username','$passwd','$usertype',2);";
            
        
        $reg_query = mysqli_query($conn,$sql);
        $logid = mysqli_insert_id($conn);
        if($reg_query){

       
            
            
                $user_reg = "INSERT INTO `driver`(`log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`,`license`,`dim`) VALUES ('$logid','$fname','$lname','$email','$phone','$addresss', '$place','$license','$dlim')";
               $user_reg_query = mysqli_query($conn,$user_reg);
               echo'<script> alert ("Account created");</script>';
               echo'<script>window.location.href="index.php";</script>';  


     
    
         }
    }
}
}
?>