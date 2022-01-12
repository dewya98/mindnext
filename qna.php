<?php
session_start();
include "header.php"; ?>
<style>
    content{width: 70%;}       
      .title{margin-left:20%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px}
 
        table{width: 60%;margin-bottom: 2rem;border-bottom:1px solid #999}
        table tr{height: 3rem;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{color: rgb(36,100,171);border-top: 3px solid rgb(36,100,171);background-color: #eee;}

        .typing{margin: 1% 20% 4%;}
        .text{border: 3px solid rgb(36,100,171);margin-left: 1%;width: 75%;height:6em;display:inline-block;padding:15px}
        .text>input[type=text]{border:none;background-color:#eee;height:2em;width:20em}
        .btn{width:7em;height:3em;font-weight:bold;border-radius:1.4em;background-color:rgb(36,100,171);color:#fff;border: none;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
        .pager{width: 60%;text-align: center;color: #b99c45;padding-bottom: 1em;}
        .pager>a>i{color: brown;}
        .pager>a:hover{color: brown;}
        textarea{border:2px solid rgb(36,100,171);outline:none;font-size:1.1em;margin-top:10px}
        .typing{width:50%;margin: 20px auto 50px;}
        @media(max-width:767px){
            content{width: 100%;height: 50em;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            table{width:88%} 
            table th{font-size:1em}
            table td{font-size:.9em}
            table th:first-child, table td:first-child,
            table th:last-child, table td:last-child
            {display:none}
            .typing{width:84%;padding:0 8%;font-size:.7em}
            .typing img{display:none}
            .text{height:9em;width:90%}
            .text input[type=text]{width:80%;display:inline-block;margin-right:0px}
            textarea{width:90%;margin-top:0}
            label{display:block}
            .btn{display:block;width:6em}
        }
    </style>
    <content>
        <div class="title">Q&A</div>
        <form name="frm1">
        <div class="title-nav">
            <a href="index.php"><i class="fas fa-home"></i></a>
            <select name="opt">
                <option value="title">제목</option>
                <option value="writer">작성자</option>
                <option value="content">내용</option>
                <option value="all">통합</option>
            </select>
            <input type="search" name="keyword" placeholder="검색어를 입력하세요">
            <input type="button" value="검색" onclick="search()">
            </form>
        </div> 
        <table>
          <tr>
             <th>번호</th>
             <th>제목</th>
             <th>작성자</th>
             <th>날짜</th>
             <th>조회수</th>
          </tr>
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
            $sql1="select count(*) as cnt from qna";
            $rs1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($rs1);
            $cnt=$row1["cnt"];
            $pageCount=ceil($cnt/5);
            $groupCount=ceil($pageCount/5);
            $sqlsec="SELECT secret FROM qna";
            $rssec=mysqli_query($conn,$sqlsec);
            $rowsec=mysqli_fetch_array($rssec);
            $sql="select * from qna order by q_no desc,no asc limit $startRow,5";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($rs)){ ?>
            <tr>
             <td><?php echo $row["q_no"] ?></td>
             <td>
                 <?php $space=$row["step"]*4;
             for($i=0;$i<$space;$i++){
                 echo "&nbsp;" ;
                } 
                if($space !=0 ){
                    echo "&rdsh;";
                } 
             ?>
            <?php if($row["secret"]=='1'){ 
        if(!isset($_SESSION["id"])){ ?>
            비밀글입니다. 
       <?php }else{ 
        if($_SESSION["id"]==$row["writer"] or $_SESSION["id"]=='admin'){ ?>
                <a href="qna-con.php?no=<?php echo $row["no"] ?>&secret=<?php echo $row["secret"] ?>">
                    비밀글입니다.</a> 

       <?php }elseif($_SESSION["id"]!==$row["writer"] or $_SESSION["id"]!=='admin'){ ?>
                비밀글입니다. <?php }}
             }elseif($row["secret"]=='0'){ ?> 
            <a href="qna-con.php?no=<?php echo $row["no"] ?>&secret=<?php echo $row["secret"] ?>">
             <?php echo $row["title"] ?></a></td> <?php } ?>
             <td><?php echo $row["writer"] ?></td>
             <td><?php echo $row["writeday"] ?></td>
             <td><?php echo $row["hit"] ?></td>
          </tr>
          <?php } ?>
        </table>
        <div class="pager">
            <?php
            $startPage=($group-1)*5+1;
            $endPage=$startPage+4;
            if($group>1){
                $first=1;
                echo "<a hfef='qna.php?page=$first'>[〈〈 ]</a>";
                $prevPage=($group-2)*5+1;
                echo "<a href='qna.php?page=$prevPage'>[〈 ]</a>";
            }
            for($i=$startPage;$i<=$endPage;$i++){
             if($i>$pageCount){break;}
             if($i==$page){
                 echo "<a href='qna.php?page=$i'><font color='firebrick'>[$i]</font></a>";
             }else{
                echo "<a href='qna.php?page=$i'>[$i]</a>";
                }
          }
            if($group<$pageCount){
                $nextPage=$group*5+1;
                echo "<a href='qna.php?page=$nextPage'>[ 〉]</a>";
                $last=$pageCount;
                echo "<a href='qna.php?page=$last'>[ 〉〉]</a>";
            } ?>
        </div>
        <?php 
        if(isset($_SESSION["id"])){ ?>
        <div class="typing">
            <form name="ask" method="post" action="ask_ok.php">
            <img src="images/help/2x/outline_help_outline_black_24dp.png" alt="typing" width="7%" height="7%" style="vertical-align:top;">
            <div class="text">
                제목: <input type="text" name="q_title"> 
                <label for="secret"> 비밀글: <input type="checkbox" name="secret" value="1" id="secret"></label><br>
                &emsp;&emsp; <textarea cols="70" rows="2" placeholder="문의사항 남기기" name="quest"></textarea>
            </div> &ensp;
            <input type="button" value="문의하기" class="btn" onclick="inquiry()">
        </form>
        </div>
        <?php }else{ ?>
            <div class="typing">
            <img src="images/pen/2x/outline_create_black_24dp.png" alt="typing" width="5%" height="5%" style="vertical-align:top;">
            <textarea name="content" cols="70" rows="2" placeholder="&ensp;로그인 하시면  문의사항을 남기실 수 있습니다." readonly></textarea>&ensp;
            <input type="button" value="로그인" class="btn" onclick="location.href='login.php'">
            </div>
            <?php } ?>
    </content>
    <?php  include "footer.php"; ?>
    <script>
        function search(){
            if(frm1.keyword.value==''){
                alert("키워드를 입력하세요");
                frm1.keyword.focus();
                return false;
            }
            location.href="qna_search.php?opt="+frm1.opt.value+"&keyword="+frm1.keyword.value;
        }
        
        function inquiry(){
            if(ask.q_title.value==''){
                alert("제목을 입력하세요");
                ask.q_title.focus();
                return false;
            }
            if(ask.quest.value==''){
                alert("질문하실 내용을 적어주세요");
                ask.quest.focus();
                return false;
            }
            document.ask.submit();
        }
    </script>
