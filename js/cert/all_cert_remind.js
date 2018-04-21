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
//    $("#isremind").change(function () {
//        console.log($(this).children('option:selected').val() + $(this).children('option:selected').text());
//        if (window.confirm("你确定修改下次提醒吗？")) {
//            $.post('../../modules/cert/action/actionCert.php', {
//                type: "remind",
//                id: $(this).children('option:selected').val(),
//                sel: $(this).children('option:selected').text()
//            }, function (data) {
//                alert(data.msg);
//            }, 'json');
//            return true;
//        } else {
//            return false;
//        }
//
//    });
});
function back()
{
    history.back();
}
function getList(obj) {
    $.post('../../modules/cert/action/getAllCertRemind.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}
//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/cert/action/actionCertRemind.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}


function remind(id, obj) {
    console.log($(this).children('option:selected').val() + $(this).children('option:selected').text());
    if (window.confirm("你确定修改下次提醒吗？")) {
        $.post('../../modules/cert/action/actionCert.php', {
            type: "remind",
            id: id,
            sel: obj
        }, function (data) {
            alert(data.msg);
            getList();
        }, 'json');
        return true;
    } else {
        return false;
    }

}