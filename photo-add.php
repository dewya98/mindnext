<?php  include "header.php"; ?>
<style> 
    content{width: 60%;height: 50rem;}       
      .title{margin-left:25%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
   
          table{width: 60%;margin-bottom: 2em;}
        table td{border-right:1px solid #999;}
        table th,td{font-family: sans-serif;font-size: 1.2em;line-height: 2em;border-top: 1px solid #999;padding:10px;}      
        table th:not(:last-child){background-color: rgb(36,100,171);color: #fff;}
        input[type=text], textarea, select{border:none;height:2em;outline:none;font-size:.9em;background-color:#eee}
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
        <div class="title">사진추가</div>
       
     <form name=frm1 method="POST" action="photo-add.ok.php">
         <table>
             <tr>
                 <th>촬영일자</th>
                 <td><input type="text" name="date" class="input-title"></td>
                </tr>
                <tr>
                    <th>파일</th>
                    <td><input type="file" name="img" class="input-title"></td>
                </tr>
                <tr>
                 <th>사진내용</th>
                 <td><textarea name="content" rows="5" cols="100"></textarea></td>
                </tr>
           <tr>
            <th colspan="2" align="center">
                <input type="button" value="사진추가완료" class="button" onclick="send()">
                <input type="reset" value="새로작성" class="button">
                <input type="button" value="리스트" class="button" onclick="location.href='photo.php'">
            </th>
          </tr>
         </table>
     </form>
  </content>
  <?php  include "footer.php"; ?>
<script>
    function send(){
        if(frm1.content.value==""){
            alert("제목을 입력하세요");
            frm1.content.focus();
            return false;
        }
       if(frm1.img.value==""){
           alert("내용을 입력하세요");
           frm1.img.focus();
           return false;
        }

        document.frm1.submit();
    }
</script>