<?php

require_once('inc/config.inc.php');
require_once('inc/Utility/SimpleRoute.class.php');

SimpleRoute::initialize(APP_NAME_HOMEPAGE);
$route = SimpleRoute::getRouteHomePage();

print_r($route);

?>