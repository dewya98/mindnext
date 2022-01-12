<?php  
session_start();
include "header.php";
$no=$_POST["no"];
$uploaddir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/";  
$fname=basename($_FILES["userfile"]["name"]);  
$uploadfile=$uploaddir.$fname;   
move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadfile); 
$title=$_POST["title"];
$content=$_POST["content"];
include "conn.php";
$sql="update inc set fname='$fname',title='$title',content='$content' where no='$no'"; 
$rs=mysqli_query($conn,$sql);
?>
<style>    
   h3{margin:5% 30%;font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
</style>
    <content>
     <h3>
        데이터베이스에 데이터 수정하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=inc.php">
    </content>
    <?php  include "footer.php"; ?>
