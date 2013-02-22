<?php
/**
 * Functions that are used in Buscaminas
 * @author Natalia M. Rodriguez Rodriguez
 * @copyright 2013
 */

/**
 * This function calculates the number of bombs to play the game
 * @param integer $cells cell's number
 * @return integer number of bombs
 */
function bombsNumber($cells){
	$minBombs = 1;
	$maxBombs = number_format($cells/3, 0);
	$numBombs = rand($minBombs, $maxBombs);

	return $numBombs;
}

/**
 * This function returns an array with all the bombs (*) and (-) in all the other cells
 * @param integer $nRows number of rows
 * @param integer $nColumns number of columns
 * @param integer $nBombs number of bombs
 * @return array $array array with all the bombs 
 */
function bombsArray($nRows, $nColumns, $nBombs){
	$arrayCols = array();
	for ($i=0; $i<$nColumns; $i++)
		$arrayCols[$i] = '-';	
	
	$arrayRows = array();
	for ($i=0; $i<$nRows; $i++)
		$array[$i]=$arrayCols;
	
	// We put all the bombs at the begining of the array and then we shuffle it
	$aux = 0;
	$i = 0;
	$j = 0;
	
	
	while ($aux<$nBombs)
	{
		$array[$i][$j]='*';
		shuffle($array[$i]);
		
		if ($i<$nRows-1)
			$i++;
		else
		{
			$i=0;
			$j++;		
		}
		
		$aux++;
	}	
			
	return $array;
}

/**
 * This function calculates all the numbers of the cells
 * @param integer $nRows number of rows
 * @param integer $nColumns number of columns
 * @param $array array with all the bombs and 0's in the other cells
 * @return $array final array with bombs and numbers
 */

function finalArray($nRows, $nColumns, $bombsArray){
	for ($i=0; $i<$nRows; $i++)
	{
		for ($j=0; $j<$nColumns; $j++)
		{
			if (strcmp($bombsArray[$i][$j], "-") == 0)			
			{
				$contador = 0;
				
				if ($i==0)
					$i2=0;
				else
					$i2=$i-1;
				
				if ($i==$nRows-1)
					$i3=$i;
				else 
					$i3=$i+1;
				
				if ($j==0)
					$j2=0;
				else
					$j2=$j-1;
				
				if ($j==$nColumns-1)
					$j3=$j;
				else
					$j3=$j+1;
								
				for($a=$i2; $a<=$i3; $a++)
				{
					for($b=$j2; $b<=$j3; $b++)
					{				
						if (strcmp($bombsArray[$a][$b],"*") == 0)						
							$contador++;															
					}
				}
				
				$bombsArray[$i][$j]=$contador;
										
			}				
		}
	}
	
	return $bombsArray;
}

/**
 * This function creates the grid whith all the data
 * @param $array bidimensional array whith all the data 
 * @return TRUE
 */
function createGrid($dataArray){	
	echo '<table border="1">';
	foreach ($dataArray as $value)
	{
		echo "<tr>";
		if (is_array($value)){
			foreach ($value as $data)
				echo '<td width="30" length="40" align="center">'.$data."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	return TRUE;
}