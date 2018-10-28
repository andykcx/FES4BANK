$('#btn').on('click',function(){
    var fc = document.getElementById('fc');
    var fcvalue = fc.value;
    if(fcvalue == ''){
        alert('未填项');
    }else{
        var bd = document.getElementById('bd');
    var bdvalue = bd.value;
    if(bdvalue == ''){
        alert('未填项');
     }else{
        var dyr = document.getElementById('dyr');
    var dyrvalue = dyr.value;
    if(dyrvalue == ''){
        alert('未填项');
     }else{
        var zl = document.getElementById('zl');
    var zlvalue = zl.value;
    if(zlvalue == ''){
        alert('未填项');
     }else{
        var sl = document.getElementById('sl');
    var slvalue = sl.value;
    if(slvalue == ''){
        alert('未填项');
     }else{
         $('.cont-tb').show();
     }
     }
     }
     }
    }
})
$(document).ready(function(){
    //先获得控制全选反选的input标签
  var all = document.getElementById("theadInp");
  //获得tbody
  var tbody = document.getElementById("tbody");
 //获得天tbody里面的子元素
  var checkboxs = tbody.getElementsByTagName("input");
  //给控制全选反选的input标签绑定事件
  all.onclick = function() {
  //遍历tbody里面的input标签，把inputAll的状态赋值给icheck
      for (var i = 0; i < checkboxs.length; i++) {
 
          var checkbox = checkboxs[i];
 
          checkbox.checked = this.checked;
 
      }
 
  };
  //点击的时候在遍历icheck，看看是否有没选中的
  for (var i = 0; i < checkboxs.length; i++) {
 
      checkboxs[i].onclick = function() {
  //定义一个标志来记录
          var isCheckedAll = true;
 
          for (var i = 0; i < checkboxs.length; i++) {
 
              if (!checkboxs[i].checked) {
 
                  isCheckedAll = false;
 
                  break;
 
              }
 
          }
 
          all.checked = isCheckedAll;
 
      };
 
  }
})