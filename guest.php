<?php
session_start();  
include "header.php"; 
?>
    <style>
    content{width: 70%;}       
      .title{margin-left:20%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding: 30px 0px 50px;font-size: 1.5em;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px}
 
        .typing{width:60%;position: relative;}
        textarea{border: 3px solid rgb(36,100,171);outline:none;font-size:1.1em}
        .reply{margin:20px;width: 60%;height:3.5em;padding: 5px;overflow:auto;}
        #btn{width:7em;height:3em;font-weight:bold;border-radius:1.4em;background-color:rgb(36,100,171);color:#fff;border: none;         
             position:absolute;top: 15px;}          
        #btn:hover{color: goldenrod;cursor: pointer;}
        .pager{width:60%;text-align: center;color: #b99c45;padding: 1em;}
        .pager>a>i{color: brown;}
        .replybox{position:absolute;top: 10px;right:10px;}
        span{float:right;margin-right: 10px;}
        .message{width:60%;border-bottom: 2px solid #ddd;padding:1% 0;position: relative;}
        .blue{color: rgb(36,100,171);}
        .red{color:crimson}
          h6{padding:0 2% 2%;font-family: sans-serif;font-size: large;}
          @media(max-width:767px){
            content{width: 100%;height: 50em;}
            .title{font-size:2.4em}       
            .title, .title-nav, .reply{margin-left:5%;width:100%} 
            .title-nav{padding-bottom:20px}
            .typing, .message, .reply{width:90%;padding:0 5%}
            .typing{position:static;}
            .typing>img{display:none}
            textarea{width:20em;}
            #btn{display:block;width:6em;position:static;margin-top:0}
            span, small{font-size:.7em}
           .message, .reply{font-size:.9em;padding:2% 0}
        }

       </style>
    <content>
      <div class="title">방명록</div>
      <div class="title-nav">
         <form name="frmsearch">
           <a href="index.php"><i class="fas fa-home"></i></a>
            <select name="opt">
                <option value="writer">작성자</option>
                <option value="content">내용</option>
                <option value="all">통합</option>
            </select>
            <input type="search" name="keyword" placeholder="검색어를 입력하세요">
            <input type="button" value="검색" onclick="search()">
          </form>
      </div> 
     <form name="frm1" method="post" action="">
         <?php 
         if(isset($_SESSION["id"])){ ?>
      <div class="typing">
           <img src="images/pen/2x/outline_create_black_24dp.png" alt="typing" width="7%" height="7%" style="vertical-align:top;">
            <textarea name="content" cols="100" rows="3" placeholder=" 인사말을 남겨보세요"></textarea>&ensp;
            <input type="button" value="글남기기" id="btn" onclick="gotoGuest()">
            <br><br>
            <hr>
       </div>
       <?php }else{ ?>
        <div class="typing">
           <img src="images/pen/2x/outline_create_black_24dp.png" alt="typing" width="7%" height="7%" style="vertical-align:top;">
            <textarea name="content" cols="100" rows="3" placeholder="&ensp;로그인 하시고 반가운 인사를 남겨보세요!" readonly></textarea>&ensp;
            <input type="button" value="로그인" id="btn" onclick="location.href='login.php'">
            <br><br>
            <hr>
       </div>
        <?php } ?>
        <?php 
         if(isset($_GET["page"])){
             $page=$_GET["page"];
             $group=ceil($page/5);
            }else{
                $page=1;
                $group=1;
            } 
            $startRow=($page-1)*5;
            include "conn.php";
            $sql2="select count(*) as cnt from guest";
            $rs2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($rs2);
            $cnt=$row2["cnt"];
            $pageCount=ceil($cnt/5);
            $groupCount=ceil($pageCount/5); 
            $sql="select * from guest order by no desc limit $startRow,5";
            $rs=mysqli_query($conn,$sql);
            $e=0;
            while($row=mysqli_fetch_array($rs)){ $e++; ?>
            <div class="message">
             <p><b><?php echo $row["writer"] ?></b> | <small><?php echo $row["writeday"] ?></small></p>
             <p><?php echo nl2br($row["content"]) ?></p>
             <?php 
             $no=$row["no"];
             $sqltot="select * from guest_re where g_no='$no'";
             $rstot=mysqli_query($conn,$sqltot);
             $tot=mysqli_num_rows($rstot);
             if($tot){
             $sqlre="select * from guest_re where g_no='$no'";
             $rsre=mysqli_query($conn,$sqlre); ?>
             <div class="reply">
            <?php     
            while($rowre=mysqli_fetch_array($rsre)){ ?>
            <p><b><?php echo $rowre["writer"] ?></b>(<?php echo $rowre["writeday"] ?>)&emsp; 
            <?php echo $rowre["content"]?>
            <?php 
            if(isset($_SESSION["id"])){
              if($_SESSION["id"]==$rowre["writer"] or $_SESSION["id"]=='admin'){ ?>
            <span>
              <a href="#" onclick="redel(<?php echo $rowre["no"] ?>,<?php echo $page ?>)"><small class="red">댓글삭제</small></a>
             </span> <?php }} ?>
            </p>
            <?php } ?>
             </div>
             <?php } ?>
             <?php if(isset($_SESSION["id"])){ ?> 
              <div class="replybox">
              <a href="#" onclick="send('redata<?php echo $e ?>',<?php echo $row['no'] ?>,<?php echo $page ?>)">
              <small class="blue">댓글쓰기</small></a>
              <?php if($_SESSION["id"]==$row["writer"] or $_SESSION["id"]=='admin'){ ?>
              <a href="#" onclick="del(<?php echo $row["no"] ?>,<?php echo $page ?>)"><small class="red">삭제</small></a>
              <? } ?>
              <a href="#" onclick="reclose()"><small>닫기</small></a>
             <div id="redata<?php echo $e ?>"></div>
             </div>
             <?php } ?>         
          </div>
          <?php } ?>
    <div class="pager">
         <?php 
            $startPage=($group-1)*5+1;
            $endPage=$startPage+4;
            if($group>1){
                $first=1;
                echo "<a href='guest.php?page=$first'> [〈〈 ] </a>";
                $prevPage=($group-2)*5+1;
                echo "<a href='guest.php?page=$prevPage'> [〈 ] </a>";
            }
            for($i=$startPage;$i<=$endPage;$i++){ 
                if($i>$pageCount){break;}  
                if($i==$page){
                    echo "<a href='guest.php?page=$i'><font color='firebrick'>[$i]</font></a>";
                }else{
                    echo "<a href='guest.php?page=$i'>[$i]</a>";
                }
            }
                if($group<$groupCount){ 
                    $nextPage=$group*5+1;
                echo "<a href='guest.php?page=$nextPage'>  [ 〉] </a>";
                $endPage=$pageCount;
                echo "<a href='guest.php?page=$endPage'> [ 〉〉] </a>";
            }
        ?>
    </div>
  </form>
</content>
<br><br>
<?php  include "footer.php"; ?>
<script>
    function send(p,g_no,page) {
        if(document.getElementById("redata1")){
        document.getElementById("redata1").innerHTML="";
        }
        if(document.getElementById("redata2")){
        document.getElementById("redata2").innerHTML="";
        }
        if(document.getElementById("redata3")){
        document.getElementById("redata3").innerHTML="";
        }
        if(document.getElementById("redata4")){
        document.getElementById("redata4").innerHTML="";
        }
        if(document.getElementById("redata5")){
        document.getElementById("redata5").innerHTML="";
        }
        document.getElementById(p).innerHTML=
        "<input type='text' name='re' size='80'><input type='hidden' name='g_no' value='"+g_no+"'><input type='hidden' name='page' value='"+page+"'><a href='#' onclick='resend()'>완료</a>";
    }
    function reclose(p,g_no) {
        if(document.getElementById("redata1")){
        document.getElementById("redata1").innerHTML="";
        }
        if(document.getElementById("redata2")){
        document.getElementById("redata2").innerHTML="";
        }
        if(document.getElementById("redata3")){
        document.getElementById("redata3").innerHTML="";
        }
        if(document.getElementById("redata4")){
        document.getElementById("redata4").innerHTML="";
        }
        if(document.getElementById("redata5")){
        document.getElementById("redata5").innerHTML="";
        }
    }

    function resend(){
        if(frm1.re.value==''){
            alert("내용을 입력하세요");
            frm1.re.focus();return false();
        }
        document.frm1.action="guest_re_ok.php";
        document.frm1.submit();
    }
    function del(no,page){
        if(confirm("삭제하시겠습니까?")){
            location.href="guest_del.php?no="+no+"&page="+page;
        }
    }   
    function redel(no,page){
        if(confirm("삭제하시겠습니까?")){
            location.href="guest_re_del.php?no="+no+"&page="+page;
        }
    }   
    function search(){
        if(frmsearch.keyword.value==''){
            alert("키워드를 입력하세요");
            frmsearch.keyword.focus();
            return false;
        }
    location.href="guest_search.php?opt="+frmsearch.opt.value+"&keyword="+frmsearch.keyword.value;
    }

    function gotoGuest() {
        if(frm1.content.value==''){
            alert("내용을 입력하세요");
            frm1.content.focus();return false;
        }
        document.frm1.action="guest_write_ok.php";
        document.frm1.submit();
    }
</script>
