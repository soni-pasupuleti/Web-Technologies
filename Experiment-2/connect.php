<?php
$host='localhost';
$username = 'soni';
$password = '';
$dbname='soni';
$conn=mysqli_connect($host,$username,$password,$dbname);
if($conn)
{
    #echo "Connection Successful.";
}
else{
    die("Connection failed".mysqli_connect_error());
}
?>