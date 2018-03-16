/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#add_customer').click(function () {//点击按钮提交
        alert(111111);
        //要提交的表单id为form1
//        $('#form1').ajaxSubmit({
//            success: function (data) {
//                alert(data);//参数是一个对象 而不是函数 这个返回还是是参数对象的一个方法
//            }
//        });
//        return false;
    });
});
function back()
{
    history.back();
}