<?php

include 'config.php';
session_start();
 
   
  $mailmsg =$_SESSION['mailsend'];
   $fname = $_SESSION['fname'];
   $lname = $_SESSION['lname'];
   $phone = $_SESSION['phone'];
    $email = $_SESSION["email"];
   $addresss = $_SESSION["addresss"];
   $place = $_SESSION["place"];
   $usertype = $_SESSION['type'];
   $username = $_SESSION["username"];
   $passwd = $_SESSION["passwd"];

 

 if(isset($_POST['btn'])){
   
    
    
        $tokenfrom=$_POST['otp'];
  $user= $_SESSION['email'];
  $tok="select token from temp where email='$user'";
  $tokres=mysqli_query($conn,$tok);
  $row=mysqli_fetch_array($tokres);
  $cnt=$row['token'];
  if($tokenfrom==$cnt)
  {
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
            
        $sql = "INSERT INTO `login`(`username`, `passwd`, `usertype`, `statuss`) VALUES ('$username','$passwd','$usertype',1);";
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
            echo'<script>window.location.href="index.php";</script>';  }
            if($usertype == 2){
            
                $user_reg = "INSERT INTO `renter`(`log_id`, `fname`, `lname`, `email`, `phone`, `addresss`, `place`) VALUES ('$logid','$fname','$lname','$email','$phone','$addresss', '$place')";
               $user_reg_query = mysqli_query($conn,$user_reg);
               echo'<script> alert ("Account created");</script>';
               echo'<script>window.location.href="index.php";</script>';  }


     
    
        }
    }
}}
        else{
            echo'<script> alert ("token error");</script>';
            echo'<script>window.location.href="index.php";</script>'; 
          }
        
    

    } 


    


?>
 <!DOCTYPE html>
<html lang="en">
    <head><title>otp</title>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
        background-image: url('Two-Factor-Authentication.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 99% 98%;
    }
</style>
</head>
    <body>

<form  method="post" action="demo.php">

                                    <script>
                                        function showerr()
                                            {
                                                document.getElementById("time").style.visibility="visible";

                                            }
                                            setTimeout("showerr()",0);

                                            function hideerr()
                                            {
                                                document.getElementById("time").style.visibility="hidden";

                                            }
                                            setTimeout("hideerr()",3000);
                                    </script>
                                   
                                        <div  class="form-control" style="width: 80%;">
                                            <input type="text" class="form-control form-control-user" name="otp"
                                                id="otp" aria-describedby="emailHelp"
                                                placeholder="Enter your otp...">
                                        </div>
                                      <br>  <input type="submit"   name="btn" value="submit">
                                            
                                    </input>
                                    </form>
                                </body>
                                </html> 