<?php

/**
 * Update users photo
 * @param string $lastImage
 * @param string $uploadDir
 * @return string $name
 */
function updatePhoto($lastImage, $uploadDir)
{
	// Sobreescibir imagen si hay nueva
	if(isset($_FILES["photo"]["tmp_name"]) && 
			 $_FILES["photo"]["tmp_name"]!='')
	{
		$tmp_name = $_FILES["photo"]["tmp_name"];
		$name = $_FILES["photo"]["name"];
		$ruta = $_SERVER['DOCUMENT_ROOT'].$uploadDir;
		$url = $uploadDir;
		$name=SubirArchivo($_FILES);
	
		// Borrar imagen anterior
		unlink($ruta."/".$lastImage);
	}
	else
	{
		// Usar imagen anterior
		$name=$lastImage;
	}
	
	return $name;
}

function deletePhoto($name, $uploadDir){
	unlink($uploadDir."/".$name);
	return;
}

