/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList();
    
});
$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList();
// Initialization
    $('#work_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
// Access instance of plugin
    $('#work_date').data('datepicker');
    $('#write_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
// Access instance of plugin
    $('#write_date').data('datepicker');
});
function back()
{
    history.back();
}
function getList() {
    $.post('../../modules/project/action/getAllBusType.php', {}, function (data) {
        $('#list').html(data);
    });
}
//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/project/action/actionBusType.php', {type: "delete", id: obj}, function (data) {
            getList();
        });
        return true;
    } else {
        return false;
    }
}


