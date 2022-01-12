<?php 
session_start();
$id=$_POST["id"];
$pw=$_POST["pw"];
include "conn.php";
$sql="select * from member where id='$id' and pw='$pw'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if($row["id"]){
    $_SESSION["id"]=$id;
    ?>
    <script>
     alert("환영합니다");
     </script>
     <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}else{
    ?>
    <script>
   alert("잘못 입력하셨습니다");
   history.back();
   </script>
   <?php
}
?>