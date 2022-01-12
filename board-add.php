    <?php
    session_start();
    include "header.php"; ?>
    <style>
    content{width: 60%;height: 50rem;}       
      .title{margin-left:25%;height: 100px;font-size: 3rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   
        table{width: 60%;margin-bottom: 2em;}
        table td{border-right:1px solid #999;}
        table th,td{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;border-top: 1px solid #999;padding:10px;}      
        table th:not(:last-child){background-color: rgb(36,100,171);color: #fff;}
        input[type=text], textarea, select{border:none;height:2em;outline:none;font-size:.9em;background-color:#eee}
        /* .input-title{width: 42rem;height: 2rem;}    */
        .button{margin: 0px 0.6rem;padding: 0.5rem 0.8rem;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;}          
        .button:hover{color: goldenrod;cursor: pointer;}
        @media(max-width:767px){
            content{width: 100%;height: 50em;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            table{width:88%} 
            table td{font-size:.9em}
            .typing{width:84%;padding:0 8%}
            .typing>img{display:none}
            textarea,input[type=text]{width:23em;position:none;}
            .btn{display:block;width:6em}
        }

    </style>
    <content>
        <div class="title">자유게시판</div>
        <form enctype="multipart/form-data" name="frm1" method="post" action="board-add.ok.php">
    <table>
    <tr>
        <th>제목</th>
        <td><input type="text" name="title" size="50" required></td>
    </tr>
    <tr>
        <th>작성자</th>
        <td><input type="text" name="writer" id="" value="<?php echo $_SESSION["id"] ?>" readonly></td>
    </tr>
    <tr>
        <th>사진</th>
        <td><input type="file" name="img"></td>
    </tr>
    <tr>
         <th>내용</th>
         <td><textarea name="content" rows="8" cols="110"></textarea></td>
    </tr>
    <tr>
        <th>분류</th>
        <td><select name="sort">
         <option value="이벤트">이벤트</option>
         <option value="자유글">자유글</option>
         <option value="광고">광고</option>
       </td>
    </tr>
    <tr>
    <td colspan="2" align="center">
                <input type="button" value="작성완료" class="button" onclick="send()">
                <input type="reset" value="새로작성" class="button">
                <input type="button" value="리스트" class="button" onclick="location.href='board.php'">
            </td>
          </tr>
         </table>
     </form>
  </content>
    <?php include "footer.php"; ?>
<script>
    function send(){
        if(frm1.title.value==""){
            alert("제목을 입력하세요");
            frm1.title.focus();
            return false;
        }
       if(frm1.content.value==""){
           alert("내용을 입력하세요");
           frm1.content.focus();
           return false;
        }

        document.frm1.submit();
    }
</script>