<?php
session_start(); 
include 'config.php';
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $password = $_POST['passwd'];
    $login_check = "SELECT * FROM `login` WHERE username='$user' AND passwd='$password'";
	$login_check_result = mysqli_query($conn, $login_check);
	$rsltcheck = mysqli_num_rows($login_check_result);
    $row = mysqli_fetch_array($login_check_result);
    if($rsltcheck == 1){
		$statuss=$row['statuss'];
        $usertype=$row['usertype'];

		if($row['statuss'] == 1){

      if($row['username'] == $user && $row['passwd'] == $password && $row['usertype'] == 0){
            $_SESSION['username'] = $row['username'];

			
            $_SESSION['usertype'] = $row['usertype'];
            
			header("location: admin-home.php");

	  }
        else if($row['username'] == $user && $row['passwd'] == $password && $row['usertype'] == 1){
            $_SESSION['username'] = $row['username'];

			$_SESSION['usertype'] = $row['usertype'];
            $_SESSION['log_id'] = $row['log_id'];
           
			header("location: customer-home.php");
           
        } 

		else if($row['username'] == $user && $row['passwd'] == $password && $row['usertype'] == 2){
            $_SESSION['username'] = $row['username'];

			$_SESSION['usertype'] = $row['usertype'];
            $_SESSION['log_id'] = $row['log_id'];
            
			header("location: renter-home.php");
           
        } 
    
   

}
else if($row['statuss'] == 2){
    echo '<script> alert ("please wait for admin approval");</script>';
	echo'<script>window.location.href="index.html";</script>';
}
else{

	echo '<script> alert ("you r eliminated by admin");</script>';
	echo'<script>window.location.href="index.html";</script>';
}

}
else{
    echo '<script> alert ("Invalid credentials");</script>';
    echo'<script>window.location.href="index.html";</script>';
}
}
?>