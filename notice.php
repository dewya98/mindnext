<?php  
session_start();
include "header.php";
?>
<style> 
    content{width: 70%;height: 50rem;}       
      .title{margin-left:20%;height: 100px;font-size: 3em;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px}
 
        table{width: 60%;margin-bottom: 2rem;}
        table tr{height: 3rem;}
        table tr:not(:first-child):not(:nth-last-child(-n+1)):hover{background-color:#eee;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{color: rgb(36,100,171);border-top: 3px solid rgb(36,100,171);background-color: #eee;}
        .btn{padding: 5px 15px;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;line-height: 1.2rem;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
        .pager{width: 60%;text-align: center;color: #b99c45;padding-bottom: 1em;height:30px}
        .pager>a>i{color: brown;}
        .pager>a:hover{color: brown;}
        @media(max-width:767px){
            content{width: 100%;height: 50em;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            table{width:88%} 
            table th{font-size:1em}
            table td{font-size:.9em}
            table th:nth-child(1), table td:nth-child(1),
            table th:nth-child(4), table td:nth-child(4),
            table th:last-child, table td:last-child            
            {display:none}
            .pager{width:100%;height:30px}
        }

</style>
    <content>
        <div class="title">Notice</div>
        <form name="frm1">
        <div class="title-nav">
            <a href="index.php"><i class="fas fa-home"></i></a>
            <select name="opt">
                <option value="title">제목</option>
                <option value="tag">태그</option>
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
             <th>태그</th>
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
        $sql2="select count(*) as cnt from notice";
        $rs2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($rs2);
        $cnt=$row2["cnt"];
        $pageCount=ceil($cnt/5);
        $groupCount=ceil($pageCount/5); 
        $sql="select * from notice order by no desc limit $startRow,5";
        $rs=mysqli_query($conn,$sql);
        $e=0;
         while($row=mysqli_fetch_array($rs)){ $e++; ?>
          <tr>
             <td><?php echo $e ?></td>
             <td><b>[<?php echo $row["tag"] ?>]</b></td>
             <td><a href="noti-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
             <td>관리자</td>
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
                echo "<a href='notice.php?page=$first'> [〈〈 ] </a>";
                $prevPage=($group-2)*5+1;
                echo "<a href='notice.php?page=$prevPage'> [〈 ] </a>";
            }
            for($i=$startPage;$i<=$endPage;$i++){ 
                if($i>$pageCount){break;} //그룹 내에 비어있는 페이지 없애기 
                if($i==$page){
                    echo "<a href='notice.php?page=$i'><font color='firebrick'>[$i]</font></a>";
                }else{
                    echo "<a href='notice.php?page=$i'>[$i]</a>";
                }
            }
                if($group<$groupCount){ 
                    $nextPage=$group*5+1;
                echo "<a href='notice.php?page=$nextPage'>  [ 〉] </a>";
                $endPage=$pageCount;
                echo "<a href='notice.php?page=$endPage'> [ 〉〉] </a>";
            }

                 ?>
        </div>
        <?php
            if(isset($_SESSION["id"])){
              if($_SESSION["id"]=="admin"){ ?>   
             <div class="pager">
            <input type="button" value="공지사항추가" class="btn" onclick="location.href='notice-add.php'">
            </div> 
           <?php }
            } ?>

    </content>
    <?php  include "footer.php"; ?>
<script>
    function search(){
        if(frm1.keyword.value==''){
            alert("키워드를 입력하세요");
            frm1.keyword.focus();
            return false;
        }
    location.href="notice_search.php?opt="+frm1.opt.value+"&keyword="+frm1.keyword.value;
    }
</script>