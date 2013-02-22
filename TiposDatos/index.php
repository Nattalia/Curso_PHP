<?php 
/**
 * Data types in PHP
 * Author: Natalia M. Rodriguez Rodriguez
 * Copyright: 2013
 * License: GPL 
 */

$name = "Natalia";
$edad = "31";
$direccion = array('Via Julia', 'Barcelona', '123');
$vacio = NULL;
$deporte = FALSE;

echo @$nombre;


var_dump($name);
var_dump($edad);
var_dump($direccion);
var_dump($vacio);
var_dump($deporte);

echo "<hr/>";   // Pinta una línea separadora

var_dump($direccion);

echo"<pre>";
print_r($direccion);
echo "<pre>";

echo "<hr/>";

//echo"<pre>";
//print_r($_SERVER);
//echo "<pre>";

echo $_SERVER['DOCUMENT_ROOT'];

echo 3-2*2*8/3*2-2*4-2;

echo "<br/>";

echo 5<<2; // desplazamiento de bits


echo "<br/>";
echo "<br/>";

// PROGRAMA QUE CREA UNA TABLA DE MULTIPLICAR

$columnas = 4;  // columnas
$filas = 5;  // filas


echo '<table border="1">\n';
for ($a=0 ; $a<$filas; $a++) {
	echo "<tr>\n";
	for ($b=0; $b<$columnas; $b++){
		//echo "<td>".$a*$b."</td>";
		if ($a==0 && $b==0)
			echo "<td>"."</td>";
		elseif ($a==0)
			echo "<td>".$b."</td>";
		elseif ($b==0) 
			echo "<td>".$a."</td>";
		else 
			echo "<td>".$a*$b."</td>";
	}
	echo "</tr>\n";
}
echo "</table>\n";

echo "<br/>";

// PROGRAMA QUE ESCRIBE LA SERIE DE FIBONACCI

$max=22;

echo "F = 0,1,";
$n0=0;
$n1=1;
$n2=$n0+$n1;

while($n2<$max){
	echo $n2.",";
	$n0=$n1;
	$n1=$n2;
	$n2=$n0+$n1;
}


// FUNCIONES Y ARRAYS

$alumno=array(
		'nombre' => 'Natalia',
		'apellidos' => 'Rodriguez',
		'email' => 'mail@gmail.com',
		'edad' => 31,
		FALSE,   // Clave 0, porque no tiene valor asociativo (nombre)
		'',
		'estudiante' => TRUE,
		'algo',
		FALSE => 'cosa', // sobreescribe lo que tiene la llave 0, porque FALSE = 0
		1.7 => 'y este', // tendría clave 1 (sólo se queda con la parte entera)
		6 => 'mas aun',
		123,
		array('rojo', 'verde', 'naranja')		
);

$otro=array(		
		123,
		array('perro', 'gato', 'oca')
);

echo "<pre>";  //debug
print_r($alumno);
echo "<pre>";


foreach ($alumno as $key => $value){
	echo $key.": ".$value;
	echo"<br/>";
}




echo"<br/>";
echo"<br/>";

require 'functions.php';

muestraArray($alumno);
echo"<hr/>";
muestraArray($otro);

// FORMATEAR LA FECHA

$fecha = date('\H\o\y\, \S\e\m\a\n\a W \d\e\l Y \, \a d \d\e\l \m\e\s m \, F');
print($fecha);




