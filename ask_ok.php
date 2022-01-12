<?php  
session_start();
include "header.php";
$title=$_POST["q_title"];
$content=$_POST["quest"];
if(isset($_POST["secret"])){
      $secret='1';
}else{
      $secret='0'; 
}
$step=0;
$writeday=date("Y-m-d");
$writer=$_SESSION["id"];
include "conn.php";
$sql="select ifnull(max(q_no),0)+1 as q_no from qna";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$q_no=$row["q_no"];
$sql="insert into qna(title,content,secret,writeday,writer,step,q_no) 
      values('$title','$content','$secret','$writeday','$writer',$step,$q_no)";
$rs=mysqli_query($conn,$sql);

?>
<style>    
  content 
   h3{margin:5% 30%;font-size: 1.8rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(rgb(209, 209, 209), rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   
  .footer{background-color: #263343;color: #eee;text-align: left;padding: 2% 0;height: 140px;}
       h5{font-size: 1.3rem;}
       .info{width: 30%;color: #eee;float: left;padding-left:18%;font-family: sans-serif;}  
       .sns{width: 50%;color: #eee;float: right;font-size:large;}   
       .sns i{font-size: 1.2rem;}
         
    </style>
    <content>
      
     <h3>
        데이터베이스에 데이터 입력하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=qna.php">

    </content>
    <?php  include "footer.php"; ?>
