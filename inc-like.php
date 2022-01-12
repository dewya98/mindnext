<?php
session_start();
$arti_no=$_GET["no"];
$writer=$_SESSION["id"];
$point=$_GET["result"];
$receiver=$_POST["receiver"];
include "conn.php";
$sqlpt="update inc set likes=likes+$point where no='$arti_no'";
mysqli_query($conn,$sqlpt);
?>
<meta http-equiv="refresh" content="0;url=inc-con.php?no=<?php echo $arti_no ?>">
