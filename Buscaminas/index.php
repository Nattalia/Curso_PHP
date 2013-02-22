<H2>BUSCAMINAS</H2>
<H4>Natalia M. Rodriguez Rodriguez</H4>

<?php

/**
 * Buscaminas
 * @author Natalia M. Rodriguez Rodriguez
 * @copyright 2013
 **/

require 'functions.php';

$rows = 20;			// Grid's rows 
$columns = 20;  		// Grid's columns

$cells = $rows * $columns;	// Grid's cells 

$bombs = bombsNumber($cells);  // Number of bombs to put on the grid
$bombsArray = bombsArray($rows, $columns, $bombs);	// Array whith bombs
$finalArray = finalArray($rows, $columns, $bombsArray);


echo"<pre>";
createGrid($finalArray);
echo"<pre>";
?>

