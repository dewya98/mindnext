<?php
$conn=mysqli_connect("localhost","root","autoset","testdb");
for($i=0;$i<=150;$i++){
    $sql="insert into notice(title,writer,writeday,content) 
    values('공지사항테스트$i','관리자','2021-12-08','공지사항 테스트 중입니다.')";
mysqli_query($conn,$sql);
}
echo "입력완료";

?>