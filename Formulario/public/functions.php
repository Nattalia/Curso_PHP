<?php
/**
 * Functions that are used to generate the data
 * @author Natalia M. Rodriguez Rodriguez
 * @copyright 2013
 */

/**
 * This function returns the string to write in the file
 * @param array $post that contains the post variables 
 * @param array $files that contains the files
 * @return string to write in the file
 */
 
function stringFormated($post, $files)
{
	$dataString="";
	
	foreach ($post as $key => $value)
	{
		if (strcmp($key, "submit") != 0)
		{
			if (is_array($value))
			{
				foreach ($value as $value_2)
				{					
					if (next($value))						
						$dataString .= $value_2.", ";
					else						
						$dataString .= $value_2;
				}
			}
			else				
				$dataString .= $value;
				
			$dataString .= " | ";
		}
	}
	
	foreach ($files as $value)
	{
		if (is_array($value))
		{
			foreach ($value as  $value_2)
			{
				if (next($value))					
					$dataString .= $value_2.", ";
				else					
					$dataString .= $value_2;
			}
				
		}
	}	
	
	return $dataString."\n";
}

/**
 * This function writes a string into a file
 * @param string $string string to write into the file
 * @param string $file name of the file
 * @return true is the string is correctly written, false in other case
 */

function writeToFile($string, $file)
{	
	$fileWritten = TRUE;
	//if (is_writable($file)) 
	//{	
		if (!$handler = fopen($file, 'a')) 
		{
			$fileWritten = FALSE;
			echo "Error en fopen";
			return $fileWritten;			
		}

		if (fwrite($handler, $string) === FALSE) 
		{
			$fileWritten = FALSE;
			echo "Error en fwrite";
			return $fileWritten;
		}
				
		fclose($handler);
	
	//} else
	//{	 
	//	$fileWritten = FALSE;
	//	echo "Fichero no es writable";
	//}		
	
	return $fileWritten;
}