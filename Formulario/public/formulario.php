<?php
echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Request: ";
print_r($_REQUEST);
echo "</pre>";

require "functions.php";
// Obtenemos los datos del usuario y lo guardamos en un array
$file = "usuarios.txt";
//$arrayFile = txtToArray($file);
//$line = lineFromFile($file, $_GET["id"]);
//$_GET=lineToArray($line);

echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Formularios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="robots" content="noarchive,noindex">
		<meta name="description" content="Formulario">
		<meta name="keywords" content="Formulario">
	</head>
	<body>
		<div id="wrapper">		
			<form action="procesar.php" method="POST" enctype="multipart/form-data">			
					<div style="color:#0000FF">
						Id.: <input type="hidden" name="id" value="01"><br><br>
						Nombre: <input type="text" name="name"><br><br>
						Email: <input type="text" name="email" ><br><br>
						Contraseña: <input type="password" name="password" ><br><br>
						Dirección: <input type="text" name="address" ><br><br>
						Descripción: <textarea name="description"></textarea><br><br>
						Sexo: <br>	<input type="radio" name="sex" value="male" >Hombre<br>
									<input type="radio" name="sex" value="female">Mujer<br>
									<input type="radio" name="sex" value="others">Otros<br><br>
						Ciudad: <select name="city" >
									<option value="coruna">A Coruña</option>
									<option value="vigo">Vigo</option>
									<option value="pontevedra">Pontevedra</option>
									<option value="ourense">Ourense</option>
								</select><br><br>
						Mascotas: <br>	<input type="checkbox" name="pets[]" value="perro">Perro<br>
										<input type="checkbox" name="pets[]" value="gato">Gato<br>
										<input type="checkbox" name="pets[]" value="caballo">Caballo<br><br>
						Deportes: <br>	<select multiple name="sports[]">
											<option value="futbol">Futbol</option>
											<option value="baloncesto">Baloncesto</option>
											<option value="balonmano">Balonmano</option>
											<option value="tenis">Tenis</option>
										</select><br><br>
						Imagen: <input type="file" name="photo"><br><br>
						<input type="button" name="button" value="Button">
						<input type="submit" name="submit" value="Submit" >
						<input type="button" name="boton" value="Reset">
						
						<!--  
						Id.: <input type="hidden" name="id" value="01"><br><br>
						Nombre: <input type="text" name="name" value=<?=$_GET[1]?> ><br><br>
						Email: <input type="text" name="email" value=<?=$_GET[2]?>><br><br>
						Contraseña: <input type="password" name="password" value=<?=$_GET[3]?>><br><br>
						Dirección: <input type="text" name="address" value=<?=htmlspecialchars($_GET[4])?>><br><br>
						Descripción: <textarea name="description"><?=$_GET[5]?></textarea><br><br>
						Sexo: <br>	<input type="radio" name="sex" value="male" >Hombre<br>
									<input type="radio" name="sex" value="female">Mujer<br>
									<input type="radio" name="sex" value="others">Otros<br><br>
						Ciudad: <select name="city" >
									<option value="coruna">A Coruña</option>
									<option value="vigo">Vigo</option>
									<option value="pontevedra">Pontevedra</option>
									<option value="ourense">Ourense</option>
								</select><br><br>
						Mascotas: <br>	<input type="checkbox" name="pets[]" value="perro">Perro<br>
										<input type="checkbox" name="pets[]" value="gato">Gato<br>
										<input type="checkbox" name="pets[]" value="caballo">Caballo<br><br>
						Deportes: <br>	<select multiple name="sports[]">
											<option value="futbol">Futbol</option>
											<option value="baloncesto">Baloncesto</option>
											<option value="balonmano">Balonmano</option>
											<option value="tenis">Tenis</option>
										</select><br><br>
						Imagen: <input type="file" name="photo"><br><br>
						<input type="button" name="button" value="Button">
						<input type="submit" name="submit" value="Submit" >
						<input type="button" name="boton" value="Reset">
						-->
					</div> 
			</form>				
		</div>
		
		<div class="bottom">
		</div>
	</body>
</html>