<?php
session_start();
include "header.php";
$q_no=$_POST["q_no"];
$title=$_POST["title"];
$content=$_POST["content"];
$secret=$_POST["secret"];
$writer=$_SESSION["id"];
$writeday=date("Y-m-d");
$step=$_POST["step"]+1;
include "conn.php";
$sql="insert into qna(q_no,title,content,secret,writer,writeday,step) 
values($q_no,'$title','$content','$secret','$writer','$writeday',$step)";
mysqli_query($conn,$sql);
?>
<style>    
   h3{margin:5% 30%;font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
</style>
    <content>
     <h3>
        데이터베이스에 데이터 입력하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=qna.php">
    </content>
    <?php  include "footer.php"; ?>
