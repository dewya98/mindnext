<?php  
session_start();
include "header.php";
?>
   <style>
    content{width: 70%;height: 50rem;}       
      .title{margin-left:20%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px}
 
        table{width: 60%;margin-bottom: 2em;}
        table tr{height: 2.5em;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{color: rgb(36,100,171);border-top: 3px solid rgb(36,100,171);background-color: #eee;}
        .btn{width:7em;height:3em;font-weight:bold;border-radius:1.4em;background-color:rgb(36,100,171);color:#fff;border: none;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
        .pager{width: 50%;text-align: center;color: #b99c45;padding-bottom: 1rem;}
        .pager>a>i{color: brown;}     
        textarea{border:2px solid rgb(36,100,171);outline:none;font-size:1.1em;}
        .typing{width:50%;position: relative;margin: 20px auto 50px;}
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
            .typing{width:84%;padding:0 8%}
            .typing>img{display:none}
            textarea{width:20em;position:none;}
            .btn{display:block;width:6em}
        }

    </style>
    <content>
        <div class="title">???????????????</div>
        <form name="frm1">
        <div class="title-nav">
            <a href="index.php"><i class="fas fa-home"></i></a>
            <select name="opt">
                <option value="title">??????</option>
                <!-- <option value="tag">??????</option> -->
                <option value="content">??????</option>
                <option value="all">??????</option>
            </select>
            <input type="search" name="keyword" placeholder="???????????? ???????????????">
            <input type="button" value="??????" onclick="search()">
            </form>
        </div> 
        <table>
          <tr>
             <th>?????????</th>
             <th>??????</th>
             <th>?????????</th>
             <th>??????</th>
             <th>?????????</th>
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
        $sql2="select count(*) as cnt from board";
        $rs2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($rs2);
        $cnt=$row2["cnt"];
        $pageCount=ceil($cnt/5);
        $groupCount=ceil($pageCount/5); 
        $sql="select * from board order by no desc limit $startRow,5";
        $rs=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_array($rs)){ ?>
          <tr>
             <td><?php echo $row["no"] ?></td>
             <td><a href="board-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
             <td><b><?php echo $row["writer"] ?></b></td>
             <td><?php echo $row["date"] ?></td>
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
                echo "<a href='board.php?page=$first'> [?????? ] </a>";
                $prevPage=($group-2)*5+1;
                echo "<a href='board.php?page=$prevPage'> [??? ] </a>";
            }
            for($i=$startPage;$i<=$endPage;$i++){ 
                if($i>$pageCount){break;} //?????? ?????? ???????????? ????????? ????????? 
                if($i==$page){
                    echo "<a href='board.php?page=$i'><font color='firebrick'>[$i]</font></a>";
                }else{
                    echo "<a href='board.php?page=$i'>[$i]</a>";
                }
            }
                if($group<$groupCount){ 
                    $nextPage=$group*5+1;
                echo "<a href='board.php?page=$nextPage'>  [ ???] </a>";
                $endPage=$pageCount;
                echo "<a href='board.php?page=$endPage'> [ ??????] </a>";
            }

                 ?>
        </div>
        <?php 
        if(isset($_SESSION["id"])){ ?>
         <div class="pager">
            <input type="button" value="???????????????" class="btn" onclick="location.href='board-add.php'">
        </div><br><br><br>
        <?php }else{ ?> 
            <div class="typing">
            <img src="images/pen/2x/outline_create_black_24dp.png" alt="typing" width="5%" height="5%" style="vertical-align:top;">
            <textarea name="content" cols="70" rows="2" placeholder="&ensp;????????? ????????? ???????????? ???????????? ??? ????????????." readonly></textarea>&ensp;
            <input type="button" value="?????????" class="btn" onclick="location.href='login.php'">
            </div>
            <?php } ?>
    </content>
    <?php  include "footer.php"; ?>
    <script>
    function search(){
        if(frm1.keyword.value==''){
            alert("???????????? ???????????????");
            frm1.keyword.focus();
            return false;
        }
    location.href="board_search.php?opt="+frm1.opt.value+"&keyword="+frm1.keyword.value;
    }
</script>
