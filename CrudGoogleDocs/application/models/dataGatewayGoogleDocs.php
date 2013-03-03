<?php

/**
 * Read users from file
 * @param array $config
 * @throws Exception
 * @return array: $users | FALSE
 */
function readUsers($config)
{
	$user = $config["googledocs"]["user"];
	$password = $config["googledocs"]["password"];
	$ss = $config["googledocs"]["spreadsheet"];
	$ws = $config["googledocs"]["worksheet"];
		
	$users=readDataFromGoogleDocs($user, $password);
	
	return $users;		
}


/**
 * Read id user from file 
 * @param int $id
 * @param array $config
 * @return array $user
 */
function readUser($id, $config)
{
	$user = $config["googledocs"]["user"];
	$password = $config["googledocs"]["password"];
	$ss = $config["googledocs"]["spreadsheet"];
	$ws = $config["googledocs"]["worksheet"];
	
	$dataArray=readDataFromGoogleDocs($user, $password);
			
	$myUser=$dataArray[$id];
	
	// Cambiamos claves asociativas a numéricas
	$myUser=array_values($myUser);
	if(isset($myUser[8]))		
		$myUser[8]=commaToArray($myUser[8]);
	else 
		$myUser[8]=array();
	
	if(isset($myUser[9]))
		$myUser[9]=commaToArray($myUser[9]);
	else 
		$myUser[9]=array();			

	return $myUser;
}

/**
 * Delete user from file
 * @param int $id
 * @param array $config
 * @return void;
 */
function deleteUser($id,$config)
{
	$uploadDir=$config['production']['uploadDirectory'];
	$user = $config["googledocs"]["user"];
	$password = $config["googledocs"]["password"];
	$ss = $config["googledocs"]["spreadsheet"];
	$ws = $config["googledocs"]["worksheet"];
	
	$deletedUser=readUser($id, $config);
	deleteFile($deletedUser[11], $uploadDir);
	
	$users=readUsers($config);		
	
	clearSpreadSheet($ss, $ws, $user, $password, $users);
	
	unset($users[$id]);
	
	writeDataToGoogleDocs($ss, $ws, $user, $password, $users, TRUE);	
	
	return;
}

/**
 * Update id user 
 * @param int $id
 * @param array $config
 * @param array $data
 */
function updateUser($id,$config, $data)
{
	$uploadDir=$config['production']['uploadDirectory'];
	$user = $config["googledocs"]["user"];
	$password = $config["googledocs"]["password"];
	$ss = $config["googledocs"]["spreadsheet"];
	$ws = $config["googledocs"]["worksheet"];
	
	$updateUser=readUser($id, $config);
	$users=readUsers($config);
	
	clearSpreadSheet($ss, $ws, $user, $password, $users);
			
	$name=updatePhoto($updateUser[11], $uploadDir);
	$data["photo"]=$name;
	
	
	$users[$id]=$data;
			
	writeDataToGoogleDocs($ss, $ws, $user, $password, $users, TRUE);
	
	return;
}

/**
 * Insert user into file
 * @param array $config
 * @param array $data
 * @return int $id
 */
function insertUser($config, $data)
{
	$uploadDir=$config['production']['uploadDirectory'];
	$user = $config["googledocs"]["user"];
	$password = $config["googledocs"]["password"];
	$ss = $config["googledocs"]["spreadsheet"];
	$ws = $config["googledocs"]["worksheet"];
	
	$name=insertPhoto($uploadDir);
	$data["photo"]=$name;	
	$id=writeDataToGoogleDocs ($ss, $ws, $user, $password, $data, $rewrite=FALSE);
	
	return $id;
}




