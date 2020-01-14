<?php session_start(); ?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['rfpage'])){
				$redirect_to = $_SESSION['rfpage'];
			} else {
				$redirect_to = "/micelio/hello";
			}
			if(isset($_POST['pw'])) {
				if($_POST['pw'] == '12') {
					session_destroy();
					setcookie('galleta', 1, time() + 7200, "/"); // 7200 = 2 hours
					header("Location: http://$_SERVER[HTTP_HOST]$redirect_to");
				} else {
					echo 'contraseña equivocada';
				}
			}
		?>
		<form method="post" action="" style="position: absolute;top: 200;right: 430;font-size: 30;">
			Requiere permisos de administrador, ingrese la contraseña:
			<br>
			<input type="text" name="pw">
			<br>
			<input type="submit" href="">
		</form>
	</body>
</html>
