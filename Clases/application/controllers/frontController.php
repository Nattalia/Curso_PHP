<?php

class controllers_frontController
{
	protected $config;
	private $layout;
	
	public function __construct($route)
	{
		$route = $route -> getRoute();
		$this->config = $_SESSION['register']['config'];	
				
		$string ="controllers_".$route['controller']."Controller";
		$string2 = $route['action']."Action";
		
		$controller = new $string;
		$this->content = $controller->$string2(); 
		
		$layoutVars=array('content'=>$this->content,
				'title'=>'Mi application');
		$this->layout = controllers_helpers_actionHelpers::renderLayout("layout.php", $layoutVars);		
	}
	
	public function __destruct()
	{
		echo $this->layout;
	} 
	
	
	
	
}