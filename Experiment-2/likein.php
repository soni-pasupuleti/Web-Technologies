<?php
session_start();
include('connect.php');
$fi=$_POST["id"];
$ui=$_SESSION["email"];
$ct=mysqli_num_rows(mysqli_query($conn,"SELECT * from likes where email='$ui' AND file='$fi'"));
$prev=mysqli_fetch_array(mysqli_query($conn,"SELECT likes from images where file='$fi'"))[0];
if($ct%2==0)
{
    $prev++;
    mysqli_query($conn,"INSERT INTO likes(file,email) VALUES('$fi','$ui')");
}
else{
    $prev--;
    mysqli_query($conn,"DELETE FROM likes WHERE email='$ui' AND file='$fi'");
}
mysqli_query($conn,"UPDATE images set likes='$prev' where file='$fi'");
header("Location:dashboard.php");
?>