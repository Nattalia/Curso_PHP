<!--
Maqueta inicial
 
<a href="#">Add</a>
<table border=1>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>address</th>
		<th>description</th>
		<th>sex</th>
		<th>city</th>	
		<th>pets</th>
		<th>sports</th>
		<th>submit</th>
		<th>photo</th>	
		<th>options</th>
	</tr>
	<tr>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>	
		<td><a href="#">update</a>&nbsp;<a href="#">delete</a></td>
	</tr>
</table>
 -->

<?php

require 'functions.php';

// Configuracion
$file = "usuarios.txt";

// Leer el fichero de datos y guardar cada linea en una posición de un array
$arrayFile = txtToArray($file);

// echo "<pre>";
// print_r($arrayFile[0]);
// echo "</pre>";


// die ("hasta aqui");

echo "
	<a href=\"formulario.php\">Add</a>
	<table border=1>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>email</th>
			<th>password</th>
			<th>address</th>
			<th>description</th>
			<th>sex</th>
			<th>city</th>
			<th>pets</th>
			<th>sports</th>
			<th>submit</th>
			<th>photo</th>
			<th>options</th>
		</tr>";

// Mostrar en la tabla
// Recorrer para cada linea
foreach($arrayFile as $key => $line)
{
	echo "<tr>";
	$arrayLine = explode('|', $line);
	// Recorrer para cada elemento
	foreach($arrayLine as $key1 => $value)
	{
		echo "<td>";
		echo $value;
		echo "</td>";
	}
	//echo "<td><a href=\"formulario.php?name=NaNaNa\">update</a>
	echo "<td><a href=\"formulario.php?id=".$key."\">update</a>		
			&nbsp;
			<a href=\"#\">delete</a>
			</td>";	
	echo "</tr>";
}

echo "</table>";
