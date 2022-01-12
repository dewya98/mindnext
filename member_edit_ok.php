<?php 
session_start();
$name=$_POST["name"];
$id=$_POST["id"];
$pw=$_POST["pw"];
$email=$_POST["email"];
if(isset($_POST["hobby"])){
    $hobby=$_POST["hobby"];
    $cnt=count($hobby);
    $tot="";
    for($i=0; $i<$cnt;$i++){
        $tot=$tot.$hobby[$i]."/";
    }
}else{
    $tot="/";
}
$grade=$_POST["grade"];
$gender=$_POST["gender"];
include "conn.php";
$sql="update member
 set name = '$name',
 pw = '$pw',
 hobby = '$tot',
 email = '$email',
 grade = '$grade',
 gender = '$gender'
 where id='$id'";
$rs=mysqli_query($conn,$sql);
session_destroy();
 ?>
    <script>
     alert('정보가 수정되었습니다.재로그인 합니다');
     </script>

     <meta http-equiv="refresh" content="0;url=login.php">
