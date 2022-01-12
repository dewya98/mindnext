<?php  
session_start();
include "header.php";
?>
<style> 
    content{width: 60%;height: 50rem;}       
      .title{margin-left:25%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   
        table{width: 50%;margin-bottom: 2rem;}
        table tr{height: 3rem;}
        table th{font-family: sans-serif;font-size: 1.2rem;line-height: 2em;text-align: center;     
                  color: rgb(36,100,171);border: 2px solid rgb(36,100,171);background-color: #eee;}
        .input-title{width: 42rem;height: 2rem;}   
        textarea{margin: 10px 0px;}       
        .button{margin: 0px 0.6rem;padding: 0.5rem 0.8rem;font-weight: bold;border-radius: 0.8rem;background-color: rgb(36,100,171);color: azure;border: none;}          
        .button:hover{color: goldenrod;cursor: pointer;}
    </style>
    <content>
        <div class="title">Notice</div>
       
     <form name=frm1 method="POST" action="notice-write-ok.php">
         <table>
            <tr>
             <th>태그</th>
             <th><input type="text" name="tag" class="input-title"></th>
            </tr>
             <th>글제목</th>
             <th><input type="text" name="title" class="input-title"></th>
            </tr>
            <tr>
            <th>글내용</th>
            <th><textarea name="content" rows="6" cols="110"></textarea></th>
           </tr>
           <tr>
            <th colspan="2" align="center">
           <?php if(isset($_SESSION["id"])){
               if($_SESSION["id"]=='admin'){
               ?>
                <input type="button" value="작성완료" class="button" onclick="send()">
                <input type="reset" value="새로작성" class="button"> <?php }} ?>
                <input type="button" value="리스트" class="button" onclick="location.href='notice.php'">
            </th>
          </tr>
         </table>
     </form>
    </content>
    <?php  include "footer.php"; ?>
 <script>
    function send(){
        if(frm1.tag.value==""){
            alert("태그를 입력하세요");
            frm1.tag.focus();
            return false;
        }
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