<?php

require_once ('autoload.php');
$config="../application/configs/config.ini";

getenv($varname)

$application = new Application ($config, 'development');
$application->Bootstrap()
			->frontController();
