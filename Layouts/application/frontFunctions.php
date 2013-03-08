<?php


function router($config)
{
	$controllerActions=array(
						'index'=>array('index'),
						'author'=>array('login','logout'),
						'users'=>array('insert','update','delete','select')
					);
	$parse=explode('/',$_SERVER['REQUEST_URI']);
	
	$route['controller']=$parse[1];
	@$route['action']=$parse[2];
	
	if(file_exists($config['path.controllers']."/".$route['controller'].".php"))
		if(in_array($route['action'],$controllerActions[$route['controller']]))
		{
			for($i=3;$i<sizeof($parse);$i+=2)
			{
				$_REQUEST[$parse[$i]]=$parse[$i+1];
			}
		}
		else
		{
			$route['controller']='error';
			$route['action']=NO_ACTION;
		}
	else
	{
// 		$route['controller']='error';
// 		$route['action']=NO_CONTROLLER;
		
		$route['controller']='index';
		$route['action']='index';
	}
	
// 	debug($route);
// 	debug($_REQUEST);
	
// 	die;
	return $route;
}



function acl($route)
{
	
	if(!isset($_SESSION['idrol']))
	{
		// FIXME: -8.03.2013-acl-: HARDCODE DEFAULT ROL
		$_SESSION['idrol']=4;
	}
	

	$permissions = array('1'=>
			array('index'.'.'.'index',
					'author'.'.'.'login',
					'author'.'.'.'logout',
					'users'.'.'.'select',
					'users'.'.'.'insert',
					'users'.'.'.'update',
					'users'.'.'.'delete'),
			'3'=>array('index'.'.'.'index',
					'author'.'.'.'login',
					'author'.'.'.'logout'),
			'4'=>array('index'.'.'.'index',
					'author'.'.'.'login',
					'author'.'.'.'logout')
	);
	
	
	if(isset($_SESSION['iduser']))
	{				
		if(in_array($route['controller'].'.'.$route['action'],
					$permissions[$_SESSION['idrol']]))
		{			
			return $route;
		}			
	}	
	elseif($_SESSION['idrol']===4)
	{
		if(in_array($route['controller'].'.'.$route['action'],
				$permissions[$_SESSION['idrol']]))
		{
			return $route;
		}
		
	}
	$route['controller']='author';
	$route['action']='login';
	
	return $route;
}









