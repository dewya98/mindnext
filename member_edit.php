<?php 
session_start();
$id=$_SESSION["id"];
include "header.php";
include "conn.php";
$sql="select * from member where id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$hobby=explode("/",$row["hobby"]);
$cnt=count($hobby)-1;

?>
<style>
        fieldset{ margin:4% 25% 2%;border:2px solid #ddd;padding-bottom: 0px;}
        
        .title { padding: 0 7px;
            font-size: 2.4em;
            font-weight: bold;
            margin-top: 2em;
            background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        table, th, td, input, select {
             border: 1px solid white;padding: 5px;
        }
        table.form{
             margin-left: auto;
             margin-right: auto;
        }
        span{color: crimson;font-size: 1.3rem;}
        table th {background-color: rgb(36, 100, 171);border-radius: 20px;color: honeydew;}
        input,select {
            height: 1.7rem;
            font-size: 0.9rem;
            border-radius: 10px;
            border: 1px solid rgb(42, 165, 160);color:royalblue;
        }
        .readonly{color:#333;font-weight:600}
        p1{color: crimson;font-family: sans-serif;font-size: 1rem;float: right;}
        .button {
            display: inline-block;margin-bottom: 5%;
            position: relative;left: 44%;
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
    </style>
    <content>
        <form name=frm1 method="POST" action="member_edit_ok.php">
            <fieldset>
            <legend class="title">회원정보수정</legend>
            <table class="form">
                <tr>
                <th>이름 </th>
                <td><input type="text" name="name" value="<?php echo $row["name"] ?>"></td>
                </tr>
                <tr>
                <th>아이디ID</th>
                <td><input type="text" name="id" class="readonly" value="<?php echo $row["id"] ?>" readonly>(수정불가)
                </td>
                </tr>
                <tr>
                <th>새비밀번호</th>
                <td><input type="password" name="pw" value="" autofocus></td>
                </tr>
                <tr>
                <th>비밀번호확인</th>
                <td><input type="password" name="pwcheck"></td>
                </tr>
                <tr>
                <th>이메일</th>
                <td>
                 <input type="text" name="email" value="<?php echo $row["email"] ?>">
                </td>
                </tr>
                <tr>
                <th>성별</th>
                <td>
                <input type="radio" name="gender" value="남성"
                <?php if($row["gender"]=="남성"){ ?> checked <?php } ?>
                >남성&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" value="여성"
                <?php if($row["gender"]=="여성"){ ?> checked <?php } ?>
                >여성
                </td>
                </tr>
                <tr>
                <th>취미</th>
                <td>
                <input type="checkbox" name="hobby[]" value="여행"
                <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="여행"){ ?> checked <?php }} ?>
                >여행&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="등산"
                <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="등산"){ ?> checked <?php }} ?>
                >등산&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="낚시"
                <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="낚시"){ ?> checked <?php }} ?>
                >낚시&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="영화"
                <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="영화"){ ?> checked <?php }} ?>
                >영화&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="독서"
                <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="독서"){ ?> checked <?php }} ?>
                >독서</td>
                </tr>
                <tr>
                <th>최종학력</th>
                <td><select name="grade">
                    <option value="초중졸" 
                    <?php if($row["grade"]=="초중졸"){ ?> selected <?php } ?>
                    >초중졸</option>
                    <option value="고졸"
                    <?php if($row["grade"]=="고졸"){ ?> selected <?php } ?>
                    >고졸</option>
                    <option value="대졸"
                    <?php if($row["grade"]=="대졸"){ ?> selected <?php } ?>
                    >대졸</option>
                    <option value="대학원졸"
                    <?php if($row["grade"]=="대학원졸"){ ?> selected <?php } ?>
                    >대학원졸</option>
                </select></td> 
                </tr>
            </table>
        </fieldset>
        <input type="reset" value="새로작성" class="button"> &nbsp;&nbsp;
        <input type="button" value="수정하기" class="button" onclick="send()">
     </form>
   </content>
   <?php include "footer.php"; ?>
<script>
    function send() {
        if (frm1.name.value == "") {
            alert("이름을 입력하세요");
            frm1.name.focus();
            return false;
        }
        if (frm1.pw.value == "") {
            alert("비밀번호를 입력하세요");
            frm1.pw.focus();
            return false;
        }
        if (frm1.pw.value !== frm1.pwcheck.value) {
            alert("비밀번호가 다릅니다");
              frm1.pw.value="";
            frm1.pwcheck.value="";
            frm1.pw.focus();
            return false;
        }
        document.frm1.submit();
    }

</script>