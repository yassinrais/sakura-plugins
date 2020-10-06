<?php 

use SakuraPanel\Library\Plugins\Plugin;

$plugin = new Plugin();

$plugin->initPluginByJson(dirname(__FILE__)."/plugin.config.json");

$plugin->addRoute(
	"member", 
	"customers" ,
	[
		'url'=>['/#/@','/#/@/','/#/@/:action','/#/@/:action/:params'],
	    'controller'=>"\SakuraPanel\Plugins\\${groupName}\Controllers\Customers",
	    'action'=>1 , 
	    'params'=>2 , 
	    'access' => ['admins' => ['*'] ]
	]
)
->addMenu(
	"Customers",
	"customers",
	[
		"title"=>"Customers",
		"icon"=>"fas fa-box",
		"url"=>"member/customers",
		"access"=>"admins",
	]
)
// ->addSql([
// 	'install'=>dirname(__FILE__).'/sql/install.sql',
// 	'delete'=>dirname(__FILE__).'/sql/delete.sql'
// ])
;

return $plugin;