<?php  
session_start();
$no=$_GET["no"];
$filename=$_GET["fname"];
$file_dir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/".$filename;

if(file_exists($file_dir)){
	unlink($file_dir);
}

include "header.php";
include "conn.php";
$sql="select * from inc where no='$no'";
$rs=mysqli_query($conn,$sql);
$tot=mysqli_num_rows($rs);
if($tot){
$sqldel="delete from inc where no='$no'"; 
$rs=mysqli_query($conn,$sqldel);
}
?>
<style>    
   h3{margin:5% 30%;font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
    </style>
    <content>
      
     <h3>
        데이터베이스에 데이터 삭제하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=inc.php">

    </content>
    <?php  include "footer.php"; ?>
