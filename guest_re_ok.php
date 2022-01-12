<?php 
session_start();
$content=$_POST["re"];
$g_no=$_POST["g_no"];
$page=$_POST["page"];
$writer=$_SESSION["id"];
$writeday=date("Y-m-d");
include "conn.php";
$sql="insert into guest_re(g_no,writer,writeday,content) values ($g_no,'$writer','$writeday','$content')";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="1;url=guest.php?page=<?php echo $page ?>">


