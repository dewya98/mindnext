<?php
session_start();
include "header.php";
$arti_no=$_POST["no"];
$content=$_POST["content"];
$writer=$_SESSION["id"];
$writeday=date("Y-m-d");
$point=$_POST["result"];
$receiver=$_POST["receiver"];
include "conn.php";
$sql="insert into inc_re(arti_no,content,writer,writeday) 
values($arti_no,'$content','$writer','$writeday')";
mysqli_query($conn,$sql);
$sqlpt="update inc set likes=likes+$point where no='$arti_no'";
mysqli_query($conn,$sqlpt);
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
        <meta http-equiv="refresh" content="1;url=inc-con.php?no=<?php echo $arti_no ?>">
    </content>
    <?php  include "footer.php"; ?>
