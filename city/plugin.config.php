<?php 

use SakuraPanel\Library\Plugins\Plugin;

$plugin = new Plugin();

$plugin->initPluginByJson(dirname(__FILE__)."/plugin.config.json");

$plugin->addRoute(
	"member", 
	"city" ,
	[
		'url'=>['/#/@','/#/@/','/#/@/:action','/#/@/:action/:params'],
	    'controller'=>"\SakuraPanel\Plugins\\${groupName}\Controllers\City",
	    'action'=>1 , 
	    'params'=>2 , 
	    'access' => ['admins' => ['*'] ]
	]
)->addMenu(
	"Admin",
	"city",
	[
		"title"=>"Cities",
		"icon"=>"fas fa-map",
		"url"=>"member/city",
		"access"=>"admins",
	]
);


return $plugin;