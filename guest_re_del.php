<?php  
session_start();
$no=$_GET["no"];
$page=$_GET["page"];
include "conn.php";
$sql="delete from guest_re where no='$no'"; 
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="1;url=guest.php?page=<?php echo $page ?>">

