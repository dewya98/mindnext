<?php 
session_start();
include "header.php";
include "conn.php";
?>
        <style>
        fieldset{width:60%;border:2px solid #ddd;padding:30px 0px;margin:30px auto}
        
        .title { padding: 0 7px;
            font-size: 3rem;
            font-weight: bold;
            margin-top: 2rem;
            background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        table, th, td, input, select {
             border: 1px solid white;padding: 3px 5px;
        }
        span{color: crimson;font-size: 1.3em;}
        table th {background-color: rgb(36, 100, 171);border-radius: 20px;color: honeydew;}
        input,select {
            height: 1.9em;
            font-size: 0.9em;
            border-radius: 10px;
            border: 1px solid rgb(42, 165, 160);
        }
        p1{color: crimson;font-family: sans-serif;font-size: 1rem;float: right;}
        .btn{width: 220px;margin:20px auto}
        .button {
            display: inline-block;margin-bottom: 5%;
            padding: 1em 1.1em;
            font-weight: bold;
            border-radius: 0.8em;
            background-color: rgb(36, 100, 171);
            color: azure;
            border: none;
            line-height: 0.4em;
        }

        .button:hover {
            color: goldenrod;
            cursor: pointer;
        }
        @media(max-width:767px){
            content{width: 100%;height: 50em;}
            fieldset{width:90%;margin:20px auto;}
            .title{font-size:2.4em}       
            table{width:100%;font-size:.9em} 
            table th{padding:0 3px}
            table td,th{font-size:.9em}
            .typing{width:84%;padding:0 8%}
            .typing>img{display:none}
            textarea{width:20em;position:none;}
            p1{font-size:.8em}
        }

    </style>
    <content>
        <form name=frm1 method="POST" action="signup-ok.php">
            <fieldset>
            <legend class="title">????????????</legend>
            <table class="form">
                <tr>
                <th>?????? </th>
                <td><input type="text" name="name" autofocus><span>*</span></td>
                </tr>
                <tr>
                <th>ID</th>
                <td><input type="text" name="id"> &nbsp;<input type="hidden" name="idok"><input type="button" value="ID????????????" onclick="idcheck()"><span>*</span>
                </td>
                </tr>
                <tr>
                <th>PW</th>
                <td><input type="password" name="pw"><span>*</span></td>
                </tr>
                <tr>
                <th>??????????????????</th>
                <td><input type="password" name="pwcheck"></td>
                </tr>
                <tr>
                <th>?????????</th>
                <td><input type="text" name="email1" required>@
                <select name="email2">
                    <option value="naver.com">naver.com</option>
                    <option value="gmail.com">gmail.com</option>
                    <option value="paran.com">paran.com</option>
                    <option value="nate.com">nate.com</option>
                    <option value="hotmail.com">hotmail.com</option>
                    <option value="hanmail.net">hanmail.net</option>
                    <option value="daum.net">daum.net</option>
                </select><span>*</span></td>
                </tr>
                <tr>
                <th>??????</th>
                <td><input type="radio" name="gender" value="??????">??????&nbsp;&nbsp;&nbsp; <input type="radio" name="gender" value="??????">??????
                </td>
                </tr>
                <tr>
                <th>??????</th>
                <td><input type="checkbox" value="??????" name="hobby[]">??????&nbsp;&nbsp;
                <input type="checkbox" value="??????" name="hobby[]">??????&nbsp;&nbsp;
                <input type="checkbox" value="??????" name="hobby[]">??????&nbsp;&nbsp;
                <input type="checkbox" value="??????" name="hobby[]">??????&nbsp;&nbsp;
                <input type="checkbox" value="??????" name="hobby[]">??????</td>
                </tr>
                <tr>
                <th>????????????</th>
                <td><select name="grade">
                    <option value="?????????">?????????</option>
                    <option value="??????">??????</option>
                    <option value="??????">??????</option>
                    <option value="????????????">????????????</option>
                </select></td> 
                </tr>
            </table>
            <p1>* ??? ????????????????????????.&nbsp;&nbsp;&nbsp;</p1>
        </fieldset>
        <div class="btn">
        <input type="reset" value="????????????" class="button"> &nbsp;&nbsp;
        <input type="button" value="????????????" class="button" onclick="send()">
        </div>
     </form>
   </content>

   <?php  include "footer.php"; ?>
<script>
    function send() {
        if (frm1.name.value == "") {
            alert("????????? ???????????????");
            frm1.name.focus();
            return false;
        }
        if (frm1.id.value == "") {
            alert("???????????? ???????????????");
            frm1.id.focus();
            return false;
        }
        if (frm1.idok.value == "") {
            alert("????????? ??????????????? ????????????");
            frm1.id.focus();
            return false;
        }
        if (frm1.pw.value == "") {
            alert("??????????????? ???????????????");
            frm1.pw.focus();
            return false;
        }
        if (frm1.pw.value !== frm1.pwcheck.value) {
            alert("??????????????? ????????????");
              frm1.pw.value="";
            frm1.pwcheck.value="";
            frm1.pw.focus();
            return false;
        }
        document.frm1.submit();
    }

    function idcheck()
    {if(frm1.id.value=="0"){
    alert("????????? ???????????? ???????????????");
    frm1.id.focus();return false;}
    window.open("id_check.php?id="+frm1.id.value,"pop","width=400 height=150");
    }
</script>