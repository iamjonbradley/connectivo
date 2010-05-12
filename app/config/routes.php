<?php
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'leads', 'action' => 'index'));
	Router::connect('/mobile', array('controller' => 'users', 'action' => 'login', 'plugin' => 'mobile'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
	Router::mapResources(array('users', 'acodeounts'));
	Router::parseExtensions();

?>