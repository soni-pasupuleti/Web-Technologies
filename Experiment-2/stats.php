<?php
session_start();
include("connect.php");
if(empty($_SESSION["uname"]))
{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap');
  body{
    font-family: 'Space Grotesk', sans-serif;
    background-color:#f7f7fc;
  }
  .container{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    padding:5px;
  }
  .box{
    margin:1%;
    padding:20px;
    background-color:#FFFFFF;
    min-height:80vh;
    border-radius:10px;
  }
  .box1{
    flex:1;
  }
  .box2{
    flex:5;
  }
  .ct{
    display:flex;
    flex-direction:column;
    flex-wrap:wrap;
  }
  .bx{
    padding:10px;
    margin:2%;
    border-radius:10px;
    width:80%;
  }
  .bx:hover{
    padding:10px;
    margin:2%;
    color:white;
    background-color:#654ce5;
    box-shadow:1px 3px 18px rgba(0,0,0,0.3);
    width:80%;
    cursor:pointer;
  }
  .bx a{
    margin-left:30%;
  }
  .bx a:hover{
    color:white;
  }
  .bx3{
    padding:10px;
    margin:2%;
    color:white;
    background-color:#654ce5;
    box-shadow:1px 3px 18px rgba(0,0,0,0.3);
    width:80%;
    cursor:pointer;
  }
  .bx.bx3 a{
    color:white;
  }
  .ctt{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .bxx{
    flex:1;
    margin:8%;
    margin-top:5%;
    padding:10px;
    border-radius:8px;
    box-shadow:1px 3px 18px rgba(0,0,0,0.1);
  }
  .bxx:hover{
    flex:1;
    margin:8%;
    margin-top:5%;
    padding:10px;
    border-radius:8px;
    box-shadow:1px 3px 18px rgba(0,0,0,0.3);
  }
  .g{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .tempi{
    margin:4%;
    padding:10px;
    box-shadow:1px 3px 18px rgba(0,0,0,0.5);
  }
</style>
</head>
<body>
<span><img style="margin-bottom:12%;" width="100px" height="60px" src="fb.png" alt=""></span>
    <span><img style="margin-top:-1%;margin-bottom:10%;margin-left:-1%;" width="200px;" height="100px" src="Facebook-Logo.png" alt=""></span>
    <h1 style="margin-top:-16%;" align="center">Great Stats, <a style="text-decoration:none;" href="upload.php"><b style="color:#654ce5;"><?php echo $_SESSION["uname"]."!";?></b></a></h1>
    <div class="container">
        <div class="box box1">
            <div class="ct">
                <div class="bx bx1"><a style="text-decoration:none;" href="dashboard.php">Feed</a></div>
                <div class="bx bx2"><a style="text-decoration:none;" href="upload.php">Upload</a></div>
                <div class="bx bx3"><a style="text-decoration:none;" href="stats.php">Stats</a></div>
                <div class="bx bx4"><a style="text-decoration:none;" href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="box box2">
            <div class="ctt">
                <div class="bxx bxx1">
                    <h2>Your views</h2>
                    <p>10,234</p>
                </div>
                <div class="bxx bxx2">
                    <h2>Your Likes</h2>
                    <p>
                    <?php
                    $em=$_SESSION["email"];
                    $rr=mysqli_query($conn,"SELECT sum(likes) from images WHERE email='$em'");
                    $lp=mysqli_fetch_array($rr)[0];
                    echo $lp;
                    ?>
                    </p>
                </div>
                <div class="bxx bxx3">
                    <h2 style="margin-bottom:0%;">Total posts</h2>
                    <p><?php
                    $em=$_SESSION["email"];
                    $rr=mysqli_query($conn,"SELECT count(file) from images WHERE email='$em'");
                    $lp=mysqli_fetch_array($rr)[0];
                    echo $lp;
                    ?>
                </p>
                </div>
            </div>
            <div class="lkk">
            <h1 align="center">Your Top Liked Posts</h1>
                <hr>
                <div class="g">
                <?php
                $temp=mysqli_query($conn,"SELECT * from images where email='$em' ORDER BY likes DESC");
                while($r=mysqli_fetch_array($temp))
                {
                    $um=$r["name"];
                    $lik=$r["likes"];
                    $fname=$r["file"];
                ?>
                <div class="tempi">
                <span><h3 style="margin:0;"><?php echo $um;?></h3></span>
                <span><h3 style="margin-right:0;margin-top:-7%;margin-left:80%;margin-bottom:0%;"><?php echo "Likes:".$lik?></h3></span>
                <p><?php echo $fname;?></p>
                <img width="350px" height="250px" src=<?php echo $fname;?> alt="">
                </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>