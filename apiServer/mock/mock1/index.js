var JsonServer = require('json-server');
var path = require('path')
var provider = require('./data/dataProvider');

var Server = JsonServer.create();
var defaultMid = JsonServer.defaults({
    "noCors": false,
    "static": path.join(__dirname, "/lib")
});

var router = JsonServer.router(path.join(__dirname, '/route/db.json'));

Server.get('./data',function(req,res){
    var moduleName = req.body ? req.body.moduleName : req.query.moduleName;
    var funName = req.body ? req.body.funName : req.query.funName;
    var arg = null;
    res.json(provider.execute(moduleName, funName));
    res.end();
});

Server.use(defaultMid);
Server.use(router);
Server.listen(8009);
console.log('start 8009.....');
