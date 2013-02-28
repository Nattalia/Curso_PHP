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
 * @param boolean $rewrite
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
 * Delete file from directory
 * @param string $filename
 * @param string $directory
 * @ return void
 */
function deleteFile($filename, $directory)
{
	$ruta = $_SERVER['DOCUMENT_ROOT'].$directory;
	unlink($ruta."/".$filename);
	return;
}


/**
 * Reads an ini file and returs data of the section
 * @param string $config
 * @param string $section
 * @return $array
 */

function readConfig($config, $section)
{
	// Leer ini con parse_ini_file
	$parseIni=parse_ini_file($config, TRUE);
		
	$values=array();
	// Buscar la sección 
	if (array_key_exists($section, $parseIni))   
		// No tiene herencia. Devolver array de esa seccion
		$values=$parseIni[$section];			
	else  
	{
		// Comprobamos si tiene herencia: Recorremos el array
		// y buscamos la clave que comienza $section.":"
		foreach ($parseIni as $key => $value)
		{			
			// Hay herencia
			if (strpos($key, $section.":") !== FALSE)
			{
				// Separamos las dos claves
				$sections=explode(":", $key);
				$array1 = $parseIni[$key];	
				// Buscamos la seccion padre
				if (array_key_exists($sections[1], $parseIni))
					$array2 = $parseIni[$sections[1]];

				$values = array_merge($array2, $array1);
			}	
		}
		
	}
	return $values;
}
