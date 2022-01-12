<?php  
session_start();
include "header.php";
$title=$_POST["title"];
$writer=$_POST["writer"];
$date=date("Y-m-d");
$uploaddir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/";  
$img=basename($_FILES["img"]["name"]);  
$uploadfile=$uploaddir.$img;   
move_uploaded_file($_FILES["img"]["tmp_name"],$uploadfile); 
$content=$_POST["content"];
$sort=$_POST["sort"];
include "conn.php";
$sql="insert into board(title,writer,date,img,content,sort) 
values('$title','$writer','$date','$img','$content','$sort')";
mysqli_query($conn,$sql);
?>
<style>    
   h3{margin:5% 30%;font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
</style>
<content>      
     <h3>여기까지 오신 것을 환영합니다.<br>
        데이터베이스에 안전히 데이터 입력하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=board.php">
    </content>
    <?php  include "footer.php"; ?>
