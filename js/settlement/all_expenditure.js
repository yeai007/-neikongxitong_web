$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList($("#pagetype").val());
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/settlement/allExpenditure.php", "项目支出结项列表", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
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
