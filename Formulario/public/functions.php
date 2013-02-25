<?php

/**
* Shows an array (max two dimensions)
* @param array $array 
* @return true
*/
function muestraArray($array)
{
	foreach ($array as $key => $value)
	{	
		echo $key.": ";
		if(is_array($value))
		{
			/* Aqui hay que poner algo */
			// foreach ($value as $value2)
			// echo $value2.",";
			echo implode(',', $value);
		}
		else
		{
			echo $value;
		}
		echo "<br/>";
	}

	return TRUE;
}


/**
* Upload a file to directory
* @param array $arrayFiles
* @return string $name
*/
function SubirArchivo($arrayFiles)
{
	$uploads_dir = "/uploads";
	$tmp_name = $arrayFiles["photo"]["tmp_name"];
	$name = $arrayFiles["photo"]["name"];
	$ruta = $_SERVER['DOCUMENT_ROOT'].$uploads_dir;
	$url = $uploads_dir;
	
	// Comprobar si el nombre existe en el diretorio
	if(file_exists($ruta."/".$name))
	{	// Si existe BuscarNombre
		$a=0;
		$path_parts = pathinfo($ruta."/".$name);
		// Mientras que Nombre-[contador].jpg EXISTA en directorio
		while(file_exists($ruta."/".$name))
		{
			// Aumento contador
			$a++;
			// Cambiar el nombre y volver a intenter
			$name=$path_parts['filename']."-".$a.".".$path_parts['extension'];
		}
		// Al salir tendre el contador que no existe
		// Subir el fichero al directorio con el nuevo nombre
		move_uploaded_file($tmp_name, $ruta."/".$name);
	}
	
	else	// No existe
	{
		// Subir el fichero al directorio con el mismo nombre
		move_uploaded_file($tmp_name, $ruta."/".$name);
	}
	
	return $name;
}


/**
* Recibe un array, de máximo dos dimensiones,
* y devuelve un array con los elementos de la segunda
* dimensión separados por comas.
*
* @param array array de entrada
* @return array comma separated
*/
function cambiaArray($array)
{
	$array2 = array();
	
	foreach ($array as $key => $value)
	{
		if(is_array($value))
			$array2[]=implode(',', $value);
		else
			$array2[]=$value;	
	}
	
	return $array2;
}

/**
 *  Function that returns an array whit all the lines of a txt file 
 *
 *  @param string $file file
 *  @return array $array array
 */
function txtToArray($file)
{
	$content=file_get_contents($file);
	$array=explode("\r",$content);
	
	return $array; 
}


/**
 *  Function that returns a line from a file
 *  
 *  @param string $file file
 *  @param integer $numLine line that we want 
 *  @return string $line line 
 */
function lineFromFile($file, $numLine)
{
	$array = txtToArray($file);
	$line = $array[$numLine];	
	
	return $line;
}


/**
 *  Function that converts a string into an array 
 *
 *  @param string $line 
 *  @return array $array
 */
function lineToArray($line){
	$array=array();	
	$array=explode("|", $line);
	// Second level
	foreach ($array as $key => $value){
		if (strpos($value, ","))
			$array[$key]=explode(",", $value);
	}
	return $array;
}




