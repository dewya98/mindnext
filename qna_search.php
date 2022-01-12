<?php 
session_start();
include "header.php"; ?>
<style> 
    content{width: 70%;height: 50rem;}       
      .title{margin-left:20%;height: 100px;font-size: 3em;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
        select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        button{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px;cursor: pointer;}
         
        table{width: 60%;margin-bottom: 2rem;}
        table tr{height: 3rem;}
        table tr:not(:first-child):not(:nth-last-child(-n+1)):hover{background-color:#eee;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;text-align: center;}      
        table th{color: rgb(36,100,171);border-top: 3px solid rgb(36,100,171);background-color: #eee;}
        .button{margin: 0px 0.6rem;padding: 0.5rem 0.8rem;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;line-height: 1.2rem;}          
        .button:hover{color: goldenrod;cursor: pointer;}
        .pager{width: 60%;text-align: center;color: #b99c45;padding-bottom: 1rem;}
        .pager>a>i{color: brown;}
        .pager>a:hover{color: brown;}
</style>
    <content>
        <div class="title">Notice</div>
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
            <button onclick="search()" ><i class="fas fa-search"></i></button>
            </form>
        </div> 
        <table>
          <tr>
             <th>글번호</th>
             <th>제목</th>
             <th>작성자</th>
             <th>날짜</th>
             <th>조회수</th>
          </tr>
          <?php 
          $opt=$_GET["opt"];
          $keyword=$_GET["keyword"];
          include "conn.php";
          if($opt=="title"){
            $sql="select * from qna where title like '%$keyword%'";
            $rs=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($rs);
            while($row=mysqli_fetch_array($rs)){ ?>
                <tr>
                <td><?php echo $row["no"] ?></td>
                <td><a href="qna-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
                <td>관리자</td>
                <td><?php echo $row["writeday"] ?></td>
                <td><?php echo $row["hit"] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5" align="center"><?php echo $total ?>건의 데이타가 검색되었습니다.</td>
            </tr>
        <?php  }elseif($opt=="writer"){
            $sql="select * from qna where writer like '%$keyword%'";
            $rs=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($rs);
            while($row=mysqli_fetch_array($rs)){ ?>
                <tr>
                <td><?php echo $row["no"] ?></td>
                <td><a href="qna-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
                <td>관리자</td>
                <td><?php echo $row["writeday"] ?></td>
                <td><?php echo $row["hit"] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5" align="center"><?php echo $total ?>건의 데이타가 검색되었습니다.</td>
            </tr>
        <?php  }elseif($opt=="content"){
            $sql="select * from qna where content like '%$keyword%'";
            $rs=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($rs);
            while($row=mysqli_fetch_array($rs)){ ?>
                <tr>
                <td><?php echo $row["no"] ?></td>
                <td><a href="qna-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
                <td>관리자</td>
                <td><?php echo $row["writeday"] ?></td>
                <td><?php echo $row["hit"] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5" align="center"><?php echo $total ?>건의 데이타가 검색되었습니다.</td>
            </tr>
        <?php  }elseif($opt=="all"){
            $sql="select * from qna where title like '%$keyword%' or content like '%$keyword%' or writer like '%$keyword%'" ;
            $rs=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($rs);
            while($row=mysqli_fetch_array($rs)){ ?>
                <tr>
                <td><?php echo $row["no"] ?></td>
                <td><a href="qna-con.php?no=<?php echo $row["no"] ?>"> <?php echo $row["title"] ?></a></td>
                  <td>관리자</td>
                <td><?php echo $row["writeday"] ?></td>
                <td><?php echo $row["hit"] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5" align="center"><?php echo $total ?>건의 데이타가 검색되었습니다.</td>
            </tr>
        <?php  } ?>
          
        <tr>
            <td colspan="5" align="center"><input type="button" value="Q&A가기" class="button" onclick="location.href='qna.php'"></td>
        </tr>
        </table>
    </content>
    <?php  include "footer.php"; ?>

    <script>
        function search(){
        location.href="qna_search.php?opt="+frm1.opt.value+"&keyword="+frm1.keyword.value;
        }
    </script>