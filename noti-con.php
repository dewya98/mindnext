<?php
session_start();
$no=$_GET["no"];
include "conn.php";
$sql="update notice set hit=hit+1 where no=$no";
$rs=mysqli_query($conn,$sql);
$sql="select * from notice where no=$no";
$rs=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($rs);

include"header.php";
?>
<style>
  content{width: 70%;height: 50rem;}       
  .title{margin-left:20%;height: 100px;font-size: 3em;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.2em;margin-left: 20%;font-family:righteous;}

   table{width: 60%;margin-bottom: 2em;}
        table tr{height: 2em;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{background-color: rgb(36,100,171);color: #fff;}
        table tr:nth-child(5)>th{background-color:#fff;color: #fff;}
        .btn{padding: 5px 15px;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;line-height: 1.2rem;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
        @media(max-width:767px){
            content{width: 100%;height: 50em;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            table{width:88%} 
            table td{font-size:.9em}
            {display:none}
            .pager{width:100%;height:30px}
        }

</style>
<content>
   <div class="title">Notice</div>
   <div class="title-nav">
  <a href="notice.php">공지사항</a> > <?php echo $row["title"] ?></div>
    <table>
        <tr>
            <th>글제목</th>
            <td><?php echo $row["title"] ?></td>
        </tr>
            <tr>
            <th>작성자</th>
            <td>관리자</td>
        </tr>
            <tr>
            <th>작성일</th>
            <td><?php echo $row["writeday"] ?></td>
        </tr>
            <tr>
            <th>내용</th>
            <td><small><?php echo nl2br($row["content"]) ?></small></td>
        </tr>
        <tr>
            <th></th>
            <td >
            <input type="button" class="btn" value="공지사항 메인" onclick="location.href='notice.php'">
            <?php if(isset($_SESSION["id"])){ 
                if($_SESSION["id"]=="admin"){ ?>
            <input type="button" class="btn" value="공지사항 수정" onclick="location.href='notice_edit.php?no=<?php echo $row["no"] ?>'">
            <input type="button" class="btn" value="공지사항 삭제" onclick="location.href='notice_del.php?no=<?php echo $row["no"] ?>'"></td>
            <?php }} ?>
        </tr>
  </table>
</content>
<?php include "footer.php"; ?>