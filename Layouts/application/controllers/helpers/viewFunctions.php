<?php

/**
 * Render view with viewVars
 * 
 * @param array $config
 * @param string $view
 * @param array $viewVars
 * @return string $content
 */
function renderView($config, $view, array $viewVars=null)
{
	ob_start();
		include_once ($config['path.views']."/".$view);
	$content = ob_get_clean();
	ob_end_clean();
	
	
	return $content;
}


/**
 * Render layouts with layoutVars
 * 
 * @param array $config
 * @param string $layout
 * @param array $layoutVars
 * @return string
 */
function renderLayout($config, $layout=NULL, array $layoutVars=null)
{
	if ($layout===NULL)
		$layout=$config['default.layout'];
	
	ob_start();
		include_once ($config['path.layout']."/".$layout);
	$layout = ob_get_contents();
	ob_end_clean();
	
	return $layout;
}