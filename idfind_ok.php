<?php
	session_start();
	$name=$_POST["name"];
	$email=$_POST["email1"];
	include "conn.php";
	$query="select * from member where name='$name' and email='$email'";
	$rs=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)==0){
?>
<script>
	alert("이름과 이메일이 일치하지 않습니다.");
	history.back();
</script>
<?php
	}else{ ?>
	<form name="idfinder" method="post" action="idfinder.php">
	<input type="text" name="urid" value="<?php echo $row["id"] ?>">
	</form>
	<script>
		document.idfinder.submit();
	</script>
<?php	
	}
?>
