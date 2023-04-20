<?php
session_start();
include('connect.php');
$fi=$_POST["id"];
$em=$_SESSION["email"];
$cm=$_POST["cmt"];
if($cm=="")
{
    header("Location:dashboard.php");
}
mysqli_query($conn,"INSERT INTO comm(file,email,comment) VALUES('$fi','$em','$cm')");
header("Location:dashboard.php");
?>
