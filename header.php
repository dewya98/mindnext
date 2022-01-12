<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MindNext!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&family=Righteous&family=Stick+No+Bills:wght@800&family=Sunflower:wght@300&family=Black+Han+Sans&family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
*{margin: 0 auto;padding: 0;list-style: none;font-family: 'Sunflower', sans-serif;}
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
.logo:hover{animation: logo 1s infinite;}
@keyframes logo {
     0%{0} 
     33%{transform:rotateX(40deg);}
     66%{transform:rotateX(-10deg);}
     100%{0}  }
  
  .nav{width: 64%; height:50px;background-color: rgba(0, 0, 128, 0.349);display: flex;} 
  .nav a{width: 20%;height: 50px;line-height: 50px;text-align: center;color: white;font-weight: bold;}
  .nav a:hover{background-color: navy;color: goldenrod;}
 @media(max-width:767px){
    h1,h2{display:none;}
    h2{font-size:2em;} 
    header{height:200px}
    .head{height: 100px;padding-top:30px}
    .nav{width:100%;margin-top:20px;font-size:.9em}
    .nav a{flex:6}
           
        }
</style>
</head>
<body>
    <div class="top"> 
        <ul class="topmenu">
         <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
         <?php if(!isset($_SESSION["id"])){ ?>
            <li><a href="login.php"><i class="fas fa-toggle-on"></i> LogIn</a></li>
            <li><a href="signup.php"><i class="fas fa-edit"></i> SignUp</a></li>
           <li><a href="idfinder.php"><i class="fa fa-user"></i> ID/PW</a></li>
           <?php }else{ ?>
                <li></li>
            <li><a href="logout.php"><i class="fas fa-toggle-off"></i> LogOut</a></li>
            <li><a href="member_edit.php"><i class="fas fa-user"></i> My page</a></li>
            <?php } ?>
        </ul>
    </div>
    <header>
        <div class="head">
        <h1>Welcome to Mind Next</h1>
        <h2>마인드 넥스트에 오신 여러분을 환영합니다!</h2>
        <a href="index.php"> <div class="logo">Mind Next</div></a>
       </div>
        <div class="nav">
            <a href="notice.php">공지사항</a>
            <a href="qna.php">Q&A</a>
            <a href="inc.php">자료실</a>
            <a href="board.php">게시판</a>
            <a href="guest.php">방명록</a>
            <a href="photo.php">사진첩</a>
        </div>
    </header>
