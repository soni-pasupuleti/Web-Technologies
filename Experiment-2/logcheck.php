<?php
session_start();
include('connect.php');
$un=$_POST["email"];
$pw=$_POST["pwd"];
if(mysqli_num_rows(mysqli_query($conn,"SELECT * from users WHERE email='$un' AND password='$pw'"))>0)
{
    $_SESSION["uname"]=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM users where email='$un' AND password='$pw'"))[0];
    $_SESSION["email"]=$un;
    header("Location:dashboard.php");
}
else{
    echo "<script>alert('Invalid User Credentials.Please Sign Up first')</script>";
    header("refresh:0.1;url=http://localhost/fbook/login.php");
}
?>