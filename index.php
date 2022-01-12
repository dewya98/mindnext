<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindnext</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&family=Righteous&family=Stick+No+Bills:wght@800&family=Sunflower:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="icon" href="data:;base64,iVBORw0KGgo=">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="index.js" defer="defer"></script>
</head>
<body>
  <div id="m-header">
    <div class="ham"><i class="fas fa-bars"></i></div>
    <div class="btnClose"><i class="fas fa-times"></i></div>
    <div class="m-logo">        
    <a class="logo" href="#">Mind Next</a>
    </div>
  </div>  
    <div class="weather"
     style="padding:0 19%;display:flex;width:62%;height:80px;color:#555;background:linear-gradient(to top,#fff,#E0FFFF">
    <div id="cityName" style="width:30%;margin:0 10px;line-height:60px;height:60px;font-weight: bold;font-size:1.1em;color:slategrey;">부산</div>
    <span id="temp" style="line-height:60px;font-size: 1.2em;color:royalblue">5°C</span>
    <!-- <span id="main"></span> -->
    <img id="image" src="https://openweathermap.org/img/wn/02n@2x.png">
    <marquee id="discription">좋은 하루 보내세요!</marquee>
   </div>
      <script>
      const cityName = document.querySelector("#cityName");
      const Temp = document.querySelector("#temp");
      const main = document.querySelector("#main");
      const discription = document.querySelector("#discription");
      const image = document.querySelector("#image");

      weatherUpdate = (cityName) => {
        const xhr = new XMLHttpRequest();
        xhr.open(
          "GET",
          `https://api.openweathermap.org/data/2.5/weather?q=Busan&appid=f2b0261c342217769fd8bed9526c4efe`);
        xhr.send();
        xhr.onload = () => {
          if (xhr.status === 404) {
            alert("Place not found");
          } else {
            var data = JSON.parse(xhr.response);
            cityName.innerHTML = data.name;
            Temp.innerHTML = `${Math.round(data.main.temp - 273.15)}°C`;
            main.innerHTML = data.weather[0].main;
            discription.innerHTML = data.weather[0].description;
            image.src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
          }
        };
      };

      weatherUpdate("Busan");
      </script>
    <div class="menu">
     <div id="top">
        <ul class="topmenu">
            <?php if(!isset($_SESSION["id"])){ ?>
            <li><a href="login.php"><i class="fas fa-toggle-on"></i> LogIn</a></li>
            <li><a href="signup.php"><i class="fas fa-edit"></i> SignUp</a></li>
            <li><a href="idfinder.php"><i class="fa fa-user"></i> ID/PW</a></li>
            <?php }else{ ?>
                <li>&ensp;</li>
            <li><a href="logout.php"><i class="fas fa-toggle-off"></i> LogOut</a></li>
            <li><a href="member_edit.php"><i class="fas fa-user"></i> My page</a></li>
            <?php } ?>
        </ul>
     </div>
      
     <div id="navbar">
        <a class="logo" href="#">Mind Next</a>
        <ul class="nav">
            <li><a href="notice.php">Notice</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="guest.php">Guest</a></li>
            <li><a href="qna.php">Q&A</a></li>
            <li><a href="inc.php">Inc</a></li>
            <li><a href="photo.php">photo</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
     </div>
   </div>
    <div id="content">
        <div class="box" id="b1">
               <ul class="imgs">
                   <li><img src="images/coding1.jpg" alt="" ></li>
                   <li><img src="images/coding.jpg" alt="" ></li>
                   <li><img src="images/sea.jpg" alt=""></li>
                </ul>
               <div class="slide-title">Mind Next</div>
   
            <div class="slidemenu">
            <button><a href="greetings.php">인사말</a></button> &nbsp;&nbsp;
            <button><a href="profile.php">프로필</a></button>
           </div> 
        </div>

        <div class="box1" id="b2">
           <div class="frame1">
             <h3>공지사항</h3>
             <div class="title">
             <?php 
             include "conn.php";
             $sql="select * from notice order by no desc limit 3";
             $rs=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($rs)){ 
                  echo $row["title"]. "<br><br>" ;} ?>
            </div>
             &nbsp; <i class="fas fa-heart"></i> 
             <i class="fas fa-list"></i>             
             <?php 
                $sql="select * from notice";
                $rs=mysqli_query($conn,$sql);
                $cnt=mysqli_num_rows($rs);
                echo $cnt?>&ensp;
             <i class="fas fa-share-square"></i>   
          </div>
          <div class="frame2"><a href="notice.php">more + </a></div>
        </div>
        
        <div class="box1" id="b3">
          <div class="frame1">
             <h3>게시판</h3>
             <div class="title">
             <?php 
             include "conn.php";
             $sql="select * from board order by no desc limit 3";
             $rs=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($rs)){ 
                  echo $row["title"]. "<br><br>" ;} ?>
             </div>
             &nbsp; <i class="fas fa-heart"></i>&nbsp; 
             <i class="fas fa-list"></i>             
             <?php 
                $sql="select * from board_re";
                $rs=mysqli_query($conn,$sql);
                $cnt=mysqli_num_rows($rs);
                echo $cnt?>&ensp;
             <i class="fas fa-share-square"></i>   
           </div>
          <div class="frame2"><a href="board.php">more + </a></div>
        </div>

        <div class="box1" id="b4">
            <div class="frame1">
              <h3>질문과 답변</h3>
              <div class="title">
              <?php 
             include "conn.php";
             $sql="select * from qna order by q_no desc, no asc limit 3";
             $rs=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($rs)){
                if($row["secret"]=='1'){ ?>
                        비밀글입니다.<br><br>
                 <?php }if($row["secret"]=='0'){ 
                  echo $row["title"]. "<br><br>" ;}} ?>
                </div>
              &nbsp; <i class="fas fa-heart"></i>&nbsp;
              <i class="fas fa-list"></i>              
              <?php 
                $sql="select * from qna";
                $rs=mysqli_query($conn,$sql);
                $cnt=mysqli_num_rows($rs);
                echo $cnt?>&ensp;
              <i class="fas fa-share-square"></i>    
            </div>
            <div class="frame2"><a href="qna.php">more + </a></div>
        </div>

        <div class="box" id="b5">
            <a href="portfolio.php"><h2>포트폴리오</h2></a>
            <div class="circle">
                <div class="circles"><a href="haeun/haeun.html" target="_blank">
                    <img src="images/haeunlogo.png" alt="">
                    <h4>해운대중학교</h4></a></div>
                <div class="circles"><a href="dah/index.php" target="_blank">
                <img src="images/뮤지엄다로고_blue.jpg">
                    <div class="capt"><h4>뮤지엄 다</h4></a></div></div>
                <div class="circles"><a href="tour/index.html" target="_blank">
                    <img src="images/tourlogo.png" alt="">
                    <h4>간다투어</h4></a></div>
           </div>

        </div>
        <div class="box1" id="b6">
            <div class="frame1">
              <h3>자료실</h3>
              <div class="title">
              <?php 
             include "conn.php";
             $sqllike="select sum(likes) as cnt, likes from inc";
             $rslike=mysqli_query($conn,$sqllike);
             $rowlike=mysqli_fetch_array($rslike);
             $likes=$rowlike["cnt"];
             $sql="select * from inc order by no desc limit 3";
             $rs=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($rs)){ 
                  echo $row["title"]. "<br><br>" ;} ?>
                </div>
              &nbsp; <i class="fas fa-heart"></i> <?php echo $likes ?>&ensp;
              <i class="fas fa-list"></i>              
              <?php 
                $sql="select * from inc";
                $rs=mysqli_query($conn,$sql);
                $cnt=mysqli_num_rows($rs);
                echo $cnt?>&ensp;
               <i class="fas fa-share-square"></i>
            </div>
            <div class="frame2"><a href="inc.php">more + </a></div>
        </div>

        <div class="box" id="b7">
           <div class="side"><p>방<br>명<br>록</p></div>
           <ul class="guest">
            <a href="guest.php"><i class="fas fa-ellipsis-v"></i></a>
            <?php 
             include "conn.php";
             $sql="select * from guest order by no desc limit 5";
             $rs=mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($rs)){ ?>
                 <li><a href="guest.php"><?php echo $row["content"] ?></a> <?php } ?>
           </ul>
        </div>

        <div class="box" style="overflow:hidden;" id="b8">
            <div class="video1">
        <iframe width="432px" height="213px" src="https://www.youtube.com/embed/XvUp6osI_Gw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>          </div>
       </div>
        <div class="box" style="overflow:hidden;" id="b9">
            <div class="video1">
            <iframe width="432" height="213" src="https://www.youtube.com/embed/BDoWwnvpDsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="box1" id="b10">
            <div class="frame1">
                <h3>사진첩</h3>
                <div class="title">사진업로드</div>
                &nbsp; <i class="fas fa-heart"></i> <i class="fas fa-film"></i> <i class="fas fa-share-square"></i>   
              </div>
             <div class="frame2"><a href="photo.php">more +</a></div>
        </div>

        <div class="box1" id="b11">
            <a href=""><span class="snstag1">facebook</span><img src="images/fblogo.png"></a>
        </div>
        <div class="box1" id="b12">
            <a href=""><span class="snstag2">twitter</span><img src="images/twitterlogo.png" alt="twitterlogo"></a>
        </div>
        <div class="box1" id="b13">
            <a href="https://youtu.be/JpL_kyYWXfQ"><span class="snstag3">YouTube</span><img src="images/youtubeicon.png" alt="youtubeicon"></a>
        </div>
        <div class="box1" id="b14">
           <a href=""><span class="snstag4">Instagram</span><img src="images/instalogo.jpg" alt="instalogo"></a> 
        </div>
        <div class="box1" id="b15">
           <a href=""><span class="snstag5">blog</span><img src="images/bloglogo.jpg" alt="bloglogo"></a> 
        </div>
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
              <a href=""><i class="fab fa-instagram-square"></i></a>&nbsp; 
              <a href=""><i class="fab fa-facebook"></i></a>&nbsp;
              <a href=""><i class="fab fa-twitter-square"></i></a>&nbsp;
              <a href=""><i class="fab fa-youtube"></i></a> <br><br>
             <h6>If you have any doubts, questions, inquiries or simply, you want to chat about our products, <br>
              don’t hesitate to contact our Support Team - <a href="qna.php"> support@dewya98.cafe24.com</a></h6>
             </div>
        </div>  
     </footer>
</body>
</html>
