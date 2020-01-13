<?php session_start(); ?>
<html>
 <head>
  <title>PHP-Test</title>
 </head>
 <body>
<?php 
/*$file = $id . ".txt";
$f = fopen($file, "r+");
$line = fgets($f, 1000);
$file1 = "http://example.com/Song1.txt";
$f1 = fopen($file1, "r+");
$line1 = fgets($f1, 1000);
if (!($line == $line1)) {
    fwrite($f1,$line);
    $line1 = $line;
    };
print htmlentities($line1);
*/?>
<?php
if(!isset($_COOKIE['galleta'])) {
	//redirect to login
	$_SESSION['rfpage'] = $_SERVER[REQUEST_URI];
	header("Location: http://$_SERVER[HTTP_HOST]/micelio/login");
} else {
	session_destroy();
	include 'phpqrcode/qrlib.php';
    if(isset($_POST['Nombre_del_producto'])) {
		if(isset($_POST['Fecha_de_faenamiento'])) {
			if(isset($_POST['Tags'])) {
				$filename = $_POST['Nombre_del_producto'] . $_POST['Fecha_de_faenamiento'] . $_POST['Productor'] . '.html';
				$filename = str_replace(' ', '', $filename);
				$filename = str_replace('/', '', $filename);
				if(file_exists($filename)) {
					echo 'the deed is done';
					echo "<img src='$filename.png'>";
				} else {
				echo 'doing it to them: ' . $filename;
				$file = fopen($filename, "w");
				
					$text='<!DOCTYPE html>
<html>
<body>

<h1>' . $_POST['Nombre_del_producto'] . '</h1>
<p> Faenado en: ' . $_POST['Fecha_de_faenamiento'] . ' </p>
<p> Cumple con las siguientes caracteristicas: ' . $_POST['Tags'] . '</p>
<p> producido por: ' . $_POST['Productor'] . '</p>

</body>
</html> ';
				
				fwrite($file, $text);
				fclose($file);
				QRcode::png("http://$_SERVER[HTTP_HOST]/$filename", "$filename.png");
				echo "<img src='$filename.png'>";
				}
			}
		}
    }
}
?>
<form method="post" action="">
Nombre del producto
<br>
<input type="text" name="Nombre_del_producto" value="Nombre del producto">
<br>
Fecha de faenamiento
<br>
<input type="text" name="Fecha_de_faenamiento" value="DD/MM/AAAA">
<br>
Productor
<br>
<input type="text" name="Productor" value="Productor">
<br>
Propiedades pertinentes
<br>
<input type="text" name="Tags" value="Organico, free range, etc">
<br>
<input type="submit">
</form>
 </body>
</html>