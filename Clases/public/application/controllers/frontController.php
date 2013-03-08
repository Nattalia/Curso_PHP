<?php

class controllers_frontController
{
	
	public function __construct($route)
	{
		include ($config['path.controllers']."/".$route['controller'].".php");
	}
	
	
}