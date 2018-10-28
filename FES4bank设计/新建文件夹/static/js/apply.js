  //第一个表格全选功能
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
//第二个表格全选功能
$(document).ready(function(){
    //先获得控制全选反选的input标签
  var all = document.getElementById("theadInp1");
  //获得tbody
  var tbody = document.getElementById("tbody1");
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
//第三个表格全选功能
$(document).ready(function(){
    //先获得控制全选反选的input标签
  var all = document.getElementById("theadInp2");
  //获得tbody
  var tbody = document.getElementById("tbody2");
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
//第四个表格全选功能
$(document).ready(function(){
    //先获得控制全选反选的input标签
  var all = document.getElementById("theadInp3");
  //获得tbody
  var tbody = document.getElementById("tbody3");
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
//第五个表格全选功能
$(document).ready(function(){
    //先获得控制全选反选的input标签
  var all = document.getElementById("theadInp4");
  //获得tbody
  var tbody = document.getElementById("tbody4");
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