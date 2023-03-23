<?php
include("../config.php");
include("../session.php");
$c=0;
if(isset($_POST['details']))
{

if(isset($_POST['vehicle1']) &&  $_POST['vehicle1'] == '1') 
{
    $a="All papers provided by the renter are correct ";
}
else{
    $a="All papers provided by the renter are fake ";
}
if(isset($_POST['vehicle2']) &&  $_POST['vehicle2'] == '1') 
{
    $b="and it is in running condition. ";
}
else{
    $b="and it is not in a running condition. ";
}
if(isset($_POST['vehicle3']) &&  $_POST['vehicle3'] == '0') 
{
    $c="No over damage detected. ";
}
else{
    $c="This vehicle is over damaged. ";
}
if(isset($_POST['vehicle4']) &&  $_POST['vehicle4'] == '1') 
{
    $d="The details about the car are true. ";
}
else{
    $d="The details given are fake. ";
}
if(isset($_POST['vehicle5']) &&  $_POST['vehicle5'] == '1') 
{
    $e="The price given is apt for this car ";
}
else{
    $e="The price given is not apt for this car ";
}
if(isset($_POST['vehicle6']) &&  $_POST['vehicle6'] == '1') 
{
    $f="and it is apt for our website. ";
}
else{
    $f="and it is not apt for our website. ";
}
$ch=$_POST['chid'];
$g=$_POST['details'];
$details=$g."<br>".$a."".$b."".$c."".$d."".$e."".$f;
$sql="UPDATE `tbl_check` SET `details`='$details',`stat`='0' WHERE `car_id`='$ch'";
// $result=$conn->querry($sql);
$sql1="UPDATE `car` SET `c_stat`='4' WHERE `car_id`='$ch'";
$result1=$conn->query($sql1);
if($conn->query($sql) === TRUE){
   
    ?>
    <script>
        if(window.confirm('opinion updated '))
        {
            window.location.href='car-req.php';
        };</script>
    <?php
}
}

?>
