<?php 
session_start();
include "header.php"; 
$title=$_POST["title"];
$writer=$_POST["writer"];
$writeday=date("Y-m-d");
$content=$_POST["content"];
$uploaddir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/";  
$uploadfile=$uploaddir.basename($_FILES["userfile"]["name"]);
$fname=basename($_FILES["userfile"]["name"]);
move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadfile);
include "conn.php";
$sql="insert into inc(title,writer,writeday,content,fname) 
values('$title','$writer','$writeday','$content','$fname')";
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
        <meta http-equiv="refresh" content="1;url=inc.php">

    </content>
    <?php  include "footer.php"; ?>
