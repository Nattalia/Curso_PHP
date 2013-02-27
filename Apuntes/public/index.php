
<?php
function algunaFuncion() 
{
}

$variableFuncion = 'algunaFuncion';

var_dump(is_callable($variableFuncion, false, $nombre_a_llamar));  // bool(true)

echo $nombre_a_llamar, "\n";  // algunaFuncion



//
//  Array que contiene un método
//

class algunaClase {

	function algunMetodo()
	{
	}

}


$unObjeto = new algunaClase();

$variableMetodo = array($unObjeto, 'algunMetodo');

var_dump(is_callable($variableMetodo, true, $nombre_a_llamar));  //  bool(true)

echo $nombre_a_llamar, "\n";  //  algunaClase::algunMetodo


?>
