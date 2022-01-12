<?php 
session_start();
$content=$_POST["content"];
$date=$_POST["date"];
$writeday=date("Y-m-d");
$uploaddir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/";  
$uploadfile=$uploaddir.basename($_FILES["img"]["name"]);
$img=basename($_FILES["img"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"],$uploadfile);
include "conn.php";
$sql="insert into photo(date,writeday,content,img) 
values('$date','$writeday','$content','$img')";
mysqli_query($conn,$sql);
?>
 <meta http-equiv="refresh" content="4;url=photo.php">
