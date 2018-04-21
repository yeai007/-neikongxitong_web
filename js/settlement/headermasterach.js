$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList($("#pagetype").val());
});
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
    $.post('../../modules/settlement/action/getAllHeaderACH.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/settlement/action/actionHeaderMaster.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}

//班主任结算
function SettlementThis(obj) {
    if (window.confirm("确定结算该班主任绩效？")) {
        $.post('../../modules/settlement/action/actionHeaderMaster.php', {type: "settlement", id: obj}, function (data) {
            getList($("#pagetype").val());
            alert(data.msg);
        }, 'json');
        return true;
    } else {
        return false;
    }
}
