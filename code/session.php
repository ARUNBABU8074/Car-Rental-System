<?php
session_start();
if(!(isset($_SESSION['username']))){
    header("location:index.php");
}
else{
    $username = $_SESSION['username'];
}
?>