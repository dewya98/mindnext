<?php
session_start();
include "header.php";
$no=$_GET["no"];
include "conn.php";
$sql="update inc set hit=hit+1 where no=$no";
$rs=mysqli_query($conn,$sql);
$sql="select * from inc where no=$no";
$rs=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($rs);
?>
<style>
  content{width: 70%;height: 50rem;}       
  .title{margin-left:20%;height: 100px;font-size: 3em;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.2em;margin-left: 20%;font-family:righteous;}
    .likes{float:right}
   table{width: 60%;margin-bottom: 2em;}
        table tr{height: 2em;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{background-color: rgb(36,100,171);color: #fff;}
        table tr:last-child>th{background-color:#fff;color: #fff;}
        .btn{padding: 5px 15px;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;line-height: 1.2rem;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
   .replyshow{margin:30px auto;width:56%;border:1px solid #ddd;padding:2%;} 
   .replyshow> .btn{font-size:0.7em;padding: 3px 10px;}    
   .reply{margin:30px auto;}  
   input[type=text]{font-size:1em}   
   .square{padding:6px 10px; text-align:center;line-height:20px;cursor:pointer;}
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
<!-- <script src="http://code.jquery.com/jquery-1.12.3.min.js"></script>
<script>
    $(function(){
        var idx=0;
        var point=document.getElementsByName("point[]");
        $("#m").click(function() {
           frm1.result.value=-1;
        });
        $("#p").click(function() {
           frm1.result.value=1;
        });
    })
</script> -->
<content>
   <div class="title">자료실</div>
   <div class="title-nav">
  <a href="inc.php">자료실</a> > <?php echo $row["title"] ?>
   <div class="likes">
   <?php
           $receiver=$row["writer"]; ?>
            <a href="inc-like.php?no=<?php echo $row["no"] ?>&result=1" class="square" ><i class="fas fa-heart"></i>
          <?php echo $row["likes"] ?>
          </a>
          <a href="inc-like.php?no=<?php echo $row["no"] ?>&result=-1" class="square" ><i class="far fa-heart"></i>좋아요 취소</a>
   </div>
</div>
    <table>
        <tr>
            <th>글제목</th>
            <td><?php echo $row["title"] ?></td>
        </tr>
            <tr>
            <th>작성자</th>
            <td><?php echo $row["writer"] ?></td>
        </tr>
            <tr>
            <th>작성일</th>
            <td><?php echo $row["writeday"] ?></td>
        </tr>
        <?php if($row["fname"]){ ?>
        <tr>
        <th>파일</th>
        <td>
        <a href="down.php?fname=<?php echo $row["fname"] ?>"><b>
            <?php echo $row["fname"] ?>
        </b></a>  
       </td>
        </tr> <?php } ?>
            <tr>
            <th>내용</th>
            <td><small><?php echo nl2br($row["content"]) ?></small></td>
        </tr>
        <tr>
            <th></th>
            <td>
            <input type="button" class="btn" value="게시판 메인" onclick="location.href='inc.php'">
            <?php if(isset($_SESSION["id"])){ 
                if($_SESSION["id"]==$row["writer"] or 'admin'){ ?>
            <input type="button" class="btn" value="게시글수정" onclick="location.href='inc_edit.php?no=<?php echo $row["no"] ?>'">
            <input type="button" class="btn" value="게시글삭제" onclick="del()"></td>
            <?php }} ?>
        </tr>
  </table>
  <?php
     $sql1="select * from inc_re where arti_no='$no'";
     $rs1=mysqli_query($conn,$sql1);
     $tot=mysqli_num_rows($rs1);
     if(isset($_SESSION["id"])){
         if($tot){ ?>
             <div class="replyshow">
                 <?php
             $sql2="select * from inc_re where arti_no='$no'";
             $rs2=mysqli_query($conn,$sql2);
             while($row2=mysqli_fetch_array($rs2)){ ?>
                 <p><?php echo $row2["writer"]."(".$row2["writeday"].") : ".$row2["content"] ?></p>
            <?php if($_SESSION["id"]==$row2["writer"] or 'admin'){ ?>
      <input type="button" value="댓글삭제" class="btn" 
      onclick="javascript:re_del(<?php echo $row2['no'] ?>,<?php echo $no ?>)"> 
      <?php }}}} ?>
    </div>
    <div class="reply" align="center">
        <?php
        if(isset($_SESSION["id"])){ ?>
       <form name="frm1" method="post" action="inc-re.php">
            <input type="text" name="content" size="50" required>
            <input type="hidden" name="no" value="<?php echo $row['no'] ?>">
            <input type="submit" value="댓글" class="btn"><br><br>
        </form>
        <?php } ?>
    </div>
</content>
<?php include "footer.php"; ?>
<script>
    function del(){
        if(confirm("삭제하시겠습니까?")){
            location.href="inc_del.php?no=<?php echo $row['no'] ?>&fname=<?php echo $row['fname'] ?>";
        }
    }

    function re_del(no,arti_no){
        if(confirm("삭제하시겠습니까?")){
            location.href="inc_reply_del.php?no="+no+"&arti_no="+arti_no;
        }
    }
</script>