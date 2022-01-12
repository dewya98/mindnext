<?php 
session_start();
include "header.php"; 
$writer=$_SESSION["id"];
$writeday=date("Y-m-d[h:i:s]");
$content=$_POST["content"];
include "conn.php";
$sql="insert into guest(writer,writeday,content) 
values('$writer','$writeday','$content')";
mysqli_query($conn,$sql);
?>
<style>    
  content 
   h3{margin:5% 30%;font-size: 1.8em;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   
    </style>
    <content>
      
     <h3>여기까지 오신 것을 환영합니다.<br>
        데이터베이스에 안전히 데이터 입력하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=guest.php">

    </content>
    <?php  include "footer.php"; ?>
