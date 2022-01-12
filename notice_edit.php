<?php 
session_start();
$no=$_GET["no"];
include "header.php";
include "conn.php";
$sql="select * from notice where no='$no'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);

?>
<style>
        fieldset{ margin:4% 25% 2%;border:2px solid #ddd;}
        .title { padding: 0 7px;
            font-size: 2.4em;
            font-weight: bold;
            margin-top: 2em;
            background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        input, select, textarea {border: 1px solid #fff;padding: 5px;outline:none; }
        table{margin:10px auto 20px;}
        table th {background-color: rgb(36, 100, 171);color: honeydew;padding:5px 10px}
        table td{ padding:5px;
            height: 2em;
            border: 1px solid rgb(42, 165, 160);
        }
        .read{color:#333;font-weight:600}
        .button {
            display: inline-block;margin-bottom: 5%;
            position: relative;left: 40%;
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
        <form name=frm1 method="POST" action="notice_edit_ok.php">
            <fieldset>
            <legend class="title">게시판수정</legend>
            <table>
                <tr>
                <th>글번호</th>
                <td><input type="text" name="no" value="<?php echo $row["no"] ?>" class="read" readonly></td>
                </tr>
                <tr>
                <th>태그</th>
                <td><input type="text" name="tag" placeholder="<?php echo $row["tag"] ?>"></td>
                </tr>
                <tr>
                <th>제목</th>
                <td><input type="text" name="title" placeholder="<?php echo $row["title"] ?>"></td>
                </tr>
                <tr>
                <th>내용</th>
                <td>
                  <textarea cols="80" rows="4" name="content" autofocus placeholder="<?php echo $row["content"] ?>"></textarea>
                </td>
                </tr>
            </table>
        </fieldset>
        <input type="button" class="button" value="공지사항 메인" onclick="location.href='notice.php'">&ensp;
        <input type="reset" value="새로작성" class="button"> &ensp;
        <input type="button" value="수정하기" class="button" onclick="send()">
     </form>
   </content>
   <?php include "footer.php"; ?>
<script>
    function send() {
        if (frm1.title.value == "") {
            alert("제목을 입력하세요");
            frm1.title.focus();
            return false;
        }
        if (frm1.content.value == "") {
            alert("수정할 내용을 입력하세요");
            frm1.content.focus();
            return false;
        }
        document.frm1.submit();
    }
</script>