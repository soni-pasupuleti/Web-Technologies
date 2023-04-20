<?php
include('connect.php');
$usname=$_POST["uname"];
$email=$_POST["email"];
$pno=$_POST["phno"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$password=$_POST["pwd"];
$sql="INSERT INTO users(name,email,phone,gender,DOB,password) VALUES('$usname','$email','$pno','$gender','$dob','$password')";
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE Email='$email'"))>0)
{
    echo "<script>alert('An account with this email already existed.');</script>";
    header("refresh:0.1;url=http://localhost/fbook/login.php");
}
$upload=mysqli_query($conn,$sql);
if($upload)
{
    echo "<script>alert('Registered Successfully');</script>";
    header("refresh:0.1;url=http://localhost/fbook/login.php");
}
?>
