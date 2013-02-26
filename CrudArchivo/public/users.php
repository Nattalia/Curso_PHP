<?php
/**
 * Users Controller
 * 
 * @version 1.0
 * 
 */

if (isset($_GET['action']))
	$action=$_GET['action'];
else 
	$action='select';

switch ($action)
{
	case 'insert':
		echo "insert";
		include_once 'usersForm.php';
	break;
		
	case 'update':
		echo "update";
	break;
		
	case 'delete':
		echo "delete";
	break;
		
	case 'select':
		echo "select";
		include_once 'usersSelect.php';
	break;
		
	default:
		echo "default";
	break;
}