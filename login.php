<?php 
session_start();
include "header.php";
?>
<style>
 content      
      .title{margin-left:35%;font-size: 3.3rem;line-height: 6rem;font-weight: bold;margin-top: 2rem; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       
        table{width: 600px;height: 150px ;color:gray;border:5px solid transparent;text-align: center;margin-bottom: 6rem;}
        input[type=text], [type=password]{width:90%;height: 32px;font-size: 1em;padding: 6px;text-align: center;border-radius: 10px;}
        .login{width:6.8em;height: 7em;background-color: lightskyblue;border: none;border-radius: 20px;font-size: 18px;
              font-weight: bold;color: gray;margin-left: -3px;display: block;text-align: center;line-height: 7.2rem;cursor: pointer;}
        table tr>th{width: 16%;height: 33px; border-radius: 15px;background-color: lightblue;font-size: 18px;padding: 0 7px;
                text-align: center;line-height: 35px;}
        
        .button{margin-left: 5px;padding: 0.7rem 0.8rem;font-weight: bold;border-radius: 0.8rem;
            background-color: rgb(36,100,171);color: azure;border: none;line-height: 0.8rem;}          
        .button:hover{color: goldenrod;cursor: pointer;}    
        @media(max-width:767px){
            .title{font-size:2.4em;margin-left:5%;}       
            table{width:90vw} 
            table th,td{font-size:1em}
            table tr:first-child>td:first-child{display:none}
            .login{font-size:1.1em;line-height:5em;height:5.5em;width:4em;}
        }

    </style>
    <content>
       <div class="title">LOG-IN</div>
       <form name=frm1 method="POST" action="login_ok.php">
         <table cellspacing="5">
             <tr>
                 <td rowspan="2" style="width:110px;background-image: url(images/login/2x/outline_login_black_24dp.png);background-repeat:no-repeat ;background-size: 109%; background-position:top;"></td>
                 <th>ID</th>
                 <td><input type="text" name="id" placeholder="아이디를 입력해주세요"></td>
                 <td rowspan="2"><input type="button" value="로그인" class="login" onclick="send()"></td>
             </tr>
             <tr>
                 <th>PW</th>
                 <td><input type="password" name="pw" placeholder="비밀번호를 입력해주세요"></td>
             </tr>
             <tr>
                 <td colspan="4"><a href="signup.php"><input type="button" class="button" value="회원가입"></a>
                 <input type="reset" class="button" value="취소">
                 <a href="idfinder.php"><input type="button" class="button" value="아이디/비번찾기"></a></td>
             </tr>
         </table>
      </form>
    </content>
    <?php  include "footer.php"; ?>
<script>
    function send(){
        if(frm1.id.value==""){
            alert("아이디를 입력하세요");
            frm1.id.focus();
            return false;
        }
       if(frm1.pw.value==""){
           alert("비밀번호를 입력하세요");
           frm1.pw.focus();
           return false;
        }

        document.frm1.submit();
    }
</script>