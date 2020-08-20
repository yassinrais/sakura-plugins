const connect = require('connect');
const serveStatic = require('serve-static');
const fs = require('fs');
const os = require('os');
const archiver = require('archiver');
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

connect()
    .use(serveStatic(__dirname))
    .listen(config.port,config.ip, () => console.log('[Server] running on 8080...'));

		
let zipFolder = "zips/";
if (!fs.existsSync(zipFolder))  fs.mkdirSync(zipFolder, 0744);

const getPlugins = (config = {})=>{
	// load plugins 
	var plugins = {};
	 
	fs.readdirSync(config.plugin_path).filter(function (d) {
		let cd = config.plugin_path + '/' + d;
	    if (fs.statSync(cd).isDirectory()){
			fs.readdirSync(cd).filter(function (f) {
		    	if (f == config.plugin_name){
		    		// is a plugin
		    		let zip_dist = zipFolder +d+'.zip';
		    		
		    		plugins[d] = {
		    			'path': d  +'/' + f,
		    			'zip': zip_dist,
		    			'config': require(cd + '/'+ f)
		    		}
		    		zipFolderFiles(d +'/' , zip_dist);

		    	}
		    });
	    }
	});
	return plugins;
}
const zipFolderFiles = (src , dist) =>{
	
	try {
	  if (fs.existsSync(dist)) {
	    //file exists
	    fs.unlinkSync(dist);
	    console.log('[',dist,']',' Remove Old File. || Done !');
	  }
	} catch(err) {
	  console.error(err)
	}

	let output = fs.createWriteStream(dist);
	let archive = archiver('zip');

	output.on('close', function () {
	    console.log('[',dist,']',' Done. || ',archive.pointer() + ' total bytes');
	});

	archive.on('error', function(err){
	    throw err;
	});

	archive.pipe(output);

	// append files from a sub-directory and naming it `new-subdir` within the archive (see docs for more options):
	archive.directory(src, false);
	archive.finalize();
}


fs.writeFile('plugins.json', JSON.stringify({
	'server' : (config.ssl ? 'https' : 'http') +'://' + config.ip + ':' + config.port + '/',
	'plugins' : getPlugins(config)
}) , (e,x)=>{
	if (e!== null) console.log(e); 
	else {
		console.log('[plugins.json] saved!'); 
		
	}
} );



