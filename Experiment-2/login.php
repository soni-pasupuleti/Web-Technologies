<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Anuphan:wght@500&display=swap');
        body{
            font-family: 'Anuphan', sans-serif;
            background-image:url("ok1.jpg");
            background-size:     cover;                 
                background-repeat:   no-repeat;
                background-position: center center;
        }
        .container{
            border-radius:10px;
            margin:10%;
            margin-top:-5%;
            background-color:#CDF0EA;
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
        }
        .card{
            min-height:70vh;
            flex:1;
            background-color:#F9F9F9;
            padding:20px;
            box-shadow:1px 3px 18px rgba(0,0,0,0.3);
        }
        .card1{
            border-radius:10px 0px 0px 10px;
        }
        .card2{
            border-radius:0px 10px 10px 0px;
        }
        h2{
            margin:0;
            margin-left:4%;
        }
        input{
            font-family: 'Anuphan', sans-serif;
            margin:4%;
            padding:5px;
            width:400px;
            border-radius:5px;
            background-color:#FFFFFF;
        }
        #sub{
            padding:5px;
        }
        #sub:hover{
            cursor:pointer;
            font-size:20px;
        }
        a:hover{
            text-decoration:underline;
            cursor:pointer;
        }
        .cp{
            padding:10px;
            margin:2%;
            margin-left:5%;
            border-radius:8px;
            box-shadow:1px 3px 18px rgb(0,0,0,0.3);
        }
        </style>
</head>
<body>
    <span><img style="margin-bottom:7%;margin-left:22%;margin-left:40%" width="100px" height="60px" src="fb.png" alt=""></span>
    <span><img style="margin-top:2%;margin-bottom:5%;margin-left:0%;" width="200px;" height="100px" src="Facebook-Logo.png" alt=""></span>
    <div class="container">
            <div class="card card1">
                <h2 align="center">Best of all posts</h2>
                <hr>
                <?php
                include('connect.php');
                $loop=3;
                $checki=mysqli_query($conn,"SELECT * from images ORDER BY likes DESC");
                while($loop-->0 && $re=mysqli_fetch_array($checki))
                {
                ?>
                <div class="cp">
                <span><h4 style="margin:2%;margin-left:2%;"><?php echo $re["name"];?></h4></span>
                <span><h4 style="margin:2%;margin-top:-7%;margin-left:70%;"><?php echo "Likes:".$re["likes"];?></h4></span>
                <img style="width:300px;height:200px;margin-left:10%" src=<?php echo $re["file"];?> alt="">
                </div>
                <?php
                }
                ?>
            </div>
            <div class="card card2">
                <h1 align="center">Login Here</h1>
                <hr>
                <form action="logcheck.php" method="post">
                    <h2 align="left">Email:</h2>
                    <input type="email" name="email" placeholder="Enter valid email" required>
                    <h2 align="left">Password:</h2>
                    <input type="password" name="pwd" placeholder="Enter your password" required>
                    <input id="sub" style="background-color:green;color:white;" type="submit" name="submit" value="Log In">
                </form>
                <a style="text-decoration:none;margin-left:27%;" href="signup.php">No Account? Register Now!</a>
            </div>
    </div>
</body>
</html>