
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
  .bx2{
    padding:10px;
    margin:2%;
    color:white;
    background-color:#654ce5;
    box-shadow:1px 3px 18px rgba(0,0,0,0.3);
    width:80%;
    cursor:pointer;
  }
  .bx.bx2 a{
    color:white;
  }
  .c1{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .cc{
    background-color:#f0f2f5;
    border-radius:10px;
    margin:2%;
    padding:15px;
  }
  .cc1{
    flex:1;
  }
  .cc2{
    flex:2;
  }
  .crd{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .crdd{
    margin:3%;
    padding:10px;
    box-shadow:1px 3px 18px rgba(0,0,0,0.5);
  }
  #in{
    width:300px;
    height:200px;
    margin-left:23%;
  }
</style>
</head>
<body>
<span><img style="margin-bottom:12%;" width="100px" height="60px" src="fb.png" alt=""></span>
    <span><img style="margin-top:-1%;margin-bottom:10%;margin-left:-1%;" width="200px;" height="100px" src="Facebook-Logo.png" alt=""></span>
    <h1 style="margin-top:-16%;margin-left:8%;" align="center">Heyy <a style="text-decoration:none;" href="upload.php"><b style="color:#654ce5;"><?php echo $_SESSION["uname"]."!";?></b></a> Wanna Upload?</h1>
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
            <div class="c1">
                <div class="cc cc1">
                <form action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br>
            <br>
            <input type="submit" value="Upload Image" name="submit1">
            </form>
                </div>
                <div class="cc cc2">
                    <h2 align="center">Your current Upload</h2>
                    <hr>
                <?php
                if(isset($_POST['submit1'])){
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    #echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                   # echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    $email=$_SESSION["email"];
                    $name=$_SESSION["uname"];
                    $li=0;
                    $file="uploads/".$_FILES["fileToUpload"]["name"];
                    $imgno=count(glob("uploads/*"));
                    $sql="INSERT INTO images(imgid,file,likes,name,email) VALUES('$imgno','$file','$li','$name','$email')";
                    $upload=mysqli_query($conn,$sql);
                    if($upload)
                    {
                        echo "<img id='in' src=$file alt='Uploaded Image'>";
                    }
                    else{
                        echo "Error occured";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                }}
                ?>
                </div>
            </div>
            <div class="c1">
                <div style="min-height:100vh;" class="cc cc1">
                    <h2 align="center">Your Previous Uploads</h2>
                    <div class="crd">
                        <?php
                        $em=$_SESSION["email"];
                        $k=mysqli_query($conn,"SELECT * from images WHERE email='$em'");
                        while($r=mysqli_fetch_array($k))
                        {
                        $fname=$r["file"];
                        $um=$_SESSION["uname"];
                        $lik=$r["likes"];
                        ?>
                        <div class="crd crdd">
                            <div class="temp">
                            <span><h3 style="margin:0;"><?php echo $um;?></h3></span>
                            <span><h3 style="margin-right:0;margin-top:-7%;margin-left:80%;margin-bottom:0%;"><?php echo "Likes:".$lik?></h3></span>
                            <p><?php echo $fname;?></p>
                            <img width="350px" height="250px" src=<?php echo $fname;?> alt="">
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>