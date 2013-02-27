<?php


/**
 * Read pipe separated file to array
 * @param string $filename
 * @return array $arrayLine
 */
function readDataFromFile($filename)
{
	$content=file_get_contents($filename);
	$arrayFile=explode("\r",$content);
	foreach($arrayFile as $key => $line)
		$arrayLine[] = explode('|', $line);	
	return $arrayLine;
}

/**
 * Write o reWrite array to file 
 * @param string $filename
 * @param array $data
 * @param string $action (d=delete, u=update, i=insert)
 * @return void
 */
function writeDataToFile ($filename, $data, $rewrite=FALSE)
{			
	if($rewrite===TRUE)
	{
		foreach($data as $key => $value)
			$pipes[]=arrayToPipes($value);
		$data=implode("\r",$pipes);
		file_put_contents($filename, $data);
	}
	else
	{
		$data=arrayToPipes($data);
		$data.="\r";
		file_put_contents($filename, $data, FILE_APPEND);
	}
	return;	
}


/**
 * Upload a file to directory with counter rename
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
 * Reads a configuration file section, and returns it in an array 
 * @param string $filename
 * @param string $section
 * @return array $data
 */
function readConfig($filename, $section){
	// Read data from file to array
	$iniString=file_get_contents($filename);
	$iniArray=explode("\r", $iniString);
	
	// Remove empty lines and comments from the array
	$iniArrayWithoutEmpty=array();
	foreach ($iniArray as $value)
	{		
		if ((trim($value) != "") and (strpos($value, ";") !== 0))
			$iniArrayWithoutEmpty[]=trim($value);
	}
	
	// Change to 2d array
	/*$ini2dArray_01=array();
	$ini2dArray_02=array();
	foreach ($iniArrayWithoutEmpty as $key => $value){
		if (strpos($value, '[') !== FALSE)
			$ini2dArray_01[]=$value;
		else 
			$ini2dArray[$key][]=$value;
	}*/
	return $ini2dArray;	
	
	
	
}
