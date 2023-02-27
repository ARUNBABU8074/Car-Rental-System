<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include "config.php";
session_unset();
session_start();
$emailerror=false;
$usrerr=false;
$showAlert = false; 
$showError = false; 
$exists=false;


    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
   
    $fname = $_POST["dfname"];
	$lname = $_POST["dlname"];
	$phone = $_POST["dphone"];
	$email = $_POST["demail"];
	$addresss = $_POST["daddresss"];
	$place = $_POST["dplace"];
    $username = $_POST["dusername"];
	$passwd = $_POST["dpasswd"];
    $usertype = $_POST['dtype'];
$license=$_FILES['dvimage']['name'];
$dlim=$_FILES['dimg']['name'];
            
   $check1 = "SELECT * FROM `renter` WHERE `email`='$email'";
    
    $rslt1 = mysqli_query($conn, $check1);
    $rsltcheck1 = mysqli_num_rows($rslt1);
    $check2 = "SELECT * FROM `customer` WHERE `email`='$email'";
    
    $rslt2 = mysqli_query($conn, $check2);
    $rsltcheck2 = mysqli_num_rows($rslt2);

    $token=rand(100, 550000);

    if($rsltcheck1 == 0 && $rsltcheck2 == 0 ) {

        $check = "SELECT * FROM `login` WHERE `username`='$username'";
    
        $rslt = mysqli_query($conn, $check);
        $rsltcheck = mysqli_num_rows($rslt);

        if($rsltcheck == 0){
            $_SESSION['dfname'] = $fname;
            $_SESSION['dlname']= $lname;
            $_SESSION['dphone']= $phone;
            $_SESSION['demail']= $email;
            $_SESSION['daddresss']= $addresss;
            $_SESSION['dusername']= $username;
            $_SESSION['dpasswd']=$passwd;
            $_SESSION['dtype']=$usertype;
			$_SESSION['dplace']=$place;
			$_SESSION['dlicense']=$license;
            $_SESSION['dlim']=$dlim;
            

            
            $tokdel = "DELETE from temp";
            $ptl = mysqli_query($conn, $tokdel);
            $po = "INSERT INTO `temp`(`email`, `token`) VALUES ('$email','$token')";
            $p2o = mysqli_query($conn, $po);
            $mail = new PHPMailer(true);

    
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'arunbabu2023a@mca.ajce.in';                     //SMTP username
            $mail->Password   = 'rmca2021#';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('arunbabu2023a@mca.ajce.in', 'car rental system');
            $mail->addAddress($email);     //Add a recipient
           //
        
            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Hi '.$username.' This is your computer generated token';
            $mail->Body    = '<h1> '.$token.'<h1> <br> <strong>Copy this token</strong>';
           // $mail->AltBody = 'copy this token ';
        
            $mail->send();
                $_SESSION['dmailsend']="Check Your mail!!!";
                header('location:d.php'); 
            }
        
        
    
    else{
        echo'<script> alert ("username  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
    }
    
  }         
    else
    {
        echo'<script> alert ("email  already exists!");</script>';
        echo '<button type="button" onclick="history.back();">Back</button>';
    } 
   
 //  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
}
   
?>