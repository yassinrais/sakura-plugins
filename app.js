const connect = require('connect');
const serveStatic = require('serve-static');
const fs = require('fs');
const os = require('os');

/**	
 * Server Configs
 */
const config = {
	ssl : false,
	ip : "127.0.0.1",
	port : 8080,

	plugin_name: "plugin.config.json",
	plugin_path : __dirname
};


const getPlugins = (config = {})=>{
	// load plugins 
	var plugins = {};
	 
	fs.readdirSync(config.plugin_path).filter(function (d) {
		let cd = config.plugin_path + '/' + d;
	    if (fs.statSync(cd).isDirectory()){
			fs.readdirSync(cd).filter(function (f) {
		    	if (f == config.plugin_name)
		    		plugins[d] = {
		    			'path': d  +'/' + f,
		    			'config': require(cd + '/'+ f)
		    		}
		    });
	    }
	});
	return plugins;
}

fs.writeFile('plugins.json', JSON.stringify({
	'server' : (config.ssl ? 'https' : 'http') +'://' + config.ip + ':' + config.port + '/',
	'plugins' : getPlugins(config)
}) , (e,x)=>{if (e!== null) console.log(e); else console.log('plugins.json saved!'); } );

connect()
    .use(serveStatic(__dirname))
    .listen(config.port,config.ip, () => console.log('Server running on 8080...'));

