<?php



/**
 * Read users from mysql
 * @param array $config
 * @throws Exception
 * @return array: $users | FALSE
 */
function readUsers($config)
{
	$cnx=connectDB($config);	
	$query = "SELECT * FROM users";
	$result = mysql_query($query, $cnx);
	while ($row = mysql_fetch_assoc($result))
	{		
		$users [] = $row;
	}	
	return $users;
}


function connectDB($config)
{
	// Conectar al servidor de BD
	$cnx = mysql_connect($config['db.server'], $config['db.user'], $config['db.password']);
	
	// Conectar a la BD
	mysql_select_db($config['db.database']);
}

function disconnectDB($cnx)
{
	mysql_close($cnx);
	return;	
}
 

/**
 * Read id user from mysql 
 * @param int $id
 * @param array $config
 * @return array $user
 */
function readUser($id, $config)
{
	$userFilename=$config['production']['userFilename'];
	
	$dataArray=readDataFromFile($userFilename);
	$user=$dataArray[$id];
	
	return $user;
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
	$userFilename=$config['production']['userFilename'];
	
	$user=readUser($id, $config);
	$users=readUsers($config);
	deleteFile($user[11], $uploadDir);
	unset($users[$_POST['id']]);
	writeDataToFile($userFilename, $users, TRUE);
	
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
	$userFilename=$config['production']['userFilename'];
	
	$user=readUser($id, $config);
	$dataArray=readUsers($config);
	$name=updatePhoto($user[11], $uploadDir);
	$data[]=$name;
	$dataArray[$data['id']]=$data;
	writeDataToFile($userFilename, $dataArray, TRUE);
	
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
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	$cnx = connectDB($config);
	
	// Leer usuarios de la tabla
	$query = "INSERT INTO users (name, email, password, address, description, pets, genders_idgender, cities_idcity) 
			  VALUES (".$data[1].",".$data[2].")";
	$result = mysql_query($query);
	
	// Leer el recordset
	while ($row = mysql_fetch_assoc($result))
	{		
		$users [] = $row;
	}
	
	// Devolver array
	return $users;
}




