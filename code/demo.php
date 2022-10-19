<?php

include 'config.php';

 
   
   $mailmsg =$_SESSION['mailsend'];
   $fname = $_SESSION['fname'];
   $lname = $_SESSION['lname'];
   $phone = $_SESSION['phone'];
  /*  $email = $_SESSION["email"];
   $addresss = $_SESSION["addresss"];
   $place = $_SESSION["place"];
   $usertype = $_SESSION['type'];
   $username = $_SESSION["username"];
   $passwd = $_SESSION["passwd"]; */

   echo $fname;

/* if(isset($_POST['btn'])){
   
    
    
        $tokenfrom=$_POST['otp'];
  $user= $_SESSION['email'];
  $tok="select token from temp where email='$user'";
  $tokres=mysqli_query($conn,$tok);
  $row=mysqli_fetch_array($tokres);
  $cnt=$row['token'];
  if($tokenfrom==$cnt)
  {

      
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
    
        else{
            echo'<script> alert ("token error");</script>';
            echo'<script>window.location.href="index.php";</script>'; 
          }
        
    

    } */
    


?>
<!DOCTYPE html>
<html lang="en">
    <body>

<form class="user" method="post" action="demo.php">

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
                                    <?php 

                                    if($mailmsg) {
                                        
                                        echo ' <div class="alert alert-danger 
                                            alert-dismissible fade show" role="alert" id="time" style="visibility:hidden">'. $mailmsg.'

                                    
                                    </div> '; 
                                    
                                    }
                                    ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="otp"
                                                id="otp" aria-describedby="emailHelp"
                                                placeholder="Enter your otp...">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block"  name="btn" value="submit">
                                            
                                    </input>
                                    </form>
                                </body>
                                </html>