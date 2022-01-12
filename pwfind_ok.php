<?php
	session_start();
	$id=$_POST["id"];
	$email=$_POST["email2"];
	include "conn.php";
	$query="select * from member where id='$id' and email='$email'";
	$rs=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)==0){
?>
<script>
	alert("아이디와 이메일이 일치하지 않습니다.");
	history.back();
</script>
<?php
	}else{ ?>
	<form name="pwfinder" method="post" action="idfinder.php">
	<input type="text" name="urpw" value="<?php echo $row["pw"] ?>" >
	</form>
	<script>
		document.pwfinder.submit();
	</script>
<?php	
	}
?>
