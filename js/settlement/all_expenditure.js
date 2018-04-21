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
    $.post('../../modules/settlement/action/getAllExpenditure.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("确定将该项目支出结项解除吗？")) {
        $.post('../../modules/settlement/action/actionExpenditure.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
            alert(data.msg);
        }, 'json');
        return true;
    } else {
        return false;
    }
}

//项目支出结项
function knotThis(obj) {
    if (window.confirm("确定将该项目支出结项？")) {
        $.post('../../modules/settlement/action/actionExpenditure.php', {type: "knot", id: obj}, function (data) {
            getList($("#pagetype").val());
            alert(data.msg);
        }, 'json');
        return true;
    } else {
        return false;
    }
}
