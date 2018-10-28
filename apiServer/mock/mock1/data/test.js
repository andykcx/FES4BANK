var mockjs = require('mockjs');

module.exports = {
    list: function(){ 
        var data = mockjs.mock({
            'list|3':[
                {
                    'id|+1':1,
					'name':'@cname'
                }
            ]
        });
        return data.list;
    }
}