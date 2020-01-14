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
	header("Location: http://$_SERVER[HTTP_HOST]/test.php");
} else {
	session_destroy();
	include 'phpqrcode/qrlib.php';
    if(isset($_POST['Nombre_del_producto'])) {
		if(isset($_POST['Fecha_de_faenamiento'])) {
			if(isset($_POST['Productor'])) {
				$filename = $_POST['Nombre_del_producto'] . $_POST['Fecha_de_faenamiento'] . $_POST['Productor'] . '.html';
				$filename = str_replace(' ', '', $filename);
				$filename = str_replace('/', '', $filename);
				if(file_exists($filename)) {
					echo 'Ultimo QR generado: ';
					echo "<img src='".base_url()."images/".$filename.".png'><br>  ";
					#echo "<img src='/assets/$filename.png'>"; 
				} else {
				echo 'QR generado con exito en: ' .base_url()."images/". $filename;
				$file = fopen($filename, "w");
				#$file = fopen(base_url(). 'images/' . $filename , 'w');
				#$file = fopen(base_url()."images/".$filename", "w");
				
					$text='<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>' . $_POST['Nombre_del_producto'] . '</h1>
<p> producido por: ' . $_POST['Productor'] . '</p>
<p> Faenado en: ' . $_POST['Fecha_de_faenamiento'] . ' </p>
<p> Desmalezado: ' . $_POST['Desmalezado'] . '</p>
<p> Fumigaciones: ' . $_POST['Fumigaciones'] . '</p>
<p> Aplicaciones de plagas preventivas: ' . $_POST['plagas'] . '</p>
<p> Fertilizaciones Organicas: : ' . $_POST['fert'] . '</p>
<p> Intermediario(transporte): ' . $_POST['inter'] . '</p>
<p> Tipo de agua: ' . $_POST['agua'] . '</p>
<p> Profundidad efectiva: ' . $_POST['prof'] . '</p>
<p> Maquinaria: ' . $_POST['maq'] . '</p>

</body>
</html> ';
				
				fwrite($file, $text);
				fclose($file);
				QRcode::png("".base_url()."/images/$filename", "$filename.png");
				echo "<img src='".base_url()."images/".$filename.".png'><br>  ";
				}
			}
		}
    }
}
?>
<form method="post" action="" style=" position: absolute; left: 50; font-size: 20; top: 150;">
Nombre del producto
<br>
<input type="text" name="Nombre_del_producto" placeholder="Nombre del producto">
<br><br>
Fecha de faenamiento
<br>
<input type="text" name="Fecha_de_faenamiento" placeholder="DD/MM/AAAA">
<br><br>
Productor
<br>
<input type="text" name="Productor" placeholder="Productor">
<br><br>
Desmalezado
<br>
<input type="text" name="Desmalezado" placeholder="no, manual, automatico, etc">
<br><br>
Fumigaciones
<br>
<input type="text" name="Fumigaciones" placeholder="...">
<br><br>
Aplicaciones de plagas preventivas
<br>
<input type="text" name="plagas" placeholder="...">
<br><br>
Fertilizaciones Organicas
<br>
<input type="text" name="fert" placeholder="...">
<br><br>
Intermediario
<br>
<input type="text" name="inter" placeholder="...">
<br><br>
Tipo de agua
<br>
<input type="text" name="agua" placeholder="de pozo, potable, etc">
<br><br>
Profundidad efectiva
<br>
<input type="text" name="prof" placeholder="...">
<br><br>
Maquinaria
<br>
<input type="text" name="maq" placeholder="...">
<br><br>
<input type="submit">
</form>
 </body>
</html>
