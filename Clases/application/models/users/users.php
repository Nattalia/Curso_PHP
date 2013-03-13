<?php

class models_users_users
{
	protected $link;
	
	public function __construct()
	{
		$this->link = models_dataGatewayMysql::newInstance()->link;
	}
	
	public function readUsers()
	{		
		$query = "SELECT * FROM users";
		$result = mysqli_query($this->link,$query);
		while ($row = mysqli_fetch_assoc($result))
		{
		
			$query2 = "SELECT * FROM users_has_sports WHERE users_iduser=".$row['iduser'];
			$result2 = mysqli_query($this->link,$query2);
		
			$sports=array();
			while ($sport = mysqli_fetch_assoc($result2))
				$sports[]=$sport['sports_idsport'];
		
			$row['sports']=implode(',',$sports);
			$users [] = $row;
		}
		
		return $users;
	}
	
	function readUser($id, $config)
	{		
		$query="SELECT * FROM users WHERE iduser=".$id;
		$result=mysqli_query($cnx,$query);
		while ($row = mysqli_fetch_assoc($result))
		{
			$user [] = $row;
		}
		
		// FIXME: --5.03.13--acl--Normalizar la base de datos
		$user[0]['pets']=explode(',',$user[0]['pets']);
		
		$query="SELECT * FROM users_has_sports WHERE users_iduser=".$id;
		$result=mysqli_query($cnx,$query);
		while($sport=mysqli_fetch_assoc($result))
			$sports[]=$sport['sports_idsport'];
		
		
		$user[0]['sports']=$sports;
		return $user[0];
	}
	
	function deleteUser($id,$config)
	{
		
	}
	
	function updateUser($id,$config, $data)
	{
		
	}
	
	function insertUser($config, $data)
	{
		
	}
	
	function initUser()
	{
		
	}
}