<?php 

use SakuraPanel\Library\Plugins\Plugin;

$plugin = new Plugin();

$plugin->initPluginByJson(dirname(__FILE__)."/plugin.config.json");

$plugin->addRoute(
	"member", 
	"country" ,
	[
		'url'=>['/#/@','/#/@/','/#/@/:action','/#/@/:action/:params'],
	    'controller'=>"\SakuraPanel\Plugins\\${groupName}\Controllers\Country",
	    'action'=>1 , 
	    'params'=>2 , 
	    'access' => ['admins' => ['*'] ]
	]
)->addMenu(
	"Admin",
	"country",
	[
		"title"=>"Countries",
		"icon"=>"fas fa-globe",
		"url"=>"member/country",
		"access"=>"admins",
	]
)->addSql([
	'install'=>dirname(__FILE__).'/sql/install.sql',
	'delete'=>dirname(__FILE__).'/sql/delete.sql'
]);


return $plugin;