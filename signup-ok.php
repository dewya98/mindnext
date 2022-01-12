<?php
session_start();
$name=$_POST["name"];
$id=$_POST["id"];
$pw=$_POST["pw"];
$grade=$_POST["grade"];
$gender=$_POST["gender"];
$email1=$_POST["email1"];
$email2=$_POST["email2"];
$email=$email1."@".$email2;
if(isset($_POST["hobby"])){
    $hobby=$_POST["hobby"];
    $cnt=count($hobby);
    $tot="";
    for($i=0; $i<$cnt;$i++){
        $tot=$tot.$hobby[$i]."/";
    }
}else{
    $tot="/";
}
include "conn.php";
$sql="insert into member(name,id,pw,grade,email,gender,hobby) 
    values('$name','$id',$pw,'$grade','$email','$gender','$tot')";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>인사말</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&family=Righteous&family=Stick+No+Bills:wght@800&family=Sunflower:wght@300&family=Black+Han+Sans&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
*{margin: 0 auto;padding: 0;list-style: none;font-family:'Sunflower', sans-serif;}
a{text-decoration: none;color: inherit;font-family: inherit;}
 a:hover{color:goldenrod }

 .top{height: 30px;background-color: #eee;}
 .topmenu{width: 390px;float: right;}
 .topmenu>li{width: 80px; float: left;text-align: center;font-size: 0.8em;line-height: 30px;color:rgb(150, 135, 99);
             font-weight: bold;font-family: 'Righteous', cursive;}
 header{height: 350px;background:linear-gradient(90deg,rgb(36,100,171),rgb(42, 165, 160));color: white;
        text-align: center;line-height: 60px;position: relative;}
  .head{height:250px; padding-top: 50px;}
   h1{font-size: 4rem;}
   .logo{width: 250px;height: 100px;text-align: center; ;font-size: 4rem;
     background: -webkit-linear-gradient(#eee, #333);line-height: 100px;
    -webkit-background-clip: text;-webkit-text-fill-color: transparent;
    text-shadow:0px 3px 0px #b2a98f,0px 14px 10px rgba(0,0,0,0.15),
    0px 24px 2px rgba(0,0,0,0.1),0px 34px 30px rgba(0,0,0,0.1);
    font-family: 'Stick No Bills', sans-serif;
       }
  .nav{width: 64%; height:50px;background-color: rgba(0, 0, 128, 0.349);display: flex;} 
   .nav a{width: 20%;height: 50px;line-height: 50px;text-align: center;color: white;font-weight: bold;}
    .nav a:hover{background-color: navy;color: goldenrod;}
    
  .content{width: 64%; height: 570px;background: url(images/sky2.jpg) no-repeat ;background-size:cover;padding-top: 70px;}
   .welcome{width: 500px;height: 300px;margin-top: 70px;margin-left:30%;background-color: rgba(255,255,255,0.5);text-align: center;}
   h3{font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   h4{font-size: 1.8rem;font-weight: bold;color: rgb(36,100,171); padding: 13% 0;}
   
    .footer{background-color: #263343;color: #eee;text-align: left;padding: 2% 0;height: 140px;}
    h5{font-size: 1.3rem;}
    .info{width: 30%;color: #eee;float: left;padding-left:18%;font-family: sans-serif;}  
    .support{width: 50%;color: #eee;float: right;font-size:large;}   
    .support i{font-size: 1.2rem;}
    </style>
</head>
<body>
    <div class="top">
        <ul class="topmenu">
         <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
         <li><a href="login.php"><i class="fas fa-toggle-on"></i> LogIn</a></li>
         <li><a href="signup.php"><i class="fas fa-edit"></i> SignUp</a></li>
         <li><a href="idfinder.php"><i class="fa fa-user"></i> ID/PW</a></li>
        </ul>
    </div>
    <header>
        <div class="head">
        <h1>Welcome to Mind Next</h1>
        <h2>마인드 넥스트에 오신 여러분을 환영합니다!</h2>
        <div class="logo">Mind Next</div>
       </div>
        <div class="nav">
            <a href="notice.html">공지사항</a>
            <a href="qna.html">Q&A</a>
            <a href="inc.html">자료실</a>
            <a href="board.html">자유게시판</a>
            <a href="guest.html">방명록</a>
            <a href="photo.html">사진첩</a>
        </div>
    </header>
    <div class="content">
        <div class="welcome"> 
        <h4>마인드 넥스트의<br>
        새로운 가족이 되신 것을<br> 
        축하합니다!<br><br>
        로그인화면으로 이동합니다.</h4>
      </div>
        <meta http-equiv="refresh" content="2;url=login.php">

    </div>
    <footer>
       <div class="footer">
          <div class="info">
             <h5>마인드넥스트</h5><br>
             대표: 김영아 <br>
             고객센터:080-700-7979<br>
             주소: 부산시 해운대구 해운대로123번길 456
          </div>
          <div class="support">
             <h5>FOLLOW US ON SOCIAL MEDIA</h5><br>
             <i class="fab fa-instagram-square"></i> <i class="fab fa-facebook"></i> <i class="fab fa-twitter-square"></i> <i class="fab fa-youtube"></i> 
            <p>If you have any doubts, questions, inquiries or simply, you want to chat about our products, <br>
             don’t hesitate to contact our Support Team - support@dewya98.cafe24.com</p>
            </div>
       </div>  
    </footer>
</body>
</html>
