$('#btn').on('click',function(){
    var cq = document.getElementById('cq');
    var cqvalue = cq.value;
    if(cqvalue == ''){
        alert('未填项');
    }else{
        var zm = document.getElementById('zm');
    var zmvalue = zm.value;
    if(zmvalue == ''){
        alert('未填项');
     }else{
        var dyr = document.getElementById('dyr');
    var dyrvalue = dyr.value;
    if(dyrvalue == ''){
        alert('未填项');
     }else{
        var zj = document.getElementById('zj');
    var zjvalue = zj.value;
    if(zjvalue == ''){
        alert('未填项');
     }else{
        var zl = document.getElementById('zl');
    var zlvalue = zl.value;
    if(zlvalue == ''){
        alert('未填项');
     }else{
         $('#cont-div').show();
     }
     }
     }
     }
    }
})