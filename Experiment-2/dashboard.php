<?php
session_start();
include('connect.php');
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
  .bx1{
    padding:10px;
    margin:2%;
    color:white;
    background-color:#654ce5;
    box-shadow:1px 3px 18px rgba(0,0,0,0.3);
    width:80%;
    cursor:pointer;
  }
  .bx.bx1 a{
    color:white;
  }
  #cd{
    width:300px;
    height:200px;
  }
  .ct{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .card{
    margin:5%;
    padding:15px;
    border-radius:8px;
    box-shadow:1px 3px 18px rgba(0,0,0,0.4);
    background-color:#f7f7fc;
  }
</style>
</head>
<body>
<span><img style="margin-bottom:12%;" width="100px" height="60px" src="fb.png" alt=""></span>
    <span><img style="margin-top:-1%;margin-bottom:10%;margin-left:-1%;" width="200px;" height="100px" src="Facebook-Logo.png" alt=""></span>
    <h1 style="margin-top:-16%;margin-left:15%;" align="center">Welcome <a style="text-decoration:none;" href="upload.php"><b style="color:#654ce5;"><?php echo $_SESSION["uname"];?></b></a>, Connect with Meta</h1>
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
            <h1 align="center">Your <b style="color:#654ce5;">Feed!</b></h1>
            <hr>
            <div class="ct">
              <?php
              $roww=mysqli_query($conn,"SELECT * from images order by imgid desc");
              while($row=mysqli_fetch_array($roww))
              {
                $imn=$row["imgid"];
                $file=$row["file"];
                $em=$row["email"];
                $nm=$row["name"];
              ?>
              <div class="card">
                  <b><span><?php echo $nm;?></span></b>
                  <br>
                  <span><?php echo $file;?></span>
                  <br>
                  <img id="cd" src=<?php echo $file;?> alt="">
                  <?php 
                  $p=mysqli_fetch_array(mysqli_query($conn,"SELECT likes from images where file='$file'"))[0];
                  ?>
                  <form id="oo" action="likein.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $file;?>">
                    <?php
                    $tt=$_SESSION["email"];
                    if(mysqli_num_rows(mysqli_query($conn,"SELECT * from likes WHERE email='$tt' AND file='$file'"))>0)
                    {
                    ?>
                    <span><button type="submit"><img width="25px" height="25px" src="like1.png" alt=""></button></span>
                    <?php
                    }
                    else{
                    ?>
                    <span><button type="submit"><img width="25px" height="25px" src="like2.png" alt=""></button></span>
                    <?php
                    }
                    ?>
                    <label for=""><?php echo $p;?></label>
                  </form>
                  <span><form style="width:300px;margin-left:15%;margin-top:-8%;" action="comment.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $file;?>">
                    <span><input name="cmt" id="" style="margin-left:10%;" type="text" placeholder="What are your thoughts!"></span>
                    <span><button id="fin" style="background-color:#EEEEEE;" type="submit" name="submit">Post</button></span>
                  </form>
                </span>
                <p>Comments Section:</p>
                <?php
                $rowi=mysqli_query($conn,"SELECT * from comm WHERE file='$file'");
                while($rowu=mysqli_fetch_array($rowi))
                {
                  $km=$rowu["email"];
                  $nm1=mysqli_fetch_array(mysqli_query($conn,"SELECT name from users where email='$km'"))[0];
                ?>
                <h4><?php echo $nm1;?></h4>
                <p style="margin-left:5%;"><?php echo $rowu["comment"]?></p>
                <?php
                }
                ?>
              </div>
              <?php
              }
              ?>
            </div>
        </div>
    </div>
</body>
</html>