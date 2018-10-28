$('#btn').on('click',function(){
    var cq = document.getElementById('cq');
    var cqvalue = cq.value;
    if(cqvalue == ''){
        alert('未填项');
    }else{
        var zj = document.getElementById('zj');
    var zjvalue = zj.value;
    if(zjvalue == ''){
        alert('未填项');
     }else{
        var bd = document.getElementById('bd');
    var bdvalue = bd.value;
    if(bdvalue == ''){
        alert('未填项');
     }else{
        var qz = document.getElementById('qz');
    var qzvalue = qz.value;
    if(qzvalue == ''){
        alert('未填项');
     }else{
         $('#tbody').show();
     }
    
}}}
})
