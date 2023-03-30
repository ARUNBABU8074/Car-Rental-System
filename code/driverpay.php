<?php
include("config.php");
if(isset($_POST['payment_id'])&& isset($_POST['amt'])&& isset($_POST['bid']))
{
    $payment_id=$_POST['payment_id'];
    $amt=$_POST['amt'];
    $bid=$_POST['bid'];
    $payment_status="1";
    $AD_id = "1";
    $day=date("Y-m-d");
    $s=mysqli_query($conn,"INSERT INTO `driverpay`(`dbook_id`, `amount`,`pdate`, `payment_id`) VALUES ('$bid','$amt','$day','$payment_id')");
    $d=mysqli_query($conn,"UPDATE `dbook` SET `stat`='5' WHERE `book_id`='$bid'");
}
?>