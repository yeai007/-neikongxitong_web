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
    $.post('../../modules/settlement/action/getAllProjectACH.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("确定将该项目支出结项解除吗？")) {
        $.post('../../modules/settlement/action/actionProjectACH.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
            alert(data.msg);
        }, 'json');
        return true;
    } else {
        return false;
    }
}

//核算此单位
function accountThis(projectid, unitid) {
    if (window.confirm("确定此项目的单位核算吗？")) {
        $.post('../../modules/settlement/action/actionProjectACH.php', {type: "account", projectid: projectid, unitid: unitid}, function (data) {
            getList($("#pagetype").val());
            alert(data.msg);
        }, 'json');
        return true;
    } else {
        return false;
    }
}

