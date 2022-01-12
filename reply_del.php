<?php  
session_start();
$no=$_GET["no"];
$arti_no=$_GET["arti_no"];
include "header.php";
include "conn.php";
$sql="select * from board_re where no='$no'";
$rs=mysqli_query($conn,$sql);
$tot=mysqli_num_rows($rs);
if($tot){
$sqldel="delete from board_re where no='$no'"; 
$rs=mysqli_query($conn,$sqldel);
}
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
        데이터베이스에 데이터 삭제하고<br> 
        메인화면으로 이동합니다.</h3>
        <meta http-equiv="refresh" content="1;url=board-con.php?no=<?php echo $arti_no ?>">

    </content>
    <?php  include "footer.php"; ?>
