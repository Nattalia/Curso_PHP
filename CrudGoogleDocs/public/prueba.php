<?php
 
// Zend library include path
//set_include_path(get_include_path() . PATH_SEPARATOR . "$_SERVER[DOCUMENT_ROOT]/ZendGdata-1.12.2/library");
set_include_path("C:\\Archivos de programa\\Zend\\ZendServer\\share\\ZendFramework\\library");
     
include_once("../application/libraries/google-spreadsheet/Google_Spreadsheet.php");
 
$u = "natt.81@gmail.com";
$p = "101281nat";
 
$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("usuarios");
$ss->useWorksheet("hoja");
 
// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");
 
$row = array
(
    "name" => "John Doe"
    , "email" => "john@example.com"
    , "password" => "Hello world"
);
 
if ($ss->addRow($row)) echo "Form data successfully stored using Google Spreadsheet";
else echo "Error, unable to store spreadsheet data";




$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("usuarios");
$ss->useWorksheet("hoja");

$rows = $ss->getRows();

echo "<pre>Usuarios";
if ($rows) print_r($rows);
else echo "Error, unable to get spreadsheet data";
echo "</pre>";

// double quotes must be used for values with spaces
$rows = $ss->getRows('nombre="Natalia"');

echo "<pre>Usuario";
if ($rows) print_r($rows);
else echo "Error, unable to get spreadsheet data";
echo "<pre>";

$ss->useSpreadsheet("usuarios");
$ss->useWorksheet("hoja");

// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");

try
{
	if ($ss->deleteRow('nombre="John Doe N"')) echo "Form data successfully deleted";
	else echo "Error, unable to delete data";
}
catch (Exception $e)
{
	echo $e->getMessage();
}
 
?>
