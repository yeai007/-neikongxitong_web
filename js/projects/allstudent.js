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
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/project/allStudent.php", "学员列表", 0, '');
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
    $.post('../../modules/project/action/getAllRroject.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/project/action/actionProject.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}

function RefuseThis(obj) {
    var d = dialog({
        title: '请填写拒绝原因',
        content: "<textarea  id='refuse_text' class='dialog'></textarea>",
        okValue: '确 定',
        ok: function () {
            var that = this;
            that.title('提交中..');
            $.post('../../modules/project/action/actionProject.php', {refuse: "refuse", text: $("#refuse_text").val(), id: obj}, function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 1) {
                    alert("拒绝成功1");
                    // window.location.href = "../modules/index/index.php";
                } else {
                    alert(obj.msg);
                }
                return true;
            });
        },
        cancelValue: '取消',
        cancel: function () {}
    });
    d.show();
}
