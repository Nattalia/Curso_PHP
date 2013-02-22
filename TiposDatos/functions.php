<?php

/**
 * Recibe un array, de máximo dos dimensiones
 * y lo muestra por pantalla.
 *
 * @param array array de entrada
 * @return true;
 */
function muestraArray($array){
	foreach ($array as $key => $value){
		echo $key.": ";
		if (is_array($value)){
			//muestraArray($value);
			//foreach ($value as $value2){
			//	echo $value2;
			//	echo",";
			//}
			echo implode(',', $value);
		}
		else{
			echo $value;
			echo"<br/>";
		}
	}

	return TRUE;
}