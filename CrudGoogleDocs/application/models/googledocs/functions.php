<?php

/**
 * Read comma separeted string and return array
 * @param string $commaValue
 * @return array $array
 */
function commaToArray($commaValue)
{
	$array=array();
	if(!empty($commaValue))
		$array=explode(',',$commaValue);
	else
		$array=array();

	return $array;
}

/**
 * Read array and return comma separeted string 
 * @param array $arrayValue
 * @return string $string
 */
function arrayToComma($arrayValue)
{
	$string="";
	if(!empty($arrayValue))
		$string=implode(',',$arrayValue);
	else
		$string="";

	return $string;
}



/**
 * Recibe un array, de máximo dos dimensiones,
 * y lo separa por comas y luego por pipes.
 *
 * @param array array de entrada
 * @return array comma separated
 */
function arrayToPipes($array)
{
	$array2 = array();

	foreach ($array as $key => $value)
	{
		if(is_array($value))
			$array2[]=implode(',', $value);
		else
			$array2[]=$value;
	}
	$array2=implode('|',$array2);
	return $array2;	
}


/**
 * Recibe un array, de máximo dos dimensiones,
 * y lo convierte en uno de una dimension
 *
 * @param array array de entrada
 * @return array comma separated
 */
function array2dToArray($array)
{
	$array2 = array();

	foreach ($array as $key => $value)
	{
		if(is_array($value))
			$array2[$key]=implode(',', $value);
		else
			$array2[$key]=$value;
	}
	
	return $array2;
}