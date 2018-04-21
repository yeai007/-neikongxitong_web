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
    getList($("#pagetype").val());
});
function back()
{
    history.back();
}

function getList(obj) {
    $.post('../../modules/setting/action/getAllRoles.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/setting/action/actionRole.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}


