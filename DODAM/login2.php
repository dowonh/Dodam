<?php
	session_start();
	if($_POST[id] != "") {

		include("firstcon.php");

		$connect=connect_db($servername, $username, $password, $dbname);

		$query = "SELECT * FROM guest where guest_ID = '".$_POST[guest_ID]."' and guest_password = '".$_POST[guest_password]."'";
		$rst = mysql_query($query, $connect);
		$row = mtsql_fetch_array($result);
		if($row){ // 로그인이 됐을 경우
			$_SESSION["guest_ID"] = $_POST[guest_ID];
			$_SESSION["guest_login"] = 1;
			?>
			<script>
				alert("환영합니다.");
				location.href = " index.html";
			</script>
			<?
		}else{//없을 값일 경우 (로그인 실패)
			?>
			<script>
				alert("아이디 혹은 비밀번호가 틀렸거나 없는 아이디입니다.");
				history.go(-1);
			</script>
			<?
		}
	}
?>
