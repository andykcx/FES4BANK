$('#btn').on('click',function(){
    var ls = document.getElementById('ls');
    var lsvalue = ls.value;
    if(lsvalue == ''){
        alert('未填项');
    }else{
        var bd = document.getElementById('bd');
    var bdvalue = bd.value;
    if(bdvalue == ''){
        alert('未填项');
     }else{
        var dy = document.getElementById('dy');
    var dyvalue = dy.value;
    if(dyvalue == ''){
        alert('未填项');
     }else{
        var dyr = document.getElementById('dyr');
    var dyrvalue = dyr.value;
    if(dyrvalue == ''){
        alert('未填项');
     }else{
         $('#tbody').show();
     }
    
}}}
})