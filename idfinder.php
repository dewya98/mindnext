<?php 
session_start();
include "header.php";
?>
 <style>
 content  
    fieldset{border:2px solid #ddd; width:58%;margin:20px auto}    
    legend{margin-left:30%;font-size: 2em;font-weight: bold;
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       
    table{width: 620px;height: 220px ;color:gray;border:10px solid transparent;text-align: center;margin-bottom: 1.3rem;}
    input[type=text]{width:200px;height: 35px;font-size: 0.9em;padding: 6px;text-align: center;border-radius: 10px;}
    .login{width:6.8em;height: 7.2em;background-color: lightskyblue;border: none;border-radius: 20px;font-size: 18px;
              font-weight: bold;color: gray;margin-left: -5px;display: block;text-align: center;line-height: 7.2rem;cursor: pointer;}
    table tr>th{width: 100px;height: 25px; border-radius: 15px;background-color: lightblue;font-size: 18px;padding: 0 7px;
                text-align: center;line-height: 35px;}
        
     .button{margin-left: 5px;padding: 0.7em 0.8em;font-weight: bold;border-radius: 0.8rem;
            background-color: rgb(36,100,171);color: azure;border: none;line-height: 0.8rem;}          
     .button:hover{color: goldenrod;cursor: pointer;}   

 @media(max-width:767px){
    content{width: 100%;height: 600px;}
    content fieldset{width:95%;padding:10px 0;margin: 30px auto;height:200px}
    legend{margin:0 auto}
    table{width:95%} 
    table tr>th{font-size:1em;width: 20%;}
    input[type=text]{width:88%}
    table tr:first-child>td:first-child{display:none}
    .login{font-size:1em;line-height:6.5em;height:6.5em;width:4em;}
        }
    </style>
    <content>
       <form name="idfind" method="POST">
        <fieldset>
          <legend>아이디찾기</legend>
          <table>
             <tr>
                 <td rowspan="3" style="width:115px;background: url(images/contact/2x/outline_contact_page_black_24dp.png)no-repeat; background-size: 108%; background-position:top;"></td>
                 <th>이름</th>
                 <td><input type="text" name="name" placeholder="이름을 입력해주세요"></td>
                 <td rowspan="2"><input type="button" value="검색" class="login" onclick="send1()"></td>
             </tr>
             <tr>
                 <th>e-mail</th>
                 <td><input type="text" name="email1" placeholder="이메일 주소를 입력해주세요"></td>
             </tr>
             <tr>
              <td colspan="3"> <?php if(isset($_POST["urid"])){ ?>
                아이디는 <?php echo $_POST["urid"] ?>  입니다. <?php } ?> </td>
             </tr>
          </table>
        </fieldset>
        </form>

        <form name="pwfind" method="POST">
        <fieldset>
            <legend>비밀번호찾기</legend>
            <table>
               <tr>
                   <td rowspan="3" style="width:110px;background: url(images/key/2x/outline_key_black_24dp.png)no-repeat; background-size: 100%; background-position:top;"></td>
                   <th>아이디</th>
                   <td><input type="text" name="id" placeholder="아이디를 입력해주세요"></td>
                   <td rowspan="2"><input type="button" value="검색" class="login" onclick="send2()"></td>
               </tr>
               <tr>
                   <th>e-mail</th>
                   <td><input type="text" name="email2" placeholder="이메일을 입력해주세요"></td>
               </tr>
               <tr>
                   
               <td colspan="3"> 
                   <?php if(isset($_POST["urpw"])){ ?>
                       비밀번호는 <?php echo $_POST["urpw"] ?>  입니다. <?php } ?> 
               </td> 
               </tr>
            </table>
          </fieldset>
      </form>
    </content>
    <?php  include "footer.php"; ?>
<script>
    function send1(){
        if(idfind.name.value==""){
            alert("이름을 입력하세요");
            idfind.name.focus();
            return false;
        }
       if(idfind.email1.value==""){
           alert("이메일 주소를 입력하세요");
           idfind.email1.focus();
           return false;
        }
        document.idfind.action="idfind_ok.php";
        document.idfind.submit();
    }

  
    function send2(){
        if(pwfind.id.value==""){
            alert("아이디를 입력하세요");
            pwfind.id.focus();
            return false;
        }
       if(pwfind.email2.value==""){
        alert("이메일 주소를 입력하세요");
           pwfind.email2.focus();
           return false;
        }
        document.pwfind.action="pwfind_ok.php";
        document.pwfind.submit();
    }

    </script>