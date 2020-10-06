<?php 

use SakuraPanel\Library\Plugins\Plugin;

$plugin = new Plugin();

$plugin->initPluginByJson(dirname(__FILE__)."/plugin.config.json");

$plugin->addRoute(
	"member", 
	"newsletter" ,
	[
		'url'=>['/#/@','/#/@/','/#/@/:action','/#/@/:action/:params'],
	    'controller'=>"\SakuraPanel\Plugins\\${groupName}\Controllers\Newsletter",
	    'action'=>1 , 
	    'params'=>2 , 
	    'access' => ['admins|moderators']
	]
)->addRoute(
	"member", 
	"campaigns" ,
	[
		'url'=>['/#/newsletter/campaigns','/#/newsletter/campaigns/:action','/#/newsletter/campaigns/:action/:params'],
	    'controller'=>"\SakuraPanel\Plugins\\${groupName}\Controllers\Campaign",
	    'action'=>1 , 
	    'params'=>2 , 
	    'access' => ['admins|moderators']
	]
)
->addMenu(
	"general",
	"newsletter",
	[
		"title"=>"Newsletter",
		"icon"=>"fas fa-envelope",
		"url"=>"member/newsletter",
		"access"=>"admins|moderators",
		"sub"=>[
			"list"=>[
				"title"=>"Subscribers",
				"icon"=>"fas fa-user-friends",
				"url"=>"member/newsletter/list",
				"access"=>"admins|moderators"
			],
			"groups"=>[
				"title"=>"Groups",
				"icon"=>"fas fa-users-cog",
				"url"=>"member/newsletter/groups",
				"access"=>"admins|moderators"
			],
			"campaigns"=>[
				"title"=>"Campaigns",
				"icon"=>"fas fa-mail-bulk",
				"url"=>"member/newsletter/campaigns",
				"access"=>"admins|moderators"
			],
		]
	]
)
->addSql([
	'install'=>dirname(__FILE__).'/sql/install.sql'
])
;

return $plugin;