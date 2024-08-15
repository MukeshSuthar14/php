<?php
$connection = 'http://'.(isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"localhost");

defined('SITE_URL') OR define('SITE_URL', $connection.'/msdoticon/');

defined('LOCALS_KEY') OR define('LOCALS_KEY', 'locals');

defined('ROUTE_METHOD') OR define('ROUTE_METHOD', 0);
defined('ROUTE_URI') OR define('ROUTE_URI', 1);
defined('ROUTE_MIDDLE') OR define('ROUTE_MIDDLE', 2);
defined('ROUTE_ACTION') OR define('ROUTE_ACTION', 3);

defined('ASSET_PATH') OR define('ASSET_PATH', SITE_URL.'/public/');
defined('VIEW_PATH') OR define('VIEW_PATH', BASE_PATH.'/view/');
defined('SHOW_ERROR') OR define('SHOW_ERROR', true);
defined('FLASH_KEY') OR define('FLASH_KEY', 'flash');