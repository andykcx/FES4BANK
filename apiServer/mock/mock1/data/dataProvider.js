var emp = require('./emp');
var test = require('./test');

var moduels = {
    emp: emp,
	test:test
}

module.exports = {
    execute: function(m, f, args){
        return moduels[m][f].call(moduels[m], args);
    }
}