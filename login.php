<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username == "baratharun" && $password == "Barath100")
	{
		$_SESSION['user'] = "admin";
		?>
			<script type="text/javascript">
				location.href = "admin.php";
			</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			location.href="admin.php?error=invalid Username or Password";
		</script>
		<?php
	}
?>