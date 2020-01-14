<html>
	<head>
		<title>Landing Page</title>
	</head>
	<body>
		<?php
			echo "<a href=http://$_SERVER[HTTP_HOST]/micelio/login class='btn'>Pagina Login</a>
			<br>
			<a href=http://$_SERVER[HTTP_HOST]/micelio/test class='btn'>Pagina ingreso datos</a>
			<br>";
			/*if(isset($_COOKIE['galleta'])) {
				echo "YES";
			} else {
				echo "NO";
			}*/
		?>
	</body>
</html>
