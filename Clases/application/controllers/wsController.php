<?php
class controllers_wsController extends controllers_abstractController
{
	public function __construct()
	{

	}


	public function indexAction()
	{	
		include ('../library/Zend/Rest/Server.php');
		$server = new Zend_Rest_Server();
		$server->setClass('models_users_users');
		$server->handle();	

		exit();
	}
	
	public function clientAction()
	{
		include ('../library/Zend/Rest/Client.php');
		$server='http://localhost:8080/ws/index';
		$client = new Zend_Rest_Client($server);
		$users = $client->readUsers()->post();		
		
		exit();
		echo $users;
		return $users;
	}
	
	public function errorAction()
	{
	
	}
	
	public function debugAction()
	{
	
	}
	
}