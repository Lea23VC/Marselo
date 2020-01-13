<html>
	<head>
		<title>Landing Page</title>
	</head>
	<body>
		<?php
			echo "<a href=http://$_SERVER[HTTP_HOST]/micelio/login>Pagina Login</a>
			<br>
			<a href=http://$_SERVER[HTTP_HOST]/micelio/test>Pagina ingreso datos</a>
			<br>
			LOGIN: ";				
			if(isset($_COOKIE['galleta'])) {
				echo "YES";
			} else {
				echo "NO";
			}
		?>
	</body>
</html>
