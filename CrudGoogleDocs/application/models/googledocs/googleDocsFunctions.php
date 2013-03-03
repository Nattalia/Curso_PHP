<?php

/**
 * Read pipe separated file to array
 * @param string $filename
 * @return array $arrayLine
 */
function readDataFromGoogleDocs($user, $password)
{
	$ss = new Google_Spreadsheet($user,$password);
	$ss->useSpreadsheet("usuarios");
	$ss->useWorksheet("hoja");
	
	$rows = $ss->getRows();
	
	return $rows;	
}

/**
 * Writes data to google docs
 * @param string $spreadsheet
 * @param string $worksheet
 * @param string $user
 * @param string $password
 * @param array $data
 * @param boolean $rewrite
 * @return number
 */
function writeDataToGoogleDocs ($spreadsheet, $worksheet, $user, $password, $data, $rewrite=FALSE)
{	
		
	$ss = new Google_Spreadsheet($user,$password);
	$ss->useSpreadsheet($spreadsheet);
	$ss->useWorksheet($worksheet);
	
	$id=0;
	if($rewrite===TRUE)
	{ 
		foreach($data as $key => $value)
		{
			$value = array2dToArray($value);
			$ss->addRow($value);
		}			
	}
	else
	{
		$data = array2dToArray($data);
		$ss->addRow($data);				
	}
	return $id;	
}

/**
 * Function that clears the spreadsheet
 * 
 * @param string $spreadsheet
 * @param string $worksheet
 * @param string $user
 * @param string $password
 * @param array $users
 * @return boolean
 */
function clearSpreadSheet($spreadsheet, $worksheet, $user, $password, $users)
{
	// Borramos todas las filas de la hoja antes de escribir las nuevas
	$ss = new Google_Spreadsheet($user,$password);
	$ss->useSpreadsheet($spreadsheet);
	$ss->useWorksheet($worksheet);
	
	foreach ($users as $key => $value)
	{
		$ss->deleteRow('name='.$value["name"]);
	}
	
	return TRUE;
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

