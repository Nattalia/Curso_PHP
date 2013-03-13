<?php
/**
 * Users Controller
 * 
 * @version 1.0 
 * 
 */

class controllers_usersController extends controllers_abstractController
{
	public function __construct()
	{
		echo "esto es users contructor";
	}
	
	
	public function selectAction()
	{
		$users=models_users_users($config);
		$viewVars=array('users'=>$users,
						'title'=>'Usuarios de la aplicación');
		$this->content=controllers_helpers_actionHelpers::renderView('users/select.php', $viewVars);
		return $this->content;
	}
	
	public function insertAction()
	{
		if($_POST)
		{
			$id=insertUser($config, $_POST);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=initUser();
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('forms/user.php', $viewVars);
			return $this->content;
		}
	}
	
	public function updateAction()
	{
		if($_POST)
		{
			updateUser($_REQUEST['id'], $config, $_POST);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('forms/user.php', $viewVars);
			return $this->content;
		}
	}
	
	public function deleteAction()
	{
		if($_POST)
		{
			if($_POST['submit']=='Si')
				deleteUser($_REQUEST['id'],$config);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('users/delete.php', $viewVars);
			return $this->content;
		}
	}
	
	public function indexAction()
	{
		
	}
	
	public function errorAction()
	{
		
	}
	
	public function debugAction()
	{
		
	}
	
}