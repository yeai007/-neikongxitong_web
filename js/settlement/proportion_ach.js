$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    // getList($("#pagetype").val());
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/settlement/ProportionACH.php", "项目绩效列表", 0, '');
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
    $.post('../../modules/settlement/action/getAllProportionACH.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}
function modify(perId, busId, perName, busName, e) {
    var d = dialog({
        title: '确定修改比例为$(this).val()‘’%吗',
        content: "<text class='dialog'>确定修改比例为" + e.value + "%吗</text>",
        okValue: '确 定',
        ok: function () {
            var that = this;
            that.title('提交中..');
            $.post('../../modules/settlement/action/actionProportionACH.php', {type: 'modify', perId: perId, busId: busId, val: e.value, perName: perName, busName: busName}, function (data) {
                var obj = JSON.parse(data);
                alert(obj.msg);
                return true;
            });
        },
        cancelValue: '取消',
        cancel: function () {}
    });
    d.show();
}