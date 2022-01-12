<?php
session_start();
$no=$_GET["no"];
$secret=$_GET["secret"];
include "conn.php";
$sql="update qna set hit=hit+1 where no=$no";
$rs=mysqli_query($conn,$sql);
$sql="select * from qna where no=$no";
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
   .replyshow{margin:30px auto;width:56%;border:1px solid #ddd;padding:2%;} 
   .replyshow> .btn{font-size:0.7em;padding: 3px 10px;}    
   .typing{margin: 1% 20% 4%;}
        .text{border: 3px solid rgb(36,100,171);margin-left: 1%;width: 75%;height:6em;display:inline-block;padding:15px}
        .text>input[type=text]{border:none;background-color:#eee;height:2em;width:20em}
   input[type=text]{font-size:1em}   
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
   <div class="title">Q&A</div>
   <div class="title-nav">
  <a href="qna.php">Q&A</a> > <?php echo $row["title"] ?></div>
    <table>
        <tr>
            <th>제목</th>
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
            <tr>
            <th>내용</th>
            <td><small><?php echo nl2br($row["content"]) ?></small></td>
        </tr>
        <tr>
            <th></th>
            <td >
            <input type="button" class="btn" value="Q&A 메인" onclick="location.href='qna.php'">
            <?php if(isset($_SESSION["id"])){ 
             if($_SESSION["id"]==$row["writer"] or 'admin'){ ?>
            <input type="button" class="btn" value="삭제" onclick="location.href='qna_del.php?no=<?php echo $row["no"] ?>'"></td>
            <?php }}  ?>
        </tr>
  </table>
  <!-- <div class="replyshow">
     <?php if($_SESSION["id"]==$row2["writer"] or 'admin'){ ?>
      <input type="button" value="댓글삭제" class="btn" 
      onclick="javascript:re_del(<?php echo $row2['no'] ?>,<?php echo $no ?>)"> 
      <?php } ?>
    </div> -->
    <div class="typing">
        <?php
        if(isset($_SESSION["id"])){ 
            if(($_SESSION["id"]=="admin")){?>
         <img src="images/reply/2x/outline_reply_black_24dp.png" alt="reply" width="7%" height="7%" style="vertical-align:top;">
            <div class="text">
       <form name="frm1" method="post" action="qna-re.php">
           제목: <input type="text" name="title" size="80" required> 
           <input type="hidden" name="secret" value="<?php echo $secret ?>"><br><br>
           &emsp;&emsp; <textarea cols="110" rows="3" placeholder="답변" name="content"></textarea>
            <input type="hidden" name="q_no" value="<?php echo $row['q_no'] ?>">
            <input type="hidden" name="step" value="<?php echo $row['step'] ?>">
            </div>
            &nbsp;<input type="submit" value="답변" class="btn">
        </form>
        
        <?php } } ?>
    </div>

</content>
<?php include "footer.php"; ?>
<script>
    function send(q_no,step){
        location.href="qna-re.php?p_no="+p_no+"&step="+step;
    } 

    function del(){
        if(confirm("삭제하시겠습니까?")){
            location.href="qna_del.php?no=<?php echo $row['no'] ?>";
        }
    }

    function re_del(no,q_no){
        if(confirm("삭제하시겠습니까?")){
            location.href="qna_reply_del.php?no="+no+"&q_no="+q_no;
        }
    }
</script>