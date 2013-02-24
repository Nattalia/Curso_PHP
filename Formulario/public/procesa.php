<?php

// Mostramos el contenido de $_POST y $_FILES en arrays
echo "<pre>";
print_r($_POST);
echo "<pre/>";

//echo "<hr/>";

echo "<pre>";
print_r($_FILES);
echo "<pre/>"; 

echo "<hr/>";

// Mostramos los datos en una columna tipo clave:valor
foreach ($_POST as $key => $value)
{
	echo $key.": ";
	if (is_array($value))
	{
		echo "<br>";
		foreach ($value as $value_2)		
			echo "- ".$value_2."<br>";		
	}
	else 	
		echo $value."<br>";		
}

foreach ($_FILES as $key => $value)
{
	echo $key.": ";
	if (is_array($value))
	{
		echo "<br>";
		foreach ($value as $key_2 => $value_2)		
			echo "- ".$key_2.": ".$value_2."<br>";		
	}
	else 	
		echo $value."<br>";		
}	

echo "<hr/>";

require 'functions.php';
// Mostramos los datos como queremos que se vean en el fichero
$string = stringFormated($_POST, $_FILES);
echo $string;

$file = "c:\\Documents and Settings\\Natalia\\Escritorio\\natalia.txt";

// Guardamos los datos en un fichero
if (writeToFile($string, $file))
	echo "Usuario añadido correctamente al archivo";	
else 
	echo "No se ha podido añadir al archivo el usuario";
